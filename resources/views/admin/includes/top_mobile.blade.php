<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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

    <a style="z-index: 10000;" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
        <i class="fas fa-power-off" style="font-size: 1.7em;margin: 1em;color: #D80200;"></i>
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
        <a href="{{ url('admin/branches') }}" class="logo-src-mobile" style="width: 60%;height: 100%;background-size: 50px ;float: left;"></a>

</div>

<style>
    .bbbbbb {
        margin-right: 77px !important;

    }

</style>
<script>
    var elem = document.getElementById("containercontainer");
    $(document).ready(function() {



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
            $('#vertical-nav-menuID').find('a:contains(' + $('#searchIcon').val() + ')').parent('li')
                .parent('ul').addClass('mm-show');
            $('#vertical-nav-menuID').find('a:contains(' + $('#searchIcon').val() + ')').addClass(
                'mm-active');
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
