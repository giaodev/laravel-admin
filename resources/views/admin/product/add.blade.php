@extends('admin.master')
@section('title', $title)
@section('content')
<div class="">
    <form class="form-horizontal" role="form" action="{{ route('product.add') }}" method="post" enctype="multipart/form-data">
      <div class="panel panel-default col-md-9">
        <div class="panel-heading row">
          <h3 class="panel-title">{{ $title }}</h3>
      </div>
      <div class="panel-body">
          @include('status.errors')
          @include('status.mess')
          @csrf
          <div class="form-group">
            <label for="product_title" class="control-label">Tên BĐS</label>
            <input type="text" class="form-control" name="product_title" id="title" onkeyup="ChangeToSlug();" placeholder="Tên BĐS" value="{{ old('product_title') }}" required>
        </div>
        <div class="form-group">
            <label for="product_slug" class="control-label">Đường dẫn</label>
            <input type="text" class="form-control" name="product_slug" id="slug" placeholder="Đường dẫn" value="{{ old('product_slug') }}" required>
        </div>

        <div class="form-group">
            <label for="product_description" class="control-label">Mô tả ngắn</label>
            <textarea name="product_description" id="product_description" class="form-control" rows="3" placeholder="Mô tả ngắn sản phẩm">{{ old('product_description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="product_content" class="control-label">Nội dung</label>
            <textarea name="product_content" id="product_content" class="form-control" rows="3">{{ old('product_content') }}</textarea>
        </div>

        <div class="form-group">
            <label for="product_title_seo" class="control-label">Tiêu đề SEO</label>
            <input type="text" class="form-control" name="product_title_seo" id="product_title_seo" placeholder="Đường dẫn" value="{{ old('product_title_seo') }}">
        </div>

        <div class="form-group">
            <label for="product_description_seo" class="control-label">Mô tả SEO</label>
            <textarea name="product_description_seo" id="product_description_seo" class="form-control" rows="3" placeholder="Mô tả SEO trên thẻ Meta">{{ old('product_description_seo') }}</textarea>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="product_code" class="control-label">Mã BĐS</label>
                    <input type="text" class="form-control" name="product_code" id="product_code" placeholder="Code" value="{{ old('product_code') }}">
                </div>
                <div class="col-sm-6">
                    <label for="product_code" class="control-label">Loại BĐS</label>

                    <select name="product_type" id="input" class="form-control" required="required">
                        <option value="0">Mặc định</option>
                        <option value="1">Nổi bật</option>
                        <option value="2">Bán Chạy</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
              <div class="col-sm-6">
                <label for="product_price" class="control-label">Giá bán</label>
                <input type="text" class="form-control" name="product_price" id="product_price" placeholder="Giá bất động sản" value="{{ old('product_price') }}">
            </div>
{{--             <div class="col-sm-6">
                <label for="product_promotion" class="control-label">Giá đã giảm</label>
                <input type="text" class="form-control" name="product_promotion" id="product_promotion" placeholder="Giá đã giảm" value="{{ old('product_promotion') }}">
            </div> --}}
            <div class="col-sm-6">
                <label for="product_price2" class="control-label">Giá bán theo m2</label>
                <input type="text" class="form-control" name="product_price2" id="product_price2" placeholder="Giá bán theo m2" value="{{ old('product_price2') }}">
            </div>
        </div>
        <div class="row">
         <div class="col-sm-6">
             <label for="dien_tich" class="control-label">Diện tích</label>
             <input type="text" class="form-control" name="dien_tich" id="dien_tich" placeholder="Diện tích" value="{{ old('dien_tich') }}">
         </div> 
        </div>
    </div>
    <br>
    <div class="form-group">
        <div class="">
          <button type="submit" class="btn btn-primary">Thêm mới</button>
      </div>
  </div>
</div>
</div>
<div class="col-sm-3">
        <div class="panel panel-default list_item">
            <div class="panel-heading">
              <h3 class="panel-title">Trạng thái</h3>
          </div>
          <div class="panel-body">
            <select name="product_active" id="input" class="form-control" required="required">
                <option value="1">Công khai</option>
                <option value="2">Riêng tư</option>
            </select>
        </div>
    </div>

    <div class="panel panel-default list_item">
        <div class="panel-heading">
          <h3 class="panel-title">Chuyên mục</h3>
      </div>
      <div class="panel-body list_scroll">
        <div class="list_category">
            {{ listCategory($listCate) }}
        </div>
    </div>
    <div class="panel-footer">
      <p class="help-block">Chọn chuyên mục liên quan đến sản phẩm được chọn</p>
    </div>
</div>

    <div class="panel panel-default list_item">
        <div class="panel-heading">
          <h3 class="panel-title">Chuyên mục chính</h3>
      </div>
      <div class="panel-body">
        <div class="">
          <select name="cate_primary_id" id="" class="form-control">
            <option value="0">Không chọn</option>
            {{ callMenu($listCate2) }}
          </select>
        </div>
    </div>
    <div class="panel-footer">
      <p class="help-block">Hiển thị các sản phẩm liên quan theo chuyên mục chính</p>
    </div>
</div>
<div class="panel panel-default list_item">
    <div class="panel-heading">
      <h3 class="panel-title">Thuộc tính BĐS</h3>
  </div>
  <div class="panel-body list_scroll">
    <div class="list_category">
        {{ listAttr($listAttr) }}
    </div>
</div>
  <div class="panel-footer">
    <p class="help-block">Hiển thị thuộc tính sản phẩm, bộ lọc sản phẩm ở bên ngoài</p>
  </div>
</div>

<div class="panel panel-default list_item">
    <div class="panel-heading">
      <h3 class="panel-title">Hình ảnh</h3>
  </div>
  <div class="panel-body">
    <a onclick="openPopup()">Upload</a>
    <input name="product_image" id="url" type="hidden">
    {{-- <input type="file" name="product_image"> --}}
    <div id="output"></div>
</div>
</div>
<div class="panel panel-default list_item">
    <div class="panel-heading">
      <h3 class="panel-title">Album hình ảnh</h3>
  </div>
  <div class="panel-body">
    <a onclick="openPopup2()">Upload</a>
    <textarea name="product_gallery" id="url2" class="hidden"></textarea>
    <div id="output2"></div>
</div>
</div>
</div>
</form>
</div>
@endsection

@section('g_footer')
<script src="ckeditor/ckeditor.js"></script>
<script src="ckfinder/ckfinder.js"></script>
<script>
  var editor = CKEDITOR.replace( 'product_content', {
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

  function openPopup2() {
      CKFinder.popup({
          chooseFiles: true,
          onInit: function (finder) {
            finder.on( 'files:choose', function( evt ) {
                var files = evt.data.files;

                var chosenFiles = '';
                var chosenFiles2 = '';
                var output2 = document.getElementById( 'output2' );
                files.forEach( function( file, i ) {
                    chosenFiles += file.get( 'url' ) + '|';
                    chosenFiles2 += '<img src='+file.get( 'url' )+' width="50" />'
                } );
                document.getElementById('url2').value = chosenFiles;
                output2.innerHTML = chosenFiles2;
            } );
        }
    });
  }
</script>
@endsection
