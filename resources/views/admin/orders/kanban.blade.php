@extends('layouts.base')

@section('content')

    <!-- Page title -->
    <div class="page-header text-white">
        <div class="row align-items-center">
            <div class="col-auto">
                <h2 class="page-title">
                    Commandes clients
                </h2>
                <span class="order-global-date text-white h4 mt-2 text-capitalize"></span>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ml-auto d-print-none">
                <div class="d-flex align-items-center">
                    <a href={{route('admin.sales.pos')}} class="text-white mr-4 mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28" height="28" class="mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" fill="rgba(255,255,255,1)"/></svg>
                        <span class="h2 align-middle">Nouveau</span>
                    </a>
                    <a href={{route('admin.sales.all')}} class="text-white mb-0">
                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M5 8h14V5H5v3zm9 11v-9H5v9h9zm2 0h3v-9h-3v9zM4 3h16a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1z" fill="rgba(255,255,255,1)"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9 card-max-height">
            <div class="easy-kanban-board card pt-2">
                <div class="row p-3 pb-4">
                    <div class="easy-kanban-column col-lg-4 p-0">
                        <div class="row pl-4">
                            <div class="column-header col-lg-12 d-flex align-items-center">
                                <div class="status-dot rounded-circle bg-blue"></div>
                                <h3 class="status-type font-weight-normal m-0 ml-3">Commandé</h3>
                            </div>
                            <div class="column-body col-lg-12 mt-4">

                                @foreach (Auth::user()->companies->first()->sites->reverse() as $site)
                                    @foreach ($site->sales->where('status',0)->reverse() as $sale)
                                    <div class="easy-kanban-card card">
                                            <div class="card-header border-bottom-0 pr-0 pb-0">
                                                <div class="w-100 row align-items-center">
                                                    <div class="col-auto pl-2">
                                                        <h2 class="m-0">S0-{{$sale->code}} </h2>
                                                    </div>
                                                    <div class="col-auto pr-1 ml-auto">
                                                        <span class="dropdown button-click-action">
                                                            <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 14c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-7c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" fill="rgba(120,120,120,1)"/></svg>
                                                            </div>

                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href={{route('admin.sales.show', $sale->id)}}>
                                                                    Voir la facture
                                                                </a>
                                                                <a class="dropdown-item" href="#" onclick="validateSale({{$sale->id}})">
                                                                    Valider la commande
                                                                </a>
                                                                <a class="dropdown-item" href="#" onclick="updateStatus({{$sale->id}},1)">
                                                                    Marquer comme servi
                                                                </a>
                                                                <a class="dropdown-item" href="#" onclick="updateStatus({{$sale->id}},2)">
                                                                    Marquer comme payé
                                                                </a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                        width="18" height="18" class="mr-2">
                                                                        <path fill="none" d="M0 0h24v24H0z" />
                                                                        <path
                                                                            d="M7 4V2h10v2h5v2h-2v15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6H2V4h5zM6 6v14h12V6H6zm3 3h2v8H9V9zm4 0h2v8h-2V9z" />
                                                                    </svg>
                                                                    Supprimer
                                                                </a>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body pt-2 pb-2">
                                                <h4 class="font-weight-normal m-0"> {{$sale->products->count()}} Produit(s)</h4>
                                                <h4 class="text-muted font-weight-normal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><rect x="4" y="5" width="16" height="16" rx="2"></rect><line x1="16" y1="3" x2="16" y2="7"></line><line x1="8" y1="3" x2="8" y2="7"></line><line x1="4" y1="11" x2="20" y2="11"></line><line x1="11" y1="15" x2="12" y2="15"></line><line x1="12" y1="15" x2="12" y2="18"></line></svg>
                                                    {{ date('M d, Y', strtotime($sale->created_at))}}
                                                </h4>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer bg-white border-top-0 pt-0">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        {{-- <div class="avatar-list avatar-list-stacked pt-2">
                                                            <span class="avatar border mb-0"
                                                                style="background-image: url('https://ui-avatars.com/api/?name=Alex+Gautier&background=f1f3f8&color=6e7582')"></span>
                                                            <span class="avatar border mb-0"
                                                                style="background-image: url('https://ui-avatars.com/api/?name=Jeane+Marie&background=f1f3f8&color=6e7582')"></span>
                                                            <span class="avatar border mb-0">+3</span>
                                                        </div> --}}
                                                        {{$site->name}}
                                                    </div>
                                                    <div class="col-auto ml-auto">
                                                        <h6 class="m-0">Total</h6>
                                                        <h4 class="m-0">{{$sale->total()}} FCFA</h4>
                                                        <!-- <a href="#" class="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path fill="none" d="M0 0h24v24H0z"/><path d="M7 4V2h10v2h5v2h-2v15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6H2V4h5zM6 6v14h12V6H6zm3 3h2v8H9V9zm4 0h2v8h-2V9z" fill="rgba(120,120,120,1)"/></svg>
                                                        </a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <a href={{route('admin.sales.pos')}} class="btn btn-light btn-pill btn-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mr-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                    Ajouter une commande
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="easy-kanban-column col-lg-4 pl-4">
                        <div class="row">
                            <div class="column-header col-lg-12 d-flex align-items-center">
                                <div class="status-dot rounded-circle bg-yellow"></div>
                                <h3 class="status-type font-weight-normal m-0 ml-3">Servi</h3>
                            </div>
                            <div class="column-body col-lg-12 mt-4">
                                @foreach (Auth::user()->companies->first()->sites->reverse() as $site)
                                    @foreach ($site->sales->where('status',1)->reverse() as $sale)
                                        <div class="easy-kanban-card card">
                                            <div class="card-header border-bottom-0 pr-0 pb-0">
                                                <div class="w-100 row align-items-center">
                                                    <div class="col-auto pl-2">
                                                        <h2 class="m-0">S0-{{$sale->code}} </h2>
                                                    </div>
                                                    <div class="col-auto pr-1 ml-auto">
                                                        <span class="dropdown button-click-action">
                                                            <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 14c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-7c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" fill="rgba(120,120,120,1)"/></svg>
                                                            </div>

                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href={{route('admin.sales.show', $sale->id)}}>
                                                                    Voir la facture
                                                                </a>
                                                                <a class="dropdown-item" href="#" onclick="validateSale({{$sale->id}})">
                                                                    Valider la commande
                                                                </a>
                                                                <a class="dropdown-item" href="#" onclick="updateStatus({{$sale->id}},0)">
                                                                    Marquer comme commandé
                                                                </a>
                                                                <a class="dropdown-item" href="#" onclick="updateStatus({{$sale->id}},2)">
                                                                    Marquer comme payé
                                                                </a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                        width="18" height="18" class="mr-2">
                                                                        <path fill="none" d="M0 0h24v24H0z" />
                                                                        <path
                                                                            d="M7 4V2h10v2h5v2h-2v15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6H2V4h5zM6 6v14h12V6H6zm3 3h2v8H9V9zm4 0h2v8h-2V9z" />
                                                                    </svg>
                                                                    Supprimer
                                                                </a>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body pt-2 pb-2">
                                                <h4 class="font-weight-normal m-0"> {{$sale->products->count()}} Produit(s)</h4>
                                                <h4 class="text-muted font-weight-normal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><rect x="4" y="5" width="16" height="16" rx="2"></rect><line x1="16" y1="3" x2="16" y2="7"></line><line x1="8" y1="3" x2="8" y2="7"></line><line x1="4" y1="11" x2="20" y2="11"></line><line x1="11" y1="15" x2="12" y2="15"></line><line x1="12" y1="15" x2="12" y2="18"></line></svg>
                                                    {{ date('M d, Y', strtotime($sale->created_at))}}
                                                </h4>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer bg-white border-top-0 pt-0">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        {{-- <div class="avatar-list avatar-list-stacked pt-2">
                                                            <span class="avatar border mb-0"
                                                                style="background-image: url('https://ui-avatars.com/api/?name=Alex+Gautier&background=f1f3f8&color=6e7582')"></span>
                                                            <span class="avatar border mb-0"
                                                                style="background-image: url('https://ui-avatars.com/api/?name=Jeane+Marie&background=f1f3f8&color=6e7582')"></span>
                                                            <span class="avatar border mb-0">+3</span>
                                                        </div> --}}
                                                        {{$site->name}}
                                                    </div>
                                                    <div class="col-auto ml-auto">
                                                        <h6 class="m-0">Total</h6>
                                                        <h4 class="m-0">{{$sale->total()}} FCFA</h4>
                                                        <!-- <a href="#" class="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path fill="none" d="M0 0h24v24H0z"/><path d="M7 4V2h10v2h5v2h-2v15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6H2V4h5zM6 6v14h12V6H6zm3 3h2v8H9V9zm4 0h2v8h-2V9z" fill="rgba(120,120,120,1)"/></svg>
                                                        </a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="easy-kanban-column col-lg-4 pl-4">
                        <div class="row">
                            <div class="column-header col-lg-12 d-flex align-items-center">
                                <div class="status-dot rounded-circle bg-green"></div>
                                <h3 class="status-type font-weight-normal m-0 ml-3">Payé</h3>
                            </div>
                            <div class="column-body col-lg-12 mt-4">
                                @foreach (Auth::user()->companies->first()->sites->reverse() as $site)
                                    @foreach ($site->sales->where('status',2)->reverse() as $sale)
                                        <div class="easy-kanban-card card">
                                            <div class="card-header border-bottom-0 pr-0 pb-0">
                                                <div class="w-100 row align-items-center">
                                                    <div class="col-auto pl-2">
                                                        <h2 class="m-0">S0-{{$sale->code}} </h2>
                                                    </div>
                                                    <div class="col-auto pr-1 ml-auto">
                                                        <span class="dropdown button-click-action">
                                                            <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 14c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-7c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" fill="rgba(120,120,120,1)"/></svg>
                                                            </div>

                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href={{route('admin.sales.show', $sale->id)}}>
                                                                    Voir la facture
                                                                </a>
                                                                @if ($sale->validator_id == null)
                                                                    <a class="dropdown-item" href="#" onclick="validateSale({{$sale->id}})">
                                                                        Valider la commande
                                                                    </a>
                                                                @else
                                                                    @if ($sale->validator_id == Auth::user()->id)
                                                                        <a class="dropdown-item" href="#" onclick="invalidateSale({{$sale->id}})">
                                                                           annuler validation
                                                                        </a>
                                                                    @else
                                                                        <a class="dropdown-item disabled" href="#">
                                                                            annuler validation
                                                                        </a>
                                                                    @endif
                                                                @endif
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                        width="18" height="18" class="mr-2">
                                                                        <path fill="none" d="M0 0h24v24H0z" />
                                                                        <path
                                                                            d="M7 4V2h10v2h5v2h-2v15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6H2V4h5zM6 6v14h12V6H6zm3 3h2v8H9V9zm4 0h2v8h-2V9z" />
                                                                    </svg>
                                                                    Supprimer
                                                                </a>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body pt-2 pb-2">
                                                <h4 class="font-weight-normal m-0"> {{$sale->products->count()}} Produit(s)</h4>
                                                <h4 class="text-muted font-weight-normal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><rect x="4" y="5" width="16" height="16" rx="2"></rect><line x1="16" y1="3" x2="16" y2="7"></line><line x1="8" y1="3" x2="8" y2="7"></line><line x1="4" y1="11" x2="20" y2="11"></line><line x1="11" y1="15" x2="12" y2="15"></line><line x1="12" y1="15" x2="12" y2="18"></line></svg>
                                                    {{ date('M d, Y', strtotime($sale->created_at))}}
                                                </h4>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer bg-white border-top-0 pt-0">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        {{-- <div class="avatar-list avatar-list-stacked pt-2">
                                                            <span class="avatar border mb-0"
                                                                style="background-image: url('https://ui-avatars.com/api/?name=Alex+Gautier&background=f1f3f8&color=6e7582')"></span>
                                                            <span class="avatar border mb-0"
                                                                style="background-image: url('https://ui-avatars.com/api/?name=Jeane+Marie&background=f1f3f8&color=6e7582')"></span>
                                                            <span class="avatar border mb-0">+3</span>
                                                        </div> --}}
                                                        {{$site->name}}
                                                    </div>
                                                    <div class="col-auto ml-auto">
                                                        <h6 class="m-0">Total</h6>
                                                        <h4 class="m-0">{{$sale->total()}} FCFA</h4>
                                                        <!-- <a href="#" class="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path fill="none" d="M0 0h24v24H0z"/><path d="M7 4V2h10v2h5v2h-2v15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6H2V4h5zM6 6v14h12V6H6zm3 3h2v8H9V9zm4 0h2v8h-2V9z" fill="rgba(120,120,120,1)"/></svg>
                                                        </a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-max-height col-lg-3 p-3">
            <div class="row">
                <div class="col-md-12">
                    <div id="calendar-inline"></div>
                </div>
                <div class="col-md-12 text-center mb-5">
                    <h5 class="font-weight-light" style="font-size: 1rem;">Vous avez gagné</h5>
                    <h1 style="font-size: 2.5rem;"> {{Auth::user()->companies->first()->totalSales() - Auth::user()->companies->first()->totalPurchases()}} FCFA</h1>
                    <h5 class="order-global-date-2 font-weight-light text-capitalize" style="font-size: 1rem;"></h5>
                </div>
                {{-- <div class="col-md-12 mt-4">
                    <div class="row justify-content-between">
                        <div class="col-md-12 pl-2 pr-2 mb-3">
                            <div class="stat-content bg-blue-lt pt-3 pb-2 pl-3 pr-3" style="border-radius: 12px;">
                                <h1>{{Auth::user()->companies->first()->totalSales() - Auth::user()->companies->first()->totalPurchases()}} FCFA</h1>
                                <h4>Benéfice</h4>
                            </div>
                        </div>
                        <div class="col-md-6 pl-2">
                            <div class="stat-content bg-orange-lt pt-3 pb-2 pl-3 pr-3" style="border-radius: 12px;">
                                <h1>0 </h1>
                                <h4>Produits <br> en stock</h4>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1 pr-2">
                            <div class="stat-content bg-purple-lt pt-3 pb-2 pl-3 pr-3" style="border-radius: 12px;">
                                <h1>0</h1>
                                <h4>Catégories</h4>
                            </div>
                        </div>
                    </div>
                </div> --}}


            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script src={{asset('template/assets/dist/libs/flatpickr/dist/flatpickr.min.js')}}></script>
    <script src={{asset('template/assets/dist/libs/flatpickr/dist/plugins/rangePlugin.js')}}></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js" integrity="sha512-rmZcZsyhe0/MAjquhTgiUcb4d9knaFc7b5xAfju483gbEXTkeJRUMIPk6s3ySZMYUHEcjKbjLjyddGWMrNEvZg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment-with-locales.min.js" integrity="sha512-qSnlnyh7EcD3vTqRoSP4LYsy2yVuqqmnkM9tW4dWo6xvAoxuVXyM36qZK54fyCmHoY1iKi9FJAUZrlPqmGNXFw==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/locale/fr.min.js" integrity="sha512-FdyYwPVGhYAZ83iS8NXHmex3ZLv44/R/9QGKvC6R/LDosWDbhviyZpprKY30ilfxZKcr6sx+LeoxBCBAbs45eg==" crossorigin="anonymous"></script>


    <script>
        document.body.style.display = "block";
        $(document).ready(function() {
            var today = moment().format('MMMM Do, YYYY');
            $( ".order-global-date" ).text( today );
            $( ".order-global-date-2" ).text( today );
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            flatpickr(document.getElementById('calendar-inline'), {
                inline: true,
            });
        });
    </script>
    <script>
        function validateSale(id){
            var token  = '{{csrf_token()}}';

            $.ajax({
                url: '/admin/sales/'+id+'/validate',
                method: 'post',
                data: {
                    _token: token
                },
                success: function(data){
                    // console.log(data);
                    location.reload();
                }
            });
        }

        function invalidateSale(id){
            var token  = '{{csrf_token()}}';

            $.ajax({
                url: '/admin/sales/'+id+'/invalidate',
                method: 'post',
                data: {
                    _token: token
                },
                success: function(data){
                    // console.log(data);
                    location.reload();
                }
            });
        }

        function updateStatus(id, status){
            var token  = '{{csrf_token()}}';

            $.ajax({
                url: '/admin/sales/'+id+'/status',
                method: 'post',
                data: {
                    _token: token,
                    status: status
                },
                success: function(data){
                    // console.log(data);
                    location.reload();
                }
            });
        }
    </script>
@endsection


@section('styles')
    <link href={{asset("template/assets/dist/libs/flatpickr/dist/flatpickr.min.css")}} rel="stylesheet"/>
@endsection
