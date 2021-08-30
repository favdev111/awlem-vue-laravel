<!doctype html>
<html lang="en">


<!-- Mirrored from demo.dashboardpack.com/adminAssets/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 14 Jul 2019 09:52:54 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ __('General.Olum Admin Dashboard Login') }}</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="{{ url('./Panel/adminAssets/mainpro.css') }}" rel="stylesheet">
</head>

<body dir="rtl">
    <style>
        .lang-container {
            display: none
        }


        #slide {

            -webkit-animation: slide 2s forwards;
            -webkit-animation-delay: 1s;
            animation: slide 2s forwards;
            animation-delay: 1s;
        }

        @-webkit-keyframes slide {
            100% {
                background-size: 12em;
            }
        }

        @keyframes slide {
            100% {
                background-size: 12em;
            }
        }


    </style>

    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container" dir="rtl">
            <div class="h-100">
                <div class="h-100 no-gutters row">
                    <div class="d-none d-lg-block col-lg-4">
                        <div class="slider-light">
                            <div class="slick-slider">
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center"
                                        tabindex="-1">
                                        <div class="slide-img-bg"
                                            style="background-image: url({{ url('./Panel/adminAssets/assets/images/originals/first.jpg') }});">
                                        </div>
                                        <div class="slider-content">
                                            <h3></h3>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center"
                                        tabindex="-1">
                                        <div class="slide-img-bg"
                                            style="background-image: url({{ url('./Panel/adminAssets/assets/images/originals/secound.jpg') }});">
                                        </div>
                                        <div class="slider-content">
                                            <h3></h3>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center"
                                        tabindex="-1">
                                        <div class="slide-img-bg"
                                            style="background-image: url({{ url('./Panel/adminAssets/assets/images/originals/third.jpg') }});">
                                        </div>
                                        <div class="slider-content">
                                            <h3></h3>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
                        <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9 wrapperww">
                            <div id="slide" class="app-logo"></div>
                            <div>
                                {!! Form::open(['method' => 'post', 'action' => ['AdminLoginController@postlogin'],
                                'files' => false]) !!}
                                <div class="form-row">
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md">
                                        <div class="position-relative form-group ">
                                            <input name="email" id="exampleEmail" placeholder="البريد الألكتروني"
                                                type="email" class="form-control text-center">
                                        </div>
                                        <br>
                                        <div class="position-relative form-group">
                                            <input name="password" id="examplePassword" placeholder="كلمة المرور"
                                                type="password" class="form-control text-center">
                                        </div>
                                        <br>
                                        <div class="position-relative form-group lang-container">
                                            <label for="examplePassword" class="">Language</label>
                                            <select name="language" class="form-control">
                                                <option value="1">Arabic</option>
                                                <option value="2">English</option>
                                            </select>
                                        </div>
                                        <div class="position-relative form-group">
                                            <!--<a href="javascript:void(0);" class="btn-lg btn btn-link">Recover Password</a>-->
                                            <button class="btn btn-primary btn-lg form-control">تسجيل الدخول</button>
                                        </div>
                                    </div>
                                    <div class="col-md-1">

                                    </div>

                                </div>
                                <!--<div class="position-relative form-check">
                                        <input name="check" id="exampleCheck" type="checkbox" class="form-check-input">
                                        <label for="exampleCheck" class="form-check-label">Keep me logged in</label>
                                    </div>-->

                                {!! Form::Close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ url('./Panel/adminAssets/mainpro.js') }}"></script>
</body>

<!-- Mirrored from demo.dashboardpack.com/adminAssets/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 14 Jul 2019 09:52:56 GMT -->

</html>
