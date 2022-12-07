<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alluser;

class adminController extends Controller
{

    public function login()
    {
        return view('login');
    }
    public function loginSubmit(Request $req)
    {
        $req->validate(
            [
                'username'=>'required',
                'password'=>'required',
                
            ],
            
    );

    $user=alluser::where('username',$req->username)->where('password',md5($req->password))->where('active_status',"active")->first();
       if($user==null)
       {
          $req->session()->flash('registration','Insert valid information');
          //return redirect()->route('login');
          return back();
       }
       else
       {
            if($user->usertype=="admin")
            {
                $req->session()->put('usertype','admin');
                $req->session()->put('username',$user->username);
                return redirect()->route('admin.home');
            }
            if($user->usertype=="manager")
            {
                $req->session()->put('usertype','manager');
                $req->session()->put('username',$user->username);
                return redirect()->route('manager.home');
            }
            if($user->usertype=="staff")
            {
                $req->session()->put('usertype','staff');
                $req->session()->put('username',$user->username);
                return redirect()->route('staff.home');
            }
            if($user->usertype=="customer")
            {
                $req->session()->put('usertype','customer');
                $req->session()->put('username',$user->username);
                return redirect()->route('customer.home');
            }
          
       }





    }
   

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
  


    public function registration()
    {
        return view('Admin.registration');
    }

    public function registrationSubmit(Request $req)
    {
        $req->validate(
            [
                'username'=>'required|min:3|max:9|unique:allusers|string|regex:/^[A-Za-z0-9]+(?:[_-][A-Za-z0-9]+)*$/',
                'email'=>'required',
                'password'=>'required|min:5|max:15',
                'cpassword'=>'required|same:password',
                'phone'=>'required|regex:/^01[0-9]{9}$/',
                'gender'=>'required',
                'date_of_birth'=>'required',
                'picture'=>'mimes:png,jpg,jpeg|required|max:10000',
                
            ],
            
    );
    $pic=$req->file('picture')->store('Profile Picture');


    $st =new alluser();
    $st->username=$req->username;
    $st->password=md5($req->password);
    $st->email=$req->email;
    $st->phone=$req->phone;
    $st->dob=$req->date_of_birth;
    $st->gender=$req->gender;
    $st->usertype="admin";
    $st->image=$pic;
    $st->save();
    $req->session()->flash('registration','User Registered');
    return redirect()->route('login');

    }

    public function Home()
    {
        return view('Admin.home');
    }
}
