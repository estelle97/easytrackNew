@extends('layouts.base', ['title' => 'Tableau de bord'])

@section('content')
    {{-- Page Header --}}
    <div class="page-header text-white">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title">
                        Tableau de bord
                    </h2>
                </div>
            </div>
        </div>
    {{-- end Page Header --}}

    {{-- Content Body--}}
    <div class="row row-deck row-cards">
        <div class="col-sm-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">Ventes</div>
                        <div class="ml-auto lh-1">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-muted selected-sales" href="#" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Global
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item active" onclick="getSales('all'), 'Global'"> Global </a>
                                    <a class="dropdown-item" onclick="getSales(1, 'aujourd\'hui')">aujourd'hui</a>
                                    <a class="dropdown-item" onclick="getSales(7, '7 derniers jours')">7 derniers jours</a>
                                    <a class="dropdown-item" onclick="getSales(30, '30 derniers jours')">30 derniers jours</a>
                                    <a class="dropdown-item" onclick="getSales(90, '3 derniers mois')">3 derniers mois</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-baseline">
                        <div class="h1 mb-0 mr-2"> <span id="sales"> {{Auth::user()->totalSales()}} </span> Fcfa</div>
                    </div>
                </div>
                <div id="chart-ventes" class="chart-sm"></div>
            </div>
        </div>


        <div class="col-sm-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">Commandes</div>
                        <div class="ml-auto lh-1">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-muted selected-purchases" href="#" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Global
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item active" onclick="getPurchases('all'), 'Global'"> Global </a>
                                    <a class="dropdown-item" onclick="getPurchases(1, 'aujourd\'hui')">aujourd'hui</a>
                                    <a class="dropdown-item" onclick="getPurchases(7, '7 derniers jours')">7 derniers jours</a>
                                    <a class="dropdown-item" onclick="getPurchases(30, '30 derniers jours')">30 derniers jours</a>
                                    <a class="dropdown-item" onclick="getPurchases(90, '3 derniers mois')">3 derniers mois</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-baseline">
                        <div class="h1 mb-0 mr-2"> <span id="purchases"> {{Auth::user()->totalPurchases()}} </span> Fcfa</div>
                    </div>
                </div>
                <div id="chart-commandes" class="chart-sm"></div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">Revenues</div>
                        <div class="ml-auto lh-1">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-muted selected-profits" href="#" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Global
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item active" onclick="getProfits('all'), 'Global'"> Global </a>
                                    <a class="dropdown-item" onclick="getProfits(1, 'aujourd\'hui')">aujourd'hui</a>
                                    <a class="dropdown-item" onclick="getProfits(7, '7 derniers jours')">7 derniers jours</a>
                                    <a class="dropdown-item" onclick="getProfits(30, '30 derniers jours')">30 derniers jours</a>
                                    <a class="dropdown-item" onclick="getProfits(90, '3 derniers mois')">3 derniers mois</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-baseline">
                        <div class="h1 mb-0 mr-2"> <span id="profits"> {{Auth::user()->totalSales() - Auth::user()->totalPurchases()}} </span> Fcfa</div>
                    </div>
                    <div id="chart-revenues" class="chart-sm"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row row-cards row-deck">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Statistiques générales</h3>
                            <div id="chart-mentions" class="chart-lg"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body p-4 text-center">
                            <div class="h1 m-0"> {{Auth::user()->employee->site->employees->count()}} </div>
                            <div class="text-muted">employee</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body p-4 text-center">
                            <div class="h1 m-0"> {{Auth::user()->employee->site->customers->count()}} </div>
                            <div class="text-muted">Clients</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body p-4 text-center">
                            <div class="h1 m-0"> {{Auth::user()->employee->site->suppliers->count()}} </div>
                            <div class="text-muted">Fournisseurs</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div id="chart-development-activity" class="mt-4"></div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter">
                        <thead>
                            <tr>
                                <th>Utilisateur</th>
                                <th>Action</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (Auth::user()->role->slug == 'manager')
                                @foreach (Auth::user()->employee->site->actions as $action)
                                    <tr>
                                        <td class="w-1">
                                            <a href={{(Auth::user()->id == $action->initiator->id) ? route('employee.profile') : route('employee.user.show', $action->initiator->id)}}>
                                                @if ($action->initiator->photo)
                                                    <span class="avatar"> <img src="{{asset($action->initiator->photo)}}" alt=""> </span>
                                                @else
                                                    <span class="avatar"  style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name={{$action->initiator->name}}')"> </span>
                                                @endif
                                            </a>
                                        </td>
                                        <td class="td-truncate">
                                            <div class="text-truncate">
                                                {{$action->action}}
                                            </div>
                                        </td>
                                        <td class="text-nowrap text-muted"> {{date('j-m-y à H:i', strtotime($action->created_at))}} </td>
                                    </tr>
                                @endforeach
                            @else
                                @foreach (Auth::user()->actions as $action)
                                    <tr>
                                        <td class="w-1">
                                            @if ($action->initiator->photo)
                                                <span class="avatar"> <img src="{{asset($action->initiator->photo)}}" alt=""> </span>
                                            @else
                                                <span class="avatar"  style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name={{$action->initiator->name}}')"> </span>
                                            @endif
                                        </td>
                                        <td class="td-truncate">
                                            <div class="text-truncate">
                                                {{$action->action}}
                                            </div>
                                        </td>
                                        <td class="text-nowrap text-muted"> {{date('j-m-y à H:i', strtotime($action->created_at))}} </td>
                                    </tr>
                                @endforeach
                            @endif
                                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- end Content Body--}}
@endsection

@section('scripts')
    <script>

        getSales('all','Global');
        getPurchases('all', 'Global');
        getProfits('all', 'Global');

        function getSales(days, text){
            $.ajax({
                url: '/employee/stats/sales/'+days,
                method: 'get',
                success: function(data) {
                    $("#sales").fadeOut().html(data.total).fadeIn();
                    $('.selected-sales').html(text);
                    dates = data.dates;
                    sales = data.sales;

                    $('#chart-ventes').html('');

                    window.ApexCharts && (new ApexCharts(document.getElementById('chart-ventes'), {
                        chart: {
                            type: "area",
                            fontFamily: 'inherit',
                            height: 40.0,
                            sparkline: {
                                enabled: true
                            },
                            animations: {
                                enabled: true
                            },
                        },
                        dataLabels: {
                            enabled: false,
                        },
                        fill: {
                            opacity: .16,
                            type: 'solid'
                        },
                        stroke: {
                            width: 2,
                            lineCap: "round",
                            curve: "smooth",
                        },
                        series: [{
                            name: "Ventes",
                            data: sales
                        }],
                        grid: {
                            strokeDashArray: 4,
                        },
                        xaxis: {
                            labels: {
                                padding: 0
                            },
                            tooltip: {
                                enabled: false
                            },
                            axisBorder: {
                                show: false,
                            },
                            type: 'datetime',
                        },
                        yaxis: {
                            labels: {
                                padding: 4
                            },
                        },
                        labels: dates,
                        colors: ["#206bc4"],
                        legend: {
                            show: false,
                        },
                    })).render();
                }
            })
        }

        function getPurchases(days, text){
            $.ajax({
                url: '/employee/stats/purchases/'+days,
                method: 'get',
                success: function(data) {
                    $("#purchases").fadeOut().html(data.total).fadeIn();
                    $('.selected-purchases').html(text);

                    dates = data.dates;
                    purchases = data.purchases;

                    $('#chart-commandes').html('');

                    window.ApexCharts && (new ApexCharts(document.getElementById('chart-commandes'), {
                        chart: {
                            type: "bar",
                            fontFamily: 'inherit',
                            height: 40.0,
                            sparkline: {
                                enabled: true
                            },
                            animations: {
                                enabled: true
                            },
                        },
                        dataLabels: {
                            enabled: false,
                        },
                        fill: {
                            opacity: .16,
                            type: 'solid'
                        },
                        stroke: {
                            width: 2,
                            lineCap: "round",
                            curve: "smooth",
                        },
                        series: [{
                            name: "Commandes",
                            data: purchases
                        }],
                        grid: {
                            strokeDashArray: 4,
                        },
                        xaxis: {
                            labels: {
                                padding: 0
                            },
                            tooltip: {
                                enabled: false
                            },
                            axisBorder: {
                                show: false,
                            },
                            type: 'datetime',
                        },
                        yaxis: {
                            labels: {
                                padding: 4
                            },
                        },
                        labels: dates,
                        colors: ["#206bc4"],
                        legend: {
                            show: false,
                        },
                    })).render();
                }
            })
        }


        function getProfits(days, text){
            $.ajax({
                url: '/employee/stats/profits/'+days,
                method: 'get',
                success: function(data) {
                    $("#profits").fadeOut().html(data.profits).fadeIn();
                    $('.selected-profits').html(text);

                    dates = data.dates;
                    sales = data.sales;
                    purchases = data.purchases;
                    $('#chart-revenues').html('');

                    window.ApexCharts && (new ApexCharts(document.getElementById('chart-revenues'), {
                        chart: {
                            type: "line",
                            fontFamily: 'inherit',
                            height: 40.0,
                            sparkline: {
                                enabled: true
                            },
                            animations: {
                                enabled: true
                            },
                        },
                        fill: {
                            opacity: 1,
                        },
                        stroke: {
                            width: [2, 1],
                            dashArray: [0, 3],
                            lineCap: "round",
                            curve: "smooth",
                        },
                        series: [{
                            name: "Ventes",
                            data: sales
                        }, {
                            name: "Commandes",
                            data: purchases
                        }],
                        grid: {
                            strokeDashArray: 4,
                        },
                        xaxis: {
                            labels: {
                                padding: 0
                            },
                            tooltip: {
                                enabled: false
                            },
                            type: 'datetime',
                        },
                        yaxis: {
                            labels: {
                                padding: 4
                            },
                        },
                        labels: dates,
                        colors: ["#206bc4", "#a8aeb7"],
                        legend: {
                            show: false,
                        },
                    })).render();
                }
            })
        }


       // chart-active-users
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-active-users'), {
                chart: {
                    type: "bar",
                    fontFamily: 'inherit',
                    height: 40.0,
                    sparkline: {
                        enabled: true
                    },
                    animations: {
                        enabled: false
                    },
                },
                plotOptions: {
                    bar: {
                        columnWidth: '50%',
                    }
                },
                dataLabels: {
                    enabled: false,
                },
                fill: {
                    opacity: 1,
                },
                series: [{
                    name: "Profits",
                    data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27,
                        93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67
                    ]
                }],
                grid: {
                    strokeDashArray: 4,
                },
                xaxis: {
                    labels: {
                        padding: 0
                    },
                    tooltip: {
                        enabled: false
                    },
                    axisBorder: {
                        show: false,
                    },
                    type: 'datetime',
                },
                yaxis: {
                    labels: {
                        padding: 4
                    },
                },
                labels: [
                    '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24',
                    '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29',
                    '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04',
                    '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09',
                    '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14',
                    '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
                ],
                colors: ["#206bc4"],
                legend: {
                    show: false,
                },
            })).render();
        });
        // @formatter:on

    </script>

    {{-- chart-development-activity --}}
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-development-activity'), {
                chart: {
                    type: "area",
                    fontFamily: 'inherit',
                    height: 160,
                    sparkline: {
                        enabled: true
                    },
                    animations: {
                        enabled: false
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                fill: {
                    opacity: .16,
                    type: 'solid'
                },
                title: {
                    text: "Activités",
                    margin: 0,
                    floating: true,
                    offsetX: 10,
                    style: {
                        fontSize: '18px',
                    },
                },
                stroke: {
                    width: 2,
                    lineCap: "round",
                    curve: "smooth",
                },
                series: [{
                    name: "Purchases",
                    data: [3, 5, 4, 6, 7, 5, 6, 8, 24, 7, 12, 5, 6, 3, 8, 4, 14, 30, 17, 19,
                        15, 14, 25, 32, 40, 55, 60, 48, 52, 70
                    ]
                }],
                grid: {
                    strokeDashArray: 4,
                },
                xaxis: {
                    labels: {
                        padding: 0
                    },
                    tooltip: {
                        enabled: false
                    },
                    axisBorder: {
                        show: false,
                    },
                    type: 'datetime',
                },
                yaxis: {
                    labels: {
                        padding: 4
                    },
                },
                labels: [
                    '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24',
                    '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29',
                    '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04',
                    '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09',
                    '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14',
                    '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
                ],
                colors: ["#206bc4"],
                legend: {
                    show: false,
                },
                point: {
                    show: false
                },
            })).render();
        });
        // @formatter:on

    </script>
    {{-- chart-mentions --}}
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-mentions'), {
                chart: {
                    type: "bar",
                    fontFamily: 'inherit',
                    height: 240,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: false,
                    },
                    animations: {
                        enabled: false
                    },
                    stacked: true,
                },
                plotOptions: {
                    bar: {
                        columnWidth: '50%',
                    }
                },
                dataLabels: {
                    enabled: false,
                },
                fill: {
                    opacity: 1,
                },
                series: [{
                    name: "Commandes",
                    data: [1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 2, 12, 5, 8, 22, 6, 8, 6, 4, 1, 8,
                        24, 29, 51, 40, 47, 23, 26, 50, 26, 41, 22, 46, 47, 81, 46, 6
                    ]
                }, {
                    name: "Produits",
                    data: [2, 5, 4, 3, 3, 1, 4, 7, 5, 1, 2, 5, 3, 2, 6, 7, 7, 1, 5, 5, 2,
                        12, 4, 6, 18, 3, 5, 2, 13, 15, 20, 47, 18, 15, 11, 10, 0
                    ]
                }, {
                    name: "services",
                    data: [2, 9, 1, 7, 8, 3, 6, 5, 5, 4, 6, 4, 1, 9, 3, 6, 7, 5, 2, 8, 4, 9,
                        1, 2, 6, 7, 5, 1, 8, 3, 2, 3, 4, 9, 7, 1, 6
                    ]
                }],
                grid: {
                    padding: {
                        top: -20,
                        right: 0,
                        left: -4,
                        bottom: -4
                    },
                    strokeDashArray: 4,
                    xaxis: {
                        lines: {
                            show: true
                        }
                    },
                },
                xaxis: {
                    labels: {
                        padding: 0
                    },
                    tooltip: {
                        enabled: false
                    },
                    axisBorder: {
                        show: false,
                    },
                    type: 'datetime',
                },
                yaxis: {
                    labels: {
                        padding: 4
                    },
                },
                labels: [
                    '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24',
                    '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29',
                    '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04',
                    '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09',
                    '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14',
                    '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19',
                    '2020-07-20', '2020-07-21', '2020-07-22', '2020-07-23', '2020-07-24',
                    '2020-07-25', '2020-07-26'
                ],
                colors: ["#206bc4", "#79a6dc", "#bfe399"],
                legend: {
                    show: true,
                    position: 'bottom',
                    height: 32,
                    offsetY: 8,
                    markers: {
                        width: 8,
                        height: 8,
                        radius: 100,
                    },
                    itemMargin: {
                        horizontal: 8,
                    },
                },
            })).render();
        });
        // @formatter:on

    </script>
@endsection
