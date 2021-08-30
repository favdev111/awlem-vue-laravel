<script src="{{ url('./Panel/adminAssets/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('#customersindex').removeClass('mm-active');
        $('#dassboard').addClass('mm-show').find('a').addClass('mm-active');
    });

</script>
@extends('admin.layout')
@section('content')
    <style>
        #myChart {
            width: 100%;
            margin-top: 0 !important;
        }

        #statsSelect,
        #statsSelect2 {
            float: right;
            margin-top: 1.5em;
            margin-right: 2em;
            background-color: #D80200;
            color: #FFF;
            border-radius: 1em;
            padding: .3em
        }

        .main-card {
            border-radius: 2em !important;
        }

    </style>
    <div class="app-main__inner">

        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="row select">
                    <select id="statsSelect">
                        <option value="2">{{ __('Monthly') }}</option>
                        <option value="1">{{ __('Weekly') }}</option>
                        <option value="0">{{ __('Daily') }}</option>
                        <option value="3">{{ __('Yearly') }}</option>
                    </select>
                </div>
                <canvas id="myChart" height="400"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('مطاعم معلقة') }}</h5>
                        @if (count($retorants_pending))
                            <table style="width: 100%;" id="" class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>

                                        <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                            {{ __('restorant.name') }}
                                        </th>
                                        <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                            {{ __('restorant.user_id') }}
                                        </th>
                                        <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                            {{ __('restorant.category_id') }}
                                        </th>
                                        <th data-field="date" data-align="center" data-sortable="true"
                                            data-formatter="dateFormatter">{{ __('تاريخ الأضافة') }}</th>
                                        <th data-field="op" data-align="center" data-sortable="false" data-formatter="">
                                            {{ __('General.Options') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($retorants_pending as $key => $restorant)
                                        <tr>
                                            <td>{{ $restorant->name }}</td>
                                            <td>
                                                <a
                                                    href={{ url('admin/users/' . $restorant->user->id) }}>{{ $restorant->user->name }}</a>
                                            </td>
                                            <td>
                                                <a
                                                    href={{ url('admin/categories/' . $restorant->category->id) }}>{{ $restorant->category->name }}</a>
                                            </td>
                                            <td>{{ $restorant->created_at }}</td>
                                            <td>
                                                <div class="row">
                                                    <span>
                                                        {{ Form::open(['method' => 'DELETE', 'style' => 'margin-top: -12%;', 'action' => ['Admin\RestorantsController@destroy', $restorant->id]]) }}
                                                        {{ Form::hidden('id', $restorant->id) }}
                                                        <button class="mt-1 btn btn-defult fas-size-margin add-tooltip"
                                                            type="submit" data-toggle="tooltip"
                                                            title="{{ __('General.Delete') }}"
                                                            onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                                class="fas fa-trash-alt"></i></button>

                                                        {{ Form::close() }}
                                                    </span>

                                                    <a class="fas-size-margin add-tooltip fas fa-edit" data-toggle="tooltip"
                                                        title="{{ __('General.Edit') }}"
                                                        href="{{ url('/admin/restorants/' . $restorant->id . '/edit') }}">
                                                    </a>
                                                    <a class="fas-size-margin add-tooltip fas  fa-eye" data-toggle="tooltip"
                                                        title="{{ __('General.View') }}"
                                                        href="{{ url('/admin/restorants/' . $restorant->id) }}"> </a>


                                                </div>

                                            </td>


                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        @else
                            {{ __('General.No Data Avalible') }}
                        @endif
                    </div>
                </div>

            </div>
            <div class="col-md">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('أخر طلبات') }}</h5>
                        @if (count($last_orders))
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
                                    @foreach ($last_orders as $key => $order)
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
                            {{ __('لا يوجد طلبات') }}
                        @endif
                    </div>
                </div>

            </div>
        </div>

        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">{{ __('أخر الشكاوي') }}</h5>
                @if (count($last_complaints))
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
                                    {{ __('مقدم الشكوي') }}
                                </th>
                                <th data-field="" data-align="center" data-sortable="true" data-formatter="">
                                    {{ __('تاريخ الشكوي') }}
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($last_complaints as $key => $complaint)
                                <tr>
                                    <td>{{ $complaint->id }}</td>
                                    <td>{{ $complaint->name }}</td>
                                    <td style="width: 50%;">{{ $complaint->body }}</td>
                                    <td class="text-center"><a data-toggle="tooltip" title="{{ __('مشاهدة مقدم الشكوي') }}"
                                            href="{{ url('/admin/clients/' . $complaint->user->id) }}">
                                            {{ $complaint->user->name }}
                                        </a></td>
                                    <td>{{ $complaint->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                @else
                    {{ __('لا يوجد شكاوي') }}
                @endif
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            let labels = [];
            let usersData = [];
            $.when(
                $.get("{{ url('admin/getLabelsMonthly') }}",
                    function(data) {
                        labels = jQuery.parseJSON(data);
                    }
                ),
                $.get("{{ url('admin/getUsersMonthly/admins') }}",
                    function(data) {
                        usersData = jQuery.parseJSON(data);
                    }
                ),
                $.get("{{ url('admin/getUsersMonthly/user') }}",
                    function(data) {
                        clientsData = jQuery.parseJSON(data);
                    }
                ),
                $.get("{{ url('admin/getRestorantsMonthly') }}",
                    function(data) {
                        RestorantsData = jQuery.parseJSON(data);
                    }
                ),
                $.get("{{ url('admin/getBranchesMonthly') }}",
                    function(data) {
                        BranchesData = jQuery.parseJSON(data);
                    }
                ),
                $.get("{{ url('admin/getOrdersMonthly') }}",
                    function(data) {
                        OrdersData = jQuery.parseJSON(data);
                    }
                )

            ).then(function() {
                initializeChart(labels.labels, usersData.usersData, clientsData.usersData, RestorantsData
                    .RestorantsData, BranchesData.BranchesData, OrdersData.OrdersData);
            });

            function initializeChart(labelsData, usersData, clientsData, RestorantsData, BranchesData, OrdersData) {
                var ctx = document.getElementById("myChart");
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labelsData,
                        datasets: [{
                                label: "{{ __('Users.Users') }}",
                                borderWidth: 4,
                                data: usersData,
                                backgroundColor: '#D80200',
                                borderColor: '#D80200',
                                fill: false

                            },
                            {
                                label: "{{ __('العملاء') }}",
                                borderWidth: 4,
                                data: clientsData,
                                backgroundColor: '#4A4A48',
                                borderColor: '#4A4A48',
                                fill: false

                            },
                            {
                                label: "{{ __('المطاعم') }}",
                                borderWidth: 4,
                                data: RestorantsData,
                                backgroundColor: '#3368FF',
                                borderColor: '#3368FF',
                                fill: false

                            },
                            {
                                label: "{{ __('الفروع') }}",
                                borderWidth: 4,
                                data: BranchesData,
                                backgroundColor: '#40D11C',
                                borderColor: '#40D11C',
                                fill: false

                            },
                            {
                                label: "{{ __('الطلبات') }}",
                                borderWidth: 4,
                                data: OrdersData,
                                backgroundColor: '#EBF8A4',
                                borderColor: '#EBF8A4',
                                fill: false

                            }
                        ]
                    },
                    options: {
                        responsive: false,
                        maintainAspectRatio: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });


                window.chart = myChart;
            }


            $('#statsSelect').change(function() {
                var labelsStats = ['getLabelsDaily', 'getLabelsWeekly', 'getLabelsMonthly',
                    'getLabelsYearly'
                ];
                var RestorantsStats = ['getRestorantsDaily', 'getRestorantsWeekly', 'getRestorantsMonthly',
                    'getRestorantsYearly'
                ];
                var BranchesStats = ['getBranchesDaily', 'getBranchesWeekly', 'getBranchesMonthly',
                    'getBranchesYearly'
                ];
                var UsersStats = ['getUsersDaily/admins', 'getUsersWeekly/admins', 'getUsersMonthly/admins',
                    'getUsersYearly/admins'
                ];
                var ClientsStats = ['getUsersDaily/user', 'getUsersWeekly/user', 'getUsersMonthly/user',
                    'getUsersYearly/user'
                ];

                var OrdersStats = ['getOrdersDaily', 'getOrdersWeekly', 'getOrdersMonthly',
                    'getOrdersYearly'
                ];

                var selectedValue = $(this).val();
                var newLabels, newUsers, newClients, newRestorants, newBranches, newOrders = [];
                var x = labelsStats[selectedValue];
                $.when(
                    $.get(
                        `{{ url('admin/${labelsStats[selectedValue]}') }}`,
                        function(data) {
                            newLabels = jQuery.parseJSON(data);
                        }
                    ),
                    $.get(
                        `{{ url('admin/${UsersStats[selectedValue]}') }}`,
                        function(data) {
                            newUsers = jQuery.parseJSON(data);
                        }
                    ),
                    $.get(
                        `{{ url('admin/${ClientsStats[selectedValue]}') }}`,
                        function(data) {
                            newClients = jQuery.parseJSON(data);
                        }
                    ),
                    $.get(
                        `{{ url('admin/${RestorantsStats[selectedValue]}') }}`,
                        function(data) {
                            newRestorants = jQuery.parseJSON(data);
                        }
                    ),
                    $.get(
                        `{{ url('admin/${BranchesStats[selectedValue]}') }}`,
                        function(data) {
                            newBranches = jQuery.parseJSON(data);
                        }
                    ),
                    $.get(
                        `{{ url('admin/${OrdersStats[selectedValue]}') }}`,
                        function(data) {
                            newOrders = jQuery.parseJSON(data);
                        }
                    )

                ).then(function() {
                    updateChart(newLabels.labels, newUsers.usersData, newClients.usersData,
                        newRestorants.RestorantsData, newBranches.BranchesData, newOrders
                        .OrdersData);
                });
            });

            function updateChart(labelsData, usersData, clientsData, RestorantsData, BranchesData,OrdersData) {
                window.chart.data.labels = labelsData;
                chart.data.datasets[0].data = usersData;
                chart.data.datasets[1].data = clientsData;
                chart.data.datasets[2].data = RestorantsData;
                chart.data.datasets[3].data = BranchesData;
                chart.data.datasets[4].data = OrdersData;
                window.chart.update();
            }
        });

    </script>
@endsection
