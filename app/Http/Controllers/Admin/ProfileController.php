<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use Carbon\Carbon;
use App\ProfileHistory;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }
    public function create(Request $request)
    {
        
       $this->validate($request, Profile::$rules);
       $profiles = new Profile;
       $form = $request->all();
       $profiles->fill($form);
       $profiles->save();
        return redirect('admin/profile/create');
    }
    
    
    public function edit(Request $request)
    {
        //Plofile Modelからde-tawo取得
        $profiles = Profile::find($request->id);
        if(empty($profiles)){
            abort(404);
        }
        return view('admin.profile.edit', ['profiles_form' => $profiles]);
    }
    public function update(Request $request)
    {
        //Validation
        $this->validate($request, Profile::$rules);
         // Profile Modelからデータを取得する
      $profiles = Profile::find($request->id);
      // 送信されてきたフォームデータを格納する
      $profiles_form = $request->all();
      unset($profiles_form['_token']);

      // 該当するデータを上書きして保存する
      $profiles->fill($profiles_form)->save();
      $history = new ProfileHistory;
        $history->profile_id = $profiles->id;
        $history->edited_at = Carbon::now();
        $history->save();
      
        return redirect('admin/profile/edit?id='.$profiles->id);
    }
}
