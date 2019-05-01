@extends('admin.master')
@section('title', $title)
@section('content')
<div class="row">
    <form class="form-horizontal" role="form" action="{{ route('image.add') }}" method="post">
      <div class="panel panel-default col-md-9">
        <div class="panel-heading row">
          <h3 class="panel-title">{{ $title }}</h3>
      </div>
      <div class="panel-body">
          @include('status.errors')
          @include('status.mess')
          @csrf
          <div class="form-group">
            <label for="images_title" class="control-label">Tiêu đề</label>
            <input type="text" class="form-control" name="images_title" id="title" placeholder="Tiêu đề" value="{{ old('images_title') }}">
        </div>
        <div class="form-group">
            <label for="images_description" class="control-label">Mô tả ngắn</label>
            <textarea name="images_description" id="images_description" class="form-control" rows="3">{{ old('images_description') }}</textarea>
        </div>
          <div class="form-group">
            <label for="images_link" class="control-label">Link</label>
            <input type="text" class="form-control" name="images_link" id="title" placeholder="Link" value="{{ old('images_link') }}">
        </div>
          <div class="form-group">
            <label for="images_orderby" class="control-label">Thứ tự</label>
            <input type="number" class="form-control" name="images_orderby" id="title" placeholder="Thứ tự" value="{{ old('images_orderby', 0) }}">
        </div>
        <div class="row">
            <a onclick="openPopup()">Upload</a>
            <input name="images_avatar" id="url" type="hidden">
            <div id="output"></div>
        </div>
        <br>
        <br>
        <div class="form-group">
            <div class="">
              <button type="submit" class="btn btn-primary">Thêm mới</button>
          </div>
      </div>
  </div>
</div>
<div class="panel panel-default col-md-3 list_item">
    <div class="panel-heading row">
      <h3 class="panel-title">Trạng thái</h3>
  </div>
  <div class="panel-body">
    <div class="">
        <select name="images_status" id="" class="form-control">
            <option value="1">Công khai</option>
            <option value="2">Riêng tư</option>
        </select>
    </div>
</div>
</div>

<div class="panel panel-default col-md-3 list_item">
    <div class="panel-heading row">
      <h3 class="panel-title">Thể loại</h3>
  </div>
  <div class="panel-body">
    <div class="">
        <select name="images_type" id="" class="form-control">
            <option value="0">Chọn thể loại</option>
            <option value="1">Banner</option>
            <option value="2">Poster</option>
            <option value="3">Popup</option>
            <option value="4">Social</option>
            <option value="5">Advertisement</option>
            <option value="6">Icon</option>
        </select>
    </div>
</div>
</div>


<div class="panel panel-default col-md-3 list_item">
    <div class="panel-heading row">
      <h3 class="panel-title">Chuyên mục</h3>
  </div>
  <div class="panel-body">
    <div class="">
        <select name="images_category" id="input" class="form-control" required="required">
            <option value="0">Root</option>
            {{ callMenu($listCate) }}
        </select>
    </div>
</div>
</div>
</form>
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
                  document.getElementById('url').value = file.getUrl();
                  var output = document.getElementById( 'output' );
                  output.innerHTML = '<img src='+file.getUrl()+' class="img-responsive" />'
              });
              finder.on('file:choose:resizedImage', function (evt) {
                  document.getElementById('url').value = evt.data.resizedUrl;
                  var output = document.getElementById( 'output' );
                  output.innerHTML = '<img src='+evt.data.resizedUrl+' class="img-responsive" />'
              });
          }
      });
  }
</script>
@endsection
