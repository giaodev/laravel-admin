<div id="ctl31_HeaderContainer" class="tit_l">
    <h2><a><span style="white-space:nowrap;">Quy Hoạch Đông Anh</span></a></h2>
</div>
<div style="clear: both;"></div>
<div class="line_gr"></div>
<div class="sidebar">
	<div class="row">
	@foreach($news_sidebar as $val)
		<div class="col-sm-6 sidebar_news">
			<a href="{{ route('check_slug',['slug' => $val->news_slug]) }}"><img data-src="{{ asset($val->news_image) }}" alt="" class="img-responsive"></a>
			<h4><a href="{{ route('check_slug',['slug' => $val->news_slug]) }}">{{ $val->news_title }}</a></h4>

		</div>
	@endforeach
		<div class="clearfix"></div>
	</div>
</div>
<div class="sidebar">
	<div id="fb-root"></div>
	<div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="" data-width="" data-height="250" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
</div>
<div class="clearfix"></div>
<div id="ctl31_HeaderContainer" class="tit_l">
    <h2><a><span style="white-space:nowrap;">Quận Huyện Đông Anh</span></a></h2>
</div>
<div style="clear: both;"></div>
<div class="line_gr"></div>
<div class="sidebar">
	<ul>
		@foreach($left_menu as $val)
			<li><a href="{{ route('check_slug', ['slug' => $val->cate_slug]) }}">{{ $val->cate_name }}</a></li>
		@endforeach
	</ul>	
</div>
<div class="sidebar">
	{{-- <img data-src="{{ asset($cua_hang->images_avatar) }}" alt="" class="img-responsive"> --}}
</div>

<div id="ctl31_HeaderContainer" class="tit_l">
    <h2><a><span style="white-space:nowrap;">Quy Hoạch Đông Anh</span></a></h2>
</div>
<div style="clear: both;"></div>
<div class="line_gr"></div>
<div class="sidebar">
	<div class="row">
	@foreach($news_sidebar as $val)
		<div class="col-sm-6 sidebar_news">
			<a href="{{ route('check_slug',['slug' => $val->news_slug]) }}"><img data-src="{{ asset($val->news_image) }}" alt="" class="img-responsive"></a>
			<h4><a href="{{ route('check_slug',['slug' => $val->news_slug]) }}">{{ $val->news_title }}</a></h4>

		</div>
	@endforeach
		<div class="clearfix"></div>
	</div>
</div>