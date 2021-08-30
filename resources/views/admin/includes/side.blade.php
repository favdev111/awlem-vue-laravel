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
                <li id="dassboard">
                    <a href="{{ url('/admin') }}">
                        <i class="metismenu-icon fas fa-tachometer-alt icon-gradient bg-strong-bliss"></i>
                        {{ __('General.Dashboard') }}
                    </a>
                </li>

                <li id="Categories" class="manue-active">
                    <a href="#">
                        <i class="metismenu-icon fas fa-bezier-curve icon-gradient bg-strong-bliss"></i>
                        {{ __('category.Categories') }}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a id="CategoriesIndex" href="{{ url('/admin/categories') }}">
                                <i class="metismenu-icon">
                                </i> {{ __('category.Categories') }}
                            </a>
                        </li>
                        <li>
                            <a id="CategoriesCreat" href="{{ url('/admin/categories/create') }}">
                                <i class="metismenu-icon">
                                </i>{{ __('category.add_category') }}
                            </a>
                        </li>
                    </ul>
                </li>

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
                            <a id="RestorantsCreat" href="{{ url('/admin/restorants/create') }}">
                                <i class="metismenu-icon">
                                </i>{{ __('restorant.add_restorant') }}
                            </a>
                        </li>

                        <li>
                            <a id="BranchesIndex" href="{{ url('/admin/branches') }}">
                                <i class="metismenu-icon">
                                </i> {{ __('branch.branches') }}
                            </a>
                        </li>
                        <li>
                            <a id="BranchesCreat" href="{{ url('/admin/branches/create') }}">
                                <i class="metismenu-icon">
                                </i>{{ __('branch.add_branch') }}
                            </a>
                        </li>
                    </ul>
                </li>

                <li id="Types" class="manue-active">
                    <a href="#">
                        <i class="metismenu-icon fas fa-draw-polygon icon-gradient bg-strong-bliss"></i>
                        {{ __('type.Types') }}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a id="TypesIndex" href="{{ url('/admin/types') }}">
                                <i class="metismenu-icon">
                                </i> {{ __('type.Types') }}
                            </a>
                        </li>
                        <li>
                            <a id="TypesCreat" href="{{ url('/admin/types/create') }}">
                                <i class="metismenu-icon">
                                </i>{{ __('type.add_type') }}
                            </a>
                        </li>
                    </ul>
                </li>

                <li id="Cobons" class="manue-active">
                    <a href="#">
                        <i class="metismenu-icon fas fa-percentage icon-gradient bg-strong-bliss"></i>
                        {{ __('cobon.Cobons') }}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a id="CobonsIndex" href="{{ url('/admin/discountCobons') }}">
                                <i class="metismenu-icon">
                                </i> {{ __('cobon.Cobons') }}
                            </a>
                        </li>
                        <li>
                            <a id="CobonsCreat" href="{{ url('/admin/discountCobons/create') }}">
                                <i class="metismenu-icon">
                                </i>{{ __('cobon.add_cobon') }}
                            </a>
                        </li>
                    </ul>
                </li>

                <li id="Regions" class="manue-active">
                    <a href="#">
                        <i class="metismenu-icon fas fa-flag icon-gradient bg-strong-bliss"></i>
                        {{ __('region.Regions') }}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a id="RegionsIndex" href="{{ url('/admin/regions') }}">
                                <i class="metismenu-icon">
                                </i> {{ __('region.Regions') }}
                            </a>
                        </li>
                        <li>
                            <a id="RegionsCreat" href="{{ url('/admin/regions/create') }}">
                                <i class="metismenu-icon">
                                </i>{{ __('region.add_region') }}
                            </a>
                        </li>
                        <li>
                            <a id="AreaIndex" href="{{ url('/admin/areas') }}">
                                <i class="metismenu-icon">
                                </i> {{ __('area.areas') }}
                            </a>
                        </li>
                        <li>
                            <a id="AreaCreat" href="{{ url('/admin/areas/create') }}">
                                <i class="metismenu-icon">
                                </i>{{ __('area.add_area') }}
                            </a>
                        </li>
                    </ul>
                </li>

                <li id="Users" class="manue-active">
                    <a href="#">
                        <i class="metismenu-icon fas fa-users icon-gradient bg-strong-bliss"></i>
                        {{ __('Users.Users') }}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a id="UsersIndex" href="{{ url('/admin/users') }}">
                                <i class="metismenu-icon">
                                </i> {{ __('Users.Users') }}
                            </a>
                        </li>
                        <li>
                            <a id="UsersCreate" href="{{ url('/admin/users/create') }}">
                                <i class="metismenu-icon">
                                </i>{{ __('أضافة عضو') }}
                            </a>
                        </li>
                    </ul>
                </li>

                <li id="Clients" class="manue-active">
                    <a href="#">
                        <i class="metismenu-icon fas fa-users icon-gradient bg-strong-bliss"></i>
                        {{ __('العملاء') }}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a id="ClientsIndex" href="{{ url('/admin/clients') }}">
                                <i class="metismenu-icon">
                                </i> {{ __('العملاء') }}
                            </a>
                        </li>
                        <li>
                            <a id="ClientsCreate" href="{{ url('/admin/clients/create') }}">
                                <i class="metismenu-icon">
                                </i>{{ __('أضافة عميل') }}
                            </a>
                        </li>
                    </ul>
                </li>

                <li id="Pages" class="manue-active">
                    <a href="#">
                        <i class="metismenu-icon fas fa-file-word icon-gradient bg-strong-bliss"></i>
                        {{ __('Pages.Pages') }}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a id="PagesIndex" href="{{ url('/admin/pages') }}">
                                <i class="metismenu-icon">
                                </i>{{ __('Pages.Pages') }}
                            </a>
                        </li>
                        <li>
                            <a id="PagesAdd" href="{{ url('/admin/pages/create') }}">
                                <i class="metismenu-icon">
                                </i>{{ __('Pages.Add_Page') }}
                            </a>
                        </li>
                    </ul>
                </li>

                <li id="Compalints" class="manue-active">
                    <a href="#">
                        <i class="metismenu-icon fas fa-file-word icon-gradient bg-strong-bliss"></i>
                        {{ __('الشكاوي') }}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a id="CompalintsIndex" href="{{ url('/admin/complaints') }}">
                                <i class="metismenu-icon">
                                </i>{{ __('الشكاوي') }}
                            </a>
                        </li>
                        <li>
                            <a id="CompalintsAdd" href="{{ url('/admin/complaints/create') }}">
                                <i class="metismenu-icon">
                                </i>{{ __('أضافة شكوي') }}
                            </a>
                        </li>
                    </ul>
                </li>

                <li id="Ratings" class="manue-active">
                    <a href="#">
                        <i class="metismenu-icon fas fa-file-word icon-gradient bg-strong-bliss"></i>
                        {{ __('التقييمات') }}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a id="RatingsIndex" href="{{ url('/admin/ratings') }}">
                                <i class="metismenu-icon">
                                </i>{{ __('التقييمات') }}
                            </a>
                        </li>
                        <li>
                            <a id="RatingsAdd" href="{{ url('/admin/ratings/create') }}">
                                <i class="metismenu-icon">
                                </i>{{ __('أضافة تقييم') }}
                            </a>
                        </li>
                    </ul>
                </li>

                <li id="faqs" class="manue-active">
                    <a href="#">
                        <i class="metismenu-icon fas fa-tasks icon-gradient bg-strong-bliss"></i> {{ __('Faq.Faq') }}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a id="faqsIndex" href="{{ url('/admin/faq') }}">
                                <i class="metismenu-icon">
                                </i>{{ __('Faq.Faq') }}
                            </a>
                        </li>
                        <li>
                            <a id="faqsAdd" href="{{ url('/admin/faq/create') }}">
                                <i class="metismenu-icon">
                                </i>{{ __('Faq.Add_Faq') }}
                            </a>
                        </li>

                    </ul>
                </li>



                <li id="Settingss" class="manue-active">
                    <a href="#">
                        <i class="metismenu-icon fas fa-cogs icon-gradient bg-strong-bliss"></i>
                        {{ __('General.General_Settings') }}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a id="olumFeatures" href="{{ url('/admin/features') }}">
                                <i class="metismenu-icon">

                                </i>
                                {{ __('مميزات أولم') }}
                            </a>
                        </li>

                        <li>
                            <a id="SettingssEdit" href="{{ url('/admin/settings/1/edit') }}">
                                <i class="metismenu-icon">

                                </i>
                                {{ __('General.Settings') }}
                            </a>
                        </li>

                     

                        <li>
                            <a id="changePassword" href="{{ url('/admin/roles') }}">
                                <i class="metismenu-icon">
                                </i>{{ __('General.Groups') }}
                            </a>
                        </li>

                        <li>
                            <a id="changePassword" href="{{ url('/admin/roles/create') }}">
                                <i class="metismenu-icon">
                                </i>{{ __('أضافة مجموعة') }}
                            </a>
                        </li>
                        
                        {{-- <li>
                            <a id="Settingonealerts22" href="{{ url('/admin/permissions') }}">
                                <i class="metismenu-icon">
                                </i>{{ __('General.Groups_Permessions') }}
                            </a>
                        </li> --}}
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
