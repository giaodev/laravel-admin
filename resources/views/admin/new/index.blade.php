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
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Giá</th>
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
                        <td>{{ $i }}</td>
                        <td>{{ $value->product_title }}</td>
                        <td>{{ $value->product_price }}</td>
                        <td>
                            @php
                            $categories = DB::table('category')->join('pc','pc.category_id','=','category.id')->where('pc.product_id', $value->id)->get();
                            @endphp
                            @foreach($categories as $category)
                                {{ $category->cate_name }},
                            @endforeach
                        </td>
                        <td>
                            @if($value->product_active == 1)
                            <a class="btn btn-success">Công khai</a>
                            @else
                            <a class="btn btn-warning">Riêng tư</a>
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
          </div>
      </div>
  </div>
  @endsection

