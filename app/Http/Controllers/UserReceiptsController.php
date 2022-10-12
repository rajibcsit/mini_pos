<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReceiptRequest;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Receipt;

class UserReceiptsController extends Controller
{
    public function __construct()
	{
		$this->data['tab_menu'] = 'receipts';
	}

    public function index( $id )
    {
    	$this->data['user'] 	= User::findOrFail($id);

    	return view('users.receipts.receipts', $this->data);
    }


	public function store(ReceiptRequest $request, $user_id)
	{
		$formData 				= $request->all();
    	$formData['user_id'] 	= $user_id;
		$formData['admin_id'] 	= Auth::id();

    	if( Receipt::create($formData) ) {
            Session::flash('message', 'Receipt Added Successfully');
        }
        
        return redirect()->route('user.receipts', ['id' => $user_id]);
	}



	public function destroy($user_id ,$receipt_id)
	{
		if( Receipt::destroy($receipt_id) ) {
            Session::flash('message', 'Receipt Deleted Successfuly');
        }
    
          return redirect()->route('user.receipts',['id' =>$user_id]);
	}
}
