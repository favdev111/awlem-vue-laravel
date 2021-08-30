<!DOCTYPE html>
<html dir="rtl" xmlns="http://www.w3.org/1999/xhtml 22" xml:lang="ar" lang="ar">


<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <meta http-equiv="Content-Type" content="text/html;" />
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css" />
    <meta charset="UTF-8">
    <style media="all">
        @font-face {
            font-family: 'Roboto';
            src: url("{{ url('./Roboto-Regular.ttf') }}") format("truetype");
            font-weight: normal;
            font-style: normal;
        }

        * {
            margin: 0;
            padding: 0;
            line-height: 1.3;
            font-family: 'Roboto';
            color: #333542;
        }

        p {
            font-family: 'DroidArabicKufiRegular';
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-size: .875rem;
        }

        .gry-color *,
        .gry-color {
            color: #878f9c;
        }

        table {
            width: 100%;
        }

        table th {
            font-weight: normal;
        }

        table.padding th {
            padding: .5rem .7rem;
        }

        table.padding td {
            padding: .7rem;
        }

        table.sm-padding td {
            padding: .2rem .7rem;
        }

        .border-bottom td,
        .border-bottom th {
            border-bottom: 1px solid #eceff4;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .small {
            font-size: .85rem;
        }

        .currency {}

    </style>
</head>

<body>
    <div>

        @php
            App::setLocale('ar');
        @endphp
        <div style="padding: 1.5rem;">
            <table class="padding text-left small border-bottom">
                <thead>
                    <tr class="gry-color" style="background: #eceff4;">
                        <th width="35%">{{ __('General.notification') }}</th>
                        <th width="15%">نوع المنتج</th>
                        <th width="10%">المنتجات</th>
                        <th width="15%">المنتجات</th>
                        <th width="10%">المنتجات</th>
                        <th width="15%" class="text-right">المنتجات</th>
                    </tr>
                </thead>
                <tbody class="strong">

                    <tr class="">
                        <td>معلقه
                        </td>
                        <td>
                            معلقتين
                        </td>
                        <td class="gry-color">12</td>
                        <td class="gry-color currency">12
                        </td>
                        <td class="gry-color currency">12
                        </td>
                        <td class="text-right currency">12
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div style="padding:0 1.5rem;">
            <table style="width: 40%;margin-right:auto;" class="text-right sm-padding small strong">
                <tbody>
                    <tr>
                        <th class="gry-color text-left">100</th>
                        <td class="currency">200</td>
                    </tr>
                    <tr>
                        <th class="gry-color text-left">تكلفة الشحن</th>
                        <td class="currency">50</td>
                    </tr>
                    <tr class="border-bottom">
                        <th class="gry-color text-left">الضريبة</th>
                        <td class="currency">15</td>
                    </tr>
                    <tr>
                        <th class="text-left strong">المجموع</th>
                        <td class="currency">50</td>
                    </tr>
                </tbody>
            </table>
        </div>


        <br>
        <br>
        <br>
        <br><br><br>
        <br>
        <br>

        <hr>



        <div style="padding:0 1.5rem;padding-bottom: 0;display: block;position: absolute;">
            <table class="sm-padding small strong">
                <thead>
                    <tr>
                        <th width="35%" style="font-size: 18px;font-weight: 600;">تعليمات</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>نادر جمال</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</body>

</html>
