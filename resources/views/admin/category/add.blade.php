@extends('admin.master')
@section('title', $title)
@section('content')
<div class="">
    <form class="form-horizontal" role="form" action="{{ route('category.add') }}" method="post">
    <div class="panel panel-default col-sm-9">
        <div class="panel-heading row">
            <h3 class="panel-title">{{ $title }}</h3>
        </div>
        <div class="panel-body">
                    @include('status.errors')
                    @include('status.mess')
                    @csrf
                    <div class="form-group">
                        <label for="cate_name" class="control-label">Chuyên mục</label>
                        <select name="cate_parent" id="input" class="form-control" required="required">
                            <option value="0">Chuyên mục chính</option>
                            {{ callMenu($listCate) }}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cate_name" class="control-label">Tên chuyên mục</label>
                        <input type="text" class="form-control" name="cate_name" id="title" onkeyup="ChangeToSlug();"
                        placeholder="Tên chuyên mục" value="{{ old('cate_name') }}">
                    </div>
                    <div class="form-group">
                        <label for="cate_slug" class="control-label">Đường dẫn</label>
                        <input type="text" class="form-control" name="cate_slug" id="slug"
                        placeholder="Đường dẫn" value="{{ old('cate_slug') }}">
                    </div>
                    <div class="form-group">
                        <label for="cate_order" class="control-label">Thứ tự hiển thị</label>
                        <input type="number" class="form-control" name="cate_order" id="cate_order"
                        placeholder="Thứ tự hiển thị" value="{{ old('cate_order') }}">
                    </div>

                    <div class="form-group">
                        <label for="cate_title" class="control-label">Tiêu đề SEO</label>
                        <input type="text" class="form-control" name="cate_title" id="cate_title" placeholder="Đường dẫn" value="{{ old('cate_title') }}">
                    </div>
                    <div class="form-group">
                        <label for="cate_description" class="control-label">Mô tả SEO</label>
                        <textarea name="cate_description" id="cate_description" class="form-control" rows="3">{{ old('cate_description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="cate_info" class=" control-label">Nội dung</label>
                        <div class="">
                            <textarea name="cate_info" id="cate_info" class="form-control" rows="3">{{ old('cate_info') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </div>
                    </div>
        </div>
    </div>

    <div class="col-sm-3">
    <div class="panel panel-default list_item">
        <div class="panel-heading">
          <h3 class="panel-title">Loại chuyên mục</h3>
      </div>
      <div class="panel-body">
        <div class="">
            <select name="cate_type" id="input" class="form-control" required="required" multiple="">
                <optgroup label="Thể loại">
                    <option value="1">Sản phẩm</option>
                    <option value="2">Bài viết</option>
                    <option value="3">Trang</option>
                    <option value="4">Liên hệ</option>
                </optgroup>
            </select>
        </div>
    </div>
    </div>
    <div class="panel panel-default list_item">
        <div class="panel-heading">
          <h3 class="panel-title">Trạng thái</h3>
      </div>
      <div class="panel-body">
        <div class="">
            <select name="cate_status" id="input" class="form-control" required="required" multiple="">
                <optgroup label="Thể loại">
                    <option value="1" selected>Công khai</option>
                    <option value="2">Riêng tư</option>
                </optgroup>
            </select>
        </div>
    </div>
    </div>
    <div class="panel panel-default list_item">
        <div class="panel-heading">
          <h3 class="panel-title">Bật tắt sub-menu</h3>
      </div>
      <div class="panel-body">
        <div class="">
            <select name="cate_has_submenu" id="input" class="form-control" required="required">
                <optgroup label="Bật tắt sub-menu">
                    <option value="1" selected>Tắt</option>
                    <option value="2">Bật</option>
                </optgroup>
            </select>
        </div>
    </div>
    </div>
    <div class="panel panel-default list_item">
        <div class="panel-heading">
          <h3 class="panel-title">Menu mục</h3>
      </div>
      <div class="panel-body">
        <div class="">
            <select name="cate_type2" id="input" class="form-control" multiple="">
                <optgroup label="Loại menu">
                    <option value="0" selected>Không chọn</option>
                    <option value="1">Primary Menu</option>
                    <option value="2">Left Menu</option>
                </optgroup>
            </select>
        </div>
    </div>
    </div>
    <div class="panel panel-default list_item">
        <div class="panel-heading">
          <h3 class="panel-title">Hình ảnh</h3>
      </div>
      <div class="panel-body">
        <a onclick="openPopup()">Upload</a>
        <input name="news_image" id="url1" type="hidden">
        <div id="output"></div>
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
  var editor = CKEDITOR.replace( 'cate_info', {
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?Type=Images',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserWindowWidth : '1000',
    filebrowserWindowHeight : '700'
} );
    function openPopup() {
        CKFinder.popup({
            chooseFiles: true,
            onInit: function (finder) {
                finder.on('files:choose', function (evt) {
                    var file = evt.data.files.first();
                    document.getElementById('url1').value = file.getUrl();
                    var output = document.getElementById( 'output' );
                    output.innerHTML = '<img src='+file.getUrl()+' class="img-responsive" />'
                });
                finder.on('file:choose:resizedImage', function (evt) {
                    document.getElementById('url1').value = evt.data.resizedUrl;
                    var output = document.getElementById( 'output' );
                    output.innerHTML = '<img src='+evt.data.resizedUrl+' class="img-responsive" />'
                });
            }
        });
    }
  </script>
</script>
@endsection
