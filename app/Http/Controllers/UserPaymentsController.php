<?php

namespace App\Http\Controllers;
use App\Http\Requests\PaymentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Payment;

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


	public function store(PaymentRequest $request, $user_id)
    {
    	$formData 				= $request->all();
    	$formData['user_id'] 	= $user_id;
		$formData['admin_id'] 	= Auth::id();

    	if( Payment::create($formData) ) {
            Session::flash('message', 'Payment Added Successfully');
        }
        
        return redirect()->route('user.payments', ['id' => $user_id]);
    }


	public function destroy($user_id,$payment_id)
	{
		if( Payment::destroy($payment_id) ) {
            Session::flash('message', 'Payment Deleted Successfuly');
        }
    
          return redirect()->route('user.payments',['id' =>$user_id]);
	}

}
