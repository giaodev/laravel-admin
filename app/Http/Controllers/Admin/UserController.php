<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        $data['title'] = "Danh sách tài khoản";
        return view('admin.user.index', $data);
    }
}
