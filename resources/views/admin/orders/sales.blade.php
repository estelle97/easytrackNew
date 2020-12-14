@extends('layouts.base')

@section('content')

    <!-- Page title -->
    <div class="page-header text-white">
        <div class="row align-items-center">
            <div class="col-auto">
                <h2 class="page-title">
                    Commandes clients
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ml-auto d-print-none">
                <div class="d-flex align-items-center">
                    <a href={{route('admin.sales.pos')}} class="text-white mr-4 mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28" height="28" class="mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" fill="rgba(255,255,255,1)"/></svg>
                        <span class="h2 align-middle">Nouveau</span>
                    </a>
                    <a href={{route('admin.sales.kanban')}} class="text-white mr-4 mb-0">
                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M5 8h14V5H5v3zm9 11v-9H5v9h9zm2 0h3v-9h-3v9zM4 3h16a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1z" fill="rgba(255,255,255,1)"/></svg>
                    </a>
                    <span class="dropdown">
                        <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                height="24">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M2 18h7v2H2v-2zm0-7h9v2H2v-2zm0-7h20v2H2V4zm18.674 9.025l1.156-.391 1 1.732-.916.805a4.017 4.017 0 0 1 0 1.658l.916.805-1 1.732-1.156-.391c-.41.37-.898.655-1.435.83L19 21h-2l-.24-1.196a3.996 3.996 0 0 1-1.434-.83l-1.156.392-1-1.732.916-.805a4.017 4.017 0 0 1 0-1.658l-.916-.805 1-1.732 1.156.391c.41-.37.898-.655 1.435-.83L17 11h2l.24 1.196c.536.174 1.024.46 1.434.83zM18 18a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"
                                    fill="rgba(255,255,255,1)" /></svg>
                        </div>

                        <div class="dropdown-menu dropdown-menu-right mt-3">
                            <span class="dropdown-header">Trier par</span>
                            <a class="dropdown-item" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18"
                                    height="18" class="mr-2">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z" />
                                </svg>
                                Nom
                            </a>
                            <a class="dropdown-item" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18"
                                    height="18" class="mr-2">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z" />
                                </svg>
                                Quantité
                            </a>
                            <a class="dropdown-item" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18"
                                    height="18" class="mr-2">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z" />
                                </svg>
                                Prix
                            </a>
                            <a class="dropdown-item" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18"
                                    height="18" class="mr-2">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z" />
                                </svg>
                                Date
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18"
                                    height="18" class="mr-2">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M5.463 4.433A9.961 9.961 0 0 1 12 2c5.523 0 10 4.477 10 10 0 2.136-.67 4.116-1.81 5.74L17 12h3A8 8 0 0 0 6.46 6.228l-.997-1.795zm13.074 15.134A9.961 9.961 0 0 1 12 22C6.477 22 2 17.523 2 12c0-2.136.67-4.116 1.81-5.74L7 12H4a8 8 0 0 0 13.54 5.772l.997 1.795z" />
                                </svg>
                                Actualiser
                            </a>
                        </div>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="table-responsive">
                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar" class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                <th class="w-1">N°</th>
                                <th class="exportable">Date</th>
                                <th class="exportable">Site</th>
                                <th class="exportable">Client</th>
                                <th class="exportable">Initié par</th>
                                <th class="exportable"> Statut </th>
                                <th class="exportable">Validé par</th>
                                <th class="exportable">Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Auth::user()->companies->first()->sites as $site)
                                @foreach ($site->sales->reverse() as $sale)

                                    <tr id="sale{{$sale->id}}">
                                        <td><span class="text-muted">{{$sale->code}}</span></td>
                                        <td> {{$sale->created_at}} </td>
                                        <td>
                                        {{$sale->site->name}}
                                        </td>
                                        <td>
                                            {{$sale->customer->name ?? ''}}
                                        </td>
                                        <td>
                                            @if ($sale->initiator->is_admin == 2)
                                                <a href={{route('admin.profile')}}>
                                                    {{$sale->initiator->name}}
                                                </a>
                                            @else
                                                <a href={{route('admin.user.show', $sale->initiator->username)}}>
                                                    {{$sale->initiator->name}}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                        <select class="btn btn-sm {{($sale->status == 0) ? 'btn-info' : (($sale->status == 1) ? 'btn-warning' : 'btn-success')}}" name="status" id="status" onchange="updateStatus({{$sale->id}}, this.value)">
                                                <option {{($sale->status == 0) ? 'selected' : ''}} value="0"> Commandé </option>
                                                <option {{($sale->status == 1) ? 'selected' : ''}} value="1"> Servi </option>
                                                <option {{($sale->status == 2) ? 'selected' : ''}} value="2">  Payé </option>
                                            </select>
                                        </td>
                                        <td>
                                            @if($sale->validator == null)
                                                <span class="text-warning"> Non validée </span>
                                            @else
                                                @if ($sale->validator->is_admin == 2)
                                                    <a href={{route('admin.profile')}}>
                                                        {{$sale->validator->name}}
                                                    </a>
                                                @else
                                                    <a href={{route('admin.user.show', $sale->validator->username)}}>
                                                        {{$sale->validator->name}}
                                                    </a>
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            {{$sale->total()}} Fcfa
                                        </td>
                                        <td class="text-right">
                                            <span class="dropdown">
                                                <button class="btn btn-white btn-sm dropdown-toggle align-text-top"
                                                    data-boundary="viewport" data-toggle="dropdown">Actions</button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href={{route('admin.sales.show', $sale->id)}}>
                                                        Afficher
                                                    </a>
                                                    @if ($sale->validator_id == null && Auth::user()->id == $sale->initiator_id)
                                                        <a class="dropdown-item" href={{route('admin.sales.edit', $sale->id)}}>
                                                            Modifier
                                                        </a>
                                                    @endif
                                                    @if ($sale->validator_id == null)
                                                        <a class="dropdown-item" onclick="validateSale({{$sale->id}})">
                                                            Valider
                                                        </a>
                                                    @else
                                                        @if ($sale->validator_id == Auth::user()->id)
                                                            <a class="dropdown-item" onclick="invalidateSale({{$sale->id}})">
                                                                Annuler la validation
                                                            </a>
                                                        @else
                                                            <a class="dropdown-item disabled" >
                                                                Annuler la validation
                                                            </a>
                                                        @endif
                                                    @endif

                                                    <div class="dropdown-divider"></div>
                                                    @if($sale->validator_id == null)
                                                        <a class="dropdown-item" href="#" href="#" data-toggle="modal"
                                                        data-target="#modal-delete-sale{{$sale->id}}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                width="18" height="18" class="mr-2">
                                                                <path fill="none" d="M0 0h24v24H0z" />
                                                                <path
                                                                    d="M7 4V2h10v2h5v2h-2v15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6H2V4h5zM6 6v14h12V6H6zm3 3h2v8H9V9zm4 0h2v8h-2V9z" />
                                                            </svg>
                                                            Supprimer
                                                        </a>
                                                    @endif
                                                </div>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card col-lg-3 p-3" style="max-height: 480px;">
            <div class="row">
                <div class="col-md-12">
                    <div id="calendar-inline"></div>
                </div>
                <div class="col-md-12 text-center mb-4">
                    <h5 class="font-weight-light" style="font-size: 1rem;">Vous avez vendu</h5>
                    <h1 style="font-size: 2.5rem;"> {{Auth::user()->companies->first()->totalSales()}} FCFA</h1>
                    <h5 class="order-global-date-2 font-weight-light text-capitalize" style="font-size: 1rem;"></h5>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="modal-sale-show" tabindex="-1" role="dialog" aria-hidden="true"> </div>
    @foreach (Auth::user()->companies->first()->sites as $site)
        @foreach ($site->sales->reverse() as $sale)
            <div class="modal modal-blur fade" id="modal-delete-sale{{$sale->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="modal-title">Êtes vous sure ?</div>
                            <div>Si vous continuez, vous perdrez toutes les données de cette vente.</div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link link-secondary mr-auto"
                                data-dismiss="modal">Annuler</button>
                            <button type="button" class="btn btn-danger" onclick="deleteSale({{$sale->id}})">Oui, supprimer</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach

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

        function updatePurchase(id){
            var token = '{{csrf_token()}}';

            $.ajax({
                url: '/admin/purchases/'+id,
                method: 'post',
                data: {
                    _token: token
                },
                success: function(data){
                    $("#modal-pos").html(data).modal();
                }
            });
        }

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

        function deleteSale(sale){
            var token = '{{csrf_token()}}';

            $.ajax({
                url : '/admin/sales/'+sale+'/destroy',
                method : 'post',
                data: {
                    _token: token,
                },
                success: function(data){
                    $("#modal-delete-sale"+sale).hide();
                    $('.modal-backdrop').remove();
                    $("#sale"+sale).fadeOut(1500);
                }
            });
        }
    </script>
@endsection

@section('styles')
    <link href={{asset("template/assets/dist/libs/flatpickr/dist/flatpickr.min.css")}} rel="stylesheet"/>
@endsection
