<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index(){

    return view('auth.login');
    }
    public function prosesLogin(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string'
        ]);

        $credential = ['email'=>$request->input('email'), 'password'=>$request->password];

         if (Auth::attempt($credential)){
             return redirect()->route('dashboard');
         }
         return redirect()->back()->with('message', 'gagal, email atau password salah');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
