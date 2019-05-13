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
      <div class="col-md-4">
        <form role="form" action="{{ route('tag.index') }}" method="post">
          @csrf
          @include('status.errors')
          {{-- @include('status.mess') --}}
          <div class="form-group">
            <label for="name">Tên</label>
            <input type="text" name="tag_name" class="form-control" id="name" placeholder="Tên thuộc tính">
          </div>
          <div class="form-group">
            <label for="slug">Đường dẫn</label>
            <input type="text" name="tag_slug" class="form-control" id="slug" placeholder="Đường dẫn">
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
            <tr>
              <td>{{ $i }}</td>
              <td>{{ $value->tag_name }}</td>
              <td>{{ $value->tag_slug }}</td>
              <td>
                @if($value->tag_status == 1)
                <a class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></a>
                @else
                <a class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span></a>
                @endif
              </td>
              <td><a class="btn btn-info" href="{{ route('tag.edit',[$value->id]) }}"><span class="
                glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-danger"
                href="{{ route('tag.delete',[$value->id]) }}"><span
                class="glyphicon glyphicon-trash"></span></a></td>
              @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endsection

