<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use App\Models\PC;
use App\Models\Tag;
use App\Models\NC;
class NewsController extends Controller
{
public function getIndex(){
        $data['title'] = "Danh sách sản phẩm";
        $data['data'] = News::all();
        return view('admin.news.index', $data);
    }
    public function getAdd(){
        $data['title'] = "Thêm mới sản phẩm";
        $data['listCate'] = Category::where('cate_type',2)->get();
        return view('admin.news.add', $data);
    }
    public function postAdd(AddProductRequest $request){
        $product = new Product();
        $product->product_title = $request->product_title;
        $slug = ($request->product_slug) ? $request->product_slug : $request->product_title;
        $product->product_slug = str::slug($slug, '-');
        if($request->product_code != ""){
            $product_code = $request->product_code;
            $product->product_code = $product_code;
        }
        if($request->product_description != ""){
            $product_description = $request->product_description;
            $product->product_description = $product_description;
        }
        if($request->product_price != ""){
            $product_price = $request->product_price;
            $product->product_price = $product_price;
        }
        if($request->product_promotion != ""){
            $product_promotion = $request->product_promotion;
            $product->product_promotion = $product_promotion;
        }
        if($request->product_content != ""){
            $product_content = $request->product_content;
            $product->product_content = $product_content;
        }
        if($request->product_image != ""){
            $product_image = $request->product_image;
            $product->product_image = $product_image;
        }
        if($request->product_gallery != ""){
            $product_gallery = $request->product_gallery;
            $product->product_gallery = $product_gallery;
        }
        if($request->product_title_seo != ""){
            $product_title_seo = $request->product_title_seo;
            $product->product_title_seo = $product_title_seo;
        }
        if($request->product_description_seo != ""){
            $product_description_seo = $request->product_description_seo;
            $product->product_description_seo = $product_description_seo;
        }
        $product->product_active = 1;
        if($request->attr_id != ""){
            $attr_id = $request->attr_id;
            $product->attr_id = json_encode($product_gallery);
        }
        $product->user_id = Auth::user()->id;
        $product->save();
        $last_insert_id = $product->id;
        $categories_id = $request->cate;
        foreach($categories_id as $category_id){
            DB::table('pc')->insert([
                ['product_id' => $last_insert_id, 'category_id' => $category_id],
            ]);
        }
        $request->session()->flash('status', 'Task was successful!');
        return back();
    }
    public function getEdit($id){
        $data['title'] = 'Cập nhật sản phẩm';
        $data['data'] = Product::find($id);
        $data['listCate'] = Category::all();
        $data['listAttr'] = Attr::all();
        $data['pc'] = DB::table('pc')->where('product_id', $id)->get();
        return view('admin.product.edit', $data);
    }
    public function postEdit(EditProductRequest $request, $id){
        $product = Product::find($id);
        $product->product_title = $request->product_title;
        $slug = ($request->product_slug) ? $request->product_slug : $request->product_title;
        $product->product_slug = str::slug($slug, '-');
        if($request->product_code != ""){
            $product_code = $request->product_code;
            $product->product_code = $product_code;
        }
        if($request->product_description != ""){
            $product_description = $request->product_description;
            $product->product_description = $product_description;
        }
        if($request->product_price != ""){
            $product_price = $request->product_price;
            $product->product_price = $product_price;
        }
        if($request->product_promotion != ""){
            $product_promotion = $request->product_promotion;
            $product->product_promotion = $product_promotion;
        }
        if($request->product_content != ""){
            $product_content = $request->product_content;
            $product->product_content = $product_content;
        }
        if($request->product_image != ""){
            $product_image = $request->product_image;
            $product->product_image = $product_image;
        }
        if($request->product_gallery != ""){
            $product_gallery = $request->product_gallery;
            $product->product_gallery = $product_gallery;
        }
        if($request->product_title_seo != ""){
            $product_title_seo = $request->product_title_seo;
            $product->product_title_seo = $product_title_seo;
        }
        if($request->product_description_seo != ""){
            $product_description_seo = $request->product_description_seo;
            $product->product_description_seo = $product_description_seo;
        }
        $product->product_active = 1;
        if($request->attr != ""){
            $attr_id = $request->attr;
            $product->attr_id = json_encode($attr_id);
        }
        $product->user_id = Auth::user()->id;
        $product->save();
        $pc = DB::table('pc')->where('product_id',$id)->delete();
        $last_insert_id = $product->id;
        $categories_id = $request->cate;
        foreach($categories_id as $category_id){
            DB::table('pc')->insert([
                ['product_id' => $last_insert_id, 'category_id' => $category_id],
            ]);
        }
        $request->session()->flash('status', 'Task was successful!');
        return back();
    }
    public function getDelete(Request $request, $id){
        $pc = DB::table('pc')->where('product_id', $id)->delete();
        $product = Product::find($id);
        if($product != ""){
            $product->delete();
            $request->session()->flash('status', 'Task was successful!');
            return back();
        }
    }
}
