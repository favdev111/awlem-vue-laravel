<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
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
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu" id="vertical-nav-menuID">
                {{-- <li id="dassboard">
                    <a href="{{ url('/admin') }}">
                        <i class="metismenu-icon fas fa-tachometer-alt icon-gradient bg-strong-bliss"></i>
                        {{ __('General.Dashboard') }}
                    </a>
                </li> --}}
                <li id="Restorants" class="manue-active">
                    <a href="#">
                        <i class="metismenu-icon fas fa-utensils icon-gradient bg-strong-bliss"></i>
                        {{ __('restorant.Restorants') }}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a id="RestorantsIndex" href="{{ url('/admin/restorants') }}">
                                <i class="metismenu-icon">
                                </i> {{ __('restorant.Restorants') }}
                            </a>
                        </li>
                        <li>
                            <a id="BranchesIndex" href="{{ url('/admin/branches') }}">
                                <i class="metismenu-icon">
                                </i> {{ __('branch.branches') }}
                            </a>
                        </li>
                        
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>


<style>
    .metismenu-icon {
        font-size: 1.4em !important;
        opacity: .9 !important;
    }

    .metismenu-icon:hover {
        opacity: .2 !important;
    }

    .datepicker-container {
        /* display: none !important; */
    }

</style>

<script>
    function opend(d) {
        window.open(d);
    }

</script>
