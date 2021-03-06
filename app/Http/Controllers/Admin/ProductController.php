<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Attr;
use App\Models\Product;
use App\Models\PC;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use Illuminate\Support\Str;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;

use App\Exports\CsvExport;
use App\Imports\CsvImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function getIndex(){
        $data['title'] = "Danh sách sản phẩm";
        $data['data'] = DB::table('product')
        ->join('users', 'users.id', '=', 'product.user_id')
        ->select('product.*', 'users.name', 'users.username')
        ->orderby('created_at','desc')
        ->paginate(15);
        return view('admin.product.index', $data);
    }
    public function getSearch(Request $request){
        $data['title'] = "Kết quả từ khóa "."\"".$request->keyword."\"";
        $data['data'] = DB::table('product')
        ->join('users', 'users.id', '=', 'product.user_id')
        ->select('product.*', 'users.name', 'users.username')
        ->where('product.product_title', 'like', '%'.$request->keyword.'%')
        ->paginate(15);
        return view('admin.product.index', $data);
    }
    public function getAdd(){
        $data['title'] = "Thêm mới sản phẩm";
        $data['listCate'] = Category::where('cate_type',1)->get();
        $data['listCate2'] = Category::where('cate_type',1)->get();
        $data['listAttr'] = Attr::all();
        return view('admin.product.add', $data);
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
        if($request->product_price2 != ""){
            $product_price2 = $request->product_price2;
            $product->product_price2 = $product_price2;
        }
        // if($request->product_promotion != ""){
        //     $product_promotion = $request->product_promotion;
        //     $product->product_promotion = $product_promotion;
        // }
        if($request->dien_tich != ""){
            $dien_tich = $request->dien_tich;
            $product->dien_tich = $dien_tich;
        }
        if($request->product_content != ""){
            $product_content = $request->product_content;
            $product->product_content = $product_content;
        }
        // if ($request->hasFile('product_image') != "") {
        //     $product_image = $request->file('product_image');
        //     $image_icon = $product_image->getClientOriginalName();
        //     $filename = pathinfo($image_icon, PATHINFO_FILENAME);
        //     $extension = pathinfo($image_icon, PATHINFO_EXTENSION);
        //     $directory = public_path('/uploads/avatar/');
        //     Image::make($product_image)->resize(400, null, function($constraint){
        //         $constraint->aspectRatio();
        //     })->save($directory . $filename.time().'.'.$extension);
        //     $product->product_image = '/uploads/avatar/' . $filename.time().'.'.$extension;
        // }
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
        $product->product_active = $request->product_active;
        $product->product_type = $request->product_type;
        if($request->attr != ""){
            $attr_id = $request->attr;
            $product->attr_id = json_encode($attr_id);
        }
        $product->cate_primary_id = $request->cate_primary_id;
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
        return redirect()->route('product.edit',['id' => $last_insert_id]);
    }
    public function getEdit($id){
        $data['title'] = 'Cập nhật sản phẩm';
        $data['data'] = Product::find($id);
        $data['listCate'] = Category::where('cate_type',1)->get();
        $data['listCate2'] = Category::where('cate_type',1)->get();
        $data['listAttr'] = Attr::all();
        $data['pc'] = DB::table('pc')->where('product_id', $id)->get();
        return view('admin.product.edit', $data);
    }
    public function postEdit(EditProductRequest $request, $id){
        $product = Product::find($id);
        $product->product_title = $request->product_title;
        $slug = ($request->product_slug) ? $request->product_slug : $request->product_title;
        $product->product_slug = str::slug($slug, '-');
        $product_code = $request->product_code;
        $product->product_code = $product_code;
        $product_description = $request->product_description;
        $product->product_description = $product_description;
        $product_price = $request->product_price;
        $product->product_price = $product_price;
        if($request->product_price2 != ""){
            $product_price2 = $request->product_price2;
            $product->product_price2 = $product_price2;
        }
        // $product_promotion = $request->product_promotion;
        // $product->product_promotion = $product_promotion;
        if($request->dien_tich != ""){
            $dien_tich = $request->dien_tich;
            $product->dien_tich = $dien_tich;
        }
        $product_content = $request->product_content;
        $product->product_content = $product_content;
        // if ($request->hasFile('product_image') != "") {
        //     $product_image = $request->file('product_image');
        //     $image_icon = $product_image->getClientOriginalName();
        //     $filename = pathinfo($image_icon, PATHINFO_FILENAME);
        //     $extension = pathinfo($image_icon, PATHINFO_EXTENSION);
        //     $directory = public_path('/uploads/avatar/');
        //     Image::make($product_image)->resize(400, null, function($constraint){
        //         $constraint->aspectRatio();
        //     })->save($directory . $filename.time().'.'.$extension);
        //     $product->product_image = '/uploads/avatar/' . $filename.time().'.'.$extension;
        // }
        if($request->product_image != ""){
            $product_image = $request->product_image;
            $product->product_image = $product_image;
        }
        $product->product_gallery = $request->product_gallery;
        $product_title_seo = $request->product_title_seo;
        $product->product_title_seo = $product_title_seo;
        $product_description_seo = $request->product_description_seo;
        $product->product_description_seo = $product_description_seo;
        $product->product_active = $request->product_active;;
        $product->product_type = $request->product_type;
        if($request->attr != ""){
            $attr_id = $request->attr;
            $product->attr_id = json_encode($attr_id);
        }
        $product->cate_primary_id = $request->cate_primary_id;
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
    public function getDeleteAll(Request $request){
        $id = $request->cb;
        if($id != ""){
              foreach($id as $uid){
                 $pc = DB::table('pc')->where('product_id', $uid)->delete();
                 $product = Product::find($uid);
                 if($product != ""){
                     $product->delete();
                 }
             }
             $request->session()->flash('status', 'Task was successful!');
         }
        return back();
    }

    public function importExportView()
    {
       return view('import');
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new CsvExport, 'product.xlsx');
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new CsvImport,request()->file('file'));
           
        return back();
    }
}
