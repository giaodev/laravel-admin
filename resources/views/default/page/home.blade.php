@extends('default.master')

@section('title', $title)
@section('giaovn_header')
@endsection
@section('banner')
@include('default.module.banner')
@endsection

@section('content')
  <div class="homepage">
    <div class="row">
    <div class="col-sm-4">
        <div class="news news_slide list_item">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            @if($news_slide)
            <?php $i = 0; ?>
            @foreach($news_slide as $val)
            <?php $i++; ?>
             <div class="item {{ ($i == 1) ? 'active' : '' }}">
                <a href="{{ route('check_slug',['slug' => $val->news_slug]) }}"><img src="{{ asset($val->news_image) }}" alt="" class="img-responsive"></a>
                <h4><a href="{{ route('check_slug',['slug' => $val->news_slug]) }}">{{ $val->news_title }}</a></h4>
             </div>
            @endforeach
            @endif
          </div>
        </div>
        </div>
    </div>  
    <div class="col-sm-4">
        <div class="news_list list_item">
        @foreach($news_list as $val)
        <div class="item">
            <a href="{{ route('check_slug',['slug' => $val->news_slug]) }}"><img src="{{ asset($val->news_image) }}" alt=""></a>
            <h4><a href="{{ route('check_slug',['slug' => $val->news_slug]) }}">{{ $val->news_title }}</a></h4>
        </div>
        @endforeach
        </div>
    </div>
    <div class="col-sm-4 news_list2">
        <ul class="list_item">
        @foreach($news_list2 as $val)
        <li class="item">
            <a href="{{ route('check_slug',['slug' => $val->news_slug]) }}"><b style="color:#006092;font: normal 14px/20px tahoma;">* </b> {{ $val->news_title }}</a>
        </li>
        @endforeach
        </ul>
    </div>
    <div class="clearfix"></div>
    <div class="tin-xem-nhieu bds col-xs-12 col-sm-8">
        <div id="ctl31_HeaderContainer" class="tit_l">
            <h2><a><span style="white-space:nowrap;">Tin rao dành cho bạn</span></a></h2>
        </div>
        <div style="clear: both;"></div>
        <div class="line_gr"></div>
        @foreach($product_hot as $value)
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
                    <p class="date"><span>{{ Carbon::parse($value->created_at)->format('h:i:s d-m-Y') }}</span></p>
                </div>
            </div>
            </div>
          
        @endforeach

        <div id="ctl31_HeaderContainer" class="tit_l">
            <h2><a><span style="white-space:nowrap;">Tin rao dành cho bạn</span></a></h2>
        </div>
        <div style="clear: both;"></div>
        <div class="line_gr"></div>
    	@foreach($product_new as $value)
            <div class="col-sm-12 item">
    	  	<div class="row">
    	  		<div class="col-sm-4">
    	  			<a href="{{ route('check_slug',['slug' => $value->product_slug]) }}" class="">
    	  			  <img class="avatar" data-src="{{ $value->product_image }}" alt="...">
    	  			</a>
    	  		</div>
    	  		<div class="col-sm-8">
    	  			<h3><a href="{{ route('check_slug',['slug' => $value->product_slug]) }}">{{ $value->product_title }}</a></h3>
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
    	  			<p class="date"><span>{{ Carbon::parse($value->created_at)->format('h:i:s d-m-Y') }}</span></p>
    	  		</div>
    	  	</div>
            </div>
    	  
    	@endforeach

        <div id="ctl31_HeaderContainer" class="tit_l">
            <h2><a><span style="white-space:nowrap;">Tin tức mới nhất</span></a></h2>
        </div>
        <div style="clear: both;"></div>
        <div class="line_gr"></div>

        <div class="col-sm-12 item">
            <div class="row">
        <div class="col-sm-6">
            <div class="footer_news">
                @if($news_f)
                 <div class="">
                    <a href="{{ route('check_slug',['slug' => $news_f->news_slug]) }}"><img src="{{ asset($news_f->news_image) }}" alt="" class="img-responsive"></a>
                    <h4><a href="{{ route('check_slug',['slug' => $news_f->news_slug]) }}">{{ $news_f->news_title }}</a></h4>
                 </div>
                @endif
            </div>
        </div>  
        <div class="col-sm-6">
            <ul class="footer_news_list">
            @foreach($news_list_f as $val)
            <li class="">
                <a href="{{ route('check_slug',['slug' => $val->news_slug]) }}"><b style="color:#006092;font: normal 14px/20px tahoma;">* </b> {{ $val->news_title }}</a>
            </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>

          </div>
          <div class="list-sidebar col-xs-12 col-sm-4">
            @include('default.module.sidebar')
          </div>

    </div>

    </div>
@endsection

@section('giaovn_footer')
@endsection
