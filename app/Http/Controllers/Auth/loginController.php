<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{

    public function login()
    {
        $this->data['headline'] = 'login';
        return  view('login.form', $this->data);
    }


    public function authenticate(LoginRequest $request)
    {
        $data = $request->only('email', 'password');

        if (Auth::attempt($data)) {
            return redirect()->intended('dashboard');
        } else
            return redirect()->route('login')->withErrors(['Invalid username and password']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
