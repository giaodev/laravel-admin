@extends('default.master')

@section('title', $title)
@section('giaovn_header')
  <link href="slick/slick.css" rel="stylesheet">
  <link href="slick/slick-theme.css" rel="stylesheet">
  <style>

      .slick-slide {
        margin: 0px 20px;
      }

      .slick-slide img {
        width: 100%;
      }

      .slick-prev:before,
      .slick-next:before {
        color: black;
      }


      .slick-slide {
        transition: all ease-in-out .3s;
        opacity: .2;
      }
      
      .slick-active {
        opacity: .5;
      }

      .slick-current {
        opacity: 1;
      }
  </style>
@endsection
@section('banner')
@include('default.module.banner')
@endsection

@section('content')
<div class="icon pdt30">
    <div class="row">
        @if($icon)
        @foreach($icon as $value)
        <div class="col-xs-12 col-sm-12 col-md-4 icon_item">
            <a href="/">
                <img src="{{ $value->images_avatar }}" alt="{{ $value->images_title }}">
                <b>{{ $value->images_title }}</b>
                <span>{{ $value->images_description }}</span>
            </a>
        </div>
        @endforeach
        @endif
    </div>
</div>
</div>
<div class="jumbotron slider-category">
  <div class="container text-center">
    <h2>Bộ sưu tập</h2>
    <section class="center slider">
      @if($slider_category)
        @foreach($slider_category as $val)
          <div>
            <img src="{{ $val->cate_image }}">
          </div>
        @endforeach
      @endif
    </section>
  </div>
</div>

<div class="container">

<div class="product sph text-center">
    <h2>Sản phẩm HOT</h2>
    <div class="row">
          @if($product_hot)
          @foreach($product_hot as $value)
          <div class="col-xs-6 col-sm-6 col-md-3">
              <div class="item">
              <a href="{{ route('check_slug',['slug' => $value->product_slug]) }}" title="{{ $value->product_title }}" class="">
                <img src="{{ $value->product_image }}" alt="{{ $value->product_title }}" title="{{ $value->product_title }}" class="img-responsive">
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
                          <p>Tình trạng: {{ ($value->product_active == 1) ? "Sẵn Hàng" : "Chờ hàng" }}</p>
                      </div>
                      <p class="muangay"><a href="{{ route('quick_cart',['id' => $value->id]) }}">Mua ngay</a>
                      </p>
              </div>
          </a>
          </div>
      </div>
      @endforeach
      @endif
    </div>
</div>

<div class="product pdt30 text-center">
    <div class="row">
    <h2>Sản phẩm mới</h2>
        @if($product_new)
        @foreach($product_new as $value)
        <div class="col-xs-6 col-sm-6 col-md-3">
            <div class="item">
            <a href="{{ route('check_slug',['slug' => $value->product_slug]) }}" title="{{ $value->product_title }}" class="">
              <img src="{{ $value->product_image }}" alt="{{ $value->product_title }}" title="{{ $value->product_title }}" class="img-responsive">
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
                        <p>Tình trạng: {{ ($value->product_active == 1) ? "Sẵn Hàng" : "Chờ hàng" }}</p>
                    </div>
                    <p class="muangay"><a href="{{ route('quick_cart',['id' => $value->id]) }}">Mua ngay</a>
                    </p>
            </div>
        </a>
        </div>
    </div>
    @endforeach
    @endif
</div>
</div>
@endsection

@section('giaovn_footer')
    <script src="slick/slick.min.js"></script>
      <script type="text/javascript">
        $(document).on('ready', function() {
          $(".center").slick({
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 3,
            responsive: [
              {
                breakpoint: 768,
                settings: {
                  arrows: false,
                  centerMode: true,
                  centerPadding: '40px',
                  slidesToShow: 3
                }
              },
              {
                breakpoint: 480,
                settings: {
                  arrows: false,
                  centerMode: true,
                  centerPadding: '40px',
                  slidesToShow: 1
                }
              }
            ]
          });
        });
    </script>
@endsection
