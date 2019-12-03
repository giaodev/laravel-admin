@extends('default.master')

@section('title', $title)

@section('content')
    <h1>{{ $category->cate_title }}</h1>
    <div class="content">
    	{!! $category->cate_info !!}
    </div>
@endsection
