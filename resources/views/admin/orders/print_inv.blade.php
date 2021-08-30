<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="print-cont" id="reportPrinting">
        <style>
            .table-print {
                direction: rtl;
                width: 100%;
                margin-bottom: 1rem;
                background-color: rgba(0, 0, 0, 0)
            }

            .table-print th,
            .table-print td {
                padding: .55rem;
                vertical-align: top;
                border-top: 1px solid #e9ecef
            }

            .table-print thead th {
                vertical-align: bottom;
                border-bottom: 2px solid #e9ecef;
                background-color: #333;
                color: #FFFFFF;
            }

            .table-print tbody+tbody {
                border-top: 2px solid #e9ecef
            }

            .table-print .table-print {
                background-color: #fff
            }


            .table-bordered-print {
                border: 1px solid #e9ecef
            }

            .table-bordered-print th,
            .table-bordered-print td {
                border: 1px solid #e9ecef;
                vertical-align: middle;
            }

            .table-bordered-print thead th,
            .table-bordered-print thead td {
                border-bottom-width: 2px
            }

            .bottom-content {
                margin-top: 3em;
                justify-content: end;
                text-align: end;
                width: 100%;
                display: flex;
                justify-content: flex-end;

            }

            .bottom-content .content {
                width: 40%;
                display: block;
            }

            .bottom-content .content .line {
                display: block;
            }

            .bottom-content .content .line h6 {
                display: inline-block;
                width: 40%;
                text-align: start;
                margin-bottom: 0;
            }

            .bottom-content .content .line p {
                display: inline-block;
                width: 40%;
                text-align: end;
                margin-bottom: 0;
            }

            .adds-on h6 {
                margin-bottom: .5em;
            }

            .adds-on p {
                margin-bottom: 0.2em;
            }

            .footer-content {
                margin-top: 2em;
                width: 100%;
                text-align: center;
                justify-content: center;
            }

            .footer-content p {
                margin-bottom: 0.4em;
            }

            .print-cont {
                width: 2154px;
                height: 842px;
                margin: auto;
                padding: 2em;
                border: 1px solid #333;
            }

        </style>
        <div class="serial" style="float: left"> {{ $order->serial_num }} </div>
        <br>
        <h4 style="text-align: center;"> {{ __('تفاصيل الطلب') }} </h4>
        <table class="table-print table-bordered-print">
            <thead>
                <tr>
                    <th scope="col">رقم</th>
                    <th scope="col">اسم الصنف</th>
                    <th scope="col">الكمية</th>
                    <th scope="col">طلبات خاصه</th>
                    <th scope="col">الإضافات</th>
                    <th scope="col">السعر</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                @forelse ($order->orderProduct as $key => $product)
                <td scope="row">
                    {{ $key + 1 }}
                </td>
                <td>
                    @if ($product->product_offer == "Offer")
                       
                        <span class="alert alert-warning" style="margin: 1em;padding: 0 .5em;">{{ __('General.'.$product->product_offer) }} {{ __('خصم') }} {{ $product->offer_discount }} ريال</span>
                        <hr>
                                    @endif
                    {!!
                        \App\Product::find($product->product_id)->name !!}
                        
                </td>
                <td>
                    {{ $product->quantity }}
                </td>
                <td>
                    @if ($product->custom_requires)
                    {{ $product->custom_requires }}
                    @else
                       لا يوجد طلبات خاصه 
                    @endif
                   
                </td>
                <td style="width: 30%">
                    @forelse (json_decode($product->serialized_optios) as $key => $group)
                    <div class="group-container">
                        
                        @forelse ($group->product_group_option as $option)
                        <h6> {{ $group->name }} : {{ $option->quantity }} x {{ $option->title }} <span class="float-left"> {{ $option->price }} ريال </span> </h6>
                                <hr>   

                                @empty

                                @endforelse
               
                    </div>

                @empty

                @endforelse
                </td>
                
                <td>
                    {{ $product->price }} ريال
                </td>
                
            @empty

            @endforelse
                </tr>
               


            </tbody>
        </table> 
        <div class="bottom-content">
            <div class="content">
                <div class="line">
                    <h6>الخصم</h6>
                    <p>{{ $order->discount }} ريال</p>
                </div>
                <hr>
                <div class="line">
                    <h6>الضريبة</h6>
                    <p>{{ (double)$order->order_vat + (double)$order->app_vat }} ريال</p>
                </div>
                <hr>
                <div class="line">
                    <h6>الأجمالي</h6>
                    <p> {{ $order->total_price }} ريال</p>
                </div>
                <hr>
            </div>
        </div>
        <div class="footer-content">
            <p>{{ $order->branch->name }}</p>
            <p>{!!
                \App\Setting::find(1)->phone !!}</p>
            <div class="logo-img"><img src="{{ url('./images/LOGO.png') }}" alt=""></div>
        </div>
    </div>
    <script>
        var prtContent = document.getElementById("reportPrinting");
        var WinPrint = window.open();
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    </script>
</body>
</html>