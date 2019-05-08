<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orders;
class OrdersController extends Controller
{
 public function getIndex(){
        $data['title'] = "Danh sách đơn hàng";
        $data['data'] = orders::all();
        return view('admin.orders.index', $data);
    }
    public function getAdd(){
        $data['title'] = "Thêm mới đơn hàng";
        return view('admin.orders.add', $data);
    }
    public function postAdd(AddordersRequest $request){
        $orders = new orders();
        $orders->name = $request->name;
        $orders->ordersname = $request->ordersname;
        $orders->password = bcrypt($request->password);
        $orders->email = $request->email;
        $orders->level = 2;
        $orders->save();
        $request->session()->flash('status', 'Task was successful!');
        return back();
    }
    public function getEdit($id){
        $data['title'] = "Cập nhật đơn hàng";
        $data['data'] = orders::find($id);
        return view('admin.orders.edit', $data);
    }
    public function postEdit(EditordersRequest $request, $id){
        $orders = orders::find($id);
        $orders->ordersname = $request->ordersname;
        if($request->password){
            $orders->password = bcrypt($request->password);
        }
        $orders->email = $request->email;
        $orders->level = 2;
        $orders->save();
        $request->session()->flash('status', 'Task was successful!');
        return back();
    }
    public function getDelete(Request $request, $id){
        $orders = orders::find($id);
        if($orders != ""){
            $orders->delete();
            $request->session()->flash('status', 'Task was successful!');
            return redirect()->route('orders.index');
        }
    }
}
