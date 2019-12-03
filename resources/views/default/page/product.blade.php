@extends('default.master')

@section('title', $title)
@section('body_class', 'san_pham_bds')
@section('content')
<div class="row">
<div class="bds col-xs-12 col-sm-8">  
    <div id="ctl31_HeaderContainer" class="tit_l">
        <h2><a><span style="white-space:nowrap;">{{ $title }}</span></a></h2>
    </div>
    <div style="clear: both;"></div>
    <div class="line_gr"></div>
        @if($product)
{{--         <div class="col-md-12 text-right">
            <span class="count_item">Tìm thấy {{ $product->count() }} dự án</span>
        </div> --}}
        @foreach($product as $value)
        <div class="col-sm-12 item">
            <div class="row">
                <div class="col-sm-4">
                    <a href="{{ route('check_slug',['slug' => $value->product_slug]) }}" class="">
                      <img class="avatar" data-src="{{ $value->product_image }}" alt="...">
                    </a>
                </div>
                <div class="col-sm-8">
                    <h3><a href="{{ route('check_slug',['slug' => $value->product_slug]) }}">{{ $value->product_title }}</a></h3>
                    <p class="price">Giá: {{ ($value->product_price != "") ? convert_number_to_words($value->product_price) : "" }} {{ ($value->product_price2 != "") ? convert_number_to_words($value->product_price2). " / m2" : "" }}</p>
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

    <div class="row">
        <div class="col-md-12 text-center">
            {{ $product->links() }}
        </div>
    </div>
</div>

<div class="list-sidebar col-xs-12 col-sm-4">
  @include('default.module.sidebar')
</div>

        <h2 class="e_title">Tin tức mới nhất</h2>
        @if($news && $news->count() != 0)
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
     @else
     <h3>Không có dữ liệu</h3>
     @endif
</div>


@endsection
@section('giaovn_footer')
@endsection