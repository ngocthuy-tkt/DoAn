<!DOCTYPE html>
<html lang="en">
<head>
    <title> @yield('page_title') </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('giaodien/css/style.css')}}">
</head>
<body>

@include('layouts.header')
<div class="content" id="content">
    @yield('content')
</div>

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <p class="title">Giới thiệu</p>
                        <p><a href="" class="link_ft">Giới thiệu Tiki</a></p>
                        <p><a href="" class="link_ft">Tuyển Dụng</a></p>
                        <p><a href="" class="link_ft">Chính sách bảo mật thanh toán</a></p>
                        <p><a href="" class="link_ft">Chính sách bảo mật thông tin cá nhân</a></p>
                        <p><a href="" class="link_ft">Chính sách giải quyết khiếu nại</a></p>

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <p class="title">Hỗ trợ khách hàng</p>
                        <p><a href="" class="link_ft">Điều khoản sử dụng</a></p>
                        <p><a href="" class="link_ft">Hội Sách Online</a></p>
                        <p><a href="" class="link_ft">Giới thiệu Tiki Xu</a></p>
                        <p><a href="" class="link_ft">Tiki Tư Vấn</a></p>
                        <p><a href="" class="link_ft">Ưu đãi doanh nghiệp</a></p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <p class="title">Kết nối với chúng tôi</p>
                        <div class="social-conn">
                            <a href="https://www.facebook.com/" target="_blank" title="Facebook">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="https://www.youtube.com/" target="_blank" title="Youtube">
                                <i class="fa fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                <p class="title">Liên hệ</p>
                <p>Trụ sở chính: 69 Cô lô nhuê, phường Đức Thắng, quận Bắc Từ Liêm, TP. Hà Nội</p>
                <p>Liên hệ: 19001000</p>
                <p>8h30 - 17h30 (Thứ 2 - Thứ 6)</p>
                <p>8h - 12h (Thứ 7)</p>
                <p></p></div>
        </div>
    </div>
</div>

<!--  end footer  -->
<script type="text/javascript" src="{{asset('bootstrap/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/script.js')}}"></script>
@yield('script')
</body>
</html>