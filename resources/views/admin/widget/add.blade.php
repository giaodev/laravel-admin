@extends('admin.master')
@section('title', $title)
@section('content')
<div class="">
    <form class="form-horizontal" role="form" action="{{ route('widget.add') }}" method="post">
      <div class="panel panel-default col-md-9">
        <div class="panel-heading row">
          <h3 class="panel-title">{{ $title }}</h3>
      </div>
      <div class="panel-body">
          @include('status.errors')
          @include('status.mess')
          @csrf
          <div class="form-group">
            <label for="widget_title" class="control-label">Tiêu đề</label>
            <input type="text" class="form-control" name="widget_title" id="title" placeholder="Tiêu đề" value="{{ old('widget_title') }}">
        </div>
        <div class="form-group">
            <label for="widget_content" class="control-label">Mô tả ngắn</label>
            <textarea name="widget_content" id="widget_content" class="form-control" rows="3">{{ old('widget_content') }}</textarea>
        </div>
          <div class="form-group">
            <label for="widget_order" class="control-label">Thứ tự</label>
            <input type="number" class="form-control" name="widget_order" id="title" placeholder="Thứ tự" value="{{ old('widget_order', 0) }}">
        </div>
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
        <select name="widget_status" id="" class="form-control">
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
        <select name="widget_type" id="" class="form-control">
            <option value="0">Chọn thể loại</option>
            <option value="1">Navbar</option>
            <option value="2">Footer</option>
        </select>
    </div>
</div>
</div>
</form>
</div>
@endsection
@section('g_footer')
<script src="ckeditor/ckeditor.js"></script>
<script>
  var editor = CKEDITOR.replace( 'widget_content', {
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?Type=widget',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=widget',
    filebrowserWindowWidth : '1000',
    filebrowserWindowHeight : '700'
} );
  CKFinder.setupCKEditor( editor );
</script>
@endsection
