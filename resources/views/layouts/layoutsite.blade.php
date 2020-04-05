<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    {{-- /* Bootstrap css */ --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.min.css') }}">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <!--load all styles -->

    <style>
        @keyframes dropdown__box {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes identifier__spinning {
            from {
                opacity: 0;
                transform: scale(0);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .dropdown__animation {
            -webkit-animation: dropdown__box 1s ease-in-out;
            /* Safari 4+ */
            -moz-animation: dropdown__box 1s ease-in-out;
            /* Fx 5+ */
            -o-animation: dropdown__box 1s ease-in-out;
            /* Opera 12+ */
            animation: dropdown__box 1s ease-in-out;
            /* IE 10+, Fx 29+ */
        }

        .identifier__spinning {
            -webkit-animation: identifier__spinning 0.5s ease-in;
            /* Safari 4+ */
            -moz-animation: identifier__spinning 0.5s ease-in;
            /* Fx 5+ */
            -o-animation: identifier__spinning 0.5s ease-in;
            /* Opera 12+ */
            animation: identifier__spinning 0.5s ease-in;
        }

        .header-top {
            background-image: url(http://daotao1.stu.edu.vn/MessageFile/BANNER-STU.png);
            height: 120px;
            text-align: center;
            align-content: center;
        }

        .main__notification {
            background-color: rgba(126, 122, 122, 0.589);
            min-height: 700px;
        }

        .footer__container {
            background-color: rgba(63, 81, 181, 0.9);
            min-height: 200px;
        }

        .col__footer {
            min-height: 200px;
            border: 2px solid;
        }

        .col__notification {
            min-height: 35px;
            background-color: royalblue;
        }

        .footer__coppyright {
            border-top: 3px solid black;
            background-color: rgba(63, 81, 181, 1);
            min-height: 30px;
        }

        .row__footer {
            text-align: center;
            align-items: center;
        }

        .col__coppyright {
            text-align: center;
            align-items: center;
        }

        .navbar {
            background-color: rgb(63, 81, 181) !important;
        }

        body {
            background-color: #F5F5F5;
        }

        .dropdown__menu-width {
            min-width: 300px;
            min-height: 300px;
            width: 30% !important;
            height: 30% !important;
        }

        .border__triangle::before {
            content: "";
            border: 20px solid;
            border-color: transparent transparent white transparent;
            position: absolute;
            left: 34px;
            top: -30px;
        }

        .border__login::before {
            content: "";
            border: 20px solid;
            border-color: transparent transparent white transparent;
            position: absolute;
            right: 30px;
            top: -30px;
        }

        .nav__bar-header {
            border-top: 8px solid rebeccapurple;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    @includeIf('modul.modalLogin')
    <header>
        <div class="container-fluid">

            <div class="row header-top">
                <div class="col-12 .col-md-8">1140px x 120px</div>

            </div>

        </div>
        <div class="my-3"></div>
        <div class="row nav__bar-header-box">
            <div class="col col__navbar-header">

                <!--Navbar -->
                <nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color nav__bar-header">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home
            <span class="sr-only">(current)</span>
          </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Pricing</a>
                            </li>
                            <li class="nav-item dropdown dropdown__notification">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thông Báo
          </a>
                                <div class="dropdown-menu dropdown-default dropdown__menu-width border__triangle dropdown__animation" aria-labelledby="navbarDropdownMenuLink-333">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto nav-flex-icons">
                            <li class="nav-item">
                                <a class="nav-link waves-effect waves-light">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link waves-effect waves-light">
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-users"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-default border__login dropdown__animation" aria-labelledby="navbarDropdownMenuLink-333">
                                    <a class="dropdown-item" data-toggle="modal" data-target="#modal__login">
                                        Đăng Nhập
                                   </a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!--/.Navbar -->
            </div>
        </div>

    </header>

    <main>
        <div class="my-3"></div>
        <div class="container main__notification">
            <div class="row">
                <div class="col col__notification">Thông Báo Tin Quản Lý Phòng Đào Tạo</div>
            </div>
            <div class="row"></div>

        </div>
    </main>

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
{{-- <!--load all styles --> --}}
<script src="{{ asset('js/jquery-3.4.1.slim.min.js') }}" ></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script>
    $('#modal__login').modal('options');
    var options = {
        'backdrop': 'static',
        'keyboard': true,
        'show': true,
        'focus': false
    };
</script>

</html>
