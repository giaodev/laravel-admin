<nav class="navbar navbar-default" role="navigation" id="primary_menu">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Dichvuweb247.net</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
            @if($menu)
            @foreach($menu as $value)
            @if($value->cate_parent == 0)
            <li {!! (Request::segment(1) == $value->cate_slug.".html") ? "class='active'" : "" !!}><a href="{{ route('check_slug', ['slug' => $value->cate_slug]) }}">{{ $value->cate_name }} {!! ($value->cate_has_submenu == 2) ? '<span class="caret"></span>' : '' !!}</a>
                @if($value->cate_has_submenu == 2)
                <ul class="sub-menu">
                    @foreach($menu as $value2)
                    @if($value2['cate_parent'] == $value->id)
                    <a href="{{ route('check_slug', ['slug' => $value2->cate_slug]) }}">{{ $value2->cate_name }}</a>
                    @endif
                    @endforeach
                </ul>
                @endif
            </li>
            @endif
            @endforeach
            @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
