<script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
        $('#Clients ul').addClass('mm-show').find('#ClientsIndex').addClass('mm-active');
    });

</script>
@extends('admin.layout')
@section('content')
    <style>
        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .btn {
            border: 2px solid gray;
            color: gray;
            background-color: white;
            padding: 8px 20px;
            border-radius: 8px;
            font-size: 20px;
            font-weight: bold;
        }

        .upload-btn-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }

        .btn-default {
            background: #ffffff !important;
            color: #4b5359 !important;
            border: 1px solid #a2a2a2 !important;
            font-size: 1.1em !important;
        }

        .btn-default:hover {
            background: #002a53 !important;
            color: #ffffff !important;

        }

    </style>
    <div class="parts form">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="main-card mb-3 card">
                    <div class="card-body text-center">
                        @if ($user->photo != null)
                            <img style="width: 150px;height: 150px; object-fit: cover;border-radius: 50%;"
                                class="card-img-top card-img-top2" src="{{ url($user->photo) }}" alt="Card image cap">
                        @else
                            <img style="width: 150px;height: 150px; object-fit: cover;border-radius: 50%;"
                                class="card-img-top card-img-top2" src="{{ url('/images/heroes.png') }}"
                                alt="Card image cap">

                        @endif
                        <h5 class="card-title text-center"> {{ $user->name }}</h5>
                        <h5 class="text-center">{{ $user->email }}</h5>
                        <h6 class="text-center">{{ $user->phone }}</h6>

                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>

        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">{{ __('الشكاوي') }}</h5>
                @if (count($complaints))
                    <table style="width: 100%;" id="" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>

                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('رقم الشكوى') }}
                                </th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('عنوان الشكوي') }}
                                </th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('محتوي الشكوي') }}
                                </th>

                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('تاريخ الشكوي') }}
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($complaints as $key => $complaint)
                                <tr>
                                    <td>{{ $complaint->id }}</td>
                                    <td>{{ $complaint->name }}</td>
                                    <td style="width: 50%;">{{ $complaint->body }}</td>

                                    <td>{{ $complaint->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                @else
                    <h4 class="text-center"> {{ __('لا يوجد شكاوي') }} </h4>
                @endif
            </div>
        </div>

        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">{{ __('الطلبات') }}</h5>
                @if (count($orders))
                    <table style="width: 100%;" id="" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>

                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('رقم الطلب') }}
                                </th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('سعر الطلب') }}
                                </th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('وقت الوصول') }}
                                </th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('طريقة الدفع') }}
                                </th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('حالة الطلب') }}
                                </th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('تاريخ الطلب') }}
                                </th>
                                <th data-field="op" data-align="center" data-sortable="false" data-formatter="">
                                    {{ __('General.Options') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $key => $order)
                                <tr>
                                    <td>{{ $order->serial_num }}</td>
                                    <td>{{ $order->total_price }}</td>
                                    <td>{{ $order->arrival_time }}</td>
                                    <td>{{ __('General.' . $order->pay_type) }}</td>
                                    <td>{{ __('General.' . $order->status) }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td class="text-center">
                                        <a class="fas-size-margin add-tooltip fas  fa-eye" data-toggle="tooltip"
                                            title="{{ __('متابعة الطلب') }}"
                                            href="{{ url('/admin/orders/' . $order->id) }}"> </a>

                                    </td>


                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                @else
                    <h4 class="text-center"> {{ __('لا يوجد طلبات') }} </h4>

                @endif
                {{ $orders->links() }}
            </div>
        </div>


    @endsection
