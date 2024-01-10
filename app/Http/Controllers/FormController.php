<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;

class FormController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function insert(Request $req)
    {
        $validate = $req->validate([
            'name' => 'required|max:15',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:10',
            'gen' => 'required|in:Male,Female',
            'lang' => 'required|array',
            'ch.*' => 'in:10th,12th,Gradutation,Post Gradutation',
            'avatar' => 'mimes:jpg,jpge,png,gif|max:3000',
            'pass' => ['required', 'confirmed', Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()]
        ]);
        $file = $req->file('avatar');
        $fileDir = './uploads/';
        $fileName = time() . "_" . $file->getClientOriginalName();
        $file->move($fileDir, $fileName);
        $data = DB::table('users')->insert([
            'name'              => $req->input('name'),
            'email'             => $req->input('email'),
            'phone'             => $req->input('phone'),
            'gender'            => $req->input('gen'),
            'languages'         => implode(',', $req->input('lang')),
            'qualification'     => implode(',', $req->input('ch')),
            'picture'           => $fileName,
            'password'          => password_hash($req->input('pass'), PASSWORD_DEFAULT)
        ]);
        if ($data == 1) {
            return redirect('/signin')->with(['message' => 'signup']);
        } else {
            return redirect('/')->with(['message' => 'unsignup']);
        }
    }
    public function getAll()
    {
        $users = DB::table('users')->simplePaginate(5);//select * from users
        return view('users')->with(['usersInfo' => $users]);
    }
    public function editId($id)
    {
        $data = DB::table('users')->where('id', $id)->get();
        return view('edit')->with(['user' => $data[0]]);
    }
    public function update(Request $req)
    {
        $file = $req->file('avatar');
        $fileDir = './uploads/';
        $fileName = time() . "_" . $file->getClientOriginalName();
        $file->move($fileDir, $fileName);
        $data = DB::table('users')->where('id', $req->input('hid'))->update([
            'name'              => $req->input('name'),
            'email'             => $req->input('email'),
            'phone'             => $req->input('phone'),
            'gender'            => $req->input('gen'),
            'languages'         => implode(',', $req->input('lang')),
            'qualification'     => implode(',', $req->input('ch')),
            'picture'           => $fileName,
        ]);
        if ($data == 1) {
            return redirect('/users')->with(['message' => 'update']);
        } else {
            return redirect('/users')->with(['message' => 'unupdate']);
        }
    }
    public function delete($id)
    {
        $affectedRows = DB::table('users')->where('id', $id)->delete();
        if ($affectedRows) {
            return redirect('/users')->with(['message' => 'delete']);
        } else {
            return redirect('/users')->with(['message' => 'undelete']);
        }
    }
    public function signin()
    {
        return view('/signin');
    }
    public function login(Request $req)
    {
        $email = $req->input('email');
        $pass = $req->input('pass');
        $users = DB::table('users')->where('email', $email)->first();
        if (!$users) {
            return redirect('/signin')->with(['message' => 'exists']);
        }
        if (password_verify($pass, $users->password)) {
            $req->session()->put('USER', $users->name);
            $req->session()->put('USER_ID', $users->id);
            $req->session()->put('IP', $_SERVER['REMOTE_ADDR']);
            return redirect('/users')->with(['message' => 'success']);
        } else {
            return redirect('/signin')->with(['message' => 'error']);
        }
    }
    public function logout(Request $req)
    {
        $req->session()->forget('USER');
        $req->session()->flush();
        return redirect('/signin')->with(['message' => 'logout']);
    }
}
