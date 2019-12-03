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
  <meta property="og:url" content="{{ (isset($url) && $url != "") ? asset($url).".html" : asset('/') }}" />
  <meta property="og:type" content="product" />
  <meta property="og:title" content="{{ (isset($title)) ? $title : "" }}" />
  <meta property="og:description" content="{{ (isset($description)) ? $description : "" }}" />
   <meta property="og:image" content="{{ (isset($og_image)) ? asset($og_image) : asset($setting->homepage_image) }}" />
  <meta property="og:site_name" content="{{ asset('/') }}" />
  <meta property="fb:admins" content="" />
  <!-- End Facebook Add the following three tags inside head -->

  <!-- Bootstrap -->
  <link href="gapp/css/bootstrap.min.css" rel="stylesheet">
  <link href="frontend/css/style.css" rel="stylesheet">
  <link href="frontend/css/lightbox.min.css" rel="stylesheet">
  @yield('giaovn_header')

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="@yield('body_class')">
    <header>
      <div class="jumbotron jumbotron-header">
        <div class="container">
          <div class="col-xs-12 col-sm-4 logo">
            <a href="{{ asset('/') }}" title="{{ $setting->homepage_title }}"><img src="{{ $setting->logo }}" alt="{{ $setting->homepage_title }}" width="100"></a>
          </div>
          <div class="col-xs-12 col-sm-8 quang_cao">
              <img src="{{ $quang_cao->images_avatar }}" alt="" class="img-responsive">
          </div>
        </div>
      </div>
        @include('default/module/menu')
        @include('default/module/banner')
    <div class="container">
      <main>
        @yield('content')
      </main>
    </div>
      <footer>
        <div id="footer">
          <div class="container">
            <div class="row">
              @if($footer)
              @foreach($footer as $f)
              <div class="col-md-6">
                {!! ($f->widget_title != "") ? '<h3>'.$f->widget_title.'</h3>' : '' !!}
                <div class="f_content">
                  {!! $f->widget_content !!}
                </div>
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
    <script src="frontend/js/jquery.lazyloadxt.js"></script>
    <script src="frontend/js/lightbox.min.js"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0"></script>
    @yield('giaovn_footer')
  </body>
  </html>
