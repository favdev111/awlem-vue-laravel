<script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
        $('#Orders ul').addClass('mm-show').find('#total_orders_badge').addClass('mm-active');
    });

</script>

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
@extends('admin.layout')
@section('content')
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="float-center">
                    <input type="text" class="form-control text-center" value="" style="width: 50%;margin: auto"
                        id="searchTableAll" name="searchTableAll" placeholder="بحث...">
                </div>
                <br>

                <div class="text-center">
                    <span id="all" class="alert alert-danger active filter_click"
                        style="text-align:center;height:3em;line-height:3em;color:#FFF;text-decoration: none;margin: 1em;padding: .5em !important;">{{ __('الكل') }}</span>
                    <span id="submited" class="alert alert-danger filter_click"
                        style="text-align:center;height:3em;line-height:3em;color:#FFF;text-decoration: none;margin: 1em;padding: .5em !important;">{{ __('تم الطلب') }}</span>
                    <span id="preparing" class="alert alert-danger filter_click"
                        style="text-align:center;height:3em;line-height:3em;color:#FFF;text-decoration: none;margin: 1em;padding: .5em !important;">{{ __('جاري التحضير') }}</span>
                    <span id="prepared" class="alert alert-danger filter_click"
                        style="text-align:center;height:3em;line-height:3em;color:#FFF;text-decoration: none;margin: 1em;padding: .5em !important;">{{ __('تم التحضير') }}</span>
                    <span id="done" class="alert alert-danger filter_click"
                        style="text-align:center;height:3em;line-height:3em;color:#FFF;text-decoration: none;margin: 1em;padding: .5em !important;">{{ __('تم الأستلام') }}</span>
                    <span id="canceled" class="alert alert-danger filter_click"
                        style="text-align:center;height:3em;line-height:3em;color:#FFF;text-decoration: none;margin: 1em;padding: .5em !important;">{{ __('تم الألغاء') }}</span>
                    <span id="rejected" class="alert alert-danger filter_click"
                        style="text-align:center;height:3em;line-height:3em;color:#FFF;text-decoration: none;margin: 1em;padding: .5em !important;">{{ __('تم الرفض') }}</span>
                </div>
                <br>

                @if (count($orders))
                    <table style="width: 100%;" id="" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>

                                <th data-field="id" data-align="center" data-sortable="true"
                                    data-formatter="invoiceFormatter">ID</th>
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
                                <th data-field="date" data-align="center" data-sortable="true"
                                    data-formatter="dateFormatter">{{ __('أخر تحديث') }}</th>
                                <th data-field="op" data-align="center" data-sortable="false" data-formatter="">
                                    {{ __('General.Options') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $key => $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->serial_num }}</td>
                                    <td>{{ $order->total_price }}</td>
                                    <td>{{ $order->arrival_time }}</td>
                                    <td>{{ $order->pay_type }}</td>
                                    <td>{{ __('General.' . $order->status) }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->updated_at }}</td>
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

   
    <script>
        function printReport() {
            var prtContent = document.getElementById("reportPrinting");
            var WinPrint = window.open();
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        }
        var branch_id = `{{ $branch_id }}`;
        $('.filter_click').removeClass('active');
        $('#' + `{{ $filter }}`).addClass('active');
        $('.filter_click').click(function() {
            var filter = $(this).attr('id');
            window.location.href = `{{ url('/admin/branchOrders/${branch_id}/${filter}/all') }}`;
        })

        $('#searchTableAll').keyup(function() {
            $(document).keyup(function(e) {
                var valName = $('#searchTableAll').val();
                if (e.which == 13) {
                    window.location.href = `{{ url('/admin/branchOrders/${branch_id}/all/${valName}') }}`;
                }
            });
        });

    </script>
@endsection
