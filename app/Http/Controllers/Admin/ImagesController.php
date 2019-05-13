<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Images;
use App\Models\Category;
use App\Http\Requests\AddImagesRequest;
use App\Http\Requests\EditImagesRequest;

class ImagesController extends Controller
{
 public function getIndex()
    {
        $data['title'] = "Danh sách hình ảnh";
        $data['data'] = Images::orderby('created_at','desc')->paginate(15);
        return view('admin.images.index', $data);
    }

    public function getAdd()
    {
        $data['title'] = "Thêm mới hình ảnh";
        $data['listCate'] = Category::all();
        return view('admin.images.add', $data);
    }

    public function postAdd(AddImagesRequest $request)
    {

        $images = new Images();
        $images->images_title = $request->images_title;
        if ($request->images_description != "") {
            $images_description = $request->images_description;
            $images->images_description = $images_description;
        }
        if ($request->images_avatar != "") {
            $images_avatar = $request->images_avatar;
            $images->images_avatar = $images_avatar;
        }
        $images->images_type = $request->images_type;
        $images->images_category = $request->images_category;
        $images->images_status = $request->images_status;
        $images->images_orderby = $request->images_orderby;
        $images->save();
        $request->session()->flash('status', 'Task was successful!');
        return back();
    }

    public function getEdit($id)
    {
        $data['title'] = 'Cập nhật hình ảnh';
        $data['data'] = Images::find($id);
        $data['listCate'] = Category::where('cate_type', '2')->get();
        $images = $data['data'];
        return view('admin.images.edit', $data);
    }

    public function postEdit(EditImagesRequest $request, $id)
    {
        $images = Images::find($id);
        $images->images_title = $request->images_title;
        $images_description = $request->images_description;
        $images->images_description = $images_description;
        $images_avatar = $request->images_avatar;
        $images->images_avatar = $images_avatar;
        $images->images_type = $request->images_type;
        $images->images_category = $request->images_category;
        $images->images_status = $request->images_status;
        $images->images_orderby = $request->images_orderby;
        $images->save();
        $request->session()->flash('status', 'Task was successful!');
        return back();
    }

    public function getDelete(Request $request, $id)
    {
        $images = images::find($id);
        if ($images != "") {
            $images->delete();
            $request->session()->flash('status', 'Task was successful!');
            return back();
        }
    }
}
