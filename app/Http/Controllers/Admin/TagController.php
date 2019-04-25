<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Http\Requests\AddTagRequest;
use App\Http\Requests\EditTagRequest;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function getIndex(){
        $data['title'] = "Danh sách Tag";
        $data['data'] = Tag::orderBy('tag_orderby','desc')->get();
        return view('admin.tag.index', $data);
    }
    public function postIndex(AddtagRequest $request){
        $tag = new Tag();
        $tag->tag_name = $request->tag_name;
        if(isset($request->tag_slug)){
            $tag->tag_slug = Str::slug($request->tag_slug,'-');
        } else {
            $tag->tag_slug = Str::slug($request->tag_name,'-');
        }
        $tag->save();
        $request->session()->flash('status', 'Task was successful!');
        return back();
    }
    public function getAdd(){
        $data['title'] = "Thêm Tag";
        // $data['listCate'] = tag::all();
        return view('admin.tag.add', $data);
    }
    public function postAdd(AddTagRequest $request){
        $cate = new tag();
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
        $data['title'] = "Cập nhật Tag";
        $data['data'] = tag::find($id);
        $data['listtag'] = tag::all();
        return view('admin.tag.edit', $data);
    }
    public function postEdit(EdittagRequest $request, $id){
        $tag = tag::find($id);
        $tag->tag_name = $request->tag_name;
        if($request->tag_slug) {
            $slug = Str::slug($request->tag_slug,'-');
        } else {
            $slug = Str::slug($request->tag_slug,'-');
        }
        $tag->tag_slug = $slug;
        $tag_orderby = ($request->tag_orderby) ? $request->tag_orderby : 0;
        $tag->tag_orderby = $tag_orderby;
        $tag->tag_active = $request->tag_active;
        $tag->tag_parent = $request->tag_parent;
        $tag->save();
        $request->session()->flash('status', 'Task was successful!');
        return back();
    }
    public function getDelete(Request $request, $id){
        $tag = tag::find($id);
        if ($tag != "") {
            $tag->delete();
            $request->session()->flash('status', 'Task was successful!');
            return back();
        }
    }
    public function getShow(){
        $data['title'] = "Tag hiển thị";
        $data['data'] = tag::all()->where('cate_status', 1);
        return view('admin.tag.show', $data);
    }
}
