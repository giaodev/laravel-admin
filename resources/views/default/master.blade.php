<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ asset('/') }}">
    <title>@yield('title')</title>

   <meta name="title" content="{{ (isset($title)) ? $title : "" }}"/>
    <meta name="description" content="{{ (isset($description)) ? $description : "" }}" />
    <meta http-equiv="REFRESH" content="968" />
    <meta name="keywords" content="" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="{{ $setting->favicon }}" rel="shortcut icon" type="image/x-icon" />
    <link href="{{ $setting->favicon }}" rel="icon" type="image/x-icon" />
    <meta content="Authentic Watch" name="copyright" />
    <meta content="Authentic Watch" name="author" />
    <meta name="robots" content="noodp,index,follow" />
    <meta name='revisit-after' content='1 days' />
    <meta content="vi_VN" property="og:locale" />
    <meta property="product:sale_price:currency" content="VND">
    <meta property="product:price:currency" content="VND">
    <meta property="product:availability" content="in stock">
    <meta property="product:condition" content="new">
    <meta property="product:brand" content="Authentic Watch">
    <meta content="www.altaVista.com, www.aol.com, www.infoseek.com, www.excite.com, www.hotbot.com, www.lycos.com, www.magellan.com, www.looksmart.com, www.cnet.com, www.voila.com, www.google.fr, www.google.com, www.google.com.vn, www.yahoo.fr, www.yahoo.com, www.alltheweb.com, www.msn.com, www.netscape.com, www.nomade.com"
        name="Search Engines" />
    <!-- Google+ Add the following three tags inside head -->
    <link href="{{ (isset($url) && $url != "") ? asset($url).".html" : asset('/') }}" rel="canonical" />
    <meta itemprop="name" content="{{ (isset($title)) ? $title : "" }}" />
    <meta itemprop="url" content="{{ (isset($url) && $url != "") ? asset($url).".html" : asset('/') }}" />
    <meta itemprop="description" content="{{ (isset($description)) ? $description : "" }}" />

    <!-- End Google+ Add the following three tags inside head -->
    <!-- Facebook Add the following three tags inside head -->
    <meta property="og:title" content="{{ (isset($title)) ? $title : "" }}" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="{{ (isset($url) && $url != "") ? asset($url).".html" : asset('/') }}" />

    <meta property="og:site_name" content="{{ asset('/') }}" />
    <meta property="og:description" content="{{ (isset($description)) ? $description : "" }}" />
    <meta property="fb:admins" content="" />
    <!-- End Facebook Add the following three tags inside head -->

    <!-- Bootstrap -->
    <link href="gapp/css/bootstrap.min.css" rel="stylesheet">
    <link href="frontend/css/style.css" rel="stylesheet">
    <link href="frontend/css/responsive.css" rel="stylesheet">

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
            <div class="row">
          <div class="col-sm-2 col-xs-12">
            <a href="/" title="Trang chủ"><img src="{{ ($setting->logo != "") ? $setting->logo : "" }}" alt="" height="100"></a>
          </div>
          <div class="col-sm-6 col-xs-12 search">
              <form action="" method="POST" role="form">
                  <input type="search" name="" id="input" class="form-control" value="" title="" placeholder="Nhập từ khóa cần tìm kiếm..">
                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
              </form>
          </div>
          <div class="col-sm-4 col-xs-12 hotline">
            <img src="/frontend/images/hotline.jpg" alt="" width="150">
            <span class="phone">0978.432.882</span>
        </div>
    </div>
        </div>
      </div>
        @include('default.module.menu')
            @yield('banner')
    </header>
    <main>
      <div class="container">
          @yield('content')
      </div>
    </main>
    <footer>
        <div class="jumbotron jumbotron-footer">
          <div class="container">
            <div class="row">
                @if($footer)
                    @foreach($footer as $foot)
                        <div class="col-sm-3 footer">
                            <h4>{{ $foot->widget_title }}</h4>
                            <div>{!! $foot->widget_content !!}</div>
                        </div>
                    @endforeach
                @endif
            </div>
          </div>
        </div>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="gapp/js/bootstrap.min.js"></script>
    @yield('script_footer')
  </body>
</html>
