<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>OLUM ADMIN</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">

    <meta name="msapplication-tap-highlight" content="no">
    <link href="{{ url('./Panel/adminAssets/chosen.css') }}" rel="stylesheet">


    <link href="{{ url('./Panel/adminAssets/mainpro_ar.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ url('./Panel/adminAssets/mainpro.js') }}"></script>

    <link rel="stylesheet" href="{{ url('./Panel/adminAssets/bootstrap-material-datetimepicker.css') }}" />


    <link
        href="https://fonts.googleapis.com/css?family=Amiri|Aref+Ruqaa|Baloo+Bhaijaan|Cairo|Changa|El+Messiri|Harmattan|Jomhuria|Katibeh|Lalezar|Lateef|Lemonada|Mada|Markazi+Text|Mirza|Rakkas|Reem+Kufi|Scheherazade|Tajawal&display=swap"
        rel="stylesheet">
    <script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('./Panel/adminAssets/mainspacific.js') }}"></script>
    <script src="{{ url('./ckeditor/ckeditor.js') }}"></script>
    <script src="{{ url('./ckeditor/samples/js/sample.js') }}"></script>
    <link rel="stylesheet" href="{{ url('./ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}">


    <script type="text/javascript" src="{{ url('./Panel/adminAssets/custom.js') }}"></script>

</head>

<body>
    <style>
        .scrollbar-sidebar {
            overflow-y: scroll;
        }

        .scrollbar-sidebar::-webkit-scrollbar {
            width: 0 !important
        }

        .fixed-sidebar .app-main .app-main__outer {
            padding-right: 0px !important;
        }

    </style>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header fixed-footer">
        @include('admin.includes.top_mobile')

        <div class="app-main">
            <div class="app-main__outer">
                @if (session()->has('notif'))
                    <div class="row flashMsg">
                        <div class="alert alert-success"
                            style="width: 97%; text-align: -webkit-match-parent; margin: 0 auto;">
                            <div id="alginBosagen">
                                <strong> {{ __('General.notification') }}: </strong> {{ session()->get('notif') }}
                            </div>

                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"
                                id="alginBosagenCros">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                @endif
                @yield('content')
            </div>
        </div>
    </div>
    <div class="app-drawer-wrapper">
        <div class="drawer-nav-btn">
            <button type="button" class="hamburger hamburger--elastic is-active">
                <span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
        </div>
    </div>

    <div class="app-drawer-overlay d-none animated fadeIn"></div>

    <link href="{{ url('./Panel/adminAssets/mainpro_ar.css') }}" rel="stylesheet">

    <link href="{{ url('./Panel/adminAssets/custom.css') }}" rel="stylesheet">

    <script type="text/javascript" src="{{ url('./Panel/adminAssets/docsupport/chosen.jquery.js') }}"></script>
    <script type="text/javascript" src="{{ url('./Panel/adminAssets/docsupport/prism.js') }}"></script>
    <script type="text/javascript" src="{{ url('./Panel/adminAssets/docsupport/init.js') }}"></script>
    <script type="text/javascript" src="{{ url('./Panel/adminAssets/bootstrap-material-datetimepicker.js') }}">
    </script>

</body>

</html>
