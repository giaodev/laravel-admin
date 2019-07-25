@extends('default.master')

@section('title', $title)
@section('content')
<div class="product">  
    <div class="row filter pdt30">
        <form action="{{ route('filter') }}" method="get">
            @if($filter)
            @foreach($filter as $val)
            @if($val->attr_parent == 0)
            <div class="col-sm-3 item_filter">
                <select class="form-control" name="_{{ $val->attr_slug }}" onchange='if(this.value != 0) { this.form.submit(); }'>
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

    <div class="row" id="grid">
        @if($product)
        <div class="col-md-12 text-right">
            <span class="count_item">Tìm thấy {{ $product->count() }} sản phẩm</span>
        </div>
        @foreach($product as $value)
        <div class="col-xs-6 col-sm-6 col-md-3">
            <div class="item">
                <a href="{{ route('check_slug',['slug' => $value->product_slug]) }}" class="">
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
                                <span class="old_price">{{ number_format($value->product_price) }}</span>
                                <span class="promotion">{{ number_format($value->product_promotion) }}</span>
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
    <div class="row">
        <div class="col-md-12 text-center">
        <button type="button" name="ok" onclick="loadMoreData()" class="btn btn-default button_show_more">Xem thêm sản phẩm</button>
        </div>
    </div>
    <h1 class="title text-center">{{ $title }}</h1>     
    @if($category->cate_info != NULL)
    <div class="category_info pdt30">
        <div class="row">
            <div class="col-sm-5">
                <img src="{{ $category->cate_image }}" alt="" class="img-responsive">
            </div>
            <div class="col-sm-7 cate_description">
                {!! $category->cate_info !!}
                <div class="force-overflow"></div>
            </div>
        </div>
    </div>
    @endif

    <div class="news pdt30">
        <h2 class="e_title">Tin tức mới nhất</h2>
        <div class="row">
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
</div>

</div>
@endsection
@section('giaovn_footer')
<script type="text/javascript">
    var pageNumber = 2;
    function loadMoreData(){
            $.ajax({
                type : 'GET',
                url: "{{ route('check_slug',['slug' => $category->cate_slug]) }}?page=" +pageNumber,
                success : function(data){
                    pageNumber +=1;
                        if(data.length == 0){
                            // :( no more articles
                        }else{
                            $('#grid').append(data.html);
                        }
                },error: function(data){

                },
            })  
    }
</script>
@endsection