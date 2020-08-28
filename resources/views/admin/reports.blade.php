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
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path d="M12 23.728l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zm4.95-7.778a7 7 0 1 0-9.9 0L12 20.9l4.95-4.95zM12 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" fill="rgba(255,255,255,1)" /></svg>
                        <span class="selected-site align-middle" data-site="all"> Tous les sites </span>
                    </div>

                    <div class="dropdown-menu dropdown-menu-right mt-3">
                        <a class="dropdown-item site" data-site="all">
                           Tous les sites
                        </a>
                        @foreach (Auth::user()->companies->first()->sites as $site)
                            <a class="dropdown-item site" data-site={{$site->id}}>
                                {{$site->name}}
                            </a>
                        @endforeach
                    </div>
                </span>
                <span class="dropdown ml-5">
                    <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm1-8h4v2h-6V7h2v5z" fill="rgba(255,255,255,1)" /></svg>
                        <span class="selected-period align-middle" data-period="all"> Global </span>
                    </div>

                    <div class="dropdown-menu dropdown-menu-right mt-3">
                        <span class="dropdown-header">Périodes</span>
                        <a class="dropdown-item">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"
                                class="mr-2">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z" />
                            </svg>
                            <span class="period" data-period="all"> Global </span>
                        </a>
                        <a class="dropdown-item">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"
                                class="mr-2">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z" />
                            </svg>
                            <span class="period" data-period="7"> 7 Derniers jours</span>
                        </a>
                        <a class="dropdown-item">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"
                                class="mr-2">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z" />
                            </svg>
                            <span class="period" data-period="30"> 30 Derniers jours</span>
                        </a>
                        <a class="dropdown-item">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"
                                class="mr-2">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z" />
                            </svg>
                            <span class="period" data-period="90"> 3 Derniers mois</span>
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
                <h3 class="h2 mt-2 mb-3 profits">0 Fcfa</h3>
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
                    <span class="text-nowrap selected-period">30 Derniers jours</span>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="card" data-color="red">
            <div class="card-body">
                <div class="text-muted font-weight-normal mt-0">Ventes</div>
                <h3 class="h2 mt-2 mb-3 sales">0 Fcfa</h3>
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
                    <span class="text-nowrap selected-period">30 Derniers jours</span>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="card" data-color="red">
            <div class="card-body">
                <div class="text-muted font-weight-normal mt-0">Achats</div>
                <h3 class="h2 mt-2 mb-3 purchases">0 Fcfa</h3>
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
                    <span class="text-nowrap selected-period">30 Derniers jours</span>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-8" style="max-height: 300px;">
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
                    <tbody class='salesPerCategory'>

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
                        <div class="h1 m-0 categories">20</div>
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
                    <div class="h1 m-0">20</div>
                    <div class="text-muted mb-4">Employé(s)</div>
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
                        <div class="h1 m-0">40</div>
                        <div class="text-muted mb-4">Produit(s) ventdu(s)</div>
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
                        <div class="h1 m-0">40</div>
                        <div class="text-muted mb-4">Produit(s) acheté(s)</div>
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
                        <div class="h1 m-0">80%</div>
                        <div class="text-muted mb-4">Pourcentage moyen de ventes</div>
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
                        <div class="text-muted mb-4">Pourcentage moyen d'achats</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-sm-12 col-lg-7" style="max-height: 300px;">
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
                    <tbody class="purchasesPerCategory">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-4" style="max-height: 340px;">
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
                    <tbody class="salesPerEmployee">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-5" style="max-height: 240px;">
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
                    <tbody class="salesPerPaying_method">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection


@section('scripts')

    <script>
        $(".site").click(function(){
            var period = $(".selected-period");
            $(".selected-site").html(this.text);
            $(".selected-site").data('site', $(this).data('site'));
            showReports($(this), period);
        });

        $(".period").click(function(){
            var site = $(".selected-site");
            $(".selected-period").html($(this).text());
            $(".selected-period").data('period', $(this).data('period'));
            showReports(site, $(this));
        })

        var site = $(".selected-site");
        var period = $(".selected-period");
        showReports(site, period);

        function showReports(site, period){
            $.ajax({
                url: '/admin/reports/'+site.data("site")+'/'+period.data("period"),
                method: 'get',
                success: function(data){
                    console.log(data);
                    $(".sales").fadeOut().html(data.sales).fadeIn();
                    $(".purchases").fadeOut().html(data.purchases).fadeIn();
                    $(".profits").fadeOut().html(data.profits).fadeIn();
                    $(".salesPerEmployee").fadeOut().html(data.salesPerEmployee).fadeIn();
                    $(".salesPerCategory").fadeOut().html(data.salesPerCategory).fadeIn();
                    $(".purchasesPerCategory").fadeOut().html(data.purchasesPerCategory).fadeIn();
                    $(".salesPerPaying_method").fadeOut().html(data.salesPerPaying_method).fadeIn();
                }
            });
        }
    </script>
@endsection

@section('styles')
    <link href={{asset("template/assets/dist/css/easytrak-payments.min.css")}} rel="stylesheet" />
@endsection
