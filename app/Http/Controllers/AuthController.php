<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(){
        return view('admin.login.index');
    }

    public function auth(Request $request){
        $credential = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credential)){
            $request->session()->regenerate();
            if(Auth::user()->role == 'admin'){
                return redirect()->intended('/admin');
            }
        }

        return redirect()->back()->withErrors([
            'warning' => 'Email atau password salah'
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
