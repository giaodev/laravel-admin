@extends('default.master')

@section('title', $title)

@section('content')
  <div class="single-news pdt30">
    <div class="row">
      <div class="col-sm-9">
        <h1 class="title">{{ $data->news_title }}</h1>
        <div class="content">
          {!! $data->news_content !!}
        </div>
      </div>
    </div>
  </div>
@endsection
