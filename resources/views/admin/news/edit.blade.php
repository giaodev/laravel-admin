@extends('admin.master')
@section('title', $title)
@section('content')
<div class="">
    <form class="form-horizontal" role="form" action="{{ route('news.edit',['id' => $data->id]) }}" method="post">
      <div class="panel panel-default col-md-9">
        <div class="panel-heading row">
          <h3 class="panel-title">{{ $title }}</h3>
      </div>
      <div class="panel-body">
          @include('status.errors')
          @include('status.mess')
          @csrf
          <div class="form-group">
            <label for="news_title" class="control-label">Tiêu đề</label>
            <input type="text" class="form-control" name="news_title" id="news_title" placeholder="Tiêu đề" value="{{ $data->news_title }}">
        </div>
        <div class="form-group">
            <label for="news_slug" class="control-label">Đường dẫn</label>
            <input type="text" class="form-control" name="news_slug" id="news_slug" placeholder="Đường dẫn" value="{{ $data->news_slug }}">
        </div>

        <div class="form-group">
            <label for="news_description" class="control-label">Mô tả ngắn</label>
            <textarea name="news_description" id="news_description" class="form-control" rows="3">{{ $data->news_description }}</textarea>
        </div>
        <div class="form-group">
            <label for="news_content" class="control-label">Nội dung</label>
            <textarea name="news_content" id="news_content" class="form-control" rows="3">{{ $data->news_content }}</textarea>
        </div>

        <div class="form-group">
            <label for="news_title_seo" class="control-label">Tiêu đề SEO</label>
            <input type="text" class="form-control" name="news_title_seo" id="news_title_seo" placeholder="Đường dẫn" value="{{ $data->news_title_seo }}">
        </div>

        <div class="form-group">
            <label for="news_description_seo" class="control-label">Mô tả SEO</label>
            <textarea name="news_description_seo" id="news_description_seo" class="form-control" rows="3">{{ $data->news_description_seo }}</textarea>
        </div>
        <div class="form-group">
            <label for="news_scripts_header" class="control-label">Mã nhúng header</label>
            <textarea name="news_scripts_header" id="news_scripts_header" class="form-control" rows="3">{{ $data->news_scripts_header }}</textarea>
        </div>
    <div class="form-group">
        <div class="">
          <button type="submit" class="btn btn-primary">Cập nhật</button>
      </div>
  </div>
</div>
</div>
<div class="col-sm-3">
<div class="panel panel-default list_item">
    <div class="panel-heading ">
      <h3 class="panel-title">Trạng thái</h3>
  </div>
  <div class="panel-body">
    <div class="">
        <select name="news_active" id="" class="form-control">
            <option value="1"{{ ($data->news_active == 1) ? 'selected' : '' }}>Công khai</option>
            <option value="2" {{ ($data->news_active == 2) ? 'selected' : '' }}>Riêng tư</option>
        </select>
    </div>
</div>
</div>

<div class="panel panel-default list_item">
    <div class="panel-heading ">
      <h3 class="panel-title">Chuyên mục</h3>
  </div>
  <div class="panel-body">
    <div class="list_category">
        {{ listCategory($listCate, $nc) }}
    </div>
</div>
</div>

    <div class="panel panel-default list_item">
        <div class="panel-heading">
          <h3 class="panel-title">Bài viết thuộc sản phẩm</h3>
      </div>
      <div class="panel-body">
        <div class="">
          <select name="news_related_product" id="" class="form-control">
            <option value="0">Không chọn</option>
            {{ callCategories($listCate3, 0,"--",$data->news_related_product) }}
          </select>
        </div>
    </div>
    <div class="panel-footer">
      <p class="help-block">Phần chọn này giúp cho các danh mục sản phẩm hiển thị bài viết liên quan</p>
    </div>
</div>

<div class="panel panel-default list_item">
    <div class="panel-heading ">
      <h3 class="panel-title">Thẻ</h3>
  </div>
  <div class="panel-body">
    <div class="list_tag">
        <?php

        ?>
        <select class="form-control js-example-tokenizer" name="tag[]" multiple="multiple">
            @if($listTag)
                @foreach($listTag as $tag)
                        @foreach($tag_checked as $tagchecked)
                            @if($tagchecked->tag_slug == $tag->tag_slug)
                                <option value="{{ $tag->tag_name }}" selected>{{ $tag->tag_name }}</option>
                            @else
                            <option value="{{ $tag->tag_name }}">{{ $tag->tag_name }}</option>
                            @endif
                        @endforeach

                @endforeach
            @endif
        </select>
    </div>
</div>
</div>
<div class="panel panel-default list_item">
    <div class="panel-heading ">
      <h3 class="panel-title">Hình ảnh</h3>
  </div>
  <div class="panel-body">
    <a onclick="openPopup()">Upload</a>
      <input name="news_image" id="url" type="hidden" value="{{ $data->news_image }}">
      <input name="news_image_name" id="url2" type="hidden">
    <div id="output">
        <img src="{{ $data->news_image }}" alt="" class="img-responsive">
    </div>
</div>
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
  var editor = CKEDITOR.replace( 'news_content', {
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
                  document.getElementById('url2').value = file.get('name');
                  var output = document.getElementById( 'output' );
                  output.innerHTML = '<img src='+file.getUrl()+' width="200" />'
                  console.log(file);
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
