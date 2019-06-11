<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Models\User;
class UserController extends Controller
{
    public function getIndex(){
        $data['title'] = "Danh sách tài khoản";
        $data['data'] = User::all();
        return view('admin.user.index', $data);
    }
    public function getAdd(){
        $data['title'] = "Thêm mới tài khoản";
        return view('admin.user.add', $data);
    }
    public function postAdd(AddUserRequest $request){
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->level = 1;
        $user->save();
        $request->session()->flash('status', 'Task was successful!');
        return back();
    }
    public function getEdit($id){
        $data['title'] = "Cập nhật tài khoản";
        $data['data'] = User::find($id);
        return view('admin.user.edit', $data);
    }
    public function postEdit(EditUserRequest $request, $id){
        $user = User::find($id);
        $user->username = $request->username;
        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->email = $request->email;
        $user->level = 1;
        $user->save();
        $request->session()->flash('status', 'Task was successful!');
        return back();
    }
    public function getDelete(Request $request, $id){
        $user = User::find($id);
        if($user != ""){
            $user->delete();
            $request->session()->flash('status', 'Task was successful!');
            return redirect()->route('user.index');
        }
    }
}
