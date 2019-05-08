@extends('default.master')

@section('title', $title)

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
                        <img src="{{ $image }}" alt="...">
                        <div class="carousel-caption">
                            ...
                        </div>
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

        <div class="row">
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
                    <img src="{{ $image }}" alt="...">
                </a>
            </div>
            @php
        }
    }
    @endphp
</div>
</div>

@else
<img src="{{ $data->product_image }}" alt="" class="img-responsive">
@endif
    </div>
    <div class="col-sm-4">
        <h1>{{ $data->product_title }}</h1>
        <p class="description">{{ $data->product_description }}</p>
        @if($attr)
        <table class="table table-striped">
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
    </div>
    <div class="col-sm-3 dm-list-right">
        <li class="ds-item price_ct">
            @if($data->product_promotion == "")
            <p></span><br><span
                style="color:#c70000; font-weight:bold; font-size:18px;">GIÁ: {{ number_format($data->product_price) }}
            VNĐ</span></p>
            @else
            <p>
                <span style="text-decoration:line-through; font-weight:bold">Giá: {{ number_format($data->product_price) }}
                VNĐ</span><br><span
                style="color:#c70000; font-weight:bold; font-size:18px;">GIÁ KM: {{ number_format($data->product_promotion) }}
            VNĐ</span></p>
            @endif
            <span>(Giá trên đã bao gồm 10% VAT)</span>
        </li>
        <li class="ds-item cart">
            <a href="">
                <span>HƯỚNG DẪN MUA HÀNG</span>
            </a>
        </li>
        <li class="ds-item cart price_ct">
            <div class="gio_hang_cam"><a>{{ $cartTotalQuantity }}</a></div>
            <div><a href="{{ route('add_cart',['id' => $data->id]) }}"><span>THÊM VÀO GIỎ HÀNG</span></a></div>
        </li>
        <div class="order-now">
            <div class="">
                <button class="bg_booksp" title="Quick Orders" data-toggle="modal"
                data-target=".bs-example-modal-lg"><span style="color:#FFF; text-transform:uppercase">Đặt hàng nhanh</span><br><span>Mua hàng nhanh chóng, không cần đăng ký. Giao hàng Miễn Phí</span>
            </button>
        </div>
    </div>

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="quick_orders">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                    aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Đặt hàng nhanh</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="product_orders">
                                <img src="{{ $data->product_image }}" alt="" class="img-responsive">
                                <h3 class="title">{{ $data->product_title }}</h3>
                                <p class="price">{{ number_format($data->product_price) }}</p>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <form role="form">
                                <legend>Thông tin khách hàng</legend>
                                <div class="form-group">
                                    <label for="name">Họ tên</label>
                                    <input type="text" class="form-control" id="name" placeholder="Họ tên">
                                </div>
                                <div class="form-group">
                                    <label for="address">Địa chỉ</label>
                                    <input type="address" class="form-control" id="address"
                                    placeholder="Địa chỉ">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="phone" class="form-control" id="phone"
                                    placeholder="Số điện thoại">
                                </div>
                                <div class="form-group">
                                    <label for="email">Ghi chú</label>
                                    <textarea name="note" id="input" class="form-control" rows="3"
                                    placeholder="Ghi chú.."></textarea>
                                </div>
                                <button type="submit" class="btn btn-default orders_submit">Đặt hàng ngay
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <li class="ds-item cart">
        <a href="">
            <span><i class="glyphicon glyphicon-earphone"></i> Hotline 1: 0978.432.882</span>
        </a>
    </li>
    <li class="ds-item cart">
        <a href="">
            <span><i class="glyphicon glyphicon-earphone"></i> Hotline 2: 0965.764.248</span>
        </a>
    </li>
    <li class="ds-item cart">
        <a href="">
            <span>CHÍNH SÁCH BẢO HÀNH</span>
        </a>
    </li>
    </div>
    <div class="col-sm-9">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="active"><a href="#noidung" role="tab" data-toggle="tab">Mô tả</a></li>
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

    </div>
    <div class="col-sm-3">

    </div>
    <div class="clearfix"></div>
    <div class="product pdt30">
            @if($related_product)
            @foreach($related_product as $value)
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
</div>
@endsection
@section('script_footer')
<script>
    $('.carousel').carousel({
        interval: false,
    })
</script>
@endsection
