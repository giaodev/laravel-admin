<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddNewsRequest;
use App\Http\Requests\EditNewsRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\NT;
use App\Models\Tag;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class NewsController extends Controller
{
    protected $size_image = 400;
    public function getIndex()
    {
        $data['title'] = "Danh sách sản phẩm";
        $data['data'] = News::orderby('id', 'desc')->paginate(15);
        return view('admin.news.index', $data);
    }
    public function getSearch(Request $request){
        $data['title'] = "Kết quả từ khóa "."\"".$request->keyword."\"";
        $data['data'] = News::orderby('id', 'desc')->where('news_title','like','%'. $request->keyword . '%')->paginate(10);
        return view('admin.news.index', $data);
    }
    public function getAdd()
    {
        $data['title'] = "Thêm mới sản phẩm";
        $data['listCate'] = Category::where('cate_type', 2)->get();
        $data['listCate3'] = Category::where('cate_type',1)->get();
        $data['listTag'] = Tag::where('tag_status', 1)->get();
        return view('admin.news.add', $data);
    }

    public function postAdd(AddNewsRequest $request)
    {
        $news = new News();
        $news->news_title = $request->news_title;
        $slug = ($request->news_slug) ? $request->news_slug : $request->news_title;
        $news->news_slug = str::slug($slug, '-');
        if ($request->news_description != "") {
            $news_description = $request->news_description;
            $news->news_description = $news_description;
        }
        if ($request->news_content != "") {
            $news_content = $request->news_content;
            $news->news_content = $news_content;
        }
        // if ($request->hasFile('news_image') != "") {
        //     $news_image = $request->file('news_image');
        //     $image_icon = $news_image->getClientOriginalName();
        //     $filename = pathinfo($image_icon, PATHINFO_FILENAME);
        //     $extension = pathinfo($image_icon, PATHINFO_EXTENSION);
        //     $directory = public_path('/uploads/avatar/');
        //     Image::make($news_image)->resize(400, null, function($constraint){
        //         $constraint->aspectRatio();
        //     })->save($directory . $filename.time().'.'.$extension);
        //     $news->news_image = '/uploads/avatar/' . $filename.time().'.'.$extension;
        // }
        if ($request->news_image != "") {
            $news_image = $request->news_image;
            $news->news_image = $news_image;
        }
        if ($request->news_title_seo != "") {
            $news_title_seo = $request->news_title_seo;
            $news->news_title_seo = $news_title_seo;
        }
        if ($request->news_description_seo != "") {
            $news_description_seo = $request->news_description_seo;
            $news->news_description_seo = $news_description_seo;
        }
        if ($request->news_scripts_header != "") {
            $news_scripts_header = $request->news_scripts_header;
            $news->news_scripts_header = $news_scripts_header;
        }
        $news->news_related_product = $request->news_related_product;
        $news->news_active = $request->news_active;
        $news->user_id = Auth::user()->id;
        $news->save();
        $last_insert_id = $news->id;
        if ($request->tag != ""){
            foreach ($request->tag as $tag_name) {
                $tag = Tag::where('tag_slug', Str::slug($tag_name, '-'))->first();
                if ($tag === null) {
                    $_tag = new Tag();
                    $_tag->tag_name = $tag_name;
                    $_tag->tag_slug = Str::slug($tag_name, '-');
                    $_tag->save();
                }
                DB::table('nt')->insert([
                    ['new_id' => $last_insert_id, 'tag_slug' => Str::slug($tag_name, '-')],
                ]);
            }
        }
        $categories_id = $request->cate;
        foreach ($categories_id as $category_id) {
            DB::table('nc')->insert([
                ['new_id' => $last_insert_id, 'category_id' => $category_id],
            ]);
        }
        $request->session()->flash('status', 'Task was successful!');
        return redirect()->route('news.edit',['id' => $last_insert_id]);
    }

    public function getEdit($id)
    {
        $data['title'] = 'Cập nhật sản phẩm';
        $data['data'] = news::find($id);
        $data['listCate'] = Category::where('cate_type', '2')->get();
        $data['listCate3'] = Category::where('cate_type',1)->get();
        $data['nc'] = DB::table('nc')->where('new_id', $id)->get();
        $data['listTag'] = Tag::where('tag_status', 1)->get();
        $news = $data['data'];
        $data['tag_checked'] = NT::where('new_id', $news->id)->get();
        return view('admin.news.edit', $data);
    }

    public function postEdit(EditNewsRequest $request, $id)
    {
        $news = news::find($id);
        $news->news_title = $request->news_title;
        $slug = ($request->news_slug) ? $request->news_slug : $request->news_title;
        $news->news_slug = str::slug($slug, '-');
        if ($request->news_description != "") {
            $news_description = $request->news_description;
            $news->news_description = $news_description;
        }
        if ($request->news_content != "") {
            $news_content = $request->news_content;
            $news->news_content = $news_content;
        } else {
            $news->news_content = NULL;
        }
        // if ($request->hasFile('news_image') != "") {
        //     $news_image = $request->file('news_image');
        //     $image_icon = $news_image->getClientOriginalName();
        //     $filename = pathinfo($image_icon, PATHINFO_FILENAME);
        //     $extension = pathinfo($image_icon, PATHINFO_EXTENSION);
        //     $directory = public_path('/uploads/avatar/');
        //     Image::make($news_image)->resize(400, null, function($constraint){
        //         $constraint->aspectRatio();
        //     })->save($directory . $filename.time().'.'.$extension);
        //     $news->news_image = '/uploads/avatar/' . $filename.time().'.'.$extension;
        // }
        if ($request->news_image != "") {
            $news_image = $request->news_image;
            $news->news_image = $news_image;
        }
        if ($request->news_title_seo != "") {
            $news_title_seo = $request->news_title_seo;
            $news->news_title_seo = $news_title_seo;
        }
        if ($request->news_description_seo != "") {
            $news_description_seo = $request->news_description_seo;
            $news->news_description_seo = $news_description_seo;
        }
        if ($request->news_scripts_header != "") {
            $news_scripts_header = $request->news_scripts_header;
            $news->news_scripts_header = $news_scripts_header;
        }
        $news->news_related_product = $request->news_related_product;
        $news->news_active = $request->news_active;
        $news->user_id = Auth::user()->id;
        $news->save();
        $nc = DB::table('nc')->where('new_id', $id)->delete();
        $nt = DB::table('nt')->where('new_id', $id)->delete();
        $last_insert_id = $news->id;
        if ($request->tag != "") {
            foreach ($request->tag as $tag_name) {
                $tag = Tag::where('tag_slug', Str::slug($tag_name, '-'))->first();
                if ($tag === null) {
                    $_tag = new Tag();
                    $_tag->tag_name = $tag_name;
                    $_tag->tag_slug = Str::slug($tag_name, '-');
                    $_tag->save();
                }
                DB::table('nt')->insert([
                    ['new_id' => $last_insert_id, 'tag_slug' => Str::slug($tag_name, '-')],
                ]);
            }
        }


        $categories_id = $request->cate;
        foreach ($categories_id as $category_id) {
            DB::table('nc')->insert([
                ['new_id' => $last_insert_id, 'category_id' => $category_id],
            ]);
        }
        $request->session()->flash('status', 'Task was successful!');
        return back();
    }

    public function getDelete(Request $request, $id)
    {
        $pc = DB::table('nc')->where('new_id', $id)->delete();
        $news = news::find($id);
        if ($news != "") {
            $news->delete();
            $request->session()->flash('status', 'Task was successful!');
            return back();
        }
    }
    public function getDeleteAll(Request $request){
        $id = $request->cb;
        if($id != ""){
              foreach($id as $uid){
                 $pc = DB::table('nc')->where('new_id', $uid)->delete();
                 $product = News::find($uid);
                 if($product != ""){
                     $product->delete();
                 }
             }
             $request->session()->flash('status', 'Task was successful!');
         }
        return back();
    }
}
