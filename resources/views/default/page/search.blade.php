@extends('default.master')

@section('title', $title)

@section('content')
    <div class="product">
        <div class="row">
            @if($product)
                <div class="col-md-12 text-right">
                    <span class="count_item">Tìm thấy {{ $product->count() }} sản phẩm</span>
                </div>
                @foreach($product as $value)
                    <div class="col-sm-6 col-md-3">
                        <div class="item">
                        <a href="{{ route('check_slug',['slug' => $value->product_slug]) }}" class="">
                            <img src="{{ $value->product_image }}" alt="{{ $value->product_title }}"
                                 class="img-responsive">
                            <div class="info_pro">
                                <div class="hot_ico"></div>
                                <h3 class="title">
                                    <a href="">{{ $value->product_title }}</a>
                                </h3>
                                <div class="box-price">
                                    <p>
                                        @if($value->product_promotion != 0)
                                            <span class="old_price">{{ number_format($value->product_price) }}</span>
                                            <span class="promotion">{{ number_format($value->product_promotion) }}</span>
                                        @else
                                            <span class="price">{{ number_format($value->product_price) }}</span>
                                        @endif
                                    </p>
                                    <p>Tình trạng: Sẵn Hàng</p>
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
