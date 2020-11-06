<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\ProfileHistory;
use Carbon\Carbon;

class ProfileController extends Controller
{
    
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $request)
    {   
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
        //フォームから送信されてきた_tokenを削除
        unset($form['_token']);
     
        //データベースに保存
        $profile->fill($form);
        $profile->save();
        
        return redirect('admin/profile/create');
    }
    
    
    public function edit(Request $request)
    {   
        //Profileからデータを取得
        $profile = Profile::find($request->id);
        if (empty($profile)) {
            abort(404);
        }
        return view('admin.profile.edit',['profile_form' => $profile]);
    }
    
    public function update(Request $request)
    {
        
        //Validationをかける
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id);
        $profile_form = $request->all();
        unset($profile_form['_token']);
        
        //該当するデータを上書きして保存
        $profile->fill($profile_form)->save();
        
        $profile_history = new ProfileHistory;
        $profile_history->profile_id = $profile->id;
        $profile_history->edited_at = Carbon::now();
        $profile_history->save();
        
        return redirect('admin/profile/');
    }
    
    public function index(Request $request)
    {
        $cond_name = $request->cond_name;
        if ($cond_name != '') {
            $profiles = Profile::where('name', $cond_name)->get();
        } else {
            $profiles = Profile::all();
        }
        return view('admin.profile.index', ['profiles' => $profiles, 'cond_name' => $cond_name]);
    }
    
    public function delete(Request $request)
    {
        $profile = Profile::find($request->id);
        
        $profile->delete();
        return redirect('admin/profile/');
    }
}

