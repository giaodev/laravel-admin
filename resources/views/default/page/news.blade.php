@extends('default.master')

@section('title', $title)
@section('body_class', 'bai_viet_bds')
@section('content')
  <div class="row">
  <div class="list-news col-sm-8">
    <div id="ctl31_HeaderContainer" class="tit_l">
        <h2><a><span style="white-space:nowrap;">{{ $title }}</span></a></h2>
    </div>
    <div style="clear: both;"></div>
    <div class="line_gr"></div>
    @if($news)
      @foreach($news as $value)
      <div class="col-sm-12 item-news">
       <div class="row">
        <div class="col-sm-4">
         <a class="" href="{{ route('check_slug',['slug' => $value->news_slug]) }}">
        <img data-src="{{ $value->news_image }}" alt="{{ $value->news_title }}" class="avatar img-responsive"></a>
        </div>
           <div class="col-sm-8">
             <h3><a class="" href="{{ route('check_slug',['slug' => $value->news_slug]) }}">{{ $value->news_title }}</a></h3>
             <p>{{ Str::limit($value->news_description,'100','..') }}</p>
           </div>
       </div>
     </div>
      @endforeach
    @endif
    <div class="row">
        <div class="col-md-12 text-center">
            {{ $news->links() }}
        </div>
    </div>
  </div>

  <div class="list-sidebar col-xs-12 col-sm-4">
    @include('default.module.sidebar')
  </div>
  </div>

@endsection
