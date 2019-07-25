@extends('default.master')

@section('title', $title)

@section('content')
  <div class="news pdt30">
  <div class="row">
    @if($news)
      @foreach($news as $value)
       <div class="col-sm-6 col-md-4">
         <a class="thumbnail" href="{{ route('check_slug',['slug' => $value->news_slug]) }}">
        <img data-src="{{ $value->news_image }}" alt="{{ $value->news_title }}" class="img-responsive">
           <div class="caption">
             <h3>{{ $value->news_title }}</h3>
             <p>{{ Str::limit($value->news_description,'100','..') }}</p>
           </div>
         </a>
       </div>
      @endforeach
    @endif
  </div>
  </div>
@endsection
