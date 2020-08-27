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
    <div class="col-sm-12 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">Ventes</div>
                    <div class="ml-auto lh-1">
                        <div class="dropdown">
                            <a class="dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                7 derniers jours
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item active" href="#">7 derniers jours</a>
                                <a class="dropdown-item" href="#">30 derniers jours</a>
                                <a class="dropdown-item" href="#">3 derniers mois</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h1 mb-3">75%</div>
                <div class="d-flex mb-2">
                    <div>Taux de conversion</div>
                    <div class="ml-auto">
                        <span class="text-green d-inline-flex align-items-center lh-1">
                            7% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <polyline points="3 17 9 11 13 15 21 7" />
                                <polyline points="14 7 21 7 21 14" /></svg>
                        </span>
                    </div>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-blue" style="width: 75%" role="progressbar" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">75% Complete</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">Revenue</div>
                    <div class="ml-auto lh-1">
                        <div class="dropdown">
                            <a class="dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                7 derniers jours
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item active" href="#">7 derniers jours</a>
                                <a class="dropdown-item" href="#">30 derniers jours</a>
                                <a class="dropdown-item" href="#">3 derniers mois</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-baseline">
                    <div class="h1 mb-0 mr-2">4M XAF</div>
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
            <div id="chart-revenue-bg" class="chart-sm"></div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">Achats</div>
                    <div class="ml-auto lh-1">
                        <div class="dropdown">
                            <a class="dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                7 derniers jours
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item active" href="#">7 derniers jours</a>
                                <a class="dropdown-item" href="#">30 derniers jours</a>
                                <a class="dropdown-item" href="#">3 derniers mois</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-baseline">
                    <div class="h1 mb-3 mr-2">6,782</div>
                    <div class="mr-auto">
                        <span class="text-yellow d-inline-flex align-items-center lh-1">
                            0% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="5" y1="12" x2="19" y2="12" /></svg>
                        </span>
                    </div>
                </div>
                <div id="chart-new-clients" class="chart-sm"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">Utilisateurs</div>
                    <div class="ml-auto lh-1">
                        <div class="dropdown">
                            <a class="dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                7 derniers jours
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item active" href="#">7 derniers jours</a>
                                <a class="dropdown-item" href="#">30 derniers jours</a>
                                <a class="dropdown-item" href="#">3 derniers mois</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-baseline">
                    <div class="h1 mb-3 mr-2">15</div>
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
                <div id="chart-active-users" class="chart-sm"></div>
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
                                    <a class="dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        7 derniers jours
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item active" href="#">7 derniers jours</a>
                                        <a class="dropdown-item" href="#">30 derniers jours</a>
                                        <a class="dropdown-item" href="#">3 derniers mois</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table card-table table-vcenter">
                        <thead>
                            <tr>
                                <th>Forfaits</th>
                                <th>Utilisateurs</th>
                                <th>Désabonés</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Gold</td>
                                <td>3,550</td>
                                <td>200</td>
                                <td class="w-50">
                                    <div class="progress progress-xs">
                                        <div class="progress-bar bg-primary" style="width: 71.0%"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Premium</td>
                                <td>1,798</td>
                                <td>150</td>
                                <td class="w-50">
                                    <div class="progress progress-xs">
                                        <div class="progress-bar bg-primary" style="width: 35.96%"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Classic</td>
                                <td>854</td>
                                <td>10</td>
                                <td class="w-50">
                                    <div class="progress progress-xs">
                                        <div class="progress-bar bg-primary" style="width: 17.08%"></div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
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
                            <div class="chart-sparkline chart-sparkline-square" id="sparkline-intermediate"></div>
                        </div>
                        <div class="mr-3 lh-sm">
                            <div class="strong">
                                Pro (Annulé)
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
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-3">
        <div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-1">
                            <div class="dropdown">
                                <a class="dropdown-toggle h2 text-muted" href="#" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Cameroun
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item active" href="#">7 derniers jours</a>
                                    <a class="dropdown-item" href="#">30 derniers jours</a>
                                    <a class="dropdown-item" href="#">3 derniers mois</a>
                                </div>
                            </div>
                            <div class="ml-auto lh-1">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        7 derniers jours
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item active" href="#">7 derniers jours</a>
                                        <a class="dropdown-item" href="#">30 derniers jours</a>
                                        <a class="dropdown-item" href="#">3 derniers mois</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <div class="subheader">Abonements par ville</div>
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
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
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
            series: [44, 55, 12, 2],
            labels: ["Yaound", "Douala", "Bafoussam", "Kribi"],
            grid: {
                strokeDashArray: 4,
            },
            colors: ["#206bc4", "#79a6dc", "#bfe399", "#e9ecf1"],
            legend: {
                show: false,
            },
            tooltip: {
                fillSeriesColor: false
            },
        })).render();
    });
    // @formatter:on
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
        $().peity && $('#sparkline-intermediate').text("5/100").peity("pie", {
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
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-revenue-bg'), {
            chart: {
                type: "area",
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
{{-- chart-new-clients --}}
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-new-clients'), {
            chart: {
                type: "line",
                fontFamily: 'inherit',
                height: 40.0,
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
            stroke: {
                width: [2, 1],
                dashArray: [0, 3],
                lineCap: "round",
                curve: "smooth",
            },
            series: [{
                name: "May",
                data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27,
                    93, 53, 61, 27, 54, 43, 4, 46, 39, 62, 51, 35, 41, 67
                ]
            }, {
                name: "April",
                data: [93, 54, 51, 24, 35, 35, 31, 67, 19, 43, 28, 36, 62, 61, 27, 39,
                    35, 41, 27, 35, 51, 46, 62, 37, 44, 53, 41, 65, 39, 37
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
            colors: ["#206bc4", "#a8aeb7"],
            legend: {
                show: false,
            },
        })).render();
    });
    // @formatter:on

</script>
{{-- chart-active-users --}}
<script>
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
