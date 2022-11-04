<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
        $this->data['main_manu']    = 'setting';
        $this->data['sub_manu']    = 'profile';
        $this->data['sub_manu']    = 'password';
    }


    public function index()
    {
        return view('login.changePassword', $this->data);
    }


    public function store(Request $request)
    {

        $request->validate([
            'oldpassword'  => 'required',
            'password'     => 'required|confirmed',
        ]);
        $haspassword = Auth::user()->password;

        if (Hash::check($request->oldpassword, $haspassword)) {
            $user = Admin::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            // Auth::logout();
            return redirect()->route('login');
        } else {
            return redirect()->back();
        }
    }
}
