<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Inance</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('client/css/bootstrap.css')}}" />
  <!-- font awesome style -->
  <link rel="stylesheet" type="text/css" href="{{asset('client/css/font-awesome.min.css')}}" />

  <!-- Custom styles for this template -->
  <link href="{{asset('client/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('client/css/responsive.css')}}" rel="stylesheet" />

</head>
<style>
  HTML CSSResult Skip Results Iframe
  EDIT ON
  /* Nút Dropdown*/
  .nut_dropdown {
    background-color: #0080ff;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
  }

  /* Thiết lập vị trí cho thẻ div với class dropdown*/
  .dropdown {
    position: relative;
    display: inline-block;
  }

  /* Nội dung Dropdown */
  .noidung_dropdown {
    /*Ẩn nội dụng các đường dẫn*/
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }

  /* Thiết kế style cho các đường dẫn tronng Dropdown */
  .noidung_dropdown a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  /* thay đổi màu background khi hover vào đường dẫn */
  .noidung_dropdown a:hover {background-color: #ddd;}

  /* hiển thị nội dung dropdown khi hover */
  .dropdown:hover .noidung_dropdown {display: block;}

  /* Thay đổi màu background cho nút khi được hover */
  .dropdown:hover .nut_dropdown {background-color: #00bfff;}

  /*Dùng Để hiển thị nội dung*/
  .hienThi {display:block;}
</style>
<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="header_top">
        <div class="container-fluid">
          <div class="contact_nav">
            <a href="">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
                Call : +01 123455678990
              </span>
            </a>
            <a href="">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>
                Email : demo@gmail.com
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="/">
              <span>
                Inance
              </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.register.index')}}">Đăng ký thợ</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="{{route('client.home')}}">Trang chủ <span class="sr-only">(current)</span></a>
                </li>
                {{-- <li class="nav-item">
                  <a class="nav-link" href="{{route('client.dich_vu')}}"> Giới thiệu</a>
                </li> --}}
                <li class="nav-item">
                  <a class="nav-link" href="{{route('client.dich_vu')}}">Dịch vụ</a>
                </li>
                <li class="nav-item">
                  @if (Auth::guard('user')->check() && Auth::guard('user')->user()->ID_Nhom == 3)
                    {{-- <a class="nav-link" href="{{route('client.logout')}}">Đăng xuất</a> --}}
                    <div class="dropdown">
                      <a class="nav-link" class="nut_dropdown">{{Auth::guard('user')->user()->HoTen}}</a>
                      <div class="noidung_dropdown">
                        <a href="{{route('client.profile')}}">Thông tin cá nhân</a>
                        <a href="{{route('client.yeucau.suachua')}}">Yêu cầu</a>
                        <a href="{{route('client.logout')}}" href="#">Đăng xuất</a>
                      </div>
                    </div>
                  @else
                    <a class="nav-link" href="{{route('client.login')}}">Đăng nhập</a>
                  @endif
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
 
    @yield('content')

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayDateYear"></span> All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <script src="{{asset('client/js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('client/js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('client/js/custom.js')}}"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->


</body>

</html>