@extends('default.master')

@section('title', $title)

@section('content')
<div class="product">
  <div class="row pdt30">
    @if($product)
    @foreach($product as $value)
    <div class="col-sm-6 col-md-3 item">
      <a href="{{ route('check_slug',['slug' => $value->product_slug]) }}">
        <img src="{{ $value->product_image }}" alt="{{ $value->product_title }}" class="img-responsive">
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
