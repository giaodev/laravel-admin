<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index(){
        $data['title'] = 'Hệ thống đăng nhập quản trị';
        return view('login.login', $data);
    }
}
