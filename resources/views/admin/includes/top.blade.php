<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    var fusc = getCookie('fullsscre');
    var navC = getCookie('navColor');
    var mC = getCookie('mnuColor');
    var fm = getCookie('fontfam');
    $(document).ready(function() {
        $('body').css('font-family', fm);
        $('.navbar-content .app-header').addClass(navC);
        $('.app-main .app-sidebar , .btn').addClass(mC);
        $('.p-0').removeClass(mC);
    });
</script>

<style>
    #fullsscre:hover {

        color: #FFF;
    }

    .dropdown-menu {
        min-width: 11rem !important;
        left: -29px !important;
    }

    .dropdown-menuuuu {
        min-width: 6rem !important;
        left: -22px !important;
    }

    /* @media (max-width: 375px) {
        .dropdown-menuuuu {
            width: 20% !important;
            left: 65% !important;
            top: 21% !important;
        }
    } */
</style>
<div class="app-header header-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <div class="logo-src-mobile"></div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="app-header__content">
        <div class="app-header-left">
            <div class="search-wrapper">
                <div class="input-holder">
                    <input id="searchIcon" type="text" class="search-input" placeholder="<?= __('Search in Sidebar') ?>">
                    <button class="search-icon"><span></span></button>
                </div>
                <button class="close"></button>
            </div>

            <span id="compflusher" style="color:#BF1E2E;margin-right: 1em;display: none;"> <i class="fas fa-arrow-right"></i> <span style="line-height: 43px;"> <?= __('You must choose branch') ?> </span>
                <div class="spinner-border text-danger"></div>
            </span>


        </div>
        <div class="app-header-right">
            <div class="header-btn-lg pr-0">

                <div class="widget-content p-0">
                    <a style="text-decoration: none;color: #112248;font-size: 1em" href="{{url('/admin/users')}}">
                        {{ Auth::user()->name }}
                    </a>
                </div>
            </div>

            {{-- <div class="dropdown d-inline-block" style="margin: 1em;">
                <a style="text-decoration: none;color: #112248;font-size: 1em" href="{{url('/admin/?lang=ar')}}">AR </a>
                 <span style="color: #112248;font-size: 1em"> | </span> 
                <a style="text-decoration: none;color: #112248;font-size: 1em" href="{{url('/admin/?lang=en')}}"> En</a>
            </div> --}}

            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fas fa-power-off" style="font-size: 1.7em;margin: 1em;color: #D80200;"></i>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>


        </div>
    </div>
</div>

<style>
    .bbbbbb {
        margin-right: 77px !important;

    }
</style>
<script>
    var elem = document.getElementById("containercontainer");
    $(document).ready(function() {

        $('.hamburger').click(function() {
            $('.fixed-sidebar .app-main .app-main__outer').toggleClass('bbbbb');
            $('.fixed-footer .app-footer .app-footer__inner ').toggleClass('bbbbbb');
        });

        function getCookieeee(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
        $('#searchIcon').change(function() {
            $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
            $('#vertical-nav-menuID').find('a:contains(' + $('#searchIcon').val() + ')').parent('li').parent('ul').addClass('mm-show');
            $('#vertical-nav-menuID').find('a:contains(' + $('#searchIcon').val() + ')').addClass('mm-active');
        });
    });
</script>
<style>
    #fullsscre,
    #fullsscreexi {
        font-size: 1.6em;
        color: #ccc;
    }

    #fullsscre:hover,
    #fullsscreexi:hover {
        color: lightseagreen;
    }
</style>