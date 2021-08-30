<script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
        $('#Restorants ul').addClass('mm-show').find('#RestorantsIndex').addClass('mm-active');
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
        width: 100%;
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

    .modal-content2 {
        width: 150% !important;
        ;
    }

</style>
@extends('admin.layout')
@section('content')
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <a class="fas-size-margin add-tooltip fas fa-edit" data-toggle="tooltip" title="{{ __('General.Edit') }}"
                    href="{{ url('/admin/restorants/' . $restorant->id . '/edit') }}"> </a>
                <div class="row">
                    <div class="col-md">

                        <table class="table">

                            <tbody>
                                <tr>
                                    <th scope="row">{{ __('restorant.name') }}</th>
                                    <td>{{ $restorant->name }}</td>

                                </tr>

                                <tr>
                                    <th scope="row"> {{ __('أشهر الوجبات') }}</th>
                                    <td>{{ $restorant->featured_meals }}</td>

                                </tr>

                                <tr>
                                    <th scope="row"> {{ __('restorant.user_id') }}</th>
                                    <td>{{ $restorant->user->name }}
                                        <a class="fas-size-margin add-tooltip fas fa-edit" data-toggle="tooltip"
                                            title="{{ __('General.Edit') }}"
                                            href="{{ url('/admin/editRestorantUser/' . $restorant->user->id . '/' . $restorant->id) }}">
                                        </a>
                                    </td>

                                </tr>

                                <tr>
                                    <th scope="row"> {{ __('restorant.phone') }}</th>
                                    <td>{{ $restorant->user->phone }}</td>

                                </tr>

                                <tr>
                                    <th scope="row"> {{ __('restorant.category_id') }}</th>
                                    <td>{{ $restorant->category->name }}</td>

                                </tr>

                            </tbody>


                        </table>
                        <br>
                        <div class="row">
                            <div class="col-md">
                                <h3 class="menue-button" data-toggle="modal" data-target="#bd-example-modal-sm">قائمة الطعام
                                </h3>

                            </div>
                            <div class="col-md">
                                <h3 class="menue-button" data-toggle="modal" data-target="#bd-example-modal-sm2">الفروع</h3>
                            </div>

                            <div class="col-md">
                                <h3 class="menue-button" data-toggle="modal" data-target="#bd-example-modal-sm3">الموظفين
                                </h3>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md text-center">
                                <h4>الأقسام</h4>
                                <div class="types-areas-container">
                                    <table class="table">

                                        <tbody>
                                            @forelse ($restorant->types as $type)
                                                <tr>
                                                    <td scope="row"> <img style="width: 30px" src="{{ url($type->photo) }}"
                                                            alt=""></td>
                                                    <th scope="row">{{ $type->name }}</th>

                                                </tr>
                                            @empty

                                            @endforelse

                                        </tbody>


                                    </table>

                                </div>
                            </div>
                            <div class="col-md text-center">
                                <h4>المناطق</h4>
                                <div class="types-areas-container">
                                    <table class="table">

                                        <tbody>
                                            @forelse ($restorant->areas as $area)
                                                <tr>
                                                    <th scope="row">{{ $area->name }}</th>

                                                </tr>
                                            @empty

                                            @endforelse

                                        </tbody>


                                    </table>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md">
                        <img style="width: 100%;object-fit: cover;" src="{{ ($restorant->photo)?  url($restorant->photo) : url('/images/noimg.jpg') }}" alt="">
                    </div>
                </div>


                <hr>


            </div>
        </div>
        <div class="options-container">
            <h3>المنتجات
                <a href={{ url('admin/creatFromRestorant/' . $restorant->id) }} class="btn btn-primary">أضافة منتج</a>
            </h3>
            <hr>
            <div class="text-center">
                <span id="0" class="alert alert-danger meal-filter">{{ __('الكل') }}</span>
                @forelse ($restorant->meal as $meal)
                    <span id="{{ $meal->id }}" class="alert alert-danger meal-filter">{{ $meal->name }}</span>
                @empty

                @endforelse
            </div>


        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="row">
                    @forelse ($restorant->productMeal as $product)
                        @forelse ($product->meals as $key => $meal)
                            @php
                            $classes[$key] = ' pro_meal_' . $meal->id
                            @endphp
                        @empty
                            @php
                            $classes[$key] = '';
                            @endphp
                        @endforelse
                        <div class="col-md-3 text-center all_meals {{ implode(' ', $classes) }}">
                            @php
                            unset($classes);
                            @endphp
                            <div class="card" style="width: 18rem;margin: auto;margin-bottom: 1em;">
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

    <div class="modal fade bd-example-modal-sm" id="bd-example-modal-sm" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content modal-content2" style="height: 50%;overflow-y: scroll;">
                <div class="add-to-menu text-center">
                    <input type="button" class="btn btn-primary" style="margin: 1em;" value="اضافة الى القائمة"
                        data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                </div>
                <div class="menu-container text-center">
                    @forelse ($restorant->meal as $meal)
                        <div class="meal-container-form">
                            <div class="row" style="margin: 0">
                                <div class="col-md-8">
                                    <h5 style="line-height: 2em">{{ $meal->name }}</h5>
                                </div>
                                <div class="col-md-2">
                                    {{ Form::open(['method' => 'DELETE', 'style' => 'margin-top: -12%;', 'action' => ['Admin\MealsController@destroy', $meal->id]]) }}
                                    {{ Form::hidden('id', $restorant->id) }}
                                    {{ Form::hidden('from_restorant', true) }}
                                    {{ Form::hidden('restorant_id', $restorant->id) }}
                                    <button class="mt-1 btn btn-defult fas-size-margin add-tooltip" type="submit"
                                        data-toggle="tooltip" title="{{ __('General.Delete') }}"
                                        onclick="return confirm('Are you sure you want to delete this item?');"><i
                                            class="fas fa-trash-alt"></i></button>

                                    {{ Form::close() }}
                                </div>
                                <div class="col-md-2">
                                    <i id="{{ $meal->id }}" class="edit_meal_icon fas-size-margin add-tooltip fas fa-edit"
                                        style="line-height: 1.6em;cursor: pointer;"> </i>
                                </div>
                            </div>

                            <div class="row edit-meal-container" id="edit_meal_{{ $meal->id }}">
                                {!! Form::open(['method' => 'Patch', 'action' => ['Admin\MealsController@update', $meal->id],
                                'files' => true]) !!}
                                {{ Form::hidden('id', $restorant->id) }}
                                {{ Form::hidden('from_restorant', true) }}
                                {{ Form::hidden('restorant_id', $restorant->id) }}
                                <div class="row container" style="margin: auto;margin-left:0px">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            {!! Form::text('name', $meal->name, ['required' => 'required', 'class' =>
                                            'form-control', 'placeholder' => __('restorant.name')]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        {!! Form::submit(__('General.Save'), ['class' => 'btn btn-primary form-control']) !!}
                                    </div>

                                </div>


                                {{ Form::close() }}
                            </div>
                        </div>

                        <hr>
                    @empty

                    @endforelse

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-sm" id="bd-example-modal-sm2" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="height: 50%;overflow-y: scroll;">
                <div class="add-to-menu text-center">
                    <br>
                    <a id="BranchesCreat" class="btn btn-primary"
                        href="{{ url('/admin/creatBranchFromRestorant/' . $restorant->id) }}">
                        </i>{{ __('branch.add_branch') }}
                    </a>

                </div>
                <div class="menu-container text-center">
                    <table class="table">
                        <tbody>
                            @forelse ($restorant->branch as $branch)
                                <tr>
                                    <th scope="row">
                                        <a href="{{ url('admin/branches/' . $branch->id) }}">{{ $branch->name }}</a>
                                    </th>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-sm" id="bd-example-modal-sm3" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="height: 50%;overflow-y: scroll;">
                <div class="add-to-menu text-center">
                    <br>
                    <a id="BranchesCreat" class="btn btn-primary"
                        href="{{ url('/admin/addRestorantEmployee/' . $restorant->id) }}">
                        {{ __('أضافة موظف') }}
                    </a>
                </div>
                <div class="menu-container text-center">
                    <table class="table">
                        <tbody>
                            @forelse ($restorantEmployees as $emp)
                                <tr>
                                    <th scope="row">
                                        {{ $emp->name }}
                                    </th>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h4 class="text-center">{{ __('branch.add_meal') }}</h4>
                    {!! Form::open(['method' => 'post', 'action' => ['Admin\MealsController@storeFromRestorant',
                    $restorant->id], 'files' => true]) !!}
                    <div class="form-group">
                        <div>
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' =>
                            __('branch.meal_name')]) !!}
                        </div>
                    </div>

                    {!! Form::submit(__('General.Save'), ['class' => 'btn btn-primary form-control']) !!}

                    {!! Form::Close() !!}
                </div>
            </div>
        </div>
    </div>


    {{-- Models --}}

    {{-- Scripts --}}

    <script>
        $(document).ready(function() {
            $('.edit-meal-container').hide();
            $('.edit_meal_icon').click(function() {
                var mealId = $(this).attr('id');
                $('#edit_meal_' + mealId).slideToggle();

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
        });

    </script>

    {{-- Scripts --}}
@endsection
