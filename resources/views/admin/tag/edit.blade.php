@extends('admin.master')
@section('title', $title)
@section('content')
<div class="">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $title }}</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <form class="form-horizontal" role="form" action="{{ route('attr.edit', ['id' => $data->id]) }}"
                  method="post">
                  <div class="col-sm-8">
                    @include('status.errors')
                    @include('status.mess')
                    @csrf
                    <div class="form-group">
                        <label for="attr_parent" class="col-sm-4 control-label">Chuyên mục</label>
                        <div class="col-sm-8">
                            <select name="attr_parent" id="input" class="form-control" required="required">
                                <option value="0">Chuyên mục chính</option>
                                {{ callAttr($listAttr,0,"--",$data->attr_parent) }}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="attr_name" class="col-sm-4 control-label">Tên chuyên mục</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="attr_name" id="attr_name"
                            placeholder="Tên chuyên mục" value="{{ $data->attr_name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="attr_slug" class="col-sm-4 control-label">Đường dẫn</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="attr_slug" id="attr_slug"
                            placeholder="Đường dẫn" value="{{ $data->attr_slug }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="attr_orderby" class="col-sm-4 control-label">Thứ tự hiển thị</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="attr_orderby" id="attr_orderby"
                            placeholder="Thứ tự hiển thị" value="{{ $data->attr_orderby }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <select name="attr_active" id="input" class="form-control" required="required" multiple="">
                            <optgroup label="Thể loại">
                                <option value="1" {{ ($data->attr_active == 1) ? "selected" : "" }}>Công khai</option>
                                <option value="2" {{ ($data->attr_active == 2) ? "selected" : "" }}>Riêng tư</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
@endsection

