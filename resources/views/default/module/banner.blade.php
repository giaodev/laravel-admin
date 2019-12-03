<div class="jumbotron jumbotron-banner" style="background:url({{ asset($banner->images_avatar) }})">
  <div class="container">
    <form action="{{ route('filter') }}" method="get">
      <div class="row">
        <div class="col-sm-12 item_filter">
          <input type="text" name="keyword" class="form-control" placeholder="Nhập tên dự án cần tìm">
        </div>
        @if($filter)
        @foreach($filter as $val)
        @if($val->attr_parent == 0)
        <div class="col-xs-6 col-sm-2 item_filter">
            <select class="form-control" name="_{{ $val->attr_slug }}">
                <option selected="true" value="">{{ $val->attr_name }}</option>
                @foreach($filter as $val2)
                @if($val2->attr_parent == $val->id)
                <option value="{{ $val2->attr_slug }}" {{ (isset($_GET[$val->attr_slug]) && $_GET[$val->attr_slug] == $val2->attr_slug) ? "selected" : "" }}>{{ $val2->attr_name }}</option>
                @endif
                @endforeach
            </select>
        </div>
        @endif
        @endforeach
        @endif
        <div class="col-xs-12 col-sm-2 item_filter">
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
        </div>
    </form>
  </div>
</div>