@extends('default.master')
@section('title', $title)
@section('body_class', 'single_product')
@section('content')
<div class="row single-product pdt30">
    <div class="col-sm-5">
        @if($data->product_gallery != "")
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                @php
                $gallery = explode('|', $data->product_gallery);
                $stt = 0;
                foreach($gallery as $image){
                  $stt++;
                  if($image != NULL){
                    @endphp
                    <div class="item {{ ($stt == 1) ? "active" : "" }}">
                    	<a href="{{ $image }}" data-lightbox="roadtrip">
                        <img src="{{ $image }}" alt="{{ $data->product_title }}">
                    		<div class="carousel-caption">
                    		</div>
                    	</a>
                    </div>
                    @php
                }
            }
            @endphp

        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>

        <div class="row" id="thumbnail_img">
            @php
            $gallery = explode('|', $data->product_gallery);
            $stt = 0;
            foreach($gallery as $image){
              $stt++;
              if($image != NULL){
                @endphp
                <div data-target="#carousel-example-generic" data-slide-to="{{ $stt - 1 }}"
                class="{{ ($stt == 0) ? "active" : "" }} col-sm-3 col-xs-3">
                <a class="thumbnail">
                    <img data-src="{{ $image }}" alt="{{ $data->product_title }}">
                </a>
            </div>
            @php
        }
    }
    @endphp
</div>
</div>

@else
<img data-src="{{ $data->product_image }}" alt="" class="img-responsive">
@endif
</div>
<div class="col-sm-4">
    <h1>{{ $data->product_title }}</h1>
    <p class="description">{{ $data->product_description }}</p>
    @if($attr)
    <table class="table table-striped attributes">
        @foreach($attr as $val)
        @if($val->attr_parent == 0)
        <tr>
            <th>{{ $val->attr_name }}</th>
            @foreach($attr as $val2)
            @if($val2->attr_parent == $val->id)
            <td>{{ $val2->attr_name }}</td>
            @endif
            @endforeach
        </tr>
        @endif
        @endforeach
    </table>
    @endif

    @if($data->product_promotion != 0)
    @php
    $sale = ceil((($data->product_price - $data->product_promotion) / $data->product_price ) * 100);
    @endphp
    <div class="tk">Giảm giá <b>{{ $sale }}%</b> </div>
    @endif
    <div class="gg row">
        @if($data->product_promotion != 0)
        @php
        $total = $data->product_price - $data->product_promotion
        @endphp
        <div class="col-sm-6 l">{{ number_format($data->product_promotion) }} đ</div>
        <div class="col-sm-6 r">
            <div class="t">Giá gốc : <span>{{ number_format($data->product_price) }} đ</span></div>
            <div class="f">Tiết kiệm: <span>{{ number_format($total) }} đ</span></div>
        </div>
        @else
        <div class="col-sm-6 l">{{ number_format($data->product_price) }} đ</div>
        <div class="col-sm-6 r"></div>
        @endif

    </div>
    <div class="row addcart ">
        <div class="col-sm-6">
            <a href="{{ route('add_cart',['id' => $data->id]) }}" class="btn btn-default pay_item">Đặt mua, giao tận nơi</a>
        </div>
        <div class="col-sm-6">
            <a href="" class="btn btn-default pay_guide">Hotline: 0978.432.882</a>
        </div>
    </div>
</div>
<div class="sidebar">
    <div class="col-sm-3">
       <ul class="nav nav-pills nav-stacked sidebar-product">
        <h3>Danh mục sản phẩm</h3>
        @if($list_brand)
        @foreach($list_brand as $val)
        <li><a href="{{ route('check_slug', ['slug' => $val->cate_slug]) }}"><span class="glyphicon glyphicon-circle-arrow-right"></span> {{ $val->cate_name }}</a></li>
        @endforeach
        @endif
    </ul>
</div>
<div class="col-sm-3">
	<ul class="nav nav-pills nav-stacked sidebar-product">
        <h3>Hỗ trợ trực tuyến</h3>
        <li><a href="#"><b><span class="glyphicon glyphicon-earphone"></span> Hotline:</b> 0965.764.248</a></li>
        <li><a href="#"><b><span class="glyphicon glyphicon-earphone"></span> Hotline:</b> 0965.764.248</a></li>
        <li><a href="#"><b><span class="glyphicon glyphicon-earphone"></span> Hotline:</b> 0965.764.248</a></li>
    </ul>
</div>
</div>
<div class="col-sm-9 product_full">
    <!-- Nav tabs -->
    @if($data->product_content != NULL)
    <ul class="nav nav-tabs tablist" role="tablist">
      <li class="active"><a href="#noidung" role="tab" data-toggle="tab">Thông tin sản phẩm</a></li>
      <li><a href="#chinhsach" role="tab" data-toggle="tab">Chính sách</a></li>
      <li><a href="#huongdan" role="tab" data-toggle="tab">Hướng dẫn</a></li>
  </ul>
  <div class="panel panel-default">
      <div class="panel-body">
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="noidung">
              {!! $data->product_content !!}
          </div>
          <div class="tab-pane" id="chinhsach">...</div>
          <div class="tab-pane" id="huongdan">...</div>
      </div>
  </div>
</div>
@endif
</div>
<div class="col-sm-3">

</div>
<div class="clearfix"></div>
<hr>
<div class="product pdt30">
    <h2 class="e_title">Sản phẩm liên quan</h2>
    @if($related_product)
    @foreach($related_product as $value)
    <div class="col-xs-6 col-sm-6 col-md-3">
        <div class="item">
            <a href="{{ route('check_slug',['slug' => $value->product_slug]) }}" title="{{ $value->product_title }}" class="">
              <img data-src="{{ $value->product_image }}" alt="{{ $value->product_title }}" title="{{ $value->product_title }}" class="img-responsive">
              <div class="info_pro">
                <div class="hot_ico"></div>
                <h3 class="title">
                    <a href="">{{ $value->product_title }}</a>
                </h3>
                <div class="box-price">
                    <p>
                        @if($value->product_promotion != 0)
                        <span class="old_price">{{ number_format($value->product_price) }}</span> <span class="promotion">{{ number_format($value->product_promotion) }}</span>
                        @else
                        <span class="price">{{ number_format($value->product_price) }}</span>
                        @endif
                    </p>
                    <p>Tình trạng: Sẵn Hàng</p>
                </div>
                <p class="muangay"><a href="{{ route('quick_cart',['id' => $data->id]) }}">Mua ngay</a>
                </p>
            </div>
        </a>
    </div>
</div>
@endforeach
@endif
</div>

<div class="clearfix"></div>
<div class="news pdt30">
    <h2 class="e_title">Tin tức mới nhất</h2>
    <div class="row">
      @if($news)
      @foreach($news as $value)
      <div class="col-sm-6 col-md-3">
         <a class="thumbnail" href="{{ route('check_slug',['slug' => $value->news_slug]) }}">
        <img data-src="{{ $value->news_image }}" alt="{{ $value->news_title }}" class="img-responsive">
            <div class="caption">
             <h3>{{ $value->news_title }}</h3>
             <p>{{ Str::limit($value->news_description,'100','..') }}</p>
         </div>
     </a>
 </div>
 @endforeach
 @endif
</div>
</div>

</div>
@endsection
@section('giaovn_header')
<link href="frontend/css/lightbox.min.css" rel="stylesheet">
@endsection
@section('giaovn_footer')
<script src="frontend/js/lightbox.min.js"></script>
<script>
    $('.carousel').carousel({
        interval: false,
        pause: "hover"
    })
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true,
      'fadeDuration': false,
      'imageFadeDuration': false,
    })
</script>
@endsection
