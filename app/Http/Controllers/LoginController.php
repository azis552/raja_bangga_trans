<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.login');
    }
    public function checklogin(Request $request)
    {
        $credensial = $request->only('email','password');

        if(Auth::attempt($credensial))
        {
            return redirect()->route('dashboard.index');
        }else
        {
            return redirect()->route('login.index')->withErrors(['email' => 'Invalid credentials']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
