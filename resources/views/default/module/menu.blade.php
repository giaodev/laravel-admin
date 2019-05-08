<nav class="navbar navbar-default navbar-primary" role="navigation">
  <div class="container">
    <div class="row">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li><a href="/">Trang chủ</a></li>
            @if($menu)
            @foreach($menu as $value)
            @if($value->cate_parent == 0)
            <li><a href="{{ route('check_slug', ['slug' => $value->cate_slug]) }}">{{ $value->cate_name }}</a>
                <ul class="sub-menu">
                    @foreach($menu as $value2)
                    @if($value2['cate_parent'] == $value->id)
                    <a href="{{ route('check_slug', ['slug' => $value2->cate_slug]) }}">{{ $value2->cate_name }}</a>
                    @endif
                    @endforeach
                </ul>
            </li>
            @endif
            @endforeach
            @endif
            <li><a href="{{ route('cart') }}"><span class="glyphicon glyphicon-shopping-cart"></span> Giỏ hàng ({{ Cart::getTotalQuantity() }})</a></li>
        </ul>
    </div><!-- /.navbar-collapse -->
</div>
</div><!-- /.container-fluid -->
</nav>
