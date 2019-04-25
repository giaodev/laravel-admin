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
        <form class="form-horizontal" role="form" action="{{ route('setting.index') }}" method="post">
            <div class="row">
                <div class="col-sm-9">
                    @include('status.errors')
                    @include('status.mess')
                    @csrf
                    <div class="form-group">
                      <label for="name" class="col-sm-4 control-label">Tiêu đề trang chủ</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="homepage_title" id="homepage_title" placeholder="Tiêu đề trang chủ" value="{{ $data->homepage_title }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="homepage_description" class="col-sm-4 control-label">Mô tả trang chủ</label>
                    <div class="col-sm-8">
                        <textarea name="homepage_description" id="inputHomepage_description" class="form-control" rows="3" required="required">{{ $data->homepage_description }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-4 control-label">Đường dẫn website</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="url" id="url" placeholder="Đường dẫn Website" value="{{ $data->url }}">
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
  </div>
  <div class="col-sm-3">

   <label for="homepage_image" class="control-label">Ảnh đại diện trang chủ</label>
   <br>
   <a onclick="openPopup()">Upload</a>
   <input name="homepage_image" id="homepage_image" type="hidden" value="{{ $data->homepage_image }}">
   <div id="output"><img src="{{ $data->homepage_image }}" width="100"></div>
   <br>
   <label for="logo" class="control-label">Logo Website</label>
   <br>
   <a onclick="openPopup2()">Upload</a>
   <input name="logo" id="logo" type="hidden" value="{{ $data->logo }}">
   <div id="output2"><img src="{{ $data->logo }}" width="100"></div>

   <br>
   <label for="favicon" class="control-label">Favicon Website</label>
   <br>
   <a onclick="openPopup3()">Upload</a>
   <input name="favicon" id="favicon" type="hidden" value="{{ $data->favicon }}">
   <div id="output3"><img src="{{ $data->favicon }}" width="100"></div>
</div>
</div>
</form>
</div>
</div>
</div>
@endsection

@section('g_footer')
<script src="ckfinder/ckfinder.js"></script>
<script>
  function openPopup() {
      CKFinder.popup({
          chooseFiles: true,
          onInit: function (finder) {
              finder.on('files:choose', function (evt) {
                  var file = evt.data.files.first();
                  document.getElementById('homepage_image').value = file.getUrl();
                  var output = document.getElementById( 'output' );
                  output.innerHTML = '<img src='+file.getUrl()+' width="100" />'
              });
              finder.on('file:choose:resizedImage', function (evt) {
                  document.getElementById('homepage_image').value = evt.data.resizedUrl;
                  var output = document.getElementById( 'output' );
                  output.innerHTML = '<img src='+evt.data.resizedUrl+' class="img-responsive" width="100" />'
              });
          }
      });
  }

  function openPopup2() {
      CKFinder.popup({
          chooseFiles: true,
          onInit: function (finder) {
              finder.on('files:choose', function (evt) {
                  var file = evt.data.files.first();
                  document.getElementById('logo').value = file.getUrl();
                  var output = document.getElementById( 'output2' );
                  output.innerHTML = '<img src='+file.getUrl()+' class="img-responsive" />'
              });
              finder.on('file:choose:resizedImage', function (evt) {
                  document.getElementById('logo').value = evt.data.resizedUrl;
                  var output = document.getElementById( 'output2' );
                  output.innerHTML = '<img src='+evt.data.resizedUrl+' class="img-responsive" />'
              });
          }
      });
  }

  function openPopup3() {
      CKFinder.popup({
          chooseFiles: true,
          onInit: function (finder) {
              finder.on('files:choose', function (evt) {
                  var file = evt.data.files.first();
                  document.getElementById('favicon').value = file.getUrl();
                  var output = document.getElementById( 'output3' );
                  output.innerHTML = '<img src='+file.getUrl()+' class="img-responsive" />'
              });
              finder.on('file:choose:resizedImage', function (evt) {
                  document.getElementById('favicon').value = evt.data.resizedUrl;
                  var output = document.getElementById( 'output3' );
                  output.innerHTML = '<img src='+evt.data.resizedUrl+' class="img-responsive" />'
              });
          }
      });
  }
</script>
@endsection
