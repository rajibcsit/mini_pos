<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Group;
class UsersController extends Controller
{
   
    public function index()
    {
        $this->data['users'] = User::all();
        return view('users.users' , $this->data);
    }

   
    public function create()
    {
      
      $this->data['groups']     =Group::arrayForSelect();
      $this->data['mode']       = 'create';
      $this->data['headline']   = 'Add New User';
      
      return view('users.form' , $this->data);
    }

   
    public function store(CreateUserRequest $request)
    {
       $formData = $request->all();

       if(User::create($formData) ) {
        Session::flash('message', 'User Created Successfuly');
    }

      return redirect()->to('users');

    }

    public function show($id)
    {
      $this->data ['user'] = User::find($id);

      return view('users.show',$this->data);
    }

  
    public function edit($id)
    {
       $this->data ['user']     = User::findOrFail($id);
       $this->data['groups']    =Group::arrayForSelect();
       $this->data['mode']       = 'edit';
       $this->data['headline']   = 'Update information';

       return view('users.form',$this->data);
    }

   
    public function update(UpdateUserRequest $request, $id)
    {
       $data             = $request->all();

       $user             = User::find($id);
       $user->group_id   = $data ['group_id'];
       $user->name       = $data ['name'];
       $user->email      = $data ['email'];
       $user->phone      = $data ['phone'];
       $user->address    = $data ['address'];
       
       if($user-> save() ) {
        Session::flash('message', 'User Updated Successfuly');
    }

      return redirect()->to('users');
    }

    
    public function destroy($id)
    {
      if(User::find($id)->delete() ) {
        Session::flash('message', 'User Deleted Successfuly');
    }

      return redirect()->to('users');
    }
}
