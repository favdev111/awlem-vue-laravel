<script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
        $('#Restorants ul').addClass('mm-show').find('#BranchesIndex').addClass('mm-active');
    });

</script>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<style>
    .modal-lg2,
    .modal-xl2 {
        max-width: 71% !important;
    }

    .fa-map-marker-alt {
        cursor: pointer;
    }

    .options-container {
        width: 70%;
        margin: auto;
        text-align: center;
        padding: .3em;
        border: 1px solid #D80200;
        border-radius: 1em;
        color: #D80200;
        font-size: 1.5em;
        margin-bottom: 1em;
    }

    .swiper-container {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

    .photos-cont {
        width: 500;
        margin: auto;
    }

    .menue-button {
        width: 50%;
        margin: auto;
        cursor: pointer;
        ;
        text-align: center;
        background-color: #D80200;
        padding: .5em;
        color: #fff;
        border-top-left-radius: 2em;
        border-bottom-right-radius: 2em;
    }

    .menu-container {
        padding: 1em;
    }

    .alert {
        margin: .5em;
    }

    .alert-danger {
        color: #D80200 !important;
        background-color: #D802004d !important;
        border-color: #D80200 !important;
        padding: .5px !important;
        padding-left: 1em !important;
        padding-right: 1em !important;
        font-size: 1em;
        cursor: pointer;
    }

    .alert-success {
        color: #10501e !important;
        background-color: #86f0404d !important;
        border-color: #4ff040 !important;
        padding: .5px !important;
        padding-left: 1em !important;
        padding-right: 1em !important;
        font-size: 1em;
        cursor: pointer;
    }

    .alert-success-orders {
        color: #FFF !important;
        background-color: #f70000 !important;
        border-color: #f70000 !important;
        padding: .5px !important;
        padding-left: 1em !important;
        padding-right: 1em !important;
        font-size: 1em;
        cursor: pointer;
    }

    .alert-warning {
        color: #4f5010 !important;
        background-color: #f0ed404d !important;
        border-color: #f0ed40 !important;
        padding: .5px !important;
        padding-left: 1em !important;
        padding-right: 1em !important;
        font-size: 1em;
        cursor: pointer;
    }

    .alert-info {
        color: #104650 !important;
        background-color: #40b8f04d !important;
        border-color: #40eaf0 !important;
        padding: .5px !important;
        padding-left: 1em !important;
        padding-right: 1em !important;
        font-size: 1em;
        cursor: pointer;
    }

    .card-body2 {
        height: 11em !important;
        /* overflow-y: scroll !important; */
    }

    .card-img-top2 {
        height: 15em;
        object-fit: cover;
    }

    .offer_options {
        position: absolute;
        background-color: #FFF;
        height: 59% !important;

    }

    .offer_options i {
        font-size: 1.3em;
        margin: .2em;
        color: #D80200;
        cursor: pointer;
    }

    .product_branch_available {
        color: #fff;
        padding: .2em;
        border-top-left-radius: 1em;
        border-top-right-radius: 1em;
        margin-bottom: -.2em;
        cursor: pointer;
    }

    .product_branch_available_color_not {
        background-color: #4A4A48;
    }

    .product_branch_available_color_yes {
        background-color: #D80200;
    }

</style>
@extends('admin.layout_mobile')
@section('content')
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="widget-content-right">
                <div role="group" class="btn-group-sm btn-group">
                    <span class="alert alert-info"
                        style="width:7em;text-align:center;height:3em;line-height:3em;color:#FFF;" data-toggle="modal"
                        data-target="#bd-example-modal-lg">الخريطه</span>

                    <a href="{{ url('/admin/branches/' . $branch->id . '/edit') }}" class="alert alert-warning"
                        style="width:7em;text-align:center;height:3em;line-height:3em;color:#FFF;text-decoration: none">{{ __('General.Edit') }}</a>
                    <span class="alert alert-success"
                        style="width:7em;text-align:center;height:3em;line-height:3em;color:#FFF;text-decoration: none"
                        data-toggle="modal" data-target="#bd-example-modal-lg-offer">العروض</span>
                    <div id="changeBusyStatusLoading">
                        <div class="lds-hourglass"></div>
                    </div>
                    <span id="changeBusyStatus" send="{{ $branch->busy }}" class="alert alert-danger"
                        style="width:7em;text-align:center;height:3em;line-height:3em;color:#FFF;">{{ $branch->busy == 0 ? __('متاح') : __('غير متاح') }}</span>
                    <a href="{{ url('/admin/branchOrders/' . $branch->id . '/all/all') }}"
                        class="alert alert-success-orders"
                        style="width:7em;text-align:center;height:3em;line-height:3em;color:#FFF;text-decoration: none">الطلبات</a>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md">

                        <table class="table">

                            <tbody>
                                <tr>
                                    <th scope="row">{{ __('branch.name') }}</th>
                                    <td>{{ $branch->name }}</td>

                                </tr>
                                <tr>
                                    <th scope="row">{{ __('branch.location_name') }}</th>
                                    <td>{{ $branch->location_name }}</td>

                                </tr>
                                <tr>
                                    <th scope="row"> {{ __('branch.user_id') }}</th>
                                    <td>{{ $branch->user->name }}</td>

                                </tr>

                                <tr>
                                    <th scope="row"> {{ __('branch.user_id_phone') }}</th>
                                    <td>{{ $branch->user->phone }}</td>

                                </tr>

                                <tr>
                                    <th scope="row"> {{ __('branch.restorant_id') }}</th>
                                    <td>{{ $branch->restorantUserandMeals->name }}</td>

                                </tr>
                                <tr>
                                    <th scope="row"> {{ __('branch.restorant_owner') }}</th>
                                    <td>{{ $branch->restorantUserandMeals->user->name }}</td>

                                </tr>
                                <tr>
                                    <th scope="row"> {{ __('branch.restorant_owner_phone') }}</th>
                                    <td>{{ $branch->restorantUserandMeals->user->phone }}</td>

                                </tr>
                            </tbody>


                        </table>
                        <br>

                    </div>
                    <div class="col-md">
                        <div class="photos-cont">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @forelse ($branch->branchPhoto as $photo)
                                        <div class="swiper-slide">
                                            <img style="width: 100%;object-fit: cover" src="{{ url($photo->photo) }}" alt="">
                                        </div>
                                    @empty

                                    @endforelse
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="options-container">
            <h3>المنتجات
                <i class="btn btn-primary" data-toggle="modal" data-target="#bd-example-modal-lg2">أضافة منتجات</i>
            </h3>
            <hr>
            <div class="text-center">
                <span id="0" class="alert alert-danger meal-filter">{{ __('الكل') }}</span>
                @forelse ($branch->restorantUserandMeals->meal as $meal)
                    <span id="{{ $meal->id }}" class="alert alert-danger meal-filter">{{ $meal->name }}</span>
                @empty

                @endforelse
            </div>


        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="row">
                    @forelse ($branch->productMeal as $product)
                        @forelse ($product->meals as $key => $meal)
                            @php
                            $classes[$key] = ' pro_meal_' . $meal->id
                            @endphp
                        @empty

                        @endforelse
                        <div class="col-md-3 col-sm-6 col-xs-12 col-lg-3 text-center all_meals {{ implode(' ', $classes) }}">
                            @php
                            unset($classes);
                            @endphp
                            <div class="card" style="width: 80%;margin: auto;margin-bottom: 1em;">
                                <div class="product_branch_available {{ $product->pivot->available == 0 ? 'product_branch_available_color_not' : 'product_branch_available_color_yes' }}"
                                    id="{{ $product->id }}" available="{{ $product->pivot->available }}">
                                    @if ($product->pivot->available == 1)
                                        {{ __('متاح') }}
                                    @else
                                        {{ __('غير متاح') }}
                                    @endif

                                </div>
                                <img class="card-img-top card-img-top2" src="{{ url($product->photo) }}" alt="Card image cap">
                                <div class="card-body card-body2">
                                    <a href="{{ url('/admin/products/' . $product->id) }}"
                                        class="card-title">{{ $product->name }}</a>
                                    <p class="card-text">{{ $product->description }}</p>
                                </div>

                            </div>
                        </div>
                    @empty

                    @endforelse
                </div>
            </div>
        </div>
    </div>

    {{-- Models --}}
    <div class="modal fade bd-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-lg2">
            <div class="modal-content">
                <div id="map" style="height: 40em;width: 100%"></div>
            </div>
        </div>
    </div>
    <style>
        .header-cont {
            background-color: #4a4a482b;
        }

        .menu-container {
            margin: 2em;
            padding: 1em;
            -webkit-box-shadow: -5px 0px 0px 0px rgba(74, 74, 72, 1);
            -moz-box-shadow: -5px 0px 0px 0px rgba(74, 74, 72, 1);
            box-shadow: -5px 0px 0px 0px rgba(74, 74, 72, 1);
        }

        .menu-container ul li {
            height: 5em;
            font-size: 18px;
            border-bottom: 1px solid #ccc;
            cursor: pointer;
        }

        .badge-primary {
            background-color: #4A4A48 !important;
        }

        .fa-chevron-right {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 2em;
            cursor: pointer;
        }

        .fa-sync-alt {
            font-size: 1.5em;
            cursor: pointer;
        }

    </style>
    <div class="modal fade bd-example-modal-lg" id="bd-example-modal-lg2" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-lg2">
            <div class="modal-content" style="">
                <i class="fas fa-chevron-right" data-dismiss="modal" aria-label="Close"></i>
                <div class="header-cont">
                    <div class="container text-center">
                        <img src="{{ url('Panel/adminAssets/assets/images/mainlogo.svg') }}" alt="">
                    </div>
                    <br>
                    <div class="container">
                        <div class="form-group">
                            <input type="text" class="form-control text-center" id="search-in-restorant-product"
                                style="direction: rtl" placeholder="ابحث عن منتجك هنا...">
                        </div>
                    </div>
                </div>
                <div class="row text-center" style="">
                    <div class="col-md" style="">
                        <div class="menu-container">
                            <h4>قائمة الطعام</h4>
                            <ul class="">
                                @forelse ($meals as $key => $meal)
                                    <li id="{{ $meal->id }}"
                                        class="meal-to-get-products d-flex justify-content-between align-items-center">
                                        {{ $meal->name }}
                                        <span class="badge badge-primary badge-pill">{{ $meal->product_count }}</span>
                                    </li>
                                @empty

                                @endforelse


                            </ul>
                        </div>

                    </div>
                    <div class="col-md">
                        {{-- if result null --}}
                        <div class="menu-container">
                            <h4>الطعام</h4>
                            <div class="menu-container-product2">
                                <br>
                                <br>
                                <br>
                                <h4 class="no-product-found-h4 text-center">يمكنك تحويل الطعام من المطع الرئيسي لفرعك كما
                                    يمكنك أضافة منتجك الخاص</h4>
                                <br>
                                <br>
                                <br>
                                <div class="container text-center">
                                    <img src="{{ url('Panel/adminAssets/assets/images/mainlogo.svg') }}" alt="">
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="container text-center">
                                    <a href="{{ url('admin/creatFromBranch/' . $branch->restorant_id . '/' . $branch->id) }}"
                                        class="btn btn-primary">أضف منتج جديد</a>
                                </div>
                            </div>
                            <div class="menu-container-product">
                                <i class="fas fa-sync-alt" id="fa-sync-alt"></i>
                                <div class="dfdfdf text-right">
                                    <input type="checkbox" id="selectAll">&nbsp; &nbsp;
                                    <label for="">أختيار الكل</label>
                                </div>
                                {!! Form::open(['method' => 'post', 'action' => 'Admin\ProductsController@synkBranches',
                                'files' => true]) !!}
                                <input type="hidden" name="branchId" value="{{ $branch->id }}">
                                <input type="hidden" name="restorant_id" value="{{ $branch->restorant_id }}">
                                <div id="restorant_id_for_append"></div>
                                <ul class="">


                                </ul>
                                <div class="col-sm-12 offset-sm-2">
                                    {!! Form::submit('تحويل الطعام لفرعك', ['class' => 'btn btn-primary form-control']) !!}
                                </div>

                                {!! Form::Close() !!}
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- offers-model --}}
    <div class="modal fade bd-example-modal-lg" id="bd-example-modal-lg-offer" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-lg2">
            <div class="modal-content" style="">
                <i class="fas fa-chevron-right" data-dismiss="modal" aria-label="Close"></i>
                <div class="header-cont">
                    <div class="container text-center">
                        <img src="{{ url('Panel/adminAssets/assets/images/mainlogo.svg') }}" alt="">
                    </div>
                </div>
                <div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">العروض</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">أضافة عرض</a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active container" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                @forelse ($branch->Offers as $offer)
                                    <div class="col-md-3 text-center">
                                        <div class="off_container">
                                            <div class="card offer_hover" style="width: 100%;margin: auto;margin-bottom: 1em;">
                                                <img class="card-img-top card-img-top2" src="{{ url($offer->photo) }}"
                                                    alt="Card image cap">
                                                <div class="offer_options">
                                                    <br>
                                                    <a
                                                        href="{{ url('/admin/EditOffer/' . $branch->restorant_id . '/' . $offer->id . '/' . $branch->id . '/' . $offer->pivot->amount . '/' . $offer->pivot->percent . '/' . $offer->pivot->active . '/' . $offer->pivot->offer_end_date) }}"><i
                                                            title="تعديل" class="fas fa-edit"></i></a>
                                                    <br>
                                                    <br>
                                                    <a href="{{ url('/admin/deleteOffer/' . $offer->id . '/' . $branch->id) }}"><i
                                                            title="حذف" class="fas fa-trash-alt"></i></a>
                                                    <br>
                                                    <br>

                                                    @if ($offer->pivot->active == true)
                                                        <i class="fas fa-lock-open" style="cursor: not-allowed"></i>

                                                    @else
                                                        <i class="fas fa-lock" style="cursor: not-allowed"></i>

                                                    @endif
                                                </div>
                                                <div class="card-body card-body2">
                                                    <a href="{{ url('/admin/products/' . $offer->id) }}"
                                                        class="card-title">{{ $offer->name }}</a>
                                                    <div class="pric_lin_through"
                                                        style="position: absolute;top: 0;left: 0;background-color: #D80200;padding: 1em;border-bottom-right-radius: 3em;color: #FFF">
                                                        <span style="text-decoration: line-through;">{{ $offer->price }}
                                                            {{ __('ريال') }} </span>
                                                        <br>
                                                        <span>{{ $offer->price - $offer->pivot->amount }}
                                                            {{ __('ريال') }} </span>
                                                    </div>

                                                    <p class="card-text">{{ $offer->description }}</p>

                                                    <span> نهاية العرض </span> :
                                                    <span>{{ $offer->pivot->offer_end_date }}</span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                @empty

                                @endforelse
                            </div>
                        </div>
                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row text-right">
                                <div class="col-md-4">
                                    <div class="menu-container">
                                        <h4 class="text-right">قائمة الطعام</h4>
                                        <ul class="">
                                            @forelse ($meals as $key => $meal)
                                                <li id="{{ $meal->id }}"
                                                    class="getProductsToAddOfffer d-flex justify-content-between align-items-center">
                                                    {{ $meal->name }}
                                                    <span
                                                        class="badge badge-primary badge-pill">{{ $meal->product_count }}</span>
                                                </li>
                                            @empty

                                            @endforelse


                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="container" style="width: 80%;">
                                        {!! Form::open(['method' => 'post', 'action' =>
                                        'Admin\ProductsController@storeOffer', 'files' => true]) !!}
                                        {!! Form::hidden('branch_id', $branch->id) !!}
                                        <div class="form-group">
                                            <label for="name">{{ __('المنتج') }}
                                            </label>
                                            <div>
                                                {!! Form::select('product_id', [], null, ['class' => 'form-control', 'id' =>
                                                'products_offers_select']) !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name">{{ __('نسبة الخصم') }}
                                            </label>
                                            <div>
                                                {!! Form::text('percent', 0.0, ['id' => 'offer_percent', 'class' =>
                                                'form-control', 'placeholder' => __('نسبة الخصم')]) !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name">{{ __('قيمة الخصم') }}
                                            </label>
                                            <div>
                                                {!! Form::text('amount', 0.0, ['id' => 'offer_amount', 'class' =>
                                                'form-control', 'placeholder' => __('قيمة الخصم')]) !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name">{{ __('تاريخ نهاية العرض') }}
                                            </label>
                                            <div>
                                                {!! Form::text('offer_end_date', null, ['id' => 'offer_end_date', 'class' =>
                                                'form-control', 'placeholder' => __('تاريخ نهاية العرض')]) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label style="width:150px" for="name">{{ __('تفعيل / تعطيل') }}</label>
                                            <div class="row">
                                                <div class="col-md">
                                                    {!! Form::checkbox('active', null, 1, ['class' => 'form-control',
                                                    'data-toggle' => 'toggle', 'data-onstyle' => 'primary']) !!}
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-sm-12 offset-sm-2">
                                            {!! Form::submit(__('General.Save'), [
                                            'class' => 'btn btn-primary
                                            form-control',
                                            ]) !!}
                                        </div>
                                        {!! Form::Close() !!}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- offers-model --}}

    {{-- Models --}}

    {{-- Scripts --}}

    <style>
        .lds-hourglass {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
        }

        .lds-hourglass:after {
            content: " ";
            display: block;
            border-radius: 50%;
            width: 0;
            height: 0;
            margin: 8px;
            box-sizing: border-box;
            border: 32px solid #D80200;
            border-color: #D80200 transparent #D80200 transparent;
            animation: lds-hourglass 1.2s infinite;
        }

        @keyframes lds-hourglass {
            0% {
                transform: rotate(0);
                animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
            }

            50% {
                transform: rotate(900deg);
                animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
            }

            100% {
                transform: rotate(1800deg);
            }
        }

        #changeBusyStatusLoading {
            display: none;
        }

    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js">
    </script>
    <script type="text/javascript"
        src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>
    <script type="text/javascript" src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="{{ url('./Panel/adminAssets/bootstrap-material-datetimepicker.js') }}">
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var lastMealProducts;
        var oldMealProductsselected;
        $(document).ready(function() {

            $('.product_branch_available').click(function() {
                $(this).slideUp(500);
                var product_id = $(this).attr('id');
                var branch_id = `{{ $branch->id }}`;
                var available = $(this).attr('available');
                if (available == 1) {
                    available = 0;
                    setTimeout(() => {
                        $(this).slideDown(500);
                        $(this).text('غير متاح');
                        $(this).css('background-color', '#4A4A48');
                    }, 700);
                } else {
                    available = 1;
                    setTimeout(() => {
                        $(this).slideDown(500);
                        $(this).text('متاح');
                        $(this).css('background-color', '#D80200');
                    }, 700);
                }
                $(this).attr('available', available);
                $.ajax({
                    type: 'POST',
                    url: `{{ url('./makeBranchProductUnAvailable') }}`,
                    data: {
                        _token: '{{ csrf_token() }}',
                        'product_id': product_id,
                        'branch_id': branch_id,
                        'available': available
                    },
                    success: function(data) {
                        console.log(data);

                    }

                });
            });
            $('#offer_end_date')
                .bootstrapMaterialDatePicker({
                    time: true,
                    clearButton: true,
                    format: 'Y-M-D HH:mm'
                });
            $('.menu-container-product2').show();
            $('.menu-container-product').hide();
            $('#offer_percent').change(function() {
                var proPrice = $('#products_offers_select').children(":selected").attr("price");
                var percent = $(this).val();
                var amount = proPrice * (percent / 100);
                $('#offer_amount').val(amount);
            })

            $('#offer_amount').change(function() {
                var proPrice = $('#products_offers_select').children(":selected").attr("price");
                var amount = $(this).val();
                var percent = (amount * 100) / proPrice;
                $('#offer_percent').val(percent);
            })
            $('.getProductsToAddOfffer').click(function() {
                var mealId = $(this).attr('id');
                $.ajax({
                    type: 'POST',
                    url: `{{ url('./getProductsByMealIdForAddOffer') }}`,
                    data: {
                        _token: '{{ csrf_token() }}',
                        'mealId': mealId,
                        'restorant_id': `{{ $branch->restorant_id }}`,
                    },
                    success: function(data) {
                        console.log(data);
                        $("#products_offers_select").html('');
                        $.each(data, function(index, value) {
                            $("#products_offers_select").append("<option price='" +
                                value.price +
                                "' value='" +
                                value.id +
                                "'>" + value.name + "</option>")
                        })
                    }

                });
            })
            $('.meal-to-get-products').click(function() {
                var mealId = $(this).attr('id');
                $.ajax({
                    type: 'POST',
                    url: `{{ url('./getProductsByMealId') }}`,
                    data: {
                        _token: '{{ csrf_token() }}',
                        'flag': 1,
                        'mealId': mealId,
                        'branchId': `{{ $branch->id }}`,
                    },
                    success: function(data) {
                        lastMealProducts = data;
                        $('.menu-container-product2').hide();
                        $('.menu-container-product').show();
                        $('.menu-container-product form ul').html('');
                        if (data.productArr.length > 0) {
                            $('#restorant_id_for_append').append(
                                `
                                                                                                                                                                                                                    <input type="hidden" name="oldProductArr" value="${data.checkedArr}">
                                                                                                                                                                                                                    `
                            );
                            $.each(data.productArr, function(index, value) {
                                $('.menu-container-product form ul').append(
                                    `
                                                                                                                                                                                                                            <li id="${value.id}" class="d-flex align-items-center">
                                                                                                                                                                                                                                        <input class="checkbox_class" name="product[${value.id}]" type="checkbox" ${value.checked}> &nbsp; &nbsp;
                                                                                                                                                                                                                                        ${value.name}
                                                                                                                                                                                                                                    </li>
                                                                                                                                                                                                                            `
                                );
                            })
                        } else {
                            $('.menu-container-product').hide();
                            $('.menu-container-product2').show();
                        }


                    }

                });
            });

            $('#fa-sync-alt').click(function() {
                $('.menu-container-product form ul').html('');
                $.each(lastMealProducts.productArr, function(index, value) {
                    $('.menu-container-product form ul').append(
                        `
                                                                                                                                                                                                                                                                                                                                                                        <li id="${value.id}" class="d-flex align-items-center">
                                                                                                                                                                                                                                                                                                                                                                                    <input class="checkbox_class" type="checkbox" name="product[${value.id}]" ${value.checked}> &nbsp; &nbsp;
                                                                                                                                                                                                                                                                                                                                                                                    ${value.name}
                                                                                                                                                                                                                                                                                                                                                                                </li>
                                                                                                                                                                                                                                                                                                                                                                                    `
                    );
                })
            });

            $('#selectAll').click(function() {
                if ($(this).prop('checked')) {
                    $('.checkbox_class').prop('checked', true);
                } else {
                    $('.checkbox_class').prop('checked', false);
                }
            });

            $('.meal-filter').click(function() {
                var meal_id = $(this).attr('id');
                if (meal_id != 0) {
                    $('.all_meals').hide();
                    $('.pro_meal_' + meal_id).show();
                } else {
                    $('.all_meals').show();
                }


            });
            $('#changeBusyStatus').click(function() {
                var currentStatus = $(this).attr('send');
                if (currentStatus == 0) {
                    var changeToStatus = 1;
                } else {
                    var changeToStatus = 0;
                }

                $('#changeBusyStatusLoading').show();
                $('#changeBusyStatus').hide();
                $.ajax({
                    type: 'POST',
                    url: `{{ url('./ajaxChangeBusyStatus') }}`,
                    data: {
                        _token: '{{ csrf_token() }}',
                        'status': changeToStatus,
                        'branchId': `{{ $branch->id }}`,
                    },
                    success: function(data) {

                        setTimeout(() => {
                            $('#changeBusyStatus').attr('send', data.busy);
                            if (data.busy == 1) {
                                $('#changeBusyStatus').text('غير متاح');
                            } else {
                                $('#changeBusyStatus').text('متاح');
                            }
                            $('#changeBusyStatusLoading').hide();
                            $('#changeBusyStatus').show();
                        }, 1000);


                    }

                });

            });

            $('#search-in-restorant-product').keyup(function() {
                var searchValue = $(this).val();
                if (searchValue.length >= 4) {
                    $.ajax({
                        type: 'POST',
                        url: `{{ url('./getProductsByMealId') }}`,
                        data: {
                            _token: '{{ csrf_token() }}',
                            'flag': 0,
                            'searchValue': searchValue,
                            'resturantId': `{{ $branch->restorant_id }}`,
                            'branchId': `{{ $branch->id }}`,
                        },
                        success: function(data) {
                            lastMealProducts = data;
                            $('.menu-container-product2').hide();
                            $('.menu-container-product').show();
                            $('.menu-container-product form ul').html('');
                            if (data.productArr.length > 0) {
                                $('#restorant_id_for_append').append(
                                    `
                                                                                                                                                                                                                                                                                                                                                                                        <input type="hidden" name="oldProductArr" value="${data.checkedArr}">
                                                                                                                                                                                                                                                                                                                                                                                        `
                                );
                                $.each(data.productArr, function(index, value) {
                                    $('.menu-container-product form ul').append(
                                        `
                                                                                                                                                                                                                                                                                                                                                                                                <li id="${value.id}" class="d-flex align-items-center">
                                                                                                                                                                                                                                                                                                                                                                                                            <input class="checkbox_class" type="checkbox" name="product[${value.id}]" ${value.checked}> &nbsp; &nbsp;
                                                                                                                                                                                                                                                                                                                                                                                                            ${value.name}
                                                                                                                                                                                                                                                                                                                                                                                                        </li>
                                                                                                                                                                                                                                                                                                                                                                                                `
                                    );
                                })
                            } else {
                                $('.menu-container-product').hide();
                                $('.menu-container-product2').show();
                            }


                        }

                    });
                }
            })

        });
        var swiper = new Swiper('.swiper-container', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
        var marker;

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                center: {
                    lat: parseFloat('{{ $branch->location_lat }}'),
                    lng: parseFloat('{{ $branch->location_lon }}')


                }
            });

            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: {
                    lat: parseFloat('{{ $branch->location_lat }}'),
                    lng: parseFloat('{{ $branch->location_lon }}')
                }
            });
            marker.addListener('click', toggleBounce);

            marker.addListener('drag', handleEvent);
            marker.addListener('dragend', handleEvent);
        }

        function handleEvent(event) {
            document.getElementById('location_lat').value = event.latLng.lat();
            document.getElementById('location_lon').value = event.latLng.lng();
        }

        function toggleBounce() {
            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
                console.log(marker);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        }

    </script>

    <script async defer
        src="http://maps.google.com/maps/api/js?key=AIzaSyDelRc2qG_jkXp65asF97imzw_C3gdz0d4&signed_in=true&callback=initMap">
    </script>
    {{-- Scripts --}}
@endsection
