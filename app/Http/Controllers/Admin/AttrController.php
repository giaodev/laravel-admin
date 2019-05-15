<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attr;
use App\Http\Requests\AddAttrRequest;
use App\Http\Requests\EditAttrRequest;
use Illuminate\Support\Str;
class AttrController extends Controller
{
    public function getIndex(){
        $data['title'] = "Danh sách thuộc tính";
        $data['data'] = Attr::orderBy('attr_orderby','desc')->paginate(15);
        $data['listAttr'] = Attr::all();
        return view('admin.attr.index', $data);
    }
    public function postIndex(AddAttrRequest $request){
        $attr = new Attr();
        $attr->attr_name = $request->attr_name;
        if(isset($request->attr_slug)){
            $attr->attr_slug = Str::slug($request->attr_slug,'-');
        } else {
            $attr->attr_slug = Str::slug($request->attr_name,'-');
        }
        $attr->attr_parent = $request->attr_parent;
        $attr->save();
        $request->session()->flash('status', 'Task was successful!');
        return back();
    }
    public function getAdd(){
        $data['title'] = "Thêm thuộc tính";
        // $data['listCate'] = Attr::all();
        return view('admin.attr.add', $data);
    }
    public function postAdd(AddAttrRequest $request){
        $cate = new attr();
        $cate->cate_name = $request->cate_name;
        if($request->cate_slug) {
            $slug = Str::slug($request->cate_slug,'-');
        } else {
            $slug = Str::slug($request->cate_name,'-');
        }
        $cate->cate_slug = $slug;
        $cate->cate_description = $request->cate_description;
        $cate_order = ($request->cate_order) ? $request->cate_order : 0;
        $cate->cate_order = $cate_order;
        $cate->cate_type = $request->cate_type;
        $cate->cate_status = $request->cate_status;
        $cate->cate_parent = $request->cate_parent;
        $cate->save();
        $request->session()->flash('status', 'Task was successful!');
        return back();
    }
    public function getEdit($id){
        $data['title'] = "Cập nhật thuộc tính";
        $data['data'] = Attr::find($id);
        $data['listAttr'] = Attr::all();
        return view('admin.attr.edit', $data);
    }
    public function postEdit(EditAttrRequest $request, $id){
        $attr = Attr::find($id);
        $attr->attr_name = $request->attr_name;
        if($request->attr_slug) {
            $slug = Str::slug($request->attr_slug,'-');
        } else {
            $slug = Str::slug($request->attr_name,'-');
        }
        $attr->attr_slug = $slug;
        $attr_orderby = ($request->attr_orderby) ? $request->attr_orderby : 0;
        $attr->attr_orderby = $attr_orderby;
        $attr->attr_active = $request->attr_active;
        $attr->attr_parent = $request->attr_parent;
        $attr->save();
        $request->session()->flash('status', 'Task was successful!');
        return back();
    }
    public function getDelete(Request $request, $id){
        $attr = attr::find($id);
        if ($attr != "") {
            $attr->delete();
            $request->session()->flash('status', 'Task was successful!');
            return back();
        }
    }
    public function getShow(){
        $data['title'] = "Thuộc tính hiển thị";
        $data['data'] = attr::all()->where('cate_status', 1);
        return view('admin.attr.show', $data);
    }
}
