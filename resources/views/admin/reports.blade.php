@extends('layouts.base')

@section('content')

<!-- Page title -->
<div class="page-header-2 text-white">
    <div class="row align-items-center">
        <div class="col-auto mb-3">
            <h2 class="page-title">
                Vos statistiques
            </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ml-auto d-print-none mb-3">
            <div class="d-flex align-items-center">
                <span class="dropdown">
                    <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M12 23.728l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zm4.95-7.778a7 7 0 1 0-9.9 0L12 20.9l4.95-4.95zM12 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"
                                fill="rgba(255,255,255,1)" /></svg>
                        Tous les sites
                    </div>

                    <div class="dropdown-menu dropdown-menu-right mt-3">
                        <a class="dropdown-item" href="#">
                            Akoua
                        </a>
                        <a class="dropdown-item" href="#">
                            Konengui
                        </a>
                        <a class="dropdown-item" href="#">
                            Mfou
                        </a>
                        <a class="dropdown-item" href="#">
                            Bastos
                        </a>
                    </div>
                </span>
                <span class="dropdown ml-5">
                    <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm1-8h4v2h-6V7h2v5z"
                                fill="rgba(255,255,255,1)" /></svg>
                        Le mois dernier
                    </div>

                    <div class="dropdown-menu dropdown-menu-right mt-3">
                        <span class="dropdown-header">Actions</span>
                        <a class="dropdown-item" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"
                                class="mr-2">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z" />
                            </svg>
                            7 Derniers jours
                        </a>
                        <a class="dropdown-item" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"
                                class="mr-2">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z" />
                            </svg>
                            Cet semaine
                        </a>
                        <a class="dropdown-item" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"
                                class="mr-2">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z" />
                            </svg>
                            Le mois dernier
                        </a>
                    </div>
                </span>
            </div>

        </div>
    </div>
</div>
<div class="row row-deck row-cards">
    <div class="col-sm-6 col-lg-4">
        <div class="card" data-color="red">
            <div class="card-body">
                <div class="text-muted font-weight-normal mt-0">Revenue</div>
                <h3 class="h2 mt-2 mb-3">$58,924</h3>
                <p class="mb-0 text-muted">
                    <span class="text-red d-inline-flex align-items-center lh-1">
                        -3.1% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <polyline points="3 7 9 13 13 9 21 17"></polyline>
                            <polyline points="21 10 21 17 14 17"></polyline>
                        </svg>
                    </span>
                    <span class="text-nowrap">Le mois dernier</span>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="card" data-color="red">
            <div class="card-body">
                <div class="text-muted font-weight-normal mt-0">Ventes</div>
                <h3 class="h2 mt-2 mb-3">$58,924</h3>
                <p class="mb-0 text-muted">
                    <span class="text-green d-inline-flex align-items-center lh-1">
                        5.2% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <polyline points="3 17 9 11 13 15 21 7"></polyline>
                            <polyline points="14 7 21 7 21 14"></polyline>
                        </svg>
                    </span>
                    <span class="text-nowrap">Le mois dernier</span>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="card" data-color="red">
            <div class="card-body">
                <div class="text-muted font-weight-normal mt-0">Achats</div>
                <h3 class="h2 mt-2 mb-3">$58,924</h3>
                <p class="mb-0 text-muted">
                    <span class="text-red d-inline-flex align-items-center lh-1">
                        -3.1% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <polyline points="3 7 9 13 13 9 21 17"></polyline>
                            <polyline points="21 10 21 17 14 17"></polyline>
                        </svg>
                    </span>
                    <span class="text-nowrap">Le mois dernier</span>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ventes par catégorie</h4>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter">
                    <thead>
                        <tr>
                            <th>Catégorie</th>
                            <th>Articles vendu</th>
                            <th>Cout</th>
                            <th colspan="2">Pourcentage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                Bières
                                <a href="#" class="link-secondary ml-2">
                                </a>
                            </td>
                            <td class="text-muted">4,896</td>
                            <td class="text-muted">3.654.100 XAF</td>
                            <td class="text-muted">82.54%</td>
                            <td class="text-right">
                                <div class="chart-sparkline" id="sparkline-9" style="display: none;">17, 24, 20, 10, 5,
                                    1, 4, 18, 13</div><svg class="peity" height="40" width="64">
                                    <polygon fill="#d2e1f3"
                                        points="0 39 0 12.083333333333332 8 1 16 7.333333333333332 24 23.166666666666664 32 31.083333333333332 40 37.416666666666664 48 32.66666666666667 56 10.5 64 18.416666666666668 64 39">
                                    </polygon>
                                    <polyline fill="none"
                                        points="0 12.083333333333332 8 1 16 7.333333333333332 24 23.166666666666664 32 31.083333333333332 40 37.416666666666664 48 32.66666666666667 56 10.5 64 18.416666666666668"
                                        stroke="#206bc4" stroke-width="2" stroke-linecap="square"></polyline>
                                </svg>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Whisky
                                <a href="#" class="link-secondary ml-2">
                                </a>
                            </td>
                            <td class="text-muted">3,652</td>
                            <td class="text-muted">3.654.100 XAF</td>
                            <td class="text-muted">76.29%</td>
                            <td class="text-right">
                                <div class="chart-sparkline" id="sparkline-10" style="display: none;">13, 11, 19, 22,
                                    12, 7, 14, 3, 21</div><svg class="peity" height="40" width="64">
                                    <polygon fill="#d2e1f3"
                                        points="0 39 0 16.545454545454543 8 20 16 6.18181818181818 24 1 32 18.272727272727273 40 26.90909090909091 48 14.81818181818182 56 33.81818181818182 64 2.7272727272727266 64 39">
                                    </polygon>
                                    <polyline fill="none"
                                        points="0 16.545454545454543 8 20 16 6.18181818181818 24 1 32 18.272727272727273 40 26.90909090909091 48 14.81818181818182 56 33.81818181818182 64 2.7272727272727266"
                                        stroke="#206bc4" stroke-width="2" stroke-linecap="square"></polyline>
                                </svg>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Jus naturel
                                <a href="#" class="link-secondary ml-2">
                                </a>
                            </td>
                            <td class="text-muted">3,256</td>
                            <td class="text-muted">3.654.100 XAF</td>
                            <td class="text-muted">72.65%</td>
                            <td class="text-right">
                                <div class="chart-sparkline" id="sparkline-11" style="display: none;">10, 13, 10, 4, 17,
                                    3, 23, 22, 19</div><svg class="peity" height="40" width="64">
                                    <polygon fill="#d2e1f3"
                                        points="0 39 0 22.47826086956522 8 17.521739130434785 16 22.47826086956522 24 32.391304347826086 32 10.913043478260871 40 34.04347826086956 48 1 56 2.6521739130434767 64 7.608695652173914 64 39">
                                    </polygon>
                                    <polyline fill="none"
                                        points="0 22.47826086956522 8 17.521739130434785 16 22.47826086956522 24 32.391304347826086 32 10.913043478260871 40 34.04347826086956 48 1 56 2.6521739130434767 64 7.608695652173914"
                                        stroke="#206bc4" stroke-width="2" stroke-linecap="square"></polyline>
                                </svg>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-4">
        <div class="row row-cards">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body p-2 text-center">
                        <div class="text-right text-red">
                            <span class="text-red d-inline-flex align-items-center lh-1"></span>
                        </div>
                        <div class="h1 m-0">20</div>
                        <div class="text-muted mb-4">Catégorie(s)</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                  <div class="card-body p-2 text-center">
                    <div class="text-right text-green">
                      <span class="text-green d-inline-flex align-items-center lh-1">
                        6% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><polyline points="3 17 9 11 13 15 21 7"></polyline><polyline points="14 7 21 7 21 14"></polyline></svg>
                      </span>
                    </div>
                    <div class="h1 m-0">8K</div>
                    <div class="text-muted mb-4">Total artciles achetés</div>
                  </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body p-2 text-center">
                        <div class="text-right text-green">
                            <span class="text-green d-inline-flex align-items-center lh-1">
                                6% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <polyline points="3 17 9 11 13 15 21 7"></polyline>
                                    <polyline points="14 7 21 7 21 14"></polyline>
                                </svg>
                            </span>
                        </div>
                        <div class="h1 m-0">80%</div>
                        <div class="text-muted mb-4">Pourcentage moyen de ventes</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-sm-12 col-lg-5">
        <div class="row row-cards">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body p-2 text-center">
                        <div class="text-right text-green">
                            <span class="text-green d-inline-flex align-items-center lh-1">
                                6% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <polyline points="3 17 9 11 13 15 21 7"></polyline>
                                    <polyline points="14 7 21 7 21 14"></polyline>
                                </svg>
                            </span>
                        </div>
                        <div class="h1 m-0">8K</div>
                        <div class="text-muted mb-4">Total artciles achetés</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body p-2 text-center">
                        <div class="text-right text-red">
                            <span class="text-red d-inline-flex align-items-center lh-1">
                                -2% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <polyline points="3 7 9 13 13 9 21 17"></polyline>
                                    <polyline points="21 10 21 17 14 17"></polyline>
                                </svg>
                            </span>
                        </div>
                        <div class="h1 m-0">18M</div>
                        <div class="text-muted mb-4">Coût total d'achats</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body p-2 text-center">
                        <div class="text-right text-green">
                            <span class="text-green d-inline-flex align-items-center lh-1">
                                6% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <polyline points="3 17 9 11 13 15 21 7"></polyline>
                                    <polyline points="14 7 21 7 21 14"></polyline>
                                </svg>
                            </span>
                        </div>
                        <div class="h1 m-0">80%</div>
                        <div class="text-muted mb-4">Pourcentage moyen d'achats</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-sm-12 col-lg-7">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Achat par catégorie</h4>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter">
                    <thead>
                        <tr>
                            <th>Catégorie</th>
                            <th>Articles achetés</th>
                            <th>Cout</th>
                            <th colspan="2">Pourcentage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                Bières
                                <a href="#" class="link-secondary ml-2">
                                </a>
                            </td>
                            <td class="text-muted">4,896</td>
                            <td class="text-muted">3.654.100 XAF</td>
                            <td class="text-muted">82.54%</td>
                            <td class="text-right">
                                <div class="chart-sparkline" id="sparkline-9" style="display: none;">17, 24, 20, 10, 5,
                                    1, 4, 18, 13</div><svg class="peity" height="40" width="64">
                                    <polygon fill="#d2e1f3"
                                        points="0 39 0 12.083333333333332 8 1 16 7.333333333333332 24 23.166666666666664 32 31.083333333333332 40 37.416666666666664 48 32.66666666666667 56 10.5 64 18.416666666666668 64 39">
                                    </polygon>
                                    <polyline fill="none"
                                        points="0 12.083333333333332 8 1 16 7.333333333333332 24 23.166666666666664 32 31.083333333333332 40 37.416666666666664 48 32.66666666666667 56 10.5 64 18.416666666666668"
                                        stroke="#206bc4" stroke-width="2" stroke-linecap="square"></polyline>
                                </svg>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Whisky
                                <a href="#" class="link-secondary ml-2">
                                </a>
                            </td>
                            <td class="text-muted">3,652</td>
                            <td class="text-muted">3.654.100 XAF</td>
                            <td class="text-muted">76.29%</td>
                            <td class="text-right">
                                <div class="chart-sparkline" id="sparkline-10" style="display: none;">13, 11, 19, 22,
                                    12, 7, 14, 3, 21</div><svg class="peity" height="40" width="64">
                                    <polygon fill="#d2e1f3"
                                        points="0 39 0 16.545454545454543 8 20 16 6.18181818181818 24 1 32 18.272727272727273 40 26.90909090909091 48 14.81818181818182 56 33.81818181818182 64 2.7272727272727266 64 39">
                                    </polygon>
                                    <polyline fill="none"
                                        points="0 16.545454545454543 8 20 16 6.18181818181818 24 1 32 18.272727272727273 40 26.90909090909091 48 14.81818181818182 56 33.81818181818182 64 2.7272727272727266"
                                        stroke="#206bc4" stroke-width="2" stroke-linecap="square"></polyline>
                                </svg>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Jus naturel
                                <a href="#" class="link-secondary ml-2">
                                </a>
                            </td>
                            <td class="text-muted">3,256</td>
                            <td class="text-muted">3.654.100 XAF</td>
                            <td class="text-muted">72.65%</td>
                            <td class="text-right">
                                <div class="chart-sparkline" id="sparkline-11" style="display: none;">10, 13, 10, 4, 17,
                                    3, 23, 22, 19</div><svg class="peity" height="40" width="64">
                                    <polygon fill="#d2e1f3"
                                        points="0 39 0 22.47826086956522 8 17.521739130434785 16 22.47826086956522 24 32.391304347826086 32 10.913043478260871 40 34.04347826086956 48 1 56 2.6521739130434767 64 7.608695652173914 64 39">
                                    </polygon>
                                    <polyline fill="none"
                                        points="0 22.47826086956522 8 17.521739130434785 16 22.47826086956522 24 32.391304347826086 32 10.913043478260871 40 34.04347826086956 48 1 56 2.6521739130434767 64 7.608695652173914"
                                        stroke="#206bc4" stroke-width="2" stroke-linecap="square"></polyline>
                                </svg>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ventes par employé</h4>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Utilisateur</th>
                            <th>Montant</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <span class="avatar">MN</span>
                            </td>
                            <td>
                               Marcello Nanga
                            </td>
                            <td class="text-muted">3.654.100 XAF</td>
                        </tr>
                        <tr>
                            <td>
                                <span class="avatar">AF</span>
                            </td>
                            <td>
                                Astride Fokam
                            </td>
                            <td class="text-muted">3.654.100 XAF</td>
                        </tr>
                        <tr>
                            <td>
                                <span class="avatar">JP</span>
                            </td>
                            <td>
                                Jean Pierre
                            </td>
                            <td class="text-muted">3.654.100 XAF</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ventes par type de paiement</h4>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter">
                    <thead>
                        <tr>
                            <th>Paiements</th>
                            <th>Montant</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <span class="payment payment-provider-om payment-sm mr-2 shadow-none"></span>
                                Orange Money
                                <a href="#" class="link-secondary ml-2">
                                </a>
                            </td>
                            <td class="text-muted">3.654.100 XAF</td>
                        </tr>
                        <tr>
                            <td>
                                <span class="payment payment-provider-mtn payment-sm mr-2 shadow-none"></span>
                                MTN Mobile Money
                                <a href="#" class="link-secondary ml-2">
                                </a>
                            </td>
                            <td class="text-muted">3.654.100 XAF</td>
                        </tr>
                        <tr>
                            <td>
                                <span class="payment payment-provider-cash payment-sm mr-2 shadow-none"></span>
                                Cash
                                <a href="#" class="link-secondary ml-2">
                                </a>
                            </td>
                            <td class="text-muted">3.654.100 XAF</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection

@section('styles')
<link href={{asset("template/assets/dist/css/easytrak-payments.min.css")}} rel="stylesheet" />
@endsection

@section('scripts')

@endsection
