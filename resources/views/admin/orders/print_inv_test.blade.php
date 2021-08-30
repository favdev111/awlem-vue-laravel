<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>فاتورة</title>
</head>

<body>
    <style>
        #invoice-POS {
            box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
            padding: 2mm;
            margin: 0 auto;
            width: 44mm;
            background: #FFF;
        }

        #invoice-POS ::selection {
            background: #f31544;
            color: #FFF;
        }

        #invoice-POS ::moz-selection {
            background: #f31544;
            color: #FFF;
        }

        #invoice-POS h1 {
            font-size: 10px;
            color: #222;
        }

        #invoice-POS h2 {
            text-align: center;
            font-size: 10px;
        }

        #invoice-POS h3 {
            font-size: 10px;
            font-weight: 300;
            line-height: 2em;
        }

        #invoice-POS p {
            font-size: 10px;
            color: #666;
            line-height: 1.2em;
        }

        #invoice-POS #top,
        #invoice-POS #mid,
        #invoice-POS #bot {
            /* Targets all id with 'col-' */
            border-bottom: 1px solid #EEE;
            /*text-align: right;*/
        }

        #invoice-POS #top {
            min-height: 100px;
        }

        #invoice-POS #mid {
            min-height: 80px;
        }

        #invoice-POS #bot {
            min-height: 50px;
        }

        /* #invoice-POS #top .logo {
            height: 60px;
            width: 60px;
            margin: auto;
            background: url(../../images/LOGO.png) no-repeat;
            background-size: 60px 60px;
        }*/

        #invoice-POS .clientlogo {
            float: left;
            height: 60px;
            width: 60px;
            background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
            background-size: 60px 60px;
            border-radius: 50px;
        }

        #invoice-POS .info {
            display: block;
            margin-left: 0;
        }

        #invoice-POS .title {
            float: right;
        }

        #invoice-POS .title p {
            text-align: right;
        }

        #invoice-POS table {
            width: 100%;
            border-collapse: collapse;
        }

        #invoice-POS .tabletitle {
            font-size: 10px;
            background: #EEE;
        }

        #invoice-POS .service {
            border-bottom: 1px solid #EEE;
        }

        #invoice-POS .item {
            width: 24mm;
        }

        #invoice-POS .itemtext {
            font-size: 10px;
        }

        #invoice-POS #legalcopy {
            margin-top: 5mm;
        }

    </style>
    <div class="print-cont" id="reportPrinting">


        <div id="invoice-POS">

            <div id="top" style="border-bottom: 1px solid #EEE; text-align: center;">
                <div class="logo"><img src="http://jam3ha.com/awlem/backEnd/images/LOGO.png" height="60" width="60" /></div>
                <div class="info">
                    <h2 style="font-size: 10px;">{{ $order->branch->name }}</h2>
                </div>
                <!--End Info-->
            </div>
            <!--End InvoiceTop-->

            <div id="mid">
                <div class="info">
                    <h2 style="font-size: 10px;">معلومات الأتصال</h2>
                    <p style="font-size: 9px;">
                        العنوان : {!! \App\Setting::find(1)->address_ara !!}</br>
                        الجوال : {!! \App\Setting::find(1)->phone !!}</br>
                    </p>
                </div>
            </div>
            <!--End Invoice Mid-->

            <div id="bot" dir="rtl" style="text-align: center">

                <div id="table">
                    <table>
                        <tr class="tabletitle">
                            <td class="item">
                                <h2 style="font-size: 10px;">اسم الصنف</h2>
                            </td>
                            <td class="Hours">
                                <h2 style="font-size: 10px;">الكمية</h2>
                            </td>
                            <td class="Rate">
                                <h2 style="font-size: 10px;">السعر</h2>
                            </td>
                        </tr>
                        @forelse ($order->orderProduct as $key => $product)
                            <tr class="service">
                                <td class="tableitem">
                                    <p class="itemtext" style="font-size: 9px;">
                                        {!! \App\Product::find($product->product_id)->name !!}
                                    </p>
                                </td>
                                <td class="tableitem" style="font-size: 9px;">
                                    <p class="itemtext"> {{ $product->quantity }}</p>
                                </td>
                                <td class="tableitem" style="font-size: 9px;">
                                    <p class="itemtext">{{ $product->price }} ريال</p>
                                </td>
                            </tr>

                        @empty

                        @endforelse




                        <tr class="tabletitle">
                            <td></td>
                            <td class="Rate">
                                <h2 style="font-size: 10px;">الخصم</h2>
                            </td>
                            <td class="payment">
                                <h2 style="font-size: 10px;">{{ $order->discount }} ريال</h2>
                            </td>
                        </tr>

                        <tr class="tabletitle">
                            <td></td>
                            <td class="Rate">
                                <h2 style="font-size: 10px;">الضريبة</h2>
                            </td>
                            <td class="payment">
                                <h2 style="font-size: 10px;">{{ (float) $order->order_vat + (float) $order->app_vat }} ريال</h2>
                            </td>
                        </tr>

                        <tr class="tabletitle">
                            <td></td>
                            <td class="Rate">
                                <h2 style="font-size: 10px;">الأجمالي</h2>
                            </td>
                            <td class="payment">
                                <h2 style="font-size: 10px;">{{ $order->total_price }} ريال</h2>
                            </td>
                        </tr>

                    </table>
                </div>
                <br>
                <div class="tax-num text-right" style="font-size: .5em">
                    <span >الرقم الضريبي</span> : <span>{!! \App\Setting::find(1)->tax_number !!}</span>
                </div>
                <!--End Table-->

                <div id="legalcopy">
                    <p class="legal">{!! \App\Setting::find(1)->description !!}
                    </p>
                </div>

            </div>
            <!--End InvoiceBot-->
        </div>
        <!--End Invoice-->



    </div>

    <script>
        var prtContent = document.getElementById("reportPrinting");
        var WinPrint = window.open();
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
        
        /*var prtContent = document.getElementById("reportPrinting");
        var WinPrint = window.open();
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        
        if (navigator.userAgent.toLowerCase().indexOf('chrome') > -1) {
            //alert("ok");
            window.PPClose = false;
            window.onbeforeunload = function () {
                if (window.PPClose === false) {
                    return 'You must use the Cancel button to close the Print Preview window.\n';
                } else {
                    showPopup = true;
                }
            }
            WinPrint.print();
            WinPrint.close();
        } else {
            
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        }*/












    </script>
</body>

</html>
