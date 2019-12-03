@extends('default.master')

@section('title', $title)

@section('content')
    <div class="tin-xem-nhieu bds col-xs-12 col-md-8">
        <div class="row">
            <div id="ctl31_HeaderContainer" class="tit_l">
                <h2><a><span style="white-space:nowrap;">Kết quả tìm kiếm</span></a></h2>
            </div>
            <div style="clear: both;"></div>
            <div class="line_gr"></div>
            @if($product)
                @foreach($product as $value)
                <div class="item col-sm-12">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="{{ route('check_slug',['slug' => $value->product_slug]) }}" class="">
                              <img class="avatar" data-src="{{ $value->product_image }}" alt="...">
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <h3><a href="{{ route('check_slug',['slug' => $value->product_slug]) }}">{{ $value->product_title }}</a></h3>
                            <p class="price">Giá: {{ ($value->product_price != "") ? $value->product_price : "" }} {{ ($value->product_price2 != "") ? convert_number_to_words($value->product_price2). " / m2" : "" }}</p>
                            <p class="area">Diện tích: {{ $value->dien_tich . " m2" }}</p>
                            <p class="location">Vị trí: 
                                @php
                                $categories = DB::table('category')->join('pc','pc.category_id','=','category.id')->where('pc.product_id', $value->id)->get();
                                @endphp
                                @foreach($categories as $category)
                                {{ $category->cate_name }},
                                @endforeach
                            </p>
                            <p class="date"><span>{{ $value->created_at }}</span></p>
                        </div>
                    </div>
                
                </div>
                @endforeach
                <div class="col-md-12 text-center">
                    {{ $product->appends(Request::input())->links() }}
                </div>
            @endif
        </div>

    </div>
    <div class="list-sidebar col-xs-12 col-sm-4">
      @include('default.module.sidebar')
    </div>
    
@endsection
