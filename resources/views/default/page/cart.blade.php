@extends('default.master')

@section('title', $title)
@section('content')
<div class="pdt30 list_cart">
    @if($data)
    <form action="{{ route('update_cart') }}" method="post">
        @csrf
    <table class="table table-bordered">
        <tr class="active">
            <th>STT</th>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Hành động</th>
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
            <td><input type="number" min="1" max="10" value="{{ $value['quantity'] }}" name="quantity[{{ $value['id'] }}]"></td>
            <td>{{ number_format($value['price'] * $value['quantity']) }}</td>
            <td><a href="{{ route('remove_cart',['id' => $value['id']]) }}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
        @endforeach
    </table>
    <div class="update_cart text-right">
    <button type="submit" class="btn btn-danger">Cập nhật</button>
    </div>

    <div class="cart_total text-right pdt30">
        <span><b>Tổng tiền: {{ number_format($total) }}</b></span>
    </div>
    <div class="text-center">
        <a href="{{ route('pay') }}" class="btn btn-info">Thanh toán</a>
    </div>
    </form>
    @endif
</div>
@endsection
@section('script_footer')
@endsection
