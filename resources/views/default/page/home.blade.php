@extends('default.master')

@section('title', $title)
@section('giaovn_header')
@endsection
@section('banner')
@include('default.module.banner')
@endsection

@section('content')
<div class="homepage">
    <h1 class="_title">Dịch vụ thiết kế website chuyên nghiệp tại Hà Nội - Bảo hành trọn đời</h1>
    <div class="line"></div>
    <div class="camket">
      <div class="row">
        @if($icon)
        @foreach($icon as $item)
        <div class="col-sm-6 col-md-4 ck_item">
          <div class="thumbnail">
            <img data-src="{{ $item->images_avatar }}" alt="{{ $item->images_title }}">
            <div class="caption">
              <h3>{{ $item->images_title }}</h3>
              <p>{{ $item->images_description }}</p>
            </div>
          </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>
    <div class="du_an">
      <h2 class="_title"><p>Khách hàng sử dụng dịch vụ của chúng tôi</p>
        <p class="help-block small">Đây là các dự án độc quyền của khách hàng - Cam kết không sao chép hay bán lại cho bên thứ ba</p></h2>
        <div class="line"></div>
      <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-3">
          <div class="thumbnail">
            <img src="/frontend/images/tueviet.jpg" alt="...">
            <div class="caption">
              <h3>Tạp chí Tuệ Việt</h3>
              <p>Công ty TNHH Tuệ Việt 88</p>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3">
          <div class="thumbnail">
            <img src="/frontend/images/reeftiger.jpg" alt="...">
            <div class="caption">
              <h3 class="medium">Reef Tiger</h3>
              <p>Công ty TNHH XNK Hải Hiệp</p>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3">
          <div class="thumbnail">
            <img src="/frontend/images/nongnghiepfarm.jpg" alt="...">
            <div class="caption">
              <h3>Nông Nghiệp Farm</h3>
              <p>Học viện nông nghiệp Việt Nam</p>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3">
          <div class="thumbnail">
            <img src="/frontend/images/ziczac.jpg" alt="...">
            <div class="caption">
              <h3>Ziczac</h3>
              <p>Công ty Cổ phần Kiến trúc Ziczac</p>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-xs-6col-sm-6 col-md-3">
          <div class="thumbnail">
            <img src="/frontend/images/sonotolezzon.jpg" alt="...">
            <div class="caption">
              <h3>Sơn Ô Tô Lezzon</h3>
              <p>Công ty TNHH TM Sơn Lezzon</p>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3">
          <div class="thumbnail">
            <img src="/frontend/images/vosongiare.jpg" alt="...">
            <div class="caption">
              <h3>Vỏ son giá rẻ</h3>
              <p>Chuyên sỉ lẻ vỏ son giá rẻ</p>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3">
          <div class="thumbnail">
            <img src="/frontend/images/fidelio.jpg" alt="...">
            <div class="caption">
              <h3>Fidelio Tea</h3>
              <p>Trà sữa Fidelio</p>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3">
          <div class="thumbnail">
            <img src="/frontend/images/chibica.jpg" alt="...">
            <div class="caption">
              <h3>Chibica</h3>
              <p>Đồ chơi trẻ em</p>
            </div>
          </div>
        </div>

      </div>
      <div class="xemthem" align="center">
        <a href="" class="btn btn-danger">Xem thêm dự án</a>
      </div>
    </div>
    <hr>

    <div class="bang_gia">
      <h2 class="_title">Bảng giá dịch vụ web 247</h2>
      <div class="line"></div>
      <div class="row">
        <div class="col-sm-4">
          <div class="panel panel-default bang_gia_1">
            <div class="panel-heading"><h3 class="panel-title">Cơ bản</h3></div>
            <div class="panel-body">
              <div class="price"><span>4.900.000 VNĐ</span></div>
              <table class="table">
                <tr><th>Giao diện</th><td>Theo giao diện sẵn</td></tr>
                <tr><th>Thời gian</th><td>3-5 ngày</td></tr>
                <tr><th>Tên miền</th><td>.com hoặc .net</td></tr>
                <tr><th>Hosting</th><td>1GB SSD</td></tr>
                <tr><th>Tư vấn Marketing</th><td><span class="glyphicon glyphicon-remove-circle"></span></td></tr>
                <tr><th>Banner</th><td>Free 2 Banner</td></tr>
                <tr><th>Đăng sản phẩm</th><td>30 sản phẩm</td></tr>
                <tr><th>Chuẩn SEO</th><td><span class="glyphicon glyphicon-ok-sign"></span></td></tr>
                <tr><th>SSL</th><td><span class="glyphicon glyphicon-ok-sign"></span></td></tr>
                <tr><th>Đa ngôn ngữ</th><td><span class="glyphicon glyphicon-remove-circle"></span></td></tr>
                <tr><th>Live chat</th><td><span class="glyphicon glyphicon-ok-sign"></span></td></tr>
                <tr><th>Cách sử dụng</th><td><span class="glyphicon glyphicon-ok-sign"></span></td></tr>
                <tr><th>Bảo hành</th><td><span class="glyphicon glyphicon-ok-sign"></span></td></tr>
                <tr><th>Backup</th><td>Hàng ngày</td></tr>
              </table>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="panel panel-default bang_gia_2">
            <div class="panel-heading"><h3 class="panel-title">Nâng cao</h3></div>
            <div class="panel-body">
              <div class="price"><span>> 7.600.000 VNĐ</span></div>
             <table class="table">
              <tr><th>Giao diện</th><td>Theo yêu cầu</td></tr>
              <tr><th>Thời gian</th><td>7-10 ngày</td></tr>
               <tr><th>Tên miền</th><td>.com hoặc .net</td></tr>
               <tr><th>Hosting</th><td>2GB SSD</td></tr>
               <tr><th>Tư vấn Marketing</th><td><span class="glyphicon glyphicon-ok-sign"></span></td></tr>
               <tr><th>Banner</th><td>Free 3 Banner</td></tr>
               <tr><th>Đăng sản phẩm</th><td>60 sản phẩm</td></tr>
               <tr><th>Chuẩn SEO</th><td><span class="glyphicon glyphicon-ok-sign"></span></td></tr>
               <tr><th>SSL</th><td><span class="glyphicon glyphicon-ok-sign"></span></td></tr>
               <tr><th>Đa ngôn ngữ</th><td><span class="glyphicon glyphicon-remove-circle"></span></td></tr>
               <tr><th>Live chat</th><td><span class="glyphicon glyphicon-ok-sign"></span></td></tr>
               <tr><th>Cách sử dụng</th><td><span class="glyphicon glyphicon-ok-sign"></span></td></tr>
               <tr><th>Bảo hành</th><td><span class="glyphicon glyphicon-ok-sign"></span></td></tr>
              <tr><th>Backup</th><td>Hàng ngày</td></tr>
             </table>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="panel panel-default bang_gia_3">
            <div class="panel-heading"><h3 class="panel-title">Cao cấp</h3></div>
            <div class="panel-body">
              <div class="price"><span>> 15.000.000 VNĐ</span></div>
              <table class="table">
                <tr><th>Giao diện</th><td>Chuyên nghiệp</td></tr>
                <tr><th>Thời gian</th><td>15-20 ngày</td></tr>
                <tr><th>Tên miền</th><td>.com hoặc .net</td></tr>
                <tr><th>Hosting</th><td>3GB SSD</td></tr>
                <tr><th>Tư vấn Marketing</th><td><span class="glyphicon glyphicon-ok-sign"></span></td></tr>
                <tr><th>Banner</th><td>Free 4 Banner</td></tr>
                <tr><th>Đăng sản phẩm</th><td>120 sản phẩm</td></tr>
                <tr><th>Chuẩn SEO</th><td><span class="glyphicon glyphicon-ok-sign"></span></td></tr>
                <tr><th>SSL</th><td><span class="glyphicon glyphicon-ok-sign"></span></td></tr>
                <tr><th>Đa ngôn ngữ</th><td><span class="glyphicon glyphicon-ok-sign"></span></td></tr>
                <tr><th>Live chat</th><td><span class="glyphicon glyphicon-ok-sign"></span></td></tr>
                <tr><th>Cách sử dụng</th><td><span class="glyphicon glyphicon-ok-sign"></span></td></tr>
                <tr><th>Bảo hành</th><td><span class="glyphicon glyphicon-ok-sign"></span></td></tr>
                <tr><th>Backup</th><td>Hàng ngày</td></tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end bang gia -->
    <div class="chinh_sach">
      <h2 class="_title">Dịch vụ khác</h2>
      <div class="line"></div>
      <div class="row news">


        <div class="col-sm-12 col-md-6 item_m item">
          <div class="thumbnail">
            <img src="https://via.placeholder.com/600x400/" alt="...">
            <div class="caption">
              <h3>Dịch vụ chạy quảng cáo Google ADS ngân sách cực tốt giá ổn</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae cupiditate accusamus vero sapiente. Unde dicta cum, veritatis rem voluptatum. Minima alias laborum reiciendis odio esse quibusdam, sint aperiam. Incidunt, earum.</p>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 item_t item">
          <div class="thumbnail">
            <img src="https://via.placeholder.com/300x200/" alt="...">
            <div class="caption">
              <h3>Dịch vụ viết Content theo yêu cầu giá hợp lý nhất bây giờ</h3>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 item_t item">
          <div class="thumbnail">
            <img src="https://via.placeholder.com/300x200/" alt="...">
            <div class="caption">
              <h3>Dịch vụ quản trị website giá rẻ dành cho doanh nghiệp</h3>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 item_t">
          <div class="thumbnail">
            <img src="https://via.placeholder.com/300x200/" alt="...">
            <div class="caption">
              <h3>Dịch vụ SEO Website đa lĩnh vực, đa ngành nghề</h3>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 item_t item">
          <div class="thumbnail">
            <img src="https://via.placeholder.com/300x200/" alt="...">
            <div class="caption">
              <h3>Dịch vụ SEO Website đa lĩnh vực ngân sách thấp</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('giaovn_footer')
@endsection
