<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ asset('/') }}">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="gapp/css/bootstrap.min.css" rel="stylesheet">
    <link href="adm/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
@yield('g_head')
</head>
<body>
        <nav class="navbar navbar-default" role="navigation" id="navbar">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/" target="_blank">Xem giao diện</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                </ul>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->username }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="divider"></li>
                            <li><a href="logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="main">

    @section('sidebar')
    <div class="col-sm-2">
    <ul class="nav nav-pills nav-stacked left-menu">
        <li><img src="adm/images/logo.png" alt="..." class="img-responsive avatar-user"></li>
        <li><a href="{{ route('home.index') }}"><span class="glyphicon glyphicon-dashboard"></span> Trang Chủ</a></li>
        <li class="dropdown">
          <a href="{{ route('news.index') }}" class="dropdown-toggle"> <span class="glyphicon glyphicon-plus"></span> Bài viết <span class="caret"></span></a>
          <ul class="dropdown-menu">
                <li><a href="{{ route('news.add') }}">Đăng bài viết</a></li>
                <li><a href="{{ route('tag.index') }}">Thẻ</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="{{ route('category.index') }}" class="dropdown-toggle"><span class="glyphicon glyphicon-list"></span> Chuyên mục <span class="caret"></span></a>
          <ul class="dropdown-menu">
                <li><a href="{{ route('category.add') }}">Thêm chuyên mục</a></li>
                <li><a href="{{ route('category.show') }}">Danh mục hiển thị</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="{{ route('product.index') }}" class="dropdown-toggle"><span class="glyphicon glyphicon-plus"></span> Đăng BĐS <span class="caret"></span></a>
          <ul class="dropdown-menu">
                <li><a href="{{ route('product.add') }}">Thêm mới</a></li>
                <li><a href="{{ route('attr.index') }}">Thuộc tính</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="{{ route('image.index') }}" class="dropdown-toggle"><span class="glyphicon glyphicon-picture"></span> Hình ảnh <span class="caret"></span></a>
          <ul class="dropdown-menu">
                <li><a href="{{ route('image.add') }}">Thêm mới</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="{{ route('widget.index') }}" class="dropdown-toggle"><span class="glyphicon glyphicon-asterisk"></span> Widget <span class="caret"></span></a>
          <ul class="dropdown-menu">
                <li><a href="{{ route('widget.add') }}">Thêm widget</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="" class="dropdown-toggle"><span class="glyphicon glyphicon-asterisk"></span> Giao diện <span class="caret"></span></a>
          <ul class="dropdown-menu">
                <li><a href="">Trang chủ</a></li>
                <li><a href="">Sản phẩm</a></li>
                <li><a href="">Bài viết</a></li>
                <li><a href="">Trang</a></li>
                <li><a href="">Giỏ hàng</a></li>
                <li><a href="">Tìm kiếm</a></li>
          </ul>
        </li>
        <li><a href="{{ route('orders.index') }}"><span class="glyphicon glyphicon-shopping-cart"></span> Đơn hàng</a>
        </li>
        <li class="dropdown">
          <a href="{{ route('user.index') }}" class="dropdown-toggle"><span class="glyphicon glyphicon-user"></span> Thành viên <span class="caret"></span></a>
          <ul class="dropdown-menu">
                <li><a href="{{ route('user.add') }}">Thêm thành viên</a></li>
          </ul>
        </li>
        <li><a href="{{ route('setting.index') }}"><span class="glyphicon glyphicon-cog"></span> Cấu hình</a></li>
    </ul>
    </div>
    @show
    <div class="col-sm-10">
        @yield('content')
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="gapp/js/bootstrap.min.js"></script>
<script src="adm/js/js_code.js"></script>
@yield('g_footer')
</body>
</html>
