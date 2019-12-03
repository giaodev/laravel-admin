@extends('admin.master')
@section('title', $title)
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">{{ $title }}</h3>
  </div>
  <div class="panel-body">
    <div class="row">
        <div class="col-sm-8">
            @include('status.errors')
            @include('status.mess')
            <form class="form-horizontal" role="form" action="{{ route('user.edit',[$data->id]) }}" method="post">
                @csrf
            <div class="row">
            <div class="col-sm-6">
                <p><b>Họ tên:</b> {{ $data->name }}</p>
                <p><b>Số điện thoại:</b> {{ $data->phone }}</p>
                <p><b>Email:</b> {{ $data->email }}</p>
                <p><b>Nội dung:</b> {{ $data->note }}</p>
            </div>
            <div class="col-sm-4">
                <label for="">Trạng thái</label>
                <select name="" id="input" class="form-control" required="required">
                    <option value="1">Chờ duyệt</option>
                    <option value="2">Đang xử lý</option>
                    <option value="3">Hoàn thành</option>
                </select>
            </div>
            <div class="col-sm-12">Link dự án: <a href="{{ $data->link }}" target="_blank">{{ $data->link }}</a></div>
            </div>
            <br>
            <div class="row">
                <div class="table-responsive">
                <table class="table table-bordered">
                    <tr class="active">
                        <td>STT</td>
                        <td>Tên sản phẩm</td>
                        <td>Giá sản phẩm</td>
                        <td>Số lượng</td>
                        <td>Tổng</td>
                    </tr>
                    <?php $total = 0; ?>
                    @if($data->list_orders)
                    <?php $stt=0; ?>
                        @foreach(unserialize($data->list_orders) as $value)
                        <?php $stt++; ?>
                            <tr>
                                <td>{{ $stt }}</td>
                                <td>{{ $value['name'] }}</td>
                                <td>{!! ($value['attributes']['promotion'] != 0) ? "<span='old_price'>".number_format($value['attributes']['old_price'])."</span> <span='promotion'>".number_format($value['attributes']['promotion'])."</span>" : number_format($value['attributes']['old_price']) !!}</td>
                                <td>{{ $value['quantity'] }}</td>
                                <td>{{ number_format($value['price'] * $value['quantity']) }}</td>
                            </tr>
                            @php
                                $total += $value['price'] * $value['quantity'];
                            @endphp
                        @endforeach
                    @endif
                </table>
                </div>
                <div class="total_price col-sm-6"><b>Tổng tiền</b> {{ number_format($total) }}</div>
            </div>
              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                  <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
              </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection

