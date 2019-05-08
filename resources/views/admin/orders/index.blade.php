@extends('admin.master')
@section('title', $title)
@section('content')
<div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">{{ $title }}</h3>
    </div>
    <div class="panel-body">
        @include('status.mess')
        <table class="table table-bordered">
          <thead>
            <tr class="active">
                <td>STT</td>
                <td>Họ tên</td>
                <td>Số điện thoại</td>
                <td>Email</td>
                <td>Trạng thái</td>
                <td>Thao tác</td>
            </tr>
        </thead>
        <tbody>
          @if($data)
          <?php $i = 0; ?>
          @foreach($data as $value)
          <?php $i++; ?>
          <tr>
            <td>{{ $i }}</td>
            <td><a href="{{ route('orders.edit',['id' => $value->id]) }}">{{ $value->name }}</a></td>
            <td>{{ $value->phone }}</td>
            <td>{{ $value->email }}</td>
            <td>
                @switch($value->status)
                    @case(1)
                        Chờ duyệt
                        @break
                    @case(1)
                        Đang xử lý
                        @break
                    @case(3)
                        Hoàn thành
                        @break
                    @default
                            Default case...
                @endswitch

            </td>
            <td><a class="btn btn-info" href="{{ route('orders.edit',[$value->id]) }}"><span class="
              glyphicon glyphicon-edit"></span></a> <a class="btn btn-danger" href="{{ route('orders.delete',[$value->id]) }}" onclick="return confirm('Bạn muốn xóa bản ghi này?')"><span class="glyphicon glyphicon-trash"></span></a></td>
          </tr>
          @endforeach
          @endif
      </tbody>
  </table>
</div>
</div>
</div>
@endsection

