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
      }

  </style>
@endsection
@section('banner')
@include('default.module.banner')
@endsection

@section('content')

</div>
<div class="jumbotron slider-category">
  <div class="container text-center">
    <h2 class="e_title">Bộ sưu tập</h2>
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
    <h2 class="e_title">Sản phẩm HOT</h2>
    <div class="row">
          @if($product_hot)
          @foreach($product_hot as $value)
          <div class="col-xs-6 col-sm-6 col-md-4">
              <div class="item">
              <a href="{{ route('check_slug',['slug' => $value->product_slug]) }}" title="{{ $value->product_title }}" class="">
              <div class="background_image">
          <img data-src="{{ $value->product_image }}" alt="{{ $value->product_title }}" title="{{ $value->product_title }}" class="img-responsive">      
              </div>
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
    <h2 class="e_title">Sản phẩm mới</h2>
        @if($product_new)
        @foreach($product_new as $value)
        <div class="col-xs-6 col-sm-6 col-md-4">
            <div class="item">
            <a href="{{ route('check_slug',['slug' => $value->product_slug]) }}" title="{{ $value->product_title }}" class="">
              <div class="background_image">
          <img data-src="{{ $value->product_image }}" alt="{{ $value->product_title }}" title="{{ $value->product_title }}" class="img-responsive">      
              </div>
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

<div class="news pdt30">
<h2 class="e_title">Tin tức mới nhất</h2>
<div class="row">
  @if($news)
    @foreach($news as $value)
     <div class="col-sm-6 col-md-3">
       <a class="thumbnail" href="{{ route('check_slug',['slug' => $value->news_slug]) }}">
        <div class="avatar" style="background-image:url({{ $value->news_image }})" alt="{{ $value->news_title }}"></div>
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

@endsection

@section('giaovn_footer')
    <script src="slick/slick.min.js"></script>
      <script type="text/javascript">
        $(document).on('ready', function() {
          $(".center").slick({
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
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
