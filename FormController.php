<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    public function index(){
        return view('form');
    }
    public function insert(Request $req){
        $file=$req->file('avatar');
        $fileDir= './uploads/';
        $fileName=time()."_".$file->;
        $file->move($fileDir,$fileName);getClientOriginalName()

        $data=[
            'NAME'          =>$req->input('name'),
            'EMAIL'         =>$req->input('email'),
            'PHONE'         =>$req->input('phone'),
            'LANGUAGES'     =>implode(',', $req->input('lang')),
            'QUALIFICATIONS'=>implode(',',$req->input('ch')),
            'PICTURE'       =>$fileName,
            'PASS1'         =>password_hash($req->input('pass1'), PASSWORD_DEFAULT)
        ];

        $affectedRows=
        DB::table('users')->insert([
            'name'          =>$data['NAME'],
             'email'        =>$data['EMAIL'],
             'phone'        =>$data['PHONE'],
             'languages'         =>$data['LANGUAGES'],
             'qualifications'     =>$data['QUALIFICATIONS'],
             'picture'        =>$data['PICTURE'],
             'pass1'          =>$data['PASS1']
        ]);
        if($affectedRows){
            return redirect('/form')->with('message','success');
        }else{
        return redirect('/form')->with('message','error');
        }
    }
    public function allUsers(){
        $users=DB::table('users')->get();
        return view('users')->with(['userInfo'=>$users]);
    }
    public function edit($id){
        $user=DB::table('users')->where('id',$id)->get();
        return view('edit')->with(['user'=>$user[0]]);
    }
    public function update(Request $req){

            $data=[
            'NAME'          =>$req->input('name'),
            'EMAIL'         =>$req->input('email'),
            'PHONE'         =>$req->input('phone'),
            'LANGUAGES'     =>implode(',', $req->input('lang')),
            'QUALIFICATIONS'=>implode(',',$req->input('ch'))
        ];
        $affectedRows=
                DB::table('users')->where('id',$req->input('hid'))->
                update([
                    'name'              =>$data['NAME'],
                    'email'             =>$data['EMAIL'],
                    'phone'             =>$data['PHONE'],
                    'languages'         =>$data['LANGUAGES'],
                    'qualifications'    =>$data['QUALIFICATIONS']
                ]);
                if($affectedRows ==1){
                    return redirect('/users')->with('message','success');
                }else{
                return redirect('/users')->with('message','error');
                }
    }
    public function delete($id){
        $affectedRows=
        DB::table('users')->where('id',$id)->delete();
        if($affectedRows==1){
            return redirect('/users')->with('message','delete');
        }else{
        return redirect('/users')->with('message','error');
        }
    }

    public function signin(){
        return view('signin');
    }

  public function login(Request $req){
        $email = $req->input('email');
        $pass1 = $req->input('pass1');

        $user = DB::table('users')
                    ->where('email',$email)
                    ->get();
        if(!$user)

          return redirect("/signin")->with('message','user doesnot exists !');
        else {
             if(password_verify($pass1,$user->pass1)){
              $req->session()->put('USER',$user->name);
              $req->session()->put('USER-ID',$user->id);
              $req->session()->put('USER-ROLE',$user->role);
              $req->session()->put('IP',$_SERVER['REMOTE_ADDR']);

              //changing the timezone 
              //date_default_timezone_set('Asia/kolkata');
              //$req->session()->put('login_time',date('d-m-y h:i:sA'));

              return redirect('/users');
             }
             else 
               return redirect('/signin')->with("message","Wrong Cridentials !");

        }  


    }
    public function logout(Request $req){
    $req->session()->forget('USER');
    $req->session()->flush();
    return redirect('/signin')->with('message','You have successfully logout');
  }
}