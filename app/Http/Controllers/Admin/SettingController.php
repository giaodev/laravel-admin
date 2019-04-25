<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;

class SettingController extends Controller
{
public function getIndex(){
        $data['title'] = "Danh sách Setting";
        $data['data'] = setting::find(1);
        return view('admin.setting.index', $data);
    }
    public function postIndex(SettingRequest $request){
        $setting = setting::find(1);
        $setting->homepage_title = $request->homepage_title;
        $setting->homepage_description = $request->homepage_description;
        $setting->homepage_image = $request->homepage_image;
        $setting->logo = $request->logo;
        $setting->favicon = $request->favicon;
        $setting->url = $request->url;
        $setting->email = $request->email;
        $setting->save();
        $request->session()->flash('status', 'Task was successful!');
        return back();
    }
}
