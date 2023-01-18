<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        //halaman logout
        Auth::logout();
        return redirect('/');
    }



    public function auth(Request $request)
    {
        $login = $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        $user = $request->only(['email', 'password']);
        if (Auth::attempt($login)) {
            $request->session()->regenerate();
            if (auth()->user()->is_role == false) {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->intended('/dashboard-admin');
            }
        }
    }
}