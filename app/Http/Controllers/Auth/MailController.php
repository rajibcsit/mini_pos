<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Mail\MailNotify;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        $data = [
            'subject' => 'TwitSoft Password Reset Mail',
            'body' =>  'Hello This is my email delivery!'
        ];
        try {
            Mail::to('rajibmia709@gmail.com')->send(new MailNotify($data));
            return  response()->json(['Great check your mail box']);
        } catch (Exception $th) {
            return response()->json(['Sorry,Something went wrong']);
        }
    }
}
