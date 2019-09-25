@extends('admin.master')
@section('title', $title)
@section('content')
<div class="">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">{{ $title }}</h3>
    </div>
    <div class="panel-body">
        <div class="row dashboard">
          <div class="col-xs-3 col-md-2">
            <a href="{{ route('news.index') }}" class="thumbnail">
              <img src="adm/images/news.png" alt="...">
              <h3><span>Bài viết</span></h3>
            </a>
          </div>
          <div class="col-xs-3 col-md-2">
            <a href="{{ route('product.index') }}" class="thumbnail">
              <img src="adm/images/product.png" alt="...">
              <h3><span>Sản phẩm</span></h3>
            </a>
          </div>
          <div class="col-xs-3 col-md-2">
            <a href="{{ route('category.index') }}" class="thumbnail">
              <img src="adm/images/category.png" alt="...">
              <h3><span>Chuyên mục</span></h3>
            </a>
          </div>
          <div class="col-xs-3 col-md-2">
            <a href="{{ route('image.index') }}" class="thumbnail">
              <img src="adm/images/image.png" alt="...">
              <h3><span>Hình ảnh</span></h3>
            </a>
          </div>
          <div class="col-xs-3 col-md-2">
            <a href="{{ route('widget.index') }}" class="thumbnail">
              <img src="adm/images/widget.png" alt="...">
              <h3><span>Widget</span></h3>
            </a>
          </div>
          <div class="col-xs-3 col-md-2">
            <a href="{{ route('orders.index') }}" class="thumbnail">
              <img src="adm/images/shopping.png" alt="...">
              <h3><span>Đơn hàng</span></h3>
            </a>
          </div>
          <div class="col-xs-3 col-md-2">
            <a href="{{ route('user.index') }}" class="thumbnail">
              <img src="adm/images/account.png" alt="...">
              <h3><span>Tài khoản</span></h3>
            </a>
          </div>
          <div class="col-xs-3 col-md-2">
            <a href="{{ route('setting.index') }}" class="thumbnail">
              <img src="adm/images/setting.png" alt="...">
              <h3><span>Cấu hình</span></h3>
            </a>
          </div>
    </div>
  </div>
</div>
@endsection

