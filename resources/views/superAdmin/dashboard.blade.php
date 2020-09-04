@extends('layouts.base')

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
    <div class="col-sm-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader"> Companies </div>
                    <div class="ml-auto lh-1">
                        <div class="dropdown">
                            <a class="dropdown-toggle text-muted selected-companies" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                Ce mois ci
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item active" onclick="getCompanies('all', 'derniers mois')"> Global </a>
                                <a class="dropdown-item" onclick="getCompanies(1, 'Ce mois ci')">Ce mois ci</a>
                                <a class="dropdown-item" onclick="getCompanies(2, '2 derniers mois')">2 deriers mois</a>
                                <a class="dropdown-item" onclick="getCompanies(3, '3 derniers mois')">3 derniers mois</a>
                                <a class="dropdown-item" onclick="getCompanies(6, '6 derniers mois')">6 derniers mois</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-baseline">
                    <div class="h1 mb-0 mr-2 companies"> 500 </div>
                    <div class="mr-auto">
                        <span class="text-green d-inline-flex align-items-center lh-1">
                            8% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <polyline points="3 17 9 11 13 15 21 7" />
                                <polyline points="14 7 21 7 21 14" /></svg>
                        </span>
                    </div>
                </div>
            </div>
            <div id="chart-companies" class="chart-sm"></div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader"> Revenus </div>
                    <div class="ml-auto lh-1">
                        <div class="dropdown">
                            <a class="dropdown-toggle text-muted selected-profits" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                Ce mois ci
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item active" onclick="getProfits('all', 'derniers mois')"> Global </a>
                                <a class="dropdown-item" onclick="getProfits(1, 'Ce mois ci')">Ce mois ci</a>
                                <a class="dropdown-item" onclick="getProfits(2, '2 derniers mois')">2 deriers mois</a>
                                <a class="dropdown-item" onclick="getProfits(3, '3 derniers mois')">3 derniers mois</a>
                                <a class="dropdown-item" onclick="getProfits(6, '6 derniers mois')">6 derniers mois</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-baseline">
                    <div class="h1 mb-0 mr-2 profits"> 500 </div>
                    <div class="mr-auto">
                        <span class="text-green d-inline-flex align-items-center lh-1">
                            8% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <polyline points="3 17 9 11 13 15 21 7" />
                                <polyline points="14 7 21 7 21 14" /></svg>
                        </span>
                    </div>
                </div>
            </div>
            <div id="chart-profits" class="chart-sm"></div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader"> Utilisateurs </div>
                    <div class="ml-auto lh-1">
                        <div class="dropdown">
                            <a class="dropdown-toggle text-muted selected-users" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                Ce mois ci
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item active" onclick="getUsers('all', 'derniers mois')"> Global </a>
                                <a class="dropdown-item" onclick="getUsers(1, 'Ce mois ci')">Ce mois ci</a>
                                <a class="dropdown-item" onclick="getUsers(2, '2 derniers mois')">2 deriers mois</a>
                                <a class="dropdown-item" onclick="getUsers(3, '3 derniers mois')">3 derniers mois</a>
                                <a class="dropdown-item" onclick="getUsers(6, '6 derniers mois')">6 derniers mois</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-baseline">
                    <div class="h1 mb-3 mr-2 users">15</div>
                    <div class="mr-auto">
                        <span class="text-green d-inline-flex align-items-center lh-1">
                            4% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <polyline points="3 17 9 11 13 15 21 7" />
                                <polyline points="14 7 21 7 21 14" /></svg>
                        </span>
                    </div>
                </div>
                <div id="chart-users" class="chart-sm"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-4">
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
                        <tr>
                            <td class="w-1">
                                <span class="avatar">PR</span>
                            </td>
                            <td class="td-truncate">
                                <div class="text-truncate">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                </div>
                            </td>
                            <td class="text-nowrap text-muted">17 Juin 2020</td>
                        </tr>
                        <tr>
                            <td class="w-1">
                                <span class="avatar">DW</span>
                            </td>
                            <td class="td-truncate">
                                <div class="text-truncate">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                </div>
                            </td>
                            <td class="text-nowrap text-muted">17 Juin 2020</td>
                        </tr>
                        <tr>
                            <td class="w-1">
                                <span class="avatar">IU</span>
                            </td>
                            <td class="td-truncate">
                                <div class="text-truncate">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                </div>
                            </td>
                            <td class="text-nowrap text-muted">17 Juin 2020</td>
                        </tr>
                        <tr>
                            <td class="w-1">
                                <span class="avatar">LA</span>
                            </td>
                            <td class="td-truncate">
                                <div class="text-truncate">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                </div>
                            </td>
                            <td class="text-nowrap text-muted">17 Juin 2020</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-5">
        <div class="row row-cards">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Statistique d'Abonements</div>
                            <div class="ml-auto lh-1">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-muted selected-package" href="#" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Global
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item active" onclick="getPackages('all', 'derniers mois')">Global</a>
                                        <a class="dropdown-item" onclick="getPackages(1, 'Ce mois ci')">Ce mois ci</a>
                                        <a class="dropdown-item" onclick="getPackages(2, '2 derniers mois')">2 derniers mois</a>
                                        <a class="dropdown-item" onclick="getPackages(3, '3 derniers mois')">3 derniers mois</a>
                                        <a class="dropdown-item" onclick="getPackages(6, '6 derniers mois')">6 derniers mois</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table card-table table-vcenter">
                        <thead>
                            <tr>
                                <th>Forfaits</th>
                                <th>Companies</th>
                                <th>Activées</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="packages">

                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <div class="col-lg-6">
                <div class="card card-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="mr-3">
                            <div class="chart-sparkline chart-sparkline-square" id="sparkline-gold"></div>
                        </div>
                        <div class="mr-3 lh-sm">
                            <div class="strong">
                                Gold (Annulé)
                            </div>
                            <div class="text-muted">10 Utilisateurs</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="mr-3">
                            <div class="chart-sparkline chart-sparkline-square" id="sparkline-premium"></div>
                        </div>
                        <div class="mr-3 lh-sm">
                            <div class="strong">
                                Premium (Annulé)
                            </div>
                            <div class="text-muted">20 Utilisateurs</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="mr-3">
                            <div class="chart-sparkline chart-sparkline-square" id="sparkline-pro"></div>
                        </div>
                        <div class="mr-3 lh-sm">
                            <div class="strong">
                                Profesionnel (Annulé)
                            </div>
                            <div class="text-muted">5 Utilisateurs</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="mr-3">
                            <div class="chart-sparkline chart-sparkline-square" id="sparkline-classic"></div>
                        </div>
                        <div class="mr-3 lh-sm">
                            <div class="strong">
                                Classic (Annulé)
                            </div>
                            <div class="text-muted">0 Utilisateurs</div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <div class="col-sm-12 col-lg-3">
        <div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex mb-2">
                            <div class="subheader">Abonements par ville<br>sur la plateforme</div>
                        </div>

                        <div id="chart-subscriptions-peer-city"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
{{-- end Content Body--}}
@endsection

@section('scripts')
<script>
    getSubPerTown();
    getPackages('all','Global');
    getCompanies('all', 'Global');
    getProfits('all', 'Global');
    getUsers('all', 'Global');
    // @formatter:off
    function getSubPerTown(){
        $.ajax({
            url: '/easytrack/stats/towns',
                method: 'get',
                success: function(data) {
                    window.ApexCharts && (new ApexCharts(document.getElementById('chart-subscriptions-peer-city'), {
                        chart: {
                            type: "donut",
                            fontFamily: 'inherit',
                            height: 240,
                            sparkline: {
                                enabled: true
                            },
                            animations: {
                                enabled: false
                            },
                        },
                        fill: {
                            opacity: 1,
                        },
                        series: data.users,
                        labels: data.towns,
                        grid: {
                            strokeDashArray: 4,
                        },
                        colors: data.colors,
                        legend: {
                            show: false,
                        },
                        tooltip: {
                            fillSeriesColor: false
                        },
                    })).render();
                },
        });
    }


    function getPackages(months, text){
        $.ajax({
            url: '/easytrack/stats/packages/'+months,
            method: 'get',
            success: function(data){
                $('.selected-package').html(text);
                $('#packages').fadeOut().html(data).fadeIn();
            }
        });
    }


    function getCompanies(months, text){
        $.ajax({
            url: '/easytrack/stats/companies/'+months,
            method: 'get',
            success: function(data) {
                $(".companies").fadeOut().html(data.total).fadeIn();
                $('.selected-companies').html(text);

                console.log(data);
                // dates = data.dates;
                // sales = data.sales;

                $('#chart-companies').html('');

                window.ApexCharts && (new ApexCharts(document.getElementById('chart-companies'), {
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
                            padding: 0,
                            datetimeFormatter: {
                                year: 'yyyy',
                                month: 'MMM \'yy',
                            },
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
            }
        })
    }


    function getProfits(months, text){
        $.ajax({
            url: '/easytrack/stats/profits/'+months,
            method: 'get',
            success: function(data) {
                $(".profits").fadeOut().html(data.total).fadeIn();
                $('.selected-profits').html(text);
                dates = data.dates;
                sales = data.sales;

                $('#chart-profits').html('');

                window.ApexCharts && (new ApexCharts(document.getElementById('chart-profits'), {
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
                            padding: 0,
                            datetimeFormatter: {
                                year: 'yyyy',
                                month: 'MMM \'yy',
                            },
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
            }
        })
    }


    function getUsers(months, text){
        $.ajax({
            url: '/easytrack/stats/users/'+months,
            method: 'get',
            success: function(data) {
                $(".users").fadeOut().html(data.total).fadeIn();
                $('.selected-users').html(text);
                dates = data.dates;
                sales = data.sales;

                $('#chart-users').html('');

                window.ApexCharts && (new ApexCharts(document.getElementById('chart-users'), {
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
                            padding: 0,
                            datetimeFormatter: {
                                year: 'yyyy',
                                month: 'MMM \'yy',
                            },
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
            }
        })
    }

</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        $().peity && $('#sparkline-gold').text("10/100").peity("pie", {
            width: 40,
            height: 40,
            stroke: "#206bc4",
            strokeWidth: 2,
            fill: ["#206bc4", "rgba(110, 117, 130, 0.2)"],
            padding: .2,
            innerRadius: 17,
        });
    });

</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        $().peity && $('#sparkline-premium').text("20/100").peity("pie", {
            width: 40,
            height: 40,
            stroke: "#206bc4",
            strokeWidth: 2,
            fill: ["#206bc4", "rgba(110, 117, 130, 0.2)"],
            padding: .2,
            innerRadius: 17,
        });
    });

</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        $().peity && $('#sparkline-pro').text("5/100").peity("pie", {
            width: 40,
            height: 40,
            stroke: "#206bc4",
            strokeWidth: 2,
            fill: ["#206bc4", "rgba(110, 117, 130, 0.2)"],
            padding: .2,
            innerRadius: 17,
        });
    });

</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        $().peity && $('#sparkline-classic').text("0/100").peity("pie", {
            width: 40,
            height: 40,
            stroke: "#206bc4",
            strokeWidth: 2,
            fill: ["#206bc4", "rgba(110, 117, 130, 0.2)"],
            padding: .2,
            innerRadius: 17,
        });
    });

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
