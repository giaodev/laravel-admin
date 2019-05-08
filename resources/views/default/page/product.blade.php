@extends('default.master')

@section('title', $title)

@section('content')
    <div class="product">
        <div class="row filter pdt30">
            <form action="" method="get">
            @if($filter)
                @foreach($filter as $val)
                    @if($val->attr_parent == 0)
                        <div class="col-sm-3 item_filter">
                        <select class="form-control" name="{{ $val->attr_slug }}" onchange='if(this.value != 0) { this.form.submit(); }'>
                            <option selected="true" disabled="disabled">{{ $val->attr_name }}</option>
                        @foreach($filter as $val2)
                            @if($val2->attr_parent == $val->id)
                                <option value="{{ $val2->attr_slug }}" {{ (isset($_GET[$val->attr_slug]) && $_GET[$val->attr_slug] == $val2->attr_slug) ? "selected" : "" }}>{{ $val2->attr_name }}</option>
                            @endif
                        @endforeach
                        </select>
                        </div>
                    @endif
                @endforeach
            @endif
            <div class="col-sm-3 pull-float">
                <a href="{{ route('check_slug', ['id' => $category->cate_slug ])}}" class="btn btn-default">Reset</a>
            </div>
            <div class="sorting-orderby text-right col-sm-3 pull-right item_filter">
                <select name="" id="" class="form-control" onchange='if(this.value != 0) { this.form.submit(); }'>
                    <option selected="true" disabled="disabled">Mặc định</option>
                    <option value="desc">Mới nhất</option>
                    <option value="asc">Cũ nhất</option>
                    <option value="">Giá thấp nhất</option>
                    <option value="">Giá cao nhất</option>
                </select>
            </div>
            </form>
        </div>
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
