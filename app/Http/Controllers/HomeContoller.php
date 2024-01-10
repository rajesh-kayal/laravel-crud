<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeContoller extends Controller
{
    public function home(){
        return view('home');
    }
    public function submit(Request $req){
    
        $data=DB::table('newusers')->insert([
            'name'=>$req->input('name'),
            'email'=>$req->input('email'),
            'password'=>password_hash($req->input('pass'),PASSWORD_DEFAULT)
        ]);
        if ($data == 1) {
            return redirect('/new_signin')->with(['message' => 'signup']);
        } else {
            return redirect('/home')->with(['message' => 'unsignup']);
        }
    }
    public function alluser(){
        $users=DB::table('newusers')->get(); //select * from newusers;
        return view('display')->with(['usersInfo'=>$users]);
    }
    public function neweditId($id){
        $data=DB::table('newusers')->where('id',$id)->get(); //select * from newusers where id=$id
        return view('/editUser')->with(['user'=>$data[0]]);
    }
    public function update(Request $req){
        //$id= $req->input('hid');
        //select * from newusers where id=$id
        $data = DB::table('newusers')->where('id', $req->input('hid'))->update([
            'name' => $req->input('name'),
            'email' => $req->input('email'),
        ]);
        if ($data == 1) {
            return redirect('/display')->with(['message' => 'data update']);
        } else {
            return redirect('/display')->with(['message' => 'not update']);
        }
    }
    public function delete($id){
        $user=DB::table('newusers')->where('id',$id)->delete(); //delete from newuser where id = $id;
        if($user){
            return redirect('/display')->with(['message'=>'delete successfully']);
        }else{
            return redirect('/display')->with(['message' => 'delete unsuccessfully']);
        }

    }
    public function signin(){
        return view('/new_signin');
    }
    public function login(Request $req)
    {
        $email = $req->input('email'); // Change 'eamil' to 'email'
        $pass = $req->input('pass');

        $user = DB::table('newusers')->where('email', $email)->first(); // Use first() to retrieve a single record

        if (!$user) {
            return redirect('/new_signin')->with(['message' => 'notexists']);
        } elseif (password_verify($pass, $user->password)) {
            $req->session()->put('USER', $user->name);
            $req->session()->put('ID', $user->id);
            $req->session()->put('IP', $_SERVER['REMOTE_ADDR']);
            return redirect('/display')->with(['message' => 'signin']);
        } else {
            return redirect('/new_signin')->with(['message' => 'wrong']);
        }
    }
    public function logout(Request $req){
         $req->session()->forget('USER'); //data truncate /session_unset
        $req->session()->flush();
        return redirect('/home')->with(['message' => 'logout']);
    }
}
