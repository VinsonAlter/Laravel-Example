<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() 
    {
        return view('login.index', [
            'title' => 'Login',
            // 'active' => 'login',
        ]);
    }

    public function authenticate(Request $request) 
    {
       $credentials = $request->validate([
            // 'email' => 'required|email:dns',
            'email' => 'required',
            'password' => 'required' 
       ]);

       if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
       }
       
       // return to login if auth attempt fails, with flash messages
       return back()->with('loginError', 'Login Failed');
    }

    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        // or you can just use request()->session() instead
        $request->session()->regenerateToken();
        return redirect('/');
    }
}