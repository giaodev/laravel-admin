@extends('admin.master')
@section('title', $title)
@section('content')
<div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">{{ $title }}</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-8">
                @include('status.errors')
                @include('status.mess')
                <form class="form-horizontal" role="form" action="{{ route('user.add') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="name" class="col-sm-4 control-label">Tên hiển thị</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Tên đăng nhập" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="username" class="col-sm-4 control-label">Tên đăng nhập</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="username" id="username" placeholder="Tên đăng nhập" value="{{ old('username') }}">
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
          <input type="email" class="form-control" name="email" id="email" placeholder="Địa chỉ Email" value="{{ old('email') }}">
      </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
      <button type="submit" class="btn btn-primary">Đăng ký</button>
  </div>
</div>
</form>
</div>
<div class="col-sm-4">
    <div class="form-group">
      <label for="level" class="control-label">Level</label>
      <select name="level" id="input" class="form-control" required="required">
          <option value="2">Member</option>
          <option value="1">Admin</option>
      </select>
</div>
</div>
</div>
</div>
</div>
@endsection

