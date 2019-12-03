@extends('default.master')
@section('title', $title)
@section('body_class', 'single_product')
@section('content')
<div class="row single-bds">
    <div class="col-sm-8">
        <div class="content-bds">
            <h1><img src="{{ asset('frontend/images/star.ico') }}" alt="" width="30" height="30" style="margin-top:-5px;"> {{ $data->product_title }}</h1>
            <p><span>Vị trí: 
                @php
                $categories = DB::table('category')->join('pc','pc.category_id','=','category.id')->where('pc.product_id', $data->id)->get();
                @endphp
                @foreach($categories as $category)
                <a href="{{ route('check_slug',['slug' => $category->cate_slug]) }}">{{ $category->cate_name }}</a>,
                @endforeach
                Hà Nội
                </span>
                <p>
                  <span class="price">
                      Giá: {{ ($data->product_price != "") ? convert_number_to_words($data->product_price) : "" }} {{ ($data->product_price2 != "" && $data->product_price2 != 0) ? $data->product_price2. "tr / m2" : "" }}
                  </span>
                  <span class="area">
                      Diện tích: {{ $data->dien_tich . " m2" }}
                  </span>
                </p>
            </p>
            <hr>
            <p class="content">
                  {!! $data->product_content !!}
            </p>
            <hr>
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
            <a href="{{ $data->product_image }}" data-lightbox="{{ $data->product_title }}" data-title="{{ $data->product_title }}"><img data-src="{{ $data->product_image }}" alt="" class="img-responsive"></a>
            @endif

            <hr>

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

            <p class="description">{{ $data->product_description }}</p>
            <div class="row">
               <div class="col-sm-6">
                <h4>Liên hệ ngay</h4>
                   <form role="form" action="{{ route('pay') }}" method="post">
                       @csrf
                       <div class="form-group">
                         <input type="hidden" class="form-control" name="link" id="link" value="{{ route('check_slug', ['slug' => $data->product_slug]) }}">
                       </div>
                     <div class="form-group">
                       <label for="name">Anh/chị</label>
                       <input type="text" class="form-control" name="name" id="name" placeholder="Họ tên" required="required">
                     </div>
                     <div class="form-group">
                       <label for="address">Khu Vực</label>
                       <input type="address" class="form-control" name="address" id="address" placeholder="Khu vực" required="required">
                     </div>
                     <div class="form-group">
                       <label for="phone">Số điện thoại</label>
                       <input type="phone" class="form-control" name="phone" id="phone" placeholder="Số điện thoại" required="required">
                     </div>
                     <div class="form-group">
                       <label for="email">Email liên hệ</label>
                       <input type="email" class="form-control" name="email" id="email" placeholder="Địa chỉ Email">
                     </div>
                     <div class="form-group">
                       <label for="email">Nội dung quan tâm</label>
                       <textarea name="note" id="input" class="form-control" rows="3" placeholder="Ghi chú.."></textarea>
                     </div>
                     <button type="submit" class="btn btn-default">Liên hệ ngay</button>
                   </form>
               </div>
               <div class="col-sm-6">
                    <img src="{{ asset($cua_hang->images_avatar) }}" alt="" class="img-responsive">
               </div>
            </div>
           {{--  <div class="addcart ">
                    <a href="{{ route('add_cart',['id' => $data->id]) }}" class="btn btn-primary pay_item">Liên hệ ngay</a>
                    <a href="" class="btn btn-primary pay_guide">Hotline: 0978.432.882</a>
            </div> --}}
            <br>
            <div id="fb-root"></div>
            <div data-width="100%" class="fb-comments" data-href="{{ route('check_slug',['slug' => $data->product_slug]) }}" data-width="" data-numposts="5"></div>
        </div>
            <div class="clearfix"></div>

        <div class="bds">
            <div id="ctl31_HeaderContainer" class="tit_l">
                <h2><a><span style="white-space:nowrap;">Dự án liên quan</span></a></h2>
            </div>
            <div style="clear: both;"></div>
            <div class="line_gr"></div>
            @if($related_product)
            @foreach($related_product as $value)
                <div class="col-sm-12 item xem-nhieu">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="{{ route('check_slug',['slug' => $value->product_slug]) }}" class="">
                              <img class="avatar" data-src="{{ $value->product_image }}" alt="...">
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <h3><img src="{{ asset('frontend/images/star.ico') }}" alt="" width="20" height="20" style="margin-top:-5px;"> <a href="{{ route('check_slug',['slug' => $value->product_slug]) }}">{{ $value->product_title }}</a></h3>
                            <p class="price">Giá: {{ ($value->product_price != "") ? convert_number_to_words($value->product_price) : "" }} {{ ($value->product_price2 != "" && $value->product_price2 != 0) ? $value->product_price2. "tr / m2" : "" }}</p>
                            <p class="area">Diện tích: {{ $value->dien_tich . " m2" }}</p>
                            <p class="location">Vị trí: 
                                @php
                                $categories = DB::table('category')->join('pc','pc.category_id','=','category.id')->where('pc.product_id', $value->id)->get();
                                @endphp
                                @foreach($categories as $category)
                                <a href="{{ route('check_slug',['slug' => $category->cate_slug]) }}">{{ $category->cate_name }}</a>,
                                @endforeach
                            </p>
                            <p class="date"><span>{{ $value->created_at }}</span></p>
                        </div>
                    </div>
                    </div>
            @endforeach
            @endif
        </div>


    </div>


    <div class="list-sidebar col-xs-12 col-sm-4">
      @include('default.module.sidebar')
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
