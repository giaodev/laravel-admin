@extends('default.master')

@section('title', $title)
@section('content')
<div class="pdt30 list_cart">
    <div class="col-sm-8">
    @if($data)
    <table class="table table-bordered">
        <tr class="active">
            <th>STT</th>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
        </tr>
        <?php $i = 0; ?>
        @foreach($data as $value)
        <?php $i++; ?>
        <tr>
            <td>{{ $i }}</td>
            <td><img src="{{ $value['attributes']['image'] }}" alt="" height="50"></td>
            <td>{{ $value['name'] }}</td>
            <td>
                @if($value['attributes']['promotion'])
                    <span class="old_price">{{ number_format($value['attributes']['old_price']) }}</span> <span class="promotion">{{ number_format($value['attributes']['promotion']) }}</span>
                @else
                    <span class="price">{{ number_format($value['price']) }}</span>
                @endif
            </td>
            <td>{{ $value['quantity'] }}</td>
            <td>{{ number_format($value['price'] * $value['quantity']) }}</td>
        </tr>
        @endforeach
    </table>
    <div class="cart_total text-right pdt30">
        <span><b>Tổng tiền: {{ number_format($total) }}</b></span>
    </div>
    @endif
    </div>
    <div class="col-sm-4">
        <form role="form" action="{{ route('pay') }}" method="post">
            @csrf
          <div class="form-group">
            <label for="name">Họ tên</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Họ tên" required="required">
          </div>
          <div class="form-group">
            <label for="address">Địa chỉ</label>
            <input type="address" class="form-control" name="address" id="address" placeholder="Địa chỉ" required="required">
          </div>
          <div class="form-group">
            <label for="phone">Số điện thoại</label>
            <input type="phone" class="form-control" name="phone" id="phone" placeholder="Số điện thoại" required="required">
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Địa chỉ Email">
          </div>
          <div class="form-group">
            <label for="email">Ghi chú</label>
            <textarea name="note" id="input" class="form-control" rows="3" placeholder="Ghi chú.."></textarea>
          </div>
          <button type="submit" class="btn btn-default">Thanh toán</button>
        </form>
    </div>
</div>
@endsection
@section('script_footer')
@endsection
