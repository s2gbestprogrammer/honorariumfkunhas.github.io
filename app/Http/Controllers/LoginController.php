<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if(auth()->user()->role == 'admin' || auth()->user()->role == 'super-admin'){
                return redirect()->intended('/dashboard/admin');
            }else{
                return redirect()->intended('/dashboard/dosen');
            }
        }

        return back()->with('fail', 'username atau password salah');

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
