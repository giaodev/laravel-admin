@extends('default.master')

@section('title', $title)
@section('body_class', 'single_news')
@section('content')
  <div class="row single-news pdt30">
      <div class="col-sm-8 article_news">
        <div class="content-news">
          <h1 class="title">{{ $data->news_title }}</h1>
          {!! $data->news_content !!}
        </div>

        <div id="ctl31_HeaderContainer" class="tit_l">
            <h2><a><span style="white-space:nowrap;">Bài viết liên quan</span></a></h2>
        </div>
        <div style="clear: both;"></div>
        <div class="line_gr"></div>
        <div class="list-news">
        @if($related_news)
          @foreach($related_news as $value)
          <div class="item-news">
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
      </div>

      </div>
      <div class="list-sidebar col-xs-12 col-sm-4">
        @include('default.module.sidebar')
      </div>
  </div>
@endsection
