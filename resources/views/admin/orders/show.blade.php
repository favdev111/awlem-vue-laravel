<script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
        $('#Restorants ul').addClass('mm-show').find('#BranchesIndex').addClass('mm-active');
    });

</script>
<style>
    .form-control-custom {
        display: inline !important;
        width: 100% !important;
    }

    @charset "UTF-8";

    .rating {
        margin: 50px auto;
        width: 400px;
    }

    .rating>* {
        float: right;
    }

    @-webkit-keyframes pulse {
        50% {
            color: #5e5e5e;
            text-shadow: 0 0 15px #777777;
        }
    }

    @keyframes pulse {
        50% {
            color: #5e5e5e;
            text-shadow: 0 0 15px #777777;
        }
    }

    .rating label {
        height: 40px;
        width: 20%;
        display: block;
        position: relative;
        cursor: pointer;
    }

    .rating label:nth-of-type(5):after {
        -webkit-animation-delay: 0.25s;
        animation-delay: 0.25s;
    }

    .rating label:nth-of-type(4):after {
        -webkit-animation-delay: 0.2s;
        animation-delay: 0.2s;
    }

    .rating label:nth-of-type(3):after {
        -webkit-animation-delay: 0.15s;
        animation-delay: 0.15s;
    }

    .rating label:nth-of-type(2):after {
        -webkit-animation-delay: 0.1s;
        animation-delay: 0.1s;
    }

    .rating label:nth-of-type(1):after {
        -webkit-animation-delay: 0.05s;
        animation-delay: 0.05s;
    }

    .rating label:after {
        -webkit-transition: all 0.4s ease-out;
        transition: all 0.4s ease-out;
        -webkit-font-smoothing: antialiased;
        position: absolute;
        content: "☆";
        color: #444;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        text-align: center;
        font-size: 50px;
        -webkit-animation: 1s pulse ease;
        animation: 1s pulse ease;
    }

    .rating label:hover:after {
        color: #5e5e5e;
        text-shadow: 0 0 15px #5e5e5e;
    }

    .rating input {
        display: none;
    }

    .rating input:checked+label:after,
    .rating input:checked~label:after {
        content: "★";
        color: #f9bf3b;
        text-shadow: 0 0 20px #f9bf3b;
    }

</style>
@extends('admin.layout')
@section('content')
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">
                    {{ __('متابعة الطلب ') }}
                    <a target="blank" href="{{ route('Orders.print_inv', $order->id) }}"><i
                            title="{{ __('معاينة وطباعة الطلب') }}"
                            class="fas-size-margin add-tooltip fas  fa-print"></i></a>

                    <a target="blank" href="{{ route('Orders.print_inv_test', $order->id) }}"><i
                            title="{{ __('معاينة وطباعة الطلب') }}"
                            class="fas-size-margin add-tooltip fas  fa-print"></i></a>


                </h5>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <h5 class="card-title">
                            {{ __('تغيير حالة الطلب') }}</h5>
                    </div>
                    <div class="col-md">
                        <td>
                            {!! Form::open(['method' => 'patch', 'action' => ['Admin\OrdersController@update', $order->id], 'files' => true]) !!}
                            <div class="row">

                                @if ($order->status == 'done' || $order->status == 'canceled' || $order->status == 'rejected')
                                    <div style="width: 100%;margin: 1em;text-align: center;padding: .3em .8em;"
                                        class="alert alert-info"> {{ __('General.' . $order->status) }}</div>
                                @else
                                    <div class="col-md-4">
                                        {!! Form::text('ready_time', $order->ready_time, ['id' => 'ready_time', 'class' => 'form-control', 'placeholder' => __('وقت الأستلام')]) !!}
                                    </div>
                                    <div class="col-md-4">
                                        {!! Form::select('status', ['submited' => 'تم الطلب','rejected' => 'رفض','canceled' => 'تم الألغاء','preparing' => 'جاري العمل','prepared' => 'تم التجهيز','arrival' => 'وصل العميل للمكان','done' => 'تم الأستلام'], $order->status, ['class' => 'form-control form-control-custom', 'placeholder' => __('تغيير حالة الطلب')]) !!}
                                    </div>
                                    <div class="col-md-4">
                                        {!! Form::submit(__('حفظ'), ['class' => 'btn btn-primary form-control']) !!}
                                    </div>
                                @endif

                            </div>
                            {!! Form::Close() !!}
                        </td>
                    </div>
                </div>
                <hr>
                <table style="width: 30%;margin: auto" class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th data-field="id" data-align="center" data-sortable="true" data-formatter="invoiceFormatter">
                                {{ __('أسم العميل') }}
                            </th>
                            <th data-field="id" data-align="center" data-sortable="true" data-formatter="invoiceFormatter">
                                {{ __('رقم الجوال') }}
                            </th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->user->phone }}</td>
                       

                    </tbody>

                </table>
                <br>
                <div class="table-responsive">
                    <table style="width: 100%;" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th data-field="id" data-align="center" data-sortable="true" data-formatter="invoiceFormatter">
                                    {{ __('رقم الطلب') }}
                                </th>
                                <th data-field="id" data-align="center" data-sortable="true" data-formatter="invoiceFormatter">
                                    {{ __('نوع الطلب') }}
                                </th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('السعر الكلي') }}
                                </th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('الخصم') }}
                                </th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('رسوم الخدمة') }}
                                </th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('الضريبة') }}
                                </th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('نوع الدفع') }}
                                </th>
                                <th data-field="date" data-align="center" data-sortable="true" data-formatter="dateFormatter">
                                    {{ __('تاريخ الطلب') }}
                                </th>
                                <th data-field="date" data-align="center" data-sortable="true" data-formatter="dateFormatter">
                                    {{ __('وقت الوصول') }}
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <td>
                                {{ $order->serial_num }}
                            </td>
                            <td>
                                @if ($order->local == 1)
                                    <button type="button" data-toggle="popover-custom-content" rel="popover-focus"
                                        popover-id="1" class="mr-2 mb-2 btn btn-primary">{{ __('محلي') }}</button>
                                    <div id="popover-content-1" class="d-none text-right">
                                        <ul class="nav flex-column" style="direction: rtl;">
                                            <li class="nav-item-header nav-item"><span>{{ __('عائلات / أفراد') }}</span> :
                                                <span> {{ __('General.' . $order->families_Individuals) }} </span>
                                            </li>
                                            <li class="nav-item-header nav-item"><span>{{ __('عدد الأفراد') }}</span> :
                                                <span> {{ $order->Individuals_num . __(' أفراد') }} </span>
                                            </li>
                                        </ul>
                                    </div>
                                @else
                                    <button type="button" data-toggle="popover-custom-content" rel="popover-focus"
                                        popover-id="0" class="mr-2 mb-2 btn btn-primary">{{ __('سفري') }}</button>
    
                                    <div id="popover-content-0" class="d-none text-right">
                                        @if ($order->travel_type == 'hand')
                                            <br>
                                            <h6 class="text-center"> {{ __('يسلم باليد') }} </h6>
                                            <br>
                                        @else
                                            <ul class="nav flex-column" style="direction: rtl;">
                                                <li class="nav-item-header nav-item"><span>{{ __('نوع السيارة') }}</span> :
                                                    <span> {{ $order->car_type }} </span>
                                                </li>
                                                <li class="nav-item-header nav-item"><span>{{ __('لون السيارة') }}</span> :
                                                    <span> {{ $order->car_color }} </span>
                                                </li>
                                                <li class="nav-item-header nav-item"><span>{{ __('رقم السيارة') }}</span> :
                                                    <span> {{ $order->car_palet }} </span>
                                                </li>
                                            </ul>
                                        @endif
    
                                    </div>
                                @endif
    
                            </td>
                            <td>
                                {{ $order->total_price }}
                            </td>
                            <td>
                                {{ $order->discount }}
                            </td>
                            <td>
                                {{ $order->tax_price }}
                            </td>
                            <td>
                                {{ (float) $order->order_vat + (float) $order->app_vat }}
                            </td>
                            <td>
                                {{ __('General.' . $order->pay_type) }}
                            </td>
                            <td>
                                {{ $order->order_date }}
                            </td>
                            <td>
                                {{ $order->arrival_time }}
                            </td>
                            
                        </tbody>
                    </table>
                </div>
               
                <hr>
                <div class="row">
                    <div class="col-md-8">
                        <h5>
                            {{ __('تفاصيل الطلب') }}
                        </h5>
                        <div id="accordion" class="accordion-wrapper mb-3">
                            @forelse ($order->orderProduct as $key => $product)
                                <div class="card">
                                    <div id="{{ $key + 1 }}" class="card-header">
                                        <button type="button" data-toggle="collapse"
                                            data-target="#collapseOne{{ $key + 1 }}" aria-expanded="true"
                                            aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                                            <h5 class="card-title m-0 p-0"> {{ $product->quantity }} x
                                                {!! \App\Product::find($product->product_id)->name !!}
                                                <span class="card-title m-0 p-0 float-left">{{ $product->price }} ريال</span>
                                                @if ($product->product_offer == 'Offer')
                                                    <span class="alert alert-warning"
                                                        style="margin: 1em;padding: 0 .5em;">{{ __('General.' . $product->product_offer) }}
                                                        {{ __('خصم') }} {{ $product->offer_discount }} ريال</span>

                                                @endif

                                            </h5>
                                        </button>
                                    </div>
                                    @if ($product->custom_requires != null)
                                        <div class="custom_requires" style="margin: 1.6em;">
                                            <h5>{{ __('طلبات خاصة') }}</h5>
                                            <p>
                                                {{ $product->custom_requires }}
                                            </p>
                                        </div>
                                    @endif

                                    <div data-parent="#accordion" id="collapseOne{{ $key + 1 }}"
                                        aria-labelledby="{{ $key + 1 }}"
                                        class="collapse {{ $key == 0 ? 'show' : 'not_show' }}">
                                        <div class="card-body">
                                            <h5>{{ __('الأضافات') }}</h5>
                                            <br>
                                            <div class="product-options">
                                                @forelse (json_decode($product->serialized_optios) as $key => $group)
                                                    <div class="group-container">

                                                        @forelse ($group->product_group_option as $option)
                                                            <h6> {{ $group->name }} : {{ $option->quantity }} x
                                                                {{ $option->title }} <span class="float-left">
                                                                    {{ $option->price }} ريال </span> </h6>
                                                            <hr>

                                                        @empty

                                                        @endforelse

                                                    </div>

                                                @empty

                                                @endforelse
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @empty

                            @endforelse

                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5>
                            {{ __('تقييم الطلب') }}
                        </h5>
                        @if (sizeof($order->orderRating) > 0)
                            <script>
                                $(document).ready(function() {
                                    var rate = `{{ $order->orderRating[0]->rate }}`;
                                    rate = 5 - rate + 1;
                                    setTimeout(() => {
                                        $('#r' + rate).attr('checked', 'checked');
                                    }, 500);
                                })

                            </script>
                            <div class="container">
                                <div class="rating">

                                    <input type="radio" name="rating" id="r1">
                                    <label for="r1"></label>

                                    <input type="radio" name="rating" id="r2">
                                    <label for="r2"></label>

                                    <input type="radio" name="rating" id="r3">
                                    <label for="r3"></label>

                                    <input type="radio" name="rating" id="r4">
                                    <label for="r4"></label>

                                    <input type="radio" name="rating" id="r5">
                                    <label for="r5"></label>

                                </div>
                                <br>
                            </div>
                            <br>
                            <br>
                            <br>
                            <hr>
                            <p style="font-size: 1.5em;text-align: center;margin: 2em;">
                                {{ $order->orderRating[0]->review }}
                            </p>

                        @else
                            <h5 class="text-center">{{ __('لا يوجد تقييم على الطلب') }}</h5>
                            <br>
                            <div class="container containerddd" style="text-align: center;padding: 14%;">
                                <i style="font-size: 15em;color:#ccc;" class="fas fa-star"></i>

                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .containerddd {
            -webkit-box-shadow: inset -6px 0px 84px -7px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: inset -6px 0px 84px -7px rgba(0, 0, 0, 0.75);
            box-shadow: inset -6px 0px 84px -7px rgba(0, 0, 0, 0.75);
        }

    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js">
    </script>
    <script type="text/javascript" src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="{{ url('./Panel/adminAssets/bootstrap-material-datetimepicker.js') }}">
    </script>
    <script>
        $(document).ready(function() {

            $('#ready_time')
                .bootstrapMaterialDatePicker({
                    date: false,
                    shortTime: false,
                    format: 'HH:mm'
                });


        });

    </script>
@endsection
