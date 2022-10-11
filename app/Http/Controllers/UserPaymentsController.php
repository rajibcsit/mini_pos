<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserPaymentsController extends Controller
{
    public function __construct()
	{
		$this->data['tab_menu'] = 'payments';
	}

    public function index( $id )
    {
    	$this->data['user'] 	= User::findOrFail($id);

    	return view('users.payments.payments', $this->data);
    }
}
