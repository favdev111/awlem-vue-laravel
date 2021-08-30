<style>
    .badge {
        border-radius: 50% !important;
        padding: .8em !important;
        color: #FFF !important;
        line-height: 1em !important;
    }

    .badge-light {
        background: #D80200 !important;
    }

</style>
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
                <li id="Restorants" class="manue-active">
                    <a href="#">
                        <i class="metismenu-icon fas fa-utensils icon-gradient bg-strong-bliss"></i>
                        {{ __('branch.branches') }}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a id="BranchesIndex" href="{{ url('/admin/branches') }}">
                                <i class="metismenu-icon">
                                </i> {{ __('branch.branches') }}
                            </a>
                        </li>
                    </ul>
                </li>
                <li id="Orders" class="manue-active">
                    <a href="#">
                        <i class="metismenu-icon fas fa-utensils icon-gradient bg-strong-bliss"></i>
                        {{ __('الطلبات') }} <span id="total_orders_badge" style="position: absolute;left: 25%;top: 15%;"
                            class="badge badge-light" id="badge-shipping">{{ 0 }}</span>
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul id="orders-ul">

                    </ul>
                </li>
  
                <li id="Arivals" class="manue-active">
                    <a href="#">
                        <i class="metismenu-icon fas fa-utensils icon-gradient bg-strong-bliss"></i>
                        {{ __('وصول العملاء') }}
                        <span id="arrival_orders_badge" style="position: absolute;left: 25%;top: 15%;"
                            class="badge badge-light">{{ 0 }}</span>
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a style="cursor: pointer" id="BranchesIndex" data-toggle="modal"
                                data-target="#exampleModal">
                                <i class="metismenu-icon">
                                </i> {{ __('وصول العملاء') }}
                            </a>
                        </li>
                    </ul>

                </li>
            </ul>
        </div>
    </div>
</div>

<div id="soundLogOut">

</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="Arival-Mobdel-Container">

            </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.1.1/howler.min.js"></script>
<script>
    function opend(d) {
        window.open(d);
    }

    $(document).ready(function() {
        var total_badges = 0;
        var arivals = 0;
        $.ajax({
            type: 'get',
            url: `{{ url('admin/getBranchesWithPages') }}`,
            success: function(data) {
                $('#orders-ul').html('')
                $.each(data, function(index, value) {
                    total_badges += value.orders;
                    $('#total_orders_badge').text(total_badges);

                    $('#orders-ul').append(
                        ` <li>
                    <a id="Branch_${value.id}" href="{{ url('/admin/branchOrders/${value.id}/all/all') }}">
                        <i class="metismenu-icon">
                        </i> ${value.name} 
                    </a><span style="position: absolute;left: 0%;top: 28%;"
                            class="badge badge-light" id="badge-shipping">${value.orders}</span>
                </li>`
                    )
                })
            }

        });

        var check_ring_badge = 0;

        setInterval(() => {
            check_ring_badge = total_badges;
            total_badges = 0;
            $.ajax({
                type: 'get',
                url: `{{ url('admin/getBranchesWithPages') }}`,
                success: function(data) {
                    $('#orders-ul').html('')
                    $.each(data, function(index, value) {
                        total_badges += value.orders;
                        $('#total_orders_badge').text(total_badges);

                        $('#orders-ul').append(
                            ` <li>
                    <a id="Branch_${value.id}" href="{{ url('/admin/branchOrders/${value.id}/all/all') }}">
                        <i class="metismenu-icon">
                        </i> ${value.name} 
                    </a><span style="position: absolute;left: 0%;top: 28%;"
                            class="badge badge-light" id="badge-shipping">${value.orders}</span>
                </li>`
                        )
                    })

                    console.log('total_badges ' + total_badges + ' check_ring_badge  ' +
                        check_ring_badge);
                    if (total_badges > check_ring_badge) {
                        console.log('ring')
                        ring();
                    }
                }

            });

        }, 10000);

        setInterval(() => {
            arivals = 0;
            $.ajax({
                type: 'get',
                url: `{{ url('admin/getClientsArivals') }}`,
                success: function(arriv) {
                    $('#Arival-Mobdel-Container').html('')
                    $.each(arriv, function(index, value) {
                        $('#Arival-Mobdel-Container').append(
                            `<h6 class="text-center"><a href="{{ url('/admin/orders/${value.id}') }}">الطلب رقم ${value.serial_num} تم وصول العميل </a><h6><hr>`
                        )
                    })

                    console.log(arriv)
                    $('#arrival_orders_badge').text(arriv.length)
                    if (arriv.length > 0) {
                        console.log('ring')
                        ring();
                    }
                }

            });

        }, 10000);
    });

    function ring() {
        var sound = new Howl({
          src: ['http://jam3ha.com/awlem/backEnd/images/alarm-frenzy.mp3'],
          volume: 0.5,
        });
        sound.play()
    }

</script>
