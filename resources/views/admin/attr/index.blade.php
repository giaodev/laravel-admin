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
      <div class="col-md-4">
        <form role="form" action="{{ route('attr.index') }}" method="post">
          @csrf
          @include('status.errors')
          {{-- @include('status.mess') --}}
          <div class="form-group">
            <label>Thuộc tính</label>
            <select name="attr_parent" id="input" class="form-control" required="required">
                <option value="0">Chính</option>
                {{ callAttr($listAttr) }}
            </select>
          </div>
          <div class="form-group">
            <label for="name">Tên</label>
            <input type="text" name="attr_name" class="form-control" id="name" placeholder="Tên thuộc tính">
          </div>
          <div class="form-group">
            <label for="slug">Đường dẫn</label>
            <input type="text" name="attr_slug" class="form-control" id="slug" placeholder="Đường dẫn">
          </div>
          <button type="submit" class="btn btn-default">Tạo</button>
        </form>
      </div>
      <div class="col-md-8">
        <table class="table table-bordered">
          <thead>
            <tr class="active">
              <th>STT</th>
              <th>Tên</th>
              <th>Đường dẫn</th>
              <th>Trạng Thái</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
            @if($data)
            <?php $i = 0; ?>
            @foreach($data as $value)
            <?php $i++; ?>
            @if($value->attr_parent == 0)
            <tr>
              <td>{{ $i }}</td>
              <td>{{ $value->attr_name }}</td>
              <td>{{ $value->attr_slug }}</td>
              <td>
                @if($value->attr_active == 1)
                <a class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></a>
                @else
                <a class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span></a>
                @endif
              </td>
              <td><a class="btn btn-info" href="{{ route('attr.edit',[$value->id]) }}"><span class="
                glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-danger"
                href="{{ route('attr.delete',[$value->id]) }}"><span
                class="glyphicon glyphicon-trash"></span></a></td>
              </tr>
              @foreach($data as $value2)
                @if($value2->attr_parent == $value->id)
<tr>
              <td>{{ $i }}</td>
              <td>-- {{ $value2->attr_name }}</td>
              <td>{{ $value2->attr_slug }}</td>
              <td>
                @if($value->attr_active == 1)
                <a class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></a>
                @else
                <a class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span></a>
                @endif
              </td>
              <td><a class="btn btn-info" href="{{ route('attr.edit',[$value2->id]) }}"><span class="
                glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-danger"
                href="{{ route('attr.delete',[$value2->id]) }}" onclick="return confirm('Bạn muốn xóa bản ghi này?')"><span
                class="glyphicon glyphicon-trash"></span></a></td>
              </tr>
                @endif
              @endforeach
              @endif
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
  </div>
  @endsection

