@extends('admin.master')
@section('title', $title)
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">{{ $title }}</h3>
  </div>
  <div class="panel-body">
    Panel content
  </div>
</div>
@endsection

