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

    .types-areas-container {
        padding: .5em;
        border: 2px solid #D80200;
        border-radius: 1em;
        height: 20em;
        overflow-y: scroll;
    }

    .menu-container {
        padding: 1em;
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

    .card-body2 {
        height: 11em !important;
        overflow-y: hidden !important;
    }

    .card-img-top2 {
        height: 15em;
        object-fit: cover;
    }

</style>
@extends('admin.layout')
@section('content')
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <a class="fas-size-margin add-tooltip fas fa-edit" data-toggle="tooltip" title="{{ __('General.Edit') }}"
                    href="{{ url('/admin/products/' . $product->id . '/edit') }}"> </a>
                @if ($showDelete == true)
                <span style="color: red">بمجرد الحذف المنتج أصبح غير موجود فى أى فرع</span>
                    <a class="fas-size-margin add-tooltip fas fa-trash" data-toggle="tooltip" title="{{ __('حذف') }}"
                        href="{{ url('/admin/products/delete/' . $product->id) }}">  </a>
                @endif

                <div class="row">
                    <div class="col-md">

                        <table class="table">

                            <tbody>
                                <tr>
                                    <th scope="row">{{ __('product.name') }}</th>
                                    <td>{{ $product->name }}</td>

                                </tr>

                                <tr>
                                    <th scope="row">{{ __('المطعم') }}</th>
                                    <td>{{ $product->restorant->name }}</td>

                                </tr>

                                <tr>
                                    <th scope="row"> {{ __('product.description') }}</th>
                                    <td>{{ $product->description }}</td>

                                </tr>

                                <tr>
                                    <th scope="row"> {{ __('product.price') }}</th>
                                    <td>{{ $product->price }} ريال</td>

                                </tr>

                                <tr>
                                    <th scope="row"> {{ __('product.ready_in') }}</th>
                                    <td>{{ $product->ready_in }}</td>

                                </tr>

                                <tr>
                                    <th scope="row"> {{ __('product.ready_to') }}</th>
                                    <td>{{ $product->ready_to }}</td>

                                </tr>

                                <tr>
                                    <th scope="row"> {{ __('product.max_additional_options') }}</th>
                                    <td>{{ $product->max_additional_options }}</td>

                                </tr>
                                @if ($product->product_offer)
                                    <tr>
                                        <th scope="row"> {{ __('product.product_offer') }}</th>
                                        <td>{{ $product->product_offer }}</td>

                                    </tr>

                                    <tr>
                                        <th scope="row"> {{ __('السعر المشطوب') }}</th>
                                        <td>{{ $product->before_offer_price }} ريال</td>

                                    </tr>

                                    <tr>
                                        <th scope="row"> {{ __('تاريخ انتهاء العرض') }}</th>
                                        <td>{{ $product->offer_expire }}</td>
                                    </tr>

                                @endif

                            </tbody>


                        </table>
                        <h4>الوجبات المنتمي لها المنتج</h4>
                        <div class="row">
                            @forelse ($product->meals as $meal)
                                <div class="col-md-4">
                                    <div class="alert alert-danger text-center">
                                        {{ $meal->name }}
                                    </div>
                                </div>
                            @empty
                                <h6 class="text-center" style="width: 100%">{{ __('region.no_areas_found_here') }}</h6>
                            @endforelse


                        </div>

                        <h4>الفروع المتاح بها المنتج</h4>
                        <div class="row">
                            @forelse ($product->branches as $branche)
                                <div class="col-md-4">
                                    <div class="alert alert-danger text-center">
                                        {{ $branche->name }}
                                    </div>
                                </div>
                            @empty
                                <h6 class="text-center" style="width: 100%">{{ __('region.no_areas_found_here') }}</h6>
                            @endforelse


                        </div>

                    </div>
                    <div class="col-md">
                        <div class="main-imagecon" style="width: 70%;margin: auto">
                            <img style="width: 100%;object-fit: cover;" src="{{ url($product->photo) }}" alt="">
                        </div>

                    </div>
                </div>
                <br>
                <br>
                <br>
                <h5>
                    الأضافات
                </h5>
                <div class="row">
                    @forelse ($product->groupOptions as $group)
                        <div class="col-md-4">
                            <div class="card" style="width: 22rem;margin: auto; margin-bottom: 2em;">
                                <div class="card-body" style="height: 21em;overflow-y: scroll;">
                                    <h5 class="card-title">{{ $group->name }}</h5>

                                    <table class="table table-striped">
                                        <tbody>
                                            <tr class="text-center">
                                                <th scope="row">عدد الأختيارات</th>
                                                <td>عداد</td>
                                                <td>أجباري الأختيار</td>
                                            </tr>
                                            <tr class="text-center">
                                                <th scope="row">{{ $group->choices_numbers }}</th>
                                                <td>
                                                    @if ($group->allow_incriments == true)
                                                        {{ __('نعم') }}
                                                    @else
                                                        {{ __('لا') }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($group->required_options == true)
                                                        {{ __('نعم') }}
                                                    @else
                                                        {{ __('لا') }}
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <h5 class="card-title">أختيارات {{ $group->name }}</h5>
                                    <table class="table table-striped">
                                        <tbody>
                                            @forelse ($group->productGroupOption as $option)
                                                <tr>
                                                    <th scope="row">{{ $option->title }}</th>
                                                    <th scope="row">{{ $option->price }} ريال</th>
                                                </tr>
                                            @empty

                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @empty

                    @endforelse


                </div>



            </div>
        </div>


    </div>


@endsection
