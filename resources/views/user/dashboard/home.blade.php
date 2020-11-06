@extends('layouts.mainlayoutUser')

@section('content')
        <div class="content">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header text-white">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <h2 class="page-title">
                                Tableau de bord
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row row-deck row-cards">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Ventes</div>
                                    <div class="ml-auto lh-1">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle text-muted" href="#" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
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
                                            7% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <polyline points="3 17 9 11 13 15 21 7" />
                                                <polyline points="14 7 21 7 21 14" /></svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-blue" style="width: 75%" role="progressbar"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                        <span class="sr-only">75% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Revenue</div>
                                    <div class="ml-auto lh-1">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle text-muted" href="#" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
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
                                            8% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Nouveaux clients</div>
                                    <div class="ml-auto lh-1">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle text-muted" href="#" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
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
                                            0% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <line x1="5" y1="12" x2="19" y2="12" /></svg>
                                        </span>
                                    </div>
                                </div>
                                <div id="chart-new-clients" class="chart-sm"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">employés actifs </div>
                                    <div class="ml-auto lh-1">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle text-muted" href="#" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
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
                                            4% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                        <div class="h1 m-0">40</div>
                                        <div class="text-muted">Produits</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body p-4 text-center">
                                        <div class="h1 m-0">8</div>
                                        <div class="text-muted">Services</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body p-4 text-center">
                                        <div class="h1 m-0">13</div>
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
                </div>
            </div>

        </div>
@endsection
