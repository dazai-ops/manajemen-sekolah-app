<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin(){
        return view('login.login', [
            'pageTitle' => 'Login'
        ]);
    }

    public function showRegister(){
        //jika ada ya ini dipak
    }

    public function checkLogin(Request $request){

        $credentials = [
            'operator_username' => $request->operator_username,
            'password' => $request->operator_password
        ];
        
        if(auth()->guard('operator')->attempt($credentials)){
            if(auth()->guard('operator')->user()->operator_is_aktif == 1){
                $request->session()->regenerate();
                return redirect('/dashboard');
            }else{
                auth()->guard('operator')->logout();
                return redirect('/login')->with('loginFailed', 'Akun Operator Telah Diblokir');
            }
        }else{
            return redirect('/login')->with('loginFailed', 'Username / Password salah');
        }

    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');

    }
}
