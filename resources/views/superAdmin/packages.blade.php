@extends('layouts.base')

@section('content')

    <!-- Page title -->
    <!-- Page title -->
    <div class="page-header text-white mt-4">
        <div class="row align-items-center">
            <div class="col-auto">
                <h2 class="page-title">
                    <a href="{{route('easytrack.dashboard')}}" class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M7.828 11H20v2H7.828l5.364 5.364-1.414 1.414L4 12l7.778-7.778 1.414 1.414z"
                                fill="rgba(255,255,255,1)" />
                        </svg>
                    </a>
                    Gestion des forfaits
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ml-auto d-print-none">
                <div class="d-flex align-items-center">
                    <a href="#" class="text-white" data-toggle="modal" data-target="#modal-create-package">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        <span class="align-middle">Nouveau fofait</span>
                    </a>

                    <span class="dropdown ml-5">
                        <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                height="24">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M2 18h7v2H2v-2zm0-7h9v2H2v-2zm0-7h20v2H2V4zm18.674 9.025l1.156-.391 1 1.732-.916.805a4.017 4.017 0 0 1 0 1.658l.916.805-1 1.732-1.156-.391c-.41.37-.898.655-1.435.83L19 21h-2l-.24-1.196a3.996 3.996 0 0 1-1.434-.83l-1.156.392-1-1.732.916-.805a4.017 4.017 0 0 1 0-1.658l-.916-.805 1-1.732 1.156.391c.41-.37.898-.655 1.435-.83L17 11h2l.24 1.196c.536.174 1.024.46 1.434.83zM18 18a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"
                                    fill="rgba(255,255,255,1)" />
                            </svg>
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
        <div class="col-lg-7 mt-2">
            <div class="card">
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                <th>Nom du forfait</th>
                                <th>Durée / jours</th>
                                <th>Nombre de sites</th>
                                <th>Nombre d'employée</th>
                                <th>Prix</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (\App\Type::all() as $type)
                                <tr>
                                    <td class="w-1">
                                        <span id="title{{$type->id}}"> {{$type->title}} </span>
                                    </td>
                                    <td class="w-1">
                                        <span id="duration{{$type->id}}"> {{$type->duration}}</span> Jours
                                    </td>
                                    <td class="w-1">
                                        <span id="number_of_site{{$type->id}}"> {{$type->number_of_site}} </span>
                                    </td>
                                    <td class="w-1">
                                        <span id="number_of_employee{{$type->id}}"> {{$type->number_of_employee}} </span>
                                    </td>
                                    <td class="w-1">
                                        <span id="price{{$type->id}}"> {{$type->price}} </span> Fcfa
                                    </td>
                                    <td class="text-right">
                                        <a class="btn btn-white btn-sm mt-1" data-toggle="modal"
                                            data-target="#modal-edit-package{{$type->id}}">
                                            Modifier
                                        </a>
                                        <span class="dropdown">
                                            <button class="btn btn-white btn-sm dropdown-toggle align-text-top"
                                                data-boundary="viewport" data-toggle="dropdown">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">

                                                <a class="dropdown-item" onclick="deleteType({{$type->id}})">
                                                    Supprimer
                                                </a>
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

        <div class="col-lg-5 mt-2">
            <div class="card p-2">
                <div class="d-flex align-items-center mb-2 p-2">
                    <div class="subheader">Statistique d'Abonements</div>
                </div>
                <div class="row row-cards">
                    @foreach (App\Type::all() as $type)
                        <div class="col-lg-6">
                            <div class="card card-sm border-0 shadow-none">
                                <div class="card-body d-flex align-items-center">
                                    <div class="mr-3">
                                        <div class="chart-sparkline chart-sparkline-square" id="{{$type->title}}"></div>
                                    </div>
                                    <div class="mr-3 lh-sm">
                                        <div class="strong">
                                            {{$type->title}}
                                        </div>
                                        <div class="text-muted"> {{$type->numberOfUsers()}} Utilisateur(s)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="modal-section">
        <div class="modal modal-blur fade" id="modal-create-package" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un nouveau forfait</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row mb-3 align-items-end">
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Titre</label>
                                <input type="text" id="title-add" class="form-control" placeholder="Saisissez le nom..." />
                            </div>
                            <div class="col-lg-6 mb-4">
                                <label class="form-label">Durée</label>
                                <input type="number" id="duration-add" class="form-control" placeholder="Saisissez la durée de l'abonement..." />
                            </div>
                            <div class="col-lg-6 mb-4">
                                <label class="form-label">Nombre de sites</label>
                                <select id="number_of_site-add" class="form-select">
                                    @for ($i = 1; $i <= 10; $i++)
                                        <option value="{{$i}}"> {{$i}} sites</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Nombre d'employées</label>
                                <input type="number" id="number_of_employee-add" class="form-control" placeholder="Saisissez le nombre d'employé" />
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Prix</label>
                                <input type="number" id="price-add" class="form-control" placeholder="Saisissez le prix..." />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" style="width: 100%;" onclick="addType()">
                            Enregistrer
                        </button>
                    </div>
                </div>
            </div>
        </div>

        @foreach (\App\Type::all() as $type)
            <div class="modal modal-blur fade" id="modal-edit-package{{$type->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modifier le forfait</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <line x1="18" y1="6" x2="6" y2="18" />
                                    <line x1="6" y1="6" x2="18" y2="18" />
                                </svg>
                            </button>
                        </div>
                        <div class="modal-body bg-white">
                            <div class="row mb-3 align-items-end">
                                <div class="col-lg-12 mb-4">
                                    <label class="form-label">Titre</label>
                                    <input type="text" id="title-update{{$type->id}}" value="{{$type->title}}" class="form-control" placeholder="Saisissez le nom..." />
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <label class="form-label">Durée</label>
                                    <input type="number" id="duration-update{{$type->id}}" value="{{$type->duration}}" class="form-control" placeholder="Saisissez la durée de l'abonement..." />
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <label class="form-label">Nombre de sites</label>
                                    <select id="number_of_site-update{{$type->id}}" class="form-select">
                                        @for ($i = 1; $i <= 10; $i++)
                                            <option {{($type->number_of_site == $i) ? 'selected' : ''}} value="{{$i}}"> {{$i}} site</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <label class="form-label">Nombre d'employé </label>
                                    <input type="number" id="number_of_employee-update{{$type->id}}" value="{{$type->number_of_employee}}" class="form-control" placeholder="Saisissez la durée de l'abonement..." />
                                </div>

                                <div class="col-lg-12">
                                    <label class="form-label">Prix</label>
                                    <input type="number" id="price-update{{$type->id}}"  value="{{$type->price}}" class="form-control" placeholder="Saisissez le prix..." />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" style="width: 100%;" onclick="updateType({{$type->id}})">
                                Mettre à jour
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="modal modal-blur fade" id="modal-delete-role" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="modal-title">Êtes vous sure ?</div>
                        <div>
                            Si vous continuez, vous perdrez toutes les
                            données lié à ce forfait.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">
                            Annuler
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Oui, supprimer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        function addType(){

            var form_data = new FormData(); // Creating object of FormData class

            form_data.append("_token", '{{csrf_token()}}');
            form_data.append("title", $("#title-add").val());
            form_data.append("duration", $("#duration-add").val());
            form_data.append("number_of_site", $("#number_of_site-add").val());
            form_data.append("number_of_employee", $("#number_of_employee-add").val());
            form_data.append("price", $("#price-add").val());

            $.ajax({
                url: '/easytrack/types',
                cache: false,
                contentType: false,
                processData: false,
                method: 'post',
                data: form_data,
                success: function(data){
                    location.reload();
                }
            });

        }

        function updateType(id){

            var form_data = new FormData(); // Creating object of FormData class

            form_data.append("_token", '{{csrf_token()}}');
            form_data.append("title", $("#title-update"+id).val());
            form_data.append("duration", $("#duration-update"+id).val());
            form_data.append("number_of_site", $("#number_of_site-update"+id).val());
            form_data.append("number_of_employee", $("#number_of_employee-update"+id).val());
            form_data.append("price", $("#price-update"+id).val());

            $.ajax({
                url: '/easytrack/types/'+id,
                cache: false,
                contentType: false,
                processData: false,
                method: 'post',
                data: form_data,
                success: function(data){
                    location.reload();
                }
            });
        }

        function deleteType(id){
            $.ajax({
                url: '/easytrack/types/'+id+'/destroy',
                method: 'post',
                data: {
                    _token: '{{@csrf_token()}}'
                },
                success: function(data){
                    if(data == 'success') location.reload();
                    else alert(data);
                }
            });
        }
    </script>

    @foreach (App\Type::all() as $type)
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                $().peity && $('#{{$type->title}}').text("{{$type->usage()}}/100").peity("pie", {
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
    @endforeach

@endsection
