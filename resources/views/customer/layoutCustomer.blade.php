<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{$title}}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/ShopNNP/public/Customer/images/customer_images/logoshop.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/ShopNNP/public/Customer/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/ShopNNP/public/Customer/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/ShopNNP/public/Customer/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/ShopNNP/public/Customer/fonts/linearicons-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/ShopNNP/public/Customer/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/ShopNNP/public/Customer/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/ShopNNP/public/Customer/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/ShopNNP/public/Customer/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/ShopNNP/public/Customer/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/ShopNNP/public/Customer/vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/ShopNNP/public/Customer/vendor/MagnificPopup/magnific-popup.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/ShopNNP/public/Customer/vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/ShopNNP/public/Customer/css/util.css">
    <link rel="stylesheet" type="text/css" href="/ShopNNP/public/Customer/css/main.css">
    <link rel="stylesheet" type="text/css" href="/ShopNNP/public/Customer/css/customer.css">
    <link rel="stylesheet" type="text/css" href="/ShopNNP/public/Customer/css/personal.css">
    <!--========================================================================================-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/ShopNNP/public/Admin/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/ShopNNP/public/Admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/ShopNNP/public/Admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/ShopNNP/public/Admin/dist/css/adminlte.min.css">
    <script src="/ShopNNP/public/Admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/ShopNNP/public/Admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jquery-validation -->
    <script src="/ShopNNP/public/Admin/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="/ShopNNP/public/Admin/plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/ShopNNP/public/Admin/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/ShopNNP/public/Admin/dist/js/demo.js"></script>
    <!--  script -->
    <script src="/ShopNNP/public/Admin/js/admin.js"></script>

     <!--========================================================================================-->

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!--===============================================================================================-->
</head>

<body class="animsition">

    <!-- Header -->
    <header>
        <!-- Header desktop -->
        <div class="container-menu-desktop">
            <!-- Topbar -->
            <div class="top-bar">
                <div class="content-topbar flex-sb-m h-full container">
                    <div class="left-top-bar">
                        ShopNNP đồng hành cùng bạn trên mọi chặng đường!
                    </div>


                </div>
            </div>

            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop container">

                    <!-- Logo desktop -->
                    <a href="{{route('home')}}" class="logo">
                        <img src="/ShopNNP/public/Customer/images/customer_images/logoshop.png" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li class="active-menu">
                                <a href="{{route('home')}}">Trang chủ</a>
                            </li>

                            <li>
                                <a href="{{route('product')}}">Shop</a>
                            </li>

                            <li>
                                <a href="blog.html">Blog</a>
                            </li>

                            <li>
                                <a href="about.html">About</a>
                            </li>

                            <li>
                                <a href="{{route('contact')}}">Kết nối</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <div class="flex-w h-full">
                            @if(Auth::check())
                                <a href="http://localhost:8080/ShopNNP/public/personal" class="flex-c-m  p-lr-10"  style="color: #333">
                                    {{$user->userLogin()->name}}
                                </a>
                                <a href="{{route('logout')}}" class="flex-c-m trans-04 p-lr-10" style="color: #333">
                                    Đăng xuất
                                </a>
                            @else
                                <a href="{{route('login')}}" class="flex-c-m trans-04 p-lr-10" style="color: #333">
                                    Đăng nhập
                                </a>
                                <a href="{{route('register')}}" class="flex-c-m trans-04 p-lr-10" style="color: #333">
                                    Đăng ký
                                </a>
                            @endif
                        </div>
{{--                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">--}}
{{--                            <i class="zmdi zmdi-search"></i>--}}
{{--                        </div>--}}

                        @if(Auth::check())
                        <a href="{{route('myCart')}}" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{$numCart}}">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </a>
                        @else
                        <div onclick="confirmLogin();" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{$numCart}}">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                        @endif
                    </div>
                </nav>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="{{route('home')}}"><img src="/ShopNNP/public/Customer/images/customer_images/logoshop.png" alt="IMG-LOGO"></a>
            </div>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                    <i class="zmdi zmdi-search"></i>
                </div>
                @if(Auth::check())
                <a href="{{route('myCart')}}" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{$numCart}}">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </a>
                @else
                <div onclick="confirmLogin();" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{$numCart}}">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>
                @endif

            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>


        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="topbar-mobile">
                <li>
                    <div class="left-top-bar">
                        ShopNNP đồng hành cùng bạn trên mọi chặng đường!
                    </div>
                </li>

                <li>
                    <div class="right-top-bar flex-w h-full">
                        @if(Auth::check())
                        <a href="" class="flex-c-m p-lr-10 trans-04">
                            {{$user->userLogin()->name}}
                        </a>
                        <a href="{{route('logout')}}" class="flex-c-m p-lr-10 trans-04">
                            Đăng xuất
                        </a>
                        @else
                        <a href="{{route('logout')}}" class="flex-c-m p-lr-10 trans-04">
                            Đăng nhập
                        </a>
                        <a href="{{route('logout')}}" class="flex-c-m p-lr-10 trans-04">
                            Đăng ký
                        </a>
                        @endif

                    </div>
                </li>
            </ul>

            <ul class="main-menu-m">
                <li>
                    <a href="{{route('home')}}">Trang chủ</a>
{{--                    <ul class="sub-menu-m">--}}
{{--                        <li><a href="index.html">Homepage 1</a></li>--}}
{{--                        <li><a href="home-02.html">Homepage 2</a></li>--}}
{{--                        <li><a href="home-03.html">Homepage 3</a></li>--}}
{{--                    </ul>--}}
{{--                    <span class="arrow-main-menu-m">--}}
{{--                        <i class="fa fa-angle-right" aria-hidden="true"></i>--}}
{{--                    </span>--}}
                </li>

                <li>
                    <a href="{{route('product')}}">Shop</a>
                </li>



                <li>
                    <a href="blog.html">Blog</a>
                </li>

                <li>
                    <a href="about.html">About</a>
                </li>

                <li>
                    <a href="{{route('contact')}}">Kết nối</a>
                </li>
            </ul>
        </div>

        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="/ShopNNP/public/Customer/images/icons/icon-close2.png" alt="CLOSE">
                </button>

                <form class="wrap-search-header flex-w p-l-15">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" name="search" placeholder="Search...">
                </form>
            </div>
        </div>
    </header>

    @yield('content')

    <!-- Footer -->
    <footer class="bg3 p-t-75 p-b-32">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        ShopNNP
                    </h4>
                    <ul>
                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Track Order
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Returns
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Shipping
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                FAQs
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Categories
                    </h4>

                    <ul>
                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Women
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Men
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Shoes
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Watches
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Help
                    </h4>

                    <ul>
                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Track Order
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Returns
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Shipping
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                FAQs
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        GET IN TOUCH
                    </h4>

                    <p class="stext-107 cl7 size-201">
                        Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
                    </p>

                    <div class="p-t-27">
                        <a href="https://www.facebook.com/nguyennhuphuong.242" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="https://www.instagram.com/nhu.phuong242" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-instagram"></i>
                        </a>

                        <a href="https://www.pinterest.com" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-pinterest-p"></i>
                        </a>
                    </div>
                </div>


            </div>

            <div class="p-t-40">
                <div class="flex-c-m flex-w p-b-18">
                    <a href="#" class="m-all-1">
                        <img src="/ShopNNP/public/Customer/images/icons/icon-pay-01.png" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="/ShopNNP/public/Customer/images/icons/icon-pay-02.png" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="/ShopNNP/public/Customer/images/icons/icon-pay-03.png" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="/ShopNNP/public/Customer/images/icons/icon-pay-04.png" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="/ShopNNP/public/Customer/images/icons/icon-pay-05.png" alt="ICON-PAY">
                    </a>
                </div>

                <p class="stext-107 cl6 txt-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | Made with by <a href="https://www.facebook.com/nguyennhuphuong.242" target="_blank">Nguyen Thi Nhu Phuong </a><i class="fa fa-heart-o" aria-hidden="true"></i>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

                </p>
            </div>
        </div>
    </footer>


    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>


    <!--===============================================================================================-->
    <script src="/ShopNNP/public/Customer/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="/ShopNNP/public/Customer/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="/ShopNNP/public/Customer/vendor/bootstrap/js/popper.js"></script>
    <script src="/ShopNNP/public/Customer/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="/ShopNNP/public/Customer/vendor/select2/select2.min.js"></script>
    <script>
        $(".js-select2").each(function() {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <!--===============================================================================================-->
    <script src="/ShopNNP/public/Customer/vendor/daterangepicker/moment.min.js"></script>
    <script src="/ShopNNP/public/Customer/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="/ShopNNP/public/Customer/vendor/slick/slick.min.js"></script>
    <script src="/ShopNNP/public/Customer/js/slick-custom.js"></script>
    <!--===============================================================================================-->
    <script src="/ShopNNP/public/Customer/vendor/parallax100/parallax100.js"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
    <script src="/ShopNNP/public/Customer/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
    <script>
        $('.gallery-lb').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade'
            });
        });
    </script>
    <!--===============================================================================================-->
    <script src="/ShopNNP/public/Customer/vendor/isotope/isotope.pkgd.min.js"></script>
    <!--===============================================================================================-->
    <script src="/ShopNNP/public/Customer/vendor/sweetalert/sweetalert.min.js"></script>
    <script>
        $('.js-addwish-b2').on('click', function(e) {
            e.preventDefault();
        });
    </script>
    <!--===============================================================================================-->
    <script src="/ShopNNP/public/Customer/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        $('.js-pscroll').each(function() {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function() {
                ps.update();
            })
        });
    </script>
    <!--===============================================================================================-->
    <script src="/ShopNNP/public/Customer/js/main.js"></script>
    <script src="/ShopNNP/public/Customer/js/customer.js"></script>

</body>

</html>
