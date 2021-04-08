<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login()
    {
        return View('auth.login');
    }

    public function authCheck(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'password' => 'required|min:1',
        ]);

        $credentials = $request->only('user_name', 'password');
        if(Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }
        return redirect()->back()->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
