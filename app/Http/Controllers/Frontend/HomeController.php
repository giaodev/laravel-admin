<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $data['title'] = "Trang chủ nè các bạn";
        return view('default.page.home', $data);
    }
}
