@extends('admin.master')
@section('title', $title)
@section('content')
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $title }}</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" action="{{ route('category.add') }}" method="post">
                <div class="col-sm-8">
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
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="cate_type" class=" control-label">Loại chuyên mục</label>
                        <select name="cate_type" id="input" class="form-control" required="required" multiple="">
                            <optgroup label="Thể loại">
                                <option value="1">Sản phẩm</option>
                                <option value="2">Bài viết</option>
                                <option value="3">Trang</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cate_status" class=" control-label">Trạng thái</label>
                        <select name="cate_status" id="input" class="form-control" required="required" multiple="">
                            <optgroup label="Thể loại">
                                <option value="1" selected>Công khai</option>
                                <option value="2">Riêng tư</option>
                            </optgroup>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cate_type2" class=" control-label">Menu mục</label>
                        <select name="cate_type2" id="input" class="form-control" multiple="">
                            <optgroup label="Loại menu">
                                <option value="1">Primary Menu</option>
                                <option value="2">Left Menu</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
@section('g_footer')
<script src="ckeditor/ckeditor.js"></script>
<script>
  var editor = CKEDITOR.replace( 'cate_info', {
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?Type=Images',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserWindowWidth : '1000',
    filebrowserWindowHeight : '700'
} );
</script>
@endsection
