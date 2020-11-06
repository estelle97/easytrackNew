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
                    <a href={{route('employee.sales.pos')}} class="text-white mr-4 mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28" height="28" class="mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" fill="rgba(255,255,255,1)"/></svg>
                        <span class="h2 align-middle">Nouveau</span>
                    </a>
                    @if(Auth::user()->role->slug == 'cashier' || Auth::user()->role->slug == 'manager')
                        <a href={{route('employee.sales.kanban')}} class="text-white mr-4 mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M5 8h14V5H5v3zm9 11v-9H5v9h9zm2 0h3v-9h-3v9zM4 3h16a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1z" fill="rgba(255,255,255,1)"/></svg>
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9">
            <div class="card card-max-height" style="overflow-y: auto;">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th class="w-1"><input class="form-check-input m-0 align-middle"
                                        type="checkbox"></th>
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
                            @foreach (Auth::user()->employee->site->sales->reverse() as $sale)

                                <tr id="sale{{$sale->id}}">
                                    <td><input class="form-check-input m-0 align-middle" type="checkbox"></td>
                                    <td><span class="text-muted">{{$sale->code}}</span></td>
                                    <td> {{$sale->created_at}} </td>
                                    <td>
                                    {{$sale->site->name}}
                                    </td>
                                    <td>
                                        {{$sale->customer->name}}
                                    </td>
                                    <td>
                                        @if (Auth::user()->is_admin == 2)
                                            <a href={{route('employee.profile')}}>
                                                {{$sale->initiator->name}}
                                            </a>
                                        @else
                                            <a href={{route('employee.user.show', $sale->initiator->username)}}>
                                                {{$sale->initiator->name}}
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                    <select class="btn btn-sm {{($sale->status == 0) ? 'btn-info' : (($sale->status == 1) ? 'btn-warning' : 'btn-success')}}" {{(Auth::user()->role->slug == 'server') ? 'disabled' : ''}}  name="status" id="status" onchange="updateStatus({{$sale->id}}, this.value)">
                                            <option {{($sale->status == 0) ? 'selected' : ''}} value="0"> Commandé </option>
                                            <option {{($sale->status == 1) ? 'selected' : ''}} value="1"> Servi </option>
                                            <option {{($sale->status == 2) ? 'selected' : ''}} value="2">  Payé </option>
                                        </select>
                                    </td>
                                    <td>
                                        @if($sale->validator == null)
                                            <span class="text-warning"> Non validée </span>
                                        @else
                                            @if (Auth::user()->is_admin == 2)
                                                <a href={{route('employee.profile')}}>
                                                    {{$sale->validator->name}}
                                                </a>
                                            @else
                                                <a href={{route('employee.user.show', $sale->validator->username)}}>
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
                                                <a class="dropdown-item" href={{route('employee.sales.show', $sale->id)}}>
                                                    Afficher
                                                </a>
                                                @if (Auth::user()->id == $sale->initiator_id)
                                                    <a class="dropdown-item" href={{route('employee.sales.edit', $sale->id)}}>
                                                        Modifier
                                                    </a>
                                                @endif
                                                @if(Auth::user()->role->slug == 'manager' || Auth::user()->role->slug == 'cashier' || Auth::user()->may('validate_sale_orders'))
                                                    @if ($sale->validator_id == null)
                                                        @if(Auth::user()->may('validate_sale_orders'))
                                                            <a class="dropdown-item" onclick="validateSale({{$sale->id}})">
                                                                Valider
                                                            </a>
                                                        @endif
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
                                                @endif
                                                <div class="dropdown-divider"></div>
                                                @if(Auth::user()->may('delete_sale_orders'))
                                                    <a class="dropdown-item" href="#">
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
                <div class="col-md-12 text-center mt-4">
                    <h5 class="font-weight-light" style="font-size: 1rem;">Vous avez vendu</h5>
                    <h1 style="font-size: 2.5rem;"> {{Auth::user()->employee->site->allSales()}} FCFA</h1>
                    <h5 class="order-global-date-2 font-weight-light text-capitalize" style="font-size: 1rem;"></h5>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="modal-sale-show" tabindex="-1" role="dialog" aria-hidden="true"> </div>

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
                url: '/employee/purchases/'+id,
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
                url: '/employee/sales/'+id+'/validate',
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
                url: '/employee/sales/'+id+'/invalidate',
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
                url: '/employee/sales/'+id+'/status',
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
