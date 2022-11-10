<?php

namespace App\Http\Controllers\Auth;

use Exception;
use Carbon\Carbon;
use App\Models\Admin;
use App\Mail\MailNotify;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
  public function showForgetPasswordForm()
  {
    return view('login.forgetPassword');
  }

  public function submitForgetPasswordForm(Request $request)
  {
    $request->validate([
      'email' => 'required|email|exists:admins',
    ]);

    $token = Str::random(64);

    DB::table('password_resets')->insert([
      'email' => $request->email,
      'token' => $token,
      'created_at' => Carbon::now()
    ]);

    $data = [
      'subject' => 'TwitSoft Password Reset Mail',
      'body' =>  'Hello This is my email delivery!'
    ];

    Mail::to($request->email)->send(new MailNotify($data, $token));

    return back()->with('message', 'We have e-mailed your password reset link!');
  }

  public function showResetPasswordForm($token)
  {
    return view('login.forgetPasswordLink', ['token' => $token]);
  }

  /**
   * Write code on Method
   *
   * @return response()
   */
  public function submitResetPasswordForm(Request $request)
  {
    $request->validate([
      'email' => 'required|email|exists:admins',
      'password' => 'required|min:6|confirmed',
      'password_confirmation' => 'required'
    ]);

    $updatePassword = DB::table('password_resets')
      ->where([
        'email' => $request->email,
        'token' => $request->token
      ])
      ->first();

    if (!$updatePassword) {
      return back()->withInput()->with('error', 'Invalid token!');
    }

    Admin::where('email', $request->email)
      ->update(['password' => Hash::make($request->password)]);

    DB::table('password_resets')->where(['email' => $request->email])->delete();

    return redirect('/login')->with('message', 'Your password has been changed!');
  }
}
