<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Images;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Product;
use App\Models\Attr;
use App\Models\Orders;
use DB;
use Cart;
class HomeController extends Controller
{
    public $data;
    public function __construct(){
        $this->data['setting'] = Setting::find(1);
        $this->data['menu'] = Category::where(['cate_status' => 1, 'cate_type2' => 1])->orderby('cate_order','desc')->get();

    }
    public function index(){
        $setting = $this->data['setting'];
        $this->data['title'] = $setting->homepage_title;
        $this->data['banner'] = Images::where(['images_type' => 1,'images_status' => 1])->orderby('created_at','desc')->get();
        $this->data['icon'] = Images::where(['images_type' => 6,'images_status' => 1])->orderby('images_orderby','desc')->get();
        $this->data['product_new'] = Product::orderby('id','desc')->limit('8')->get();
        return view('default.page.home', $this->data);

    }
    public function check_slug($slug){
        $category = Category::where('cate_slug',$slug)->first();
        $product = Product::where('product_slug',$slug)->first();
        if($category != ""){
            switch ($category->cate_type) {
                 case '1':
                 $this->product($category->id);
                 return view('default.page.product', $this->data);

                 break;
                 case '2':
                 $this->news($category->id);
                 return view('default.page.category', $this->data);
                 break;
                 case '3':
                 $this->contact($category->id);
                 return view('default.page.category', $this->data);
                 break;
                 default:
                 break;
             }
        } elseif($product != ""){
            $this->single_product($product->id);
            return view('default.page.single-product', $this->data);

        }
    }
    public function product($id){
        $this->data['category'] = Category::find($id);
        $category = $this->data['category'];
        $this->data['title'] = $category->cate_title;
        $this->data['product'] = DB::table('product')
        ->join('pc','product.id','=','pc.product_id')
        ->join('category','pc.category_id','=','category.id')
        ->select('product.*','pc.category_id','category.*')
        ->where('category.cate_parent',$id)->orWhere('pc.category_id', $id)->get();
    }
    public function news($id){
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
        $this->data['data'] = Product::find($id);
        $data = $this->data['data'];
        if($data->attr_id != NULL){
            $attr_id = json_decode($data->attr_id);
            $this->data['attr'] = Attr::whereIn('id', $attr_id)->get();
        } else {
            $this->data['attr'] = "";
        }
        $this->data['title'] = ($data->product_title_seo) ? $data->product_title_seo : $data->product_title;
        $this->data['cartTotalQuantity'] = Cart::getTotalQuantity();
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
        $orders = new Orders();

    }
    public function single_news($slug){

    }
}
