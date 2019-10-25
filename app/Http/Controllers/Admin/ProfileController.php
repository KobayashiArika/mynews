<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }
    public function create(Request $request)
    {
       $validatedData = $request->validate([
           'name' => 'required',
           'gender' => 'required',
           'hobby' => 'required',
           'introduction' => 'required',
           ]);
           
       $profile = new Profile();
       $profile->name = $validatedData['name'];
       $profile->gender = $validatedData['gender'];
       $profile->hobby = $validatedData['hobby'];
       $profile->inroduction = $validatedData['introduction'];
       $profile->save();
        return redirect('admin/profile/create');
    }
    public function edit()
    {
        return view('admin.profile.edit');
    }
    public function update()
    {
        return redirect('admin/profile/edit');
    }
}
