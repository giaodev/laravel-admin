@extends('admin.master')
@section('title', $title)
@section('content')
<div class="row">
    <form class="form-horizontal" role="form" action="{{ route('product.add') }}" method="post">
      <div class="panel panel-default col-md-9">
        <div class="panel-heading row">
          <h3 class="panel-title">{{ $title }}</h3>
      </div>
      <div class="panel-body">
          @include('status.errors')
          @include('status.mess')
          @csrf
          <div class="form-group">
            <label for="new_title" class="control-label">Tiêu đề</label>
            <input type="text" class="form-control" name="new_title" id="new_title" placeholder="Tiêu đề" value="{{ old('new_title') }}">
        </div>
        <div class="form-group">
            <label for="new_slug" class="control-label">Đường dẫn</label>
            <input type="text" class="form-control" name="new_slug" id="new_slug" placeholder="Đường dẫn" value="{{ old('new_slug') }}">
        </div>

        <div class="form-group">
            <label for="new_description" class="control-label">Mô tả ngắn</label>
            <textarea name="new_description" id="new_description" class="form-control" rows="3">{{ old('new_description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="new_content" class="control-label">Nội dung</label>
            <textarea name="new_content" id="new_content" class="form-control" rows="3">{{ old('new_content') }}</textarea>
        </div>

        <div class="form-group">
            <label for="new_title_seo" class="control-label">Tiêu đề SEO</label>
            <input type="text" class="form-control" name="new_title_seo" id="new_title_seo" placeholder="Đường dẫn" value="{{ old('new_title_seo') }}">
        </div>

        <div class="form-group">
            <label for="new_description_seo" class="control-label">Mô tả SEO</label>
            <textarea name="new_description_seo" id="new_description_seo" class="form-control" rows="3">{{ old('new_description_seo') }}</textarea>
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
    <div class="list_category">
    </div>
</div>
</div>

<div class="panel panel-default col-md-3 list_item">
    <div class="panel-heading row">
      <h3 class="panel-title">Chuyên mục</h3>
  </div>
  <div class="panel-body">
    <div class="list_category">
        {{ listCategory($listCate) }}
    </div>
</div>
</div>
<div class="panel panel-default col-md-3 list_item">
    <div class="panel-heading row">
      <h3 class="panel-title">Thẻ</h3>
  </div>
  <div class="panel-body">
    <div class="list_category">
        <select class="form-control js-example-tokenizer" multiple="multiple">
        </select>
    </div>
</div>
</div>
<div class="panel panel-default col-md-3 list_item">
    <div class="panel-heading row">
      <h3 class="panel-title">Hình ảnh</h3>
  </div>
  <div class="panel-body">
    <a onclick="openPopup()">Upload</a>
    <input name="product_image" id="url" type="hidden">
    <div id="output"></div>
</div>
</div>
</form>
</div>
@endsection
@section('g_head')
<link href="adm/css/select2.min.css" rel="stylesheet">
@endsection
@section('g_footer')
<script src="adm/js/select2.min.js"></script>
<script>
    $(".js-example-tokenizer").select2({
        tags: true,
        tokenSeparators: [',']
    })
</script>
<script src="ckeditor/ckeditor.js"></script>
<script src="ckfinder/ckfinder.js"></script>
<script>
  var editor = CKEDITOR.replace( 'new_content', {
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?Type=Images',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserWindowWidth : '1000',
    filebrowserWindowHeight : '700'
} );
  CKFinder.setupCKEditor( editor );


  function openPopup() {
      CKFinder.popup({
          chooseFiles: true,
          onInit: function (finder) {
              finder.on('files:choose', function (evt) {
                  var file = evt.data.files.first();
                  document.getElementById('url').value = file.getUrl();
                  var output = document.getElementById( 'output' );
                  output.innerHTML = '<img src='+file.getUrl()+' width="200" />'
              });
              finder.on('file:choose:resizedImage', function (evt) {
                  document.getElementById('url').value = evt.data.resizedUrl;
                  var output = document.getElementById( 'output' );
                  output.innerHTML = '<img src='+evt.data.resizedUrl+' width="200" />'
              });
          }
      });
  }
</script>
@endsection
