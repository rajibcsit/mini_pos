<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class loginController extends Controller
{
    
    public function login()
    {
        $this->data['headline'] = 'login';
        return  view('login.form',$this->data);
    }


    public function authenticate(LoginRequest $request)
    {
         $data = $request->only('email','password');

         if(Auth::attempt($data)){
            return redirect()->intended('dashboard');
         }else
         return redirect()->route('login')->withErrors(['Invalid username and password']);

    }

    public function logout()
    {
    	Auth::logout();

    	return redirect()->route('login');
    }
}
