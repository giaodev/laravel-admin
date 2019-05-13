<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class LoginController extends Controller
{
    public function getIndex(){
        $data['title'] = 'Hệ thống đăng nhập quản trị';
        return view('login.login', $data);
    }
    public function postIndex(LoginRequest $request){
        $user = new User();
        $username = $request->username;
        $password = $request->password;
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            return redirect()->intended('admin/dashboard');
        } else {
            $request->session()->flash('status', 'Login Failed');
            return back();
        }
    }
}
