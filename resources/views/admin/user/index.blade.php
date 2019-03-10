@extends('admin.master')
@section('title', $title)
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">{{ $title }}</h3>
  </div>
  <div class="panel-body">
    @include('status.mess')
    <table class="table table-bordered">
      <thead>
        <tr class="active">
            <td>STT</td>
            <td>Username</td>
            <td>Email</td>
            <td>Thao tác</td>
        </tr>
      </thead>
      <tbody>
          @if($data)
            <?php $i = 0; ?>
            @foreach($data as $value)
            <?php $i++; ?>
            <tr>
            <td>{{ $i }}</td>
            <td>{{ $value->username }}</td>
            <td>{{ $value->email }}</td>
            <td><a class="btn btn-info" href="{{ route('user.edit',[$value->id]) }}"><span class="
              glyphicon glyphicon-edit"></span></a> <a class="btn btn-danger" href="{{ route('user.delete',[$value->id]) }}"><span class="glyphicon glyphicon-trash"></span></a></td>
            </tr>
            @endforeach
          @endif
      </tbody>
    </table>
  </div>
</div>
@endsection

