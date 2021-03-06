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
              <div class="form-group">
                <label for="username" class="col-sm-4 control-label">Tên đăng nhập</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="username" id="username" placeholder="Tên đăng nhập" value="{{ $data->username }}">
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-sm-4 control-label">Mật khẩu</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu">
                </div>
              </div>
              <div class="form-group">
                <label for="password_confirmation" class="col-sm-4 control-label">Xác nhận mật khẩu</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Xác nhận mật khẩu">
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-4 control-label">Địa chỉ Email</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Địa chỉ Email" value="{{ $data->email }}">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                  <button type="submit" class="btn btn-primary">Đăng ký</button>
                </div>
              </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection

