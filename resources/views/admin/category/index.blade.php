@extends('admin.master')
@section('title', $title)
@section('content')
<div class="">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $title }}</h3>
        </div>
        <div class="panel-body">
            @include('status.mess')
            <table class="table table-bordered">
                <thead>
                    <tr class="active">
                        <th>STT</th>
                        <th>Tên chuyên mục</th>
                        <th>Đường dẫn</th>
                        <th>Thể loại</th>
                        <th>Trạng Thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @if($data)
                    <?php $i = 0; ?>
                    @foreach($data as $value)
                    <?php $i++; ?>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $value->cate_name }}</td>
                        <td>{{ $value->cate_slug }}</td>
                        <td>
                            @switch($value->cate_type)
                            @case(1)
                            Sản phẩm
                            @break
                            @case(2)
                            Bài viết
                            @break
                            @case(3)
                            Trang
                            @break
                            @endswitch
                        </td>
                        <td>
                            @if($value->cate_status == 1)
                            <a class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></a>
                            @else
                            <a class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span></a>
                            @endif
                        </td>
                        <td><a class="btn btn-info" href="{{ route('category.edit',[$value->id]) }}"><span class="
                          glyphicon glyphicon-edit"></span></a>
                          <a class="btn btn-danger"
                          href="{{ route('category.delete',[$value->id]) }}" onclick="return confirm('Bạn muốn xóa bản ghi này?')"><span
                          class="glyphicon glyphicon-trash"></span></a></td>
                      </tr>
                      @endforeach
                      @endif
                  </tbody>
              </table>
              <div class="text-center">
                {{ $data->links() }}
              </div>
          </div>
      </div>
  </div>
  @endsection

