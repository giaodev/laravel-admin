@extends('default.master')

@section('title', $title)

@section('content')
  <div class="single-news pdt30">
    <div class="row">
      <div class="col-sm-9 article_news">
        <h1 class="title">{{ $data->news_title }}</h1>
        <div class="content">
          {!! $data->news_content !!}
        </div>
      </div>
      <div class="sidebar">
          <div class="col-sm-3">
             <ul class="nav nav-pills nav-stacked sidebar-product">
              <h3>Danh mục sản phẩm</h3>
              @if($list_brand)
              @foreach($list_brand as $val)
              <li><a href="{{ route('check_slug', ['slug' => $val->cate_slug]) }}"><span class="glyphicon glyphicon-circle-arrow-right"></span> {{ $val->cate_name }}</a></li>
              @endforeach
              @endif
          </ul>
          </div>
          <div class="col-sm-3">
            <ul class="nav nav-pills nav-stacked sidebar-product">
                  <h3>Hỗ trợ trực tuyến</h3>
                  <li><a href="#"><b><span class="glyphicon glyphicon-earphone"></span> Hotline:</b> 0978.432.882</a></li>
                  <li><a href="#"><b><span class="glyphicon glyphicon-earphone"></span> Hotline:</b> 0978.432.882</a></li>
                  <li><a href="#"><b><span class="glyphicon glyphicon-earphone"></span> Hotline:</b> 0978.432.882</a></li>
              </ul>
          </div>
      </div>
    </div>
  </div>
@endsection
