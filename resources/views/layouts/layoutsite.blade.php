<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    {{-- /* Bootstrap css */ --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.min.css') }}">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    {{-- fonts google --}}
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap&subset=vietnamese" rel="stylesheet">

    <!--load all styles -->
    <link rel="stylesheet" href="{{ asset('css/layoutsite.css') }}">
    @yield('head')
</head>

<body>
    @includeIf('modul.modalLogin')
    <header>
        <div class="container-fluid">

            <div class="row header-top">
                <div class="col-md-12 header__top-logo">
                    <img src="{{ asset('image/baner-stu.jpg') }}" class="header__top-image-logo" alt="logo-banner">
                </div>
            </div>

        </div>
        <div class="my-3"></div>
        <div class="row nav__bar-header-box">
            <div class="col col__navbar-header">

                <!--Navbar -->
                <nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color nav__bar-header">
                    <a class="navbar-brand nav__logo" href="#">STU</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item ">
                                <a class="nav-link nav__link-href" href="{{ Route('home__Page') }}">Trang Chủ
                                        <span class="sr-only">(current)</span>
                                 </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav__link-href" href="{{ Route('registrationStudent') }}">đăng kí nhóm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav__link-href" href="#">Liên Hệ</a>
                            </li>
                            <li class="nav-item dropdown dropdown__notification">
                                <a class="nav-link dropdown-toggle nav__link-href" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thông Báo
                                 </a>
                                <div class="dropdown-menu dropdown-default dropdown__menu-width border__triangle dropdown__animation " aria-labelledby="navbarDropdownMenuLink-333">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto nav-flex-icons">
                            <li class="nav-item">
                                <a class="nav-link waves-effect waves-light nav__link-href">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link waves-effect waves-light nav__link-href">
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown nav__link-href">
                                <a class="nav-link dropdown-toggle nav__link-href" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-users"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-default border__login dropdown__animation nav__link-href" aria-labelledby="navbarDropdownMenuLink-333">
                                    <a class="dropdown-item" href="{{ Route('loginStudent') }}">Đăng Nhập SV</a>
                                    <a class="dropdown-item" href="{{URL::to('/admin')}}">Đăng nhập GV</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!--/.Navbar -->
            </div>
        </div>

    </header>

    @yield('main')

    <footer>
        <div class="my-3"></div>
        <div class="container-fluid footer__container">
            <div class="row row__footer">
                <div class="col col__footer">380 x 100</div>
                <div class="col col__footer">380 x 100</div>
                <div class="col col__footer">380 x 100</div>
            </div>
        </div>
        <div class="container-fluid footer__coppyright">
            <div class="row">
                <div class="col col__coppyright">© 2020 - Bản quyền thuộc về Phạm Minh Thiện</div>
            </div>
        </div>
    </footer>
    {{-- /* include modal */ --}}


</body>
<script defer src="./js/all.js"></script>
{{--
<!--load all styles -->--}}
<script src="{{ asset('js/jquery-3.4.1.slim.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@yield('script')

</html>
