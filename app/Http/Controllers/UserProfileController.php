<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
        $this->data['main_manu']    = 'setting';
        $this->data['sub_manu']    = 'profile';
    }

    public function index()
    {
        $authUser = Admin::find(Auth::user()->id);
        if ($authUser->image) {
            $authUser->image = Storage::url($authUser->image);
        }
        return view('userProfile.show', compact('authUser'), $this->data);
    }

    public function edit()
    {
        $id                  = Auth::user()->id;
        $editData            = Admin::find($id);
        if ($editData->image) {
            $editData->image = Storage::url($editData->image);
        }
        return view('userProfile.edit_profile', compact('editData'), $this->data);
    }

    public function store(Request $request)
    {
        $authId = Auth::user()->id;
        $authUser = Admin::find($authId);

        if ($request->file('image')) {
            if ($authUser->image) {
                Storage::delete($authUser->image);
            }
            $authUser['image'] = Storage::putFile('profileImage', $request->file('image'));
        }
        // return  $authUser['image'];

        $authUser->name = $request->name;
        $authUser->email = $request->email;
        $authUser->phone = $request->phone;
        $authUser->address = $request->address;

        $authUser->save();
        return redirect()->route('profile.show');
    }
}
