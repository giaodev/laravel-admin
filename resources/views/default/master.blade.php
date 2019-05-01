<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ asset('/') }}">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="gapp/css/bootstrap.min.css" rel="stylesheet">
    <link href="frontend/css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <header>
      <nav class="navbar navbar-default navbar-top" role="navigation">
        <div class="container">
            <ul class="nav navbar-nav">
              <li><a href="#"><span class="glyphicon glyphicon-time"></span> Chuyên đồng hồ Authentic - Đồng hồ chính hãng tại Việt Nam</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="tel:0978432882"><span class="glyphicon glyphicon-earphone"></span> Hotline: 0978.432.882</a></li>
              <li><a href=""><span class="glyphicon glyphicon-map-marker"></span> Địa chỉ: Số 2 Ngõ 98 Thái Hà, Trung Liệt, Đống Đa, Hà Nội</a></li>
            </ul>
        </div><!-- /.container-fluid -->
      </nav>
      <div class="jumbotron jumbotron-header">
        <div class="container">
          <div class="col-sm-2">
            <img src="{{ ($setting->logo != "") ? $setting->logo : "" }}" alt="" height="100">
          </div>
          <div class="col-sm-6 search">
              <form action="" method="POST" role="form">
                  <input type="search" name="" id="input" class="form-control" value="" title="" placeholder="Nhập từ khóa cần tìm kiếm..">
                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
              </form>
          </div>
          <div class="col-sm-4 hotline">
            <img src="/frontend/images/hotline.jpg" alt="" width="150">
            <span class="phone">0978.432.882</span>
        </div>
        </div>
      </div>
        @include('default.module.menu')
        <div class="container">
            @yield('banner')
        </div>
    </header>
    <main>
      <div class="container">
          @yield('content')
      </div>
    </main>
    <footer>

    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="gapp/js/bootstrap.min.js"></script>
    @yield('script_footer')
  </body>
</html>
