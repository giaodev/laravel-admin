@extends('default.master')

@section('title', $title)

@section('banner')
@include('default.module.banner')
@endsection

@section('content')
<div class="icon pdt30">
    <div class="row">
        @if($icon)
        @foreach($icon as $value)
        <div class="col-xs-6 col-md-3">
            <a href="/">
                <img src="{{ $value->images_avatar }}" alt="{{ $value->images_title }}">
                <b>{{ $value->images_title }}</b>
                <span>{{ $value->images_description }}</span>
            </a>
        </div>
        @endforeach
        @endif
    </div>
</div>
<div class="product pdt30">
    <div class="row">
        @if($product_new)
            @foreach($product_new as $value)
              <div class="col-xs-6 col-sm-6 col-md-3 item">
                <a href="{{ route('check_slug',['slug' => $value->product_slug]) }}" title="{{ $value->product_title }}">
                  <img src="{{ $value->product_image }}" alt="{{ $value->product_title }}" title="{{ $value->product_title }}" class="img-responsive">
                  <div class="caption">
                    <h3 class="title">{{ $value->product_title }}</h3>
                    <p>
                        @if($value->product_promotion != 0)
                        <span class="old_price">{{ number_format($value->product_price) }}</span> <span class="promotion">{{ number_format($value->product_promotion) }}</span>
                        @else
                        <span class="price">{{ number_format($value->product_price) }}</span>
                        @endif
                        </p>
                  </div>
                </a>
              </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
