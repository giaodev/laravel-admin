<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Models\Images;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Product;
use App\Models\Attr;
use App\Models\Orders;
use App\Models\News;
use App\Models\Widget;
use DB;
use Cart;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
class HomeController extends Controller
{
    public $data;
    public function __construct(){
        $this->data['setting'] = Setting::find(1);
        $this->data['menu'] = Category::where(['cate_status' => 1, 'cate_type2' => 1])->orderby('cate_order','desc')->get();
        $this->data['left_menu'] = Category::where(['cate_status' => 1, 'cate_type2' => 2])->orderby('cate_order','desc')->get();
        $this->data['footer'] = Widget::where(['widget_type' => 2, 'widget_status' => 1])->orderby('widget_order','asc')->get();
        $this->data['icon'] = Images::where(['images_type' => 6,'images_status' => 1])->orderby('images_orderby','desc')->get();
        $this->data['quang_cao'] = Images::where(['id' => 1,'images_type' => 5, 'images_status' => 1])->first();
        $this->data['banner'] = Images::where(['id' => 2, 'images_type' => 1,'images_status' => 1])->orderby('created_at','desc')->first();
        $this->data['filter'] = Attr::where(['attr_filter' => 0, 'attr_active' => 1])->get();
        $this->data['news_sidebar'] = DB::table('news')
        ->join('nc','news.id','=','nc.new_id')
        ->join('category','nc.category_id','=','category.id')
        ->select('news.*','nc.category_id','category.*')
        ->Where([['nc.category_id', 3],['news.news_active', 1]])->orderBy('news.created_at', 'desc')->paginate(4);
        $this->data['cua_hang'] = Images::where(['id' => 3, 'images_type' => 2,'images_status' => 1])->orderby('created_at','desc')->first();
        $this->data['van_phong'] = Images::where(['id' => 4, 'images_type' => 2,'images_status' => 1])->orderby('created_at','desc')->first();

        // dd($this->data['news_sidebar']);
    }
    public function index(){    
        $setting = $this->data['setting'];
        $this->data['title'] = $setting->homepage_title;
        $this->data['description'] = $setting->homepage_description;
        $this->data['og_image'] = $setting->homepage_image;
        $this->data['slider_category'] = Category::where(['cate_parent' => 2, 'cate_status' => 1])->orderby('cate_order','desc')->select('cate_name','cate_title','cate_image','cate_slug')->get();
        $this->data['product_new'] = Product::orderby('created_at','desc')->limit('6')->get();
        // dd($this->data['product_new']);
        // $this->data['rt_poster'] = Images::where('id',9)->select("images_avatar","images_title")->first();
        $this->data['product_hot'] = Product::orderby('created_at','desc')->where('product_type',1)->limit('6')->get();
        $this->data['news'] = News::orderBy('created_at','desc')->limit(4)->get();
        $this->data['news_slide'] = News::orderBy('created_at','desc')->limit(4)->get();
        $this->data['news_list'] = News::orderBy('created_at','desc')->limit(5)->get();
        $this->data['news_list2'] = News::orderBy('created_at','desc')->limit(7)->get();
        // footer news
        $this->data['news_f'] = News::orderBy('created_at','desc')->first();
        $this->data['news_list_f'] = News::orderBy('created_at','desc')->limit(8)->get();

        return view('default.page.home', $this->data);

    }
    public function check_slug(Request $request, $slug){
        $category = Category::where('cate_slug',$slug)->first();
        $product = Product::where('product_slug',$slug)->first();
        $news = News::where('news_slug',$slug)->first();
        if($category != ""){
            switch ($category->cate_type) {
                 case '1':
                 $this->product($request, $category->id);
                 if ($request->ajax()) {
                     $view = view('default.page.data_product', $this->data)->render();
                     return response()->json(['html'=>$view]);
                 } else {
                    return view('default.page.product', $this->data);
                 }
                 break;
                 case '2':
                 $this->news($category->id);
                 return view('default.page.news', $this->data);
                 break;
                 case '3':
                 $this->page($category->id);
                 return view('default.page.category', $this->data);
                 case '4':
                 $this->contact($category->id);
                 return view('default.page.contact', $this->data);
                 break;
                 default:
                 break;
             }
        } elseif($product != ""){
            $this->single_product($product->id);
            return view('default.page.single-product', $this->data);

        } elseif($news != ""){
            $this->single_news($news->id);
            return view('default.page.single-news', $this->data);
        }
    }
    public function product($request, $id){
        // DB::enableQueryLog();
        $this->data['category'] = Category::find($id);
        $category = $this->data['category'];
        $this->data['title'] = ($category->cate_title != "") ? $category->cate_title : $category->cate_name;
        $this->data['description'] = $category->cate_description;
        $this->data['url'] = $category->cate_slug;
        $data = DB::table('product')
        ->join('pc','product.id','=','pc.product_id')
        ->join('category','pc.category_id','=','category.id')
        ->select('product.*','pc.category_id','category.*')
        ->where([['category.cate_parent',$id],['product.product_active',1]])->orWhere([['pc.category_id', $id],['product.product_active', 1]])->orderBy('product.created_at','desc')->paginate(12);   
        $this->data['product'] = $data;
        $this->data['news'] = News::where('news_related_product',$id)->where('news_active', 1)->orderBy('created_at','desc')->limit(8)->get();
        // $query = DB::getQueryLog();
        // echo "<pre>";
        // print_r($query);
        // echo "</pre>";
        $this->data['filter'] = Attr::where(['attr_filter' => 0, 'attr_active' => 1])->get();
    }
    public function filter(Request $request){
        $this->data['title'] = "Lọc sản phẩm";
        $this->data['description'] = "";
        $this->data['url'] = "";
        if($request->all()){
            $query = DB::table('product');
            foreach($request->all() as $key => $value){
                if (strpos($key, '_') !== false) {
                    $query = $query->where('attr_id','like', '%'. str_replace('_','',$value) . '%');
                }
            }
            $data = $query->paginate(9);
        }
        $this->data['product'] = $data;
        $this->data['filter'] = Attr::where(['attr_filter' => 0, 'attr_active' => 1])->get();
        return view('default.page.filter', $this->data);
    }
    public function search(Request $request){
        $this->data['title'] = "Tìm kiếm từ khóa ".$request->keyword;
        $this->data['description'] = "";
        $this->data['url'] = "";
        if($request->all()){
            $data = DB::table('product')
            ->where('product_title','like','%'.$request->keyword.'%')->paginate(15);
        }
        $this->data['product'] = $data;
        return view('default.page.search', $this->data);
    }
    public function news($id){
        // DB::enableQueryLog();
        $this->data['category'] = Category::find($id);
        $category = $this->data['category'];
        $this->data['title'] = ($category->cate_title != "") ? $category->cate_title : $category->cate_name;
        $this->data['description'] = $category->cate_description;
        $this->data['url'] = $category->cate_slug;
        $this->data['news'] = DB::table('news')
        ->join('nc','news.id','=','nc.new_id')
        ->join('category','nc.category_id','=','category.id')
        ->select('news.*','nc.category_id','category.*')
        ->where([['category.cate_parent',$id],['news.news_active', 1]])->orWhere([['nc.category_id', $id],['news.news_active', 1]])->orderBy('news.created_at', 'desc')->paginate(12);
        // $query = DB::getQueryLog();
        // echo "<pre>";
        // print_r($query);
        // echo "</pre>";
    }
    public function page($id){
        $this->data['category'] = Category::find($id);
        $category = $this->data['category'];
        $this->data['title'] = $category->cate_title;
    }
    public function contact($id){
        $this->data['category'] = Category::find($id);
        $category = $this->data['category'];
        $this->data['title'] = $category->cate_title;
    }
    public function single_product($id){
        $setting = $this->data['setting'];
        $this->data['data'] = Product::find($id);
        $this->data['list_brand'] = Category::where('cate_parent', 2)->get();
        $data = $this->data['data'];
        if($data->attr_id != NULL){
            $attr_id = json_decode($data->attr_id);
            $this->data['attr'] = Attr::whereIn('attr_slug', $attr_id)->get();
        } else {
            $this->data['attr'] = "";
        }
        $this->data['title'] = ($data->product_title_seo) ? $data->product_title_seo : $data->product_title;
        $this->data['description'] = ($data->product_description_seo) ? $data->product_description_seo : Str::limit($data->product_description,300,'');
        $this->data['og_image'] = ($data->product_image != "") ? $data->product_image : $setting->homepage_image;
        $this->data['url'] = $data->product_slug;
        $this->data['cartTotalQuantity'] = Cart::getTotalQuantity();
        $this->data['related_product'] = Product::where('cate_primary_id', $data->cate_primary_id)->limit(8)->get();
        $this->data['news'] = News::orderBy('created_at','desc')->limit(8)->get();
        
    }
    public function add_cart($id){
        $data = Product::find($id);
        if($data->product_promotion != 0){
            $price = $data->product_promotion;
        } else {
            $price = $data->product_price;
        }
        Cart::add(array(
            'id' => $id,
            'name' => $data->product_title,
            'price' => $price,
            'quantity' => 1,
            'attributes' => array(
                'old_price' => $data->product_price,
                'promotion' => $data->product_promotion,
                'image' => $data->product_image
            )
        ));
        return redirect()->route('cart');
    }
    public function quick_cart($id){
        $data = Product::find($id);
        if($data->product_promotion != 0){
            $price = $data->product_promotion;
        } else {
            $price = $data->product_price;
        }
        Cart::add(array(
            'id' => $id,
            'name' => $data->product_title,
            'price' => $price,
            'quantity' => 1,
            'attributes' => array(
                'old_price' => $data->product_price,
                'promotion' => $data->product_promotion,
                'image' => $data->product_image
            )
        ));
        return redirect()->route('pay');
    }
    public function cart(){
        $this->data['title'] = "Giỏ hàng";
        $this->data['data'] = Cart::getContent()->toArray();
        $this->data['total'] = Cart::getTotal();
        return view('default.page.cart', $this->data);
    }
    public function update_cart(Request $request){
        foreach($_POST['quantity'] as $key => $value){
            Cart::update($key, array(
              'quantity' => array(
                  'relative' => false,
                  'value' => $value
              ),
            ));
        }
        return back();
    }
    public function remove_cart($id){
        Cart::remove($id);
        return back();
    }
    public function cart_clear(){
        Cart::clear();
    }
    public function getPay(){
        $this->data['title'] = "Thanh toán";
        $this->data['data'] = Cart::getContent()->toArray();
        $this->data['total'] = Cart::getTotal();
        return view('default.page.pay', $this->data);
    }
    public function postPay(Request $request){
        $this->data['info'] = $request->all();
        $this->data['data'] = Cart::getContent()->toArray();
        $email = $request->email;
        Mail::send('default.module.email', $this->data, function ($message) use ($email){
            $message->from('authenticwatchvietnam@gmail.com', 'Authentic Watch Vietnam');
            $message->to($email, $email);
            $message->cc('authenticwatchvietnam@gmail.com', 'Administrator');
            $message->subject('Xác nhận hóa đơn mua hàng của Authentic Watch Vietnam');
        });
        $orders = new Orders();
        $orders->name = $request->name;
        $orders->phone = $request->phone;
        $orders->address = $request->address;
        $orders->email = $request->email;
        $orders->link = $request->link;
        $orders->note = $request->note;
        $orders->list_orders = serialize(Cart::getContent()->toArray());
        $orders->save();
        Cart::clear();
        return redirect()->route('success');
    }
    public function success(){
        $this->data['title'] = "Hoàn tất đơn hàng";
        return view('default.page.success', $this->data);
    }
    public function single_news($id){
        $this->data['data'] = News::find($id);
        $this->data['list_brand'] = Category::where('cate_parent', 2)->get();
        $data = $this->data['data'];
        $this->data['title'] = ($data->news_title_seo) ? $data->news_title_seo : $data->news_title;
        $this->data['description'] = ($data->news_description_seo) ? $data->news_description_seo : Str::limit($data->news_description_seo,300,'');
        $this->data['og_image'] = ($data->news_image != "") ? $data->news_image : $setting->homepage_image;
        $this->data['url'] = $data->news_slug;
        $this->data['related_news'] = News::where('cate_primary_id', $data->cate_primary_id)->limit(8)->get();
    }
}
