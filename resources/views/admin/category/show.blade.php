@extends('admin.master')
@section('title', $title)
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $title }}</h3>
        </div>
        <div class="panel-body">
            @include('status.mess')
            @if($data)
                @foreach($data as $value)
                    @if($value->cate_parent == 0)
                        <ul class="menu">
                            <li class="main-menu">
                                <a href="{{ route('category.edit', [$value->id]) }}" class="btn btn-default">{{ $value->cate_name }}</a>
                                @foreach($data as $value2)
                                    @if($value2->cate_parent == $value->id)
                                        <ul>
                                            <li>
                                                <a href="{{ route('category.edit', [$value2->id]) }}" class="btn btn-default">{{ $value2->cate_name }}</a>
                                                @foreach($data as $value3)
                                                    @if($value3->cate_parent == $value2->id)
                                                        <ul>
                                                            <li>
                                                                <a href="{{ route('category.edit', [$value3->id]) }}"
                                                                   class="btn btn-default">{{ $value3->cate_name }}</a>
                                                            </li>
                                                        </ul>
                                                    @endif
                                                @endforeach
                                            </li>
                                        </ul>
                                    @endif
                                @endforeach
                            </li>
                        </ul>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
@endsection

