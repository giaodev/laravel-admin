<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $data['title'] = "Dashboard Giao CMS";
        return view('admin.home.index', $data);
    }
}
