<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function getIndex(){
        $data['title'] = "Danh sách chuyên mục";
        $data['data'] = Category::paginate(10);
        return view('admin.category.index', $data);
    }
    public function postIndex(){

    }
    public function getAdd(){
        $data['title'] = "Thêm chuyên mục";
        $data['listCate'] = Category::all();
        return view('admin.category.add', $data);
    }
    public function postAdd(AddCategoryRequest $request){
        $cate = new Category();
        $cate->cate_name = $request->cate_name;
        if($request->cate_slug) {
            $slug = Str::slug($request->cate_slug,'-');
        } else {
            $slug = Str::slug($request->cate_name,'-');
        }
        $cate->cate_slug = $slug;
        if($request->cate_info != ""){
            $cate->cate_info = $request->cate_info;
        }
        if($request->cate_title != ""){
            $cate->cate_title = $request->cate_title;
        }
        if($request->cate_description != ""){
            $cate->cate_description = $request->cate_description;
        }
        $cate_order = ($request->cate_order) ? $request->cate_order : 0;
        $cate->cate_order = $cate_order;
        $cate->cate_type = $request->cate_type;
        $cate->cate_status = $request->cate_status;
        $cate->cate_has_submenu = $request->cate_has_submenu;
        $cate->cate_parent = $request->cate_parent;
        if($request->cate_type2 != ""){
            $cate->cate_type2 = $request->cate_type2;
        }
        if($request->cate_image != ""){
            $cate->cate_image = $request->cate_image;
        }
        $cate->save();
        $request->session()->flash('status', 'Task was successful!');
        return back();
    }
    public function getEdit($id){
        $data['title'] = "Cập nhật chuyên mục";
        $data['data'] = Category::find($id);
        $data['listCate'] = Category::all();
        return view('admin.category.edit', $data);
    }
    public function postEdit(EditCategoryRequest $request, $id){
        $cate = Category::find($id);
        $cate->cate_name = $request->cate_name;
        if($request->cate_slug) {
            $slug = Str::slug($request->cate_slug,'-');
        } else {
            $slug = Str::slug($request->cate_name,'-');
        }
        $cate->cate_slug = $slug;
        $cate->cate_info = $request->cate_info;
        $cate->cate_title = $request->cate_title;
        $cate->cate_description = $request->cate_description;
        $cate->cate_description = $request->cate_description;
        $cate_order = ($request->cate_order) ? $request->cate_order : 0;
        $cate->cate_order = $cate_order;
        $cate->cate_type = $request->cate_type;
        $cate->cate_status = $request->cate_status;
        $cate->cate_has_submenu = $request->cate_has_submenu;
        $cate->cate_parent = $request->cate_parent;
        if($request->cate_type2 != ""){
            $cate->cate_type2 = $request->cate_type2;
        }
        if($request->cate_image != ""){
            $cate->cate_image = $request->cate_image;
        }
        $cate->save();
        $request->session()->flash('status', 'Task was successful!');
        return back();
    }
    public function getDelete(Request $request, $id){
        $cate = Category::find($id);
        if ($cate != "") {
            $cate->delete();
            $request->session()->flash('status', 'Task was successful!');
            return back();
        }
    }
    public function getShow(){
        $data['title'] = "Danh mục hiển thị";
        $data['data'] = Category::orderBy('cate_order','desc')->where(['cate_status' => 1, 'cate_type2' => 1])->get();
        return view('admin.category.show', $data);
    }
}
