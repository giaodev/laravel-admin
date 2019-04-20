<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ asset('/') }}">
    <title>{{ $title }}</title>

    <!-- Bootstrap -->
    <link href="gapp/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
        <div class="col-sm-4"></div>
        <div class="col-sm-4" style="margin-top:150px;">
            <form role="form" action="{{ route('login') }}" method="post">
                @include('status.errors')
                @include('status.mess')
                @csrf
              <div class="form-group">
                <label for="username">Tên đăng nhập</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Tên đăng nhập">
              </div>
              <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu">
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Ghi nhớ
                </label>
              </div>
              <button type="submit" class="btn btn-default">Đăng nhập</button>
            </form>
        </div>
        <div class="col-sm-4"></div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="gapp/js/bootstrap.min.js"></script>
  </body>
</html>
