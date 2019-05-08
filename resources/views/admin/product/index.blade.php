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
            <form action="{{ route('product.search') }}" method="GET" role="form">
                <div class="row">
                    <div class="col-sm-4">
                        <input type="search" name="keyword" class="form-control" id="" placeholder="Search..">
                    </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <br>
            <form action="{{ route('product.deleteall') }}" method="get" role="form">
            <table class="table table-bordered">
                <thead>
                    <tr class="active">
                        <th><input type="checkbox" id="checkAll"></th>
                        <th>STT</th>
                        <th>Hình ảnh</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Giá giảm</th>
                        <th>Chuyên mục</th>
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
                        <td><input type="checkbox" name="cb[]" value="{{ $value->id }}"></td>
                        <td>{{ $i }}</td>
                        <td><img src="{{ $value->product_image }}" width="50" /></td>
                        <td><a href="{{ route('product.edit',[$value->id]) }}">{{ $value->product_title }}</a></td>
                        <td>{{ number_format($value->product_price) }}</td>
                        <td>{{ number_format($value->product_promotion) }}</td>
                        <td width="200">
                            @php
                            $categories = DB::table('category')->join('pc','pc.category_id','=','category.id')->where('pc.product_id', $value->id)->get();
                            @endphp
                            @foreach($categories as $category)
                            {{ $category->cate_name }},
                            @endforeach
                        </td>
                        <td>
                            @if($value->product_active == 1)
                            <a class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></a>
                            @else
                            <a class="btn btn-warning"><span class="glyphicon glyphicon-remove"></a>
                            @endif
                        </td>
                        <td><a class="btn btn-info" href="{{ route('product.edit',[$value->id]) }}"><span class="
                          glyphicon glyphicon-edit"></span></a>
                          <a class="btn btn-danger"
                          href="{{ route('product.delete',[$value->id]) }}" onclick="return confirm('Bạn muốn xóa bản ghi này?')"><span
                          class="glyphicon glyphicon-trash"></span></a></td>
                      </tr>
                      @endforeach
                      @endif
                  </tbody>
              </table>
              <div class="text-right">
              <button class="btn btn-danger" onclick="return confirm('Bạn muốn xóa bản ghi này?')">Delete All</button>
              </div>
              </form>
          </div>
      </div>
  </div>
  @endsection

