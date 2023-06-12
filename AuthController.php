<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function register()
    {
        return view('register'); 
    }
    public function simpan(Request $request){
        User::create([
            'nik'=>$request->nik,
            'name'=>$request->name,
            'no_hp'=>$request->no_hp,
            'password'=> bcrypt($request->password)
        ]);
        return redirect('/');
    }
    public function login(){
        return view('login');
    }
    public function ceklogin(Request $request)
    {
        if(Auth::attempt([
            'name'=>$request->name,
            'password'=>$request->password,
        ]))
        {
            return redirect('/home');
        }
        else
        {
            return redirect('/');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
