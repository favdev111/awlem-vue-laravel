<style>
    .alert-danger {
        color: #fff !important;
        background-color: #4A4A48 !important;
        border-color: #4A4A48 !important;
        padding: .5px !important;
        padding-left: 1em !important;
        padding-right: 1em !important;
        font-size: 1em;
        cursor: pointer;
    }

    .active {
        color: #fff !important;
        background-color: #D80200 !important;
        border-color: #D80200 !important;
    }

</style>
@extends('admin.layout_mobile')
@section('content')
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">

                @if (count($orders))
                    <table class="table table-striped">
                        <thead>
                            <tr>


                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('السريال') }}
                                </th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('السعر') }}
                                </th>

                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('الدفع') }}
                                </th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('الحالة') }}
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
                                    <td>{{ $order->pay_type }}</td>
                                    <td>{{ __('General.' . $order->status) }}</td>
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
                    {{ __('لا يوجد طلبات بالفرع') }}
                @endif
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
