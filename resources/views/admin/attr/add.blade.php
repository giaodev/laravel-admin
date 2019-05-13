@extends('admin.master')
@section('title', $title)
@section('content')
<div class="">
    <div class="panel panel-default col-sm-8">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $title }}</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <form class="form-horizontal" role="form" action="{{ route('category.add') }}" method="post">
                        @include('status.errors')
                        @include('status.mess')
                        @csrf
                        <div class="form-group">
                            <label for="cate_name" class="col-sm-4 control-label">Chuyên mục</label>
                            <div class="col-sm-8">
                                <select name="cate_parent" id="input" class="form-control" required="required">
                                    <option value="0">Chuyên mục chính</option>
                                    {{ callMenu($listCate) }}
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cate_name" class="col-sm-4 control-label">Tên chuyên mục</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="cate_name" id="cate_name"
                                placeholder="Tên chuyên mục" value="{{ old('cate_name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cate_slug" class="col-sm-4 control-label">Đường dẫn</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="cate_slug" id="cate_slug"
                                placeholder="Đường dẫn" value="{{ old('cate_slug') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cate_order" class="col-sm-4 control-label">Thứ tự hiển thị</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="cate_order" id="cate_order"
                                placeholder="Thứ tự hiển thị" value="{{ old('cate_order') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cate_description" class="col-sm-4 control-label">Mô tả ngắn</label>
                            <div class="col-sm-8">
                                <textarea name="cate_description" id="cate_description" class="form-control"
                                rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select name="cate_type" id="input" class="form-control" required="required" multiple="">
                                <optgroup label="Thể loại">
                                    <option value="1">Sản phẩm</option>
                                    <option value="2">Bài viết</option>
                                    <option value="3">Trang</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="cate_status" id="input" class="form-control" required="required" multiple="">
                                <optgroup label="Thể loại">
                                    <option value="1" selected>Công khai</option>
                                    <option value="2">Riêng tư</option>
                                </optgroup>
                            </select>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

