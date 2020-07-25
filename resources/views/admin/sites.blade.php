@extends('layouts.base')

@section('content')

    <!-- Page title -->
    <div class="page-header text-white">
        <div class="row align-items-center">
            <div class="col-auto">
                <h2 class="page-title">
                    Mes sites
                </h2>
            </div>
            <div class="col-auto">
                <div class="text-white text-h5 mt-2">
                    1-10 of 30
                </div>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ml-auto d-print-none">
                <div class="d-flex align-items-center">
                    <a href="#" class="btn btn-white" data-toggle="modal" data-target="#modal-create-site">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        Créer
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-deck row-cards">
        <div class="card">
            <div class="table-responsive">
                <table id="sites" class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th class="w-1">
                                <input class="form-check-input m-0 align-middle" type="checkbox">
                            </th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th> Emplacement </th>
                            <th>Teléphone</th>
                            <th> Employés </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="sites">
                        @foreach (Auth::user()->companies->first()->sites()->get() as $site)
                            <tr id="site{{$site->id}}">
                                <td>
                                    <input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice">
                                </td>
                                <td>
                                    <a class="text-reset" tabindex="-1" id="site-name{{$site->id}}"> {{$site->name}} </a>
                                </td>
                                <td id="site-email{{$site->id}}">
                                    {{$site->email}}
                                </td>
                                <td>
                                    <span id="site-town{{$site->id}}">
                                        {{$site->town}} 
                                    </span> 
                                        -
                                    <span id="site-street{{$site->id}}">
                                        {{$site->street}}
                                    </span> 
                                </td>
                                <td>
                                    <span id="site-phone1{{$site->id}}">
                                        {{$site->phone1}} 
                                    </span> 
                                    @if($site->phone2 != null)
                                        <span id="site-phone2{{$site->id}}">
                                            - {{$site->phone2}}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    {{$site->employees()->count()}}
                                </td>
                                <td class="text-right">
                                    <a href="#" class="btn btn-white btn-sm mt-1" data-toggle="modal" data-target="#modal-edit-site{{$site->id}}">
                                        Modifier
                                    </a>
                                    <span class="dropdown">
                                        <button class="btn btn-white btn-sm dropdown-toggle align-text-top"
                                            data-boundary="viewport" data-toggle="dropdown">Actions</button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">
                                                Dupiquer
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                Marquer comme inactif
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-delete-site">
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
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                <p class="m-0 text-muted">Affichage <span>1</span> à <span>10</span> de <span>30</span>
                    élements</p>
                <ul class="pagination m-0 ml-auto">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <polyline points="15 6 9 12 15 18" /></svg>
                            précédent
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            suivant <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <polyline points="9 6 15 12 9 18" /></svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="modal-section">
        
        {{-- Modal Add site--}}
        <div class="modal modal-blur fade" id="modal-create-site" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un nouveau site</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" /></svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3 align-items-end">
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Nom</label>
                                <input type="text" id="site-name-add" class="form-control" placeholder="Saisissez le nom du site..." required>
                                <span class="text-danger" id="name-error"></span>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Email</label>
                                <input type="email" id="site-email-add" class="form-control"  placeholder="Saisissez l'adresse email du site..." required>
                                <span class="text-danger" id="email-error"></span>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Téléphone N°1</label>
                                <input type="tel" id="site-phone1-add" class="form-control" placeholder="Saisissez le numéro de téléphone principal..." required  pattern="[0-9]{3}[0-9]{3}[0-9]{3}">
                                <span class="text-danger" id="phone1-error"></span>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Téléphone N°2</label>
                                <input type="tel" id="site-phone2-add" class="form-control" placeholder="Saisissez le numéro de téléphone...">
                                <span class="text-danger" id="phone2-error"></span>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Ville</label>
                                <input type="text" id="site-town-add" class="form-control"  placeholder="Saisissez la ville..." required>
                                <span class="text-danger" id="town-error"></span>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Quartier</label>
                                <input type="text" id="site-street-add" class="form-control" placeholder="Saisissez le quartier..." required>
                                <span class="text-danger" id="street-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="addSite()" class="btn btn-primary" style="width: 100%;">Ajouter</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Update site--}}
        @foreach (Auth::user()->companies()->first()->sites()->get() as $site)
            <div class="modal modal-blur fade" id="modal-edit-site{{$site->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> Modifier le site </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <line x1="18" y1="6" x2="6" y2="18" />
                                    <line x1="6" y1="6" x2="18" y2="18" /></svg>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3 align-items-end">
                                <div class="col-lg-12 mb-4">
                                    <label class="form-label">Nom</label>
                                    <input type="text" id="site-name-update{{$site->id}}" value="{{$site->name}}" class="form-control"
                                        placeholder="Saisissez le nom complet..." required>
                                        <span class="text-danger" id="name-error{{$site->id}}"></span>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <label class="form-label">Email</label>
                                    <input type="email" id="site-email-update{{$site->id}}" value="{{$site->email}}" class="form-control"
                                        placeholder="Saisissez l'adresse..." required>
                                        <span class="text-danger" id="email-error{{$site->id}}"></span>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <label class="form-label">Téléphone N°1</label>
                                    <input type="tel" id="site-phone1-update{{$site->id}}" value="{{$site->phone1}}" class="form-control"
                                        placeholder="Saisissez le numéro de téléphone..."  pattern="[0-9]{3}[0-9]{3}[0-9]{3}" required>
                                        <span class="text-danger" id="phone1-error{{$site->id}}"></span>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <label class="form-label">Téléphone N°2</label>
                                    <input type="tel" id="site-phone2-update{{$site->id}}" value="{{$site->phone2}}" class="form-control"
                                        placeholder="Saisissez le numéro de téléphone...">
                                        <span class="text-danger" id="phone2-error{{$site->id}}"></span>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Ville</label>
                                    <input type="text" id="site-town-update{{$site->id}}" value="{{$site->town}}" class="form-control"
                                        placeholder="Saisissez la ville..." required>
                                        <span class="text-danger" id="town-error{{$site->id}}"></span>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Quartier</label>
                                    <input type="text" id="site-street-update{{$site->id}}" value="{{$site->street}}" class="form-control"
                                        placeholder="Saisissez le quartier..." required>
                                        <span class="text-danger" id="street-error{{$site->id}}"></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button onclick="updateSite({{$site->id}})" type="button" class="btn btn-primary" style="width: 100%;"> Mettre à jour </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


        <div class="modal modal-blur fade" id="modal-delete-site" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="modal-title">Êtes vous sûre de cette action ?</div>
                        <div>Si vous continuez, vous perdrez toutes les données de ce site.</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link link-secondary mr-auto"
                            data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Oui, supprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>      
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"> </script>
    <script>
        $(document).ready(function() {
            $('#sites').DataTable();
        } );
    </script>
    <script>
        function addSite(){
            var token = '{{csrf_token()}}';
            var name = $("#site-name-add").val();
            var email = $("#site-email-add").val();
            var phone1 = $("#site-phone1-add").val();
            var phone2 = $("#site-phone2-add").val();
            var town = $("#site-town-add").val();
            var street = $("#site-street-add").val();

            $.ajax({
                url: '/admin/sites/add',
                method: 'post',
                data: {
                    _token : token,
                    name : name,
                    email : email,
                    phone1 : phone1,
                    phone2 : phone2,
                    town : town,
                    street : street
                },
                success: function(data){
                    // $("#modal-create-site").modal('hide');
                    location.reload();
                },
                error: function (err) {
                    if (err.status == 422) { // when status code is 422, it's a validation issue
                            // console.log(err.responseJSON);

                        // you can loop through the errors object and show it to the user
                            //console.warn(err.responseJSON.errors);
                        // display errors on each form field

                        $(".text-danger").fadeOut().html('');

                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $('#'+i+'-error');
                            el.html(error).fadeIn();
                        });
                    }
                }
            });
        }

        function updateSite(id){
            var token = '{{csrf_token()}}';
            var name = $("#site-name-update"+id).val();
            var email = $("#site-email-update"+id).val();
            var phone1 = $("#site-phone1-update"+id).val();
            var phone2 = $("#site-phone2-update"+id).val();
            var town = $("#site-town-update"+id).val();
            var street = $("#site-street-update"+id).val();

            $.ajax({
                url: '/admin/sites/update',
                method: 'post',
                data: {
                    _token : token,
                    name : name,
                    email : email,
                    phone1 : phone1,
                    phone2 : phone2,
                    town : town,
                    street : street,
                    site_id: id
                },
                success: function(data){
                    if(data == 'success'){
                        $(".text-danger").fadeOut().html('');
                        // $("#modal-edit-site"+id).modal().hide();

                        $("#site-name"+id).fadeOut().html(name).fadeIn();
                        $("#site-email"+id).fadeOut().html(email).fadeIn();
                        $("#site-phone1"+id).fadeOut().html(phone1).fadeIn();
                        $("#site-phone2"+id).fadeOut().html(phone2).fadeIn();
                        $("#site-town"+id).fadeOut().html(town).fadeIn();
                        $("#site-street"+id).fadeOut().html(street).fadeIn();
                    }
                },
                error: function (err) {
                    if (err.status == 422) { // when status code is 422, it's a validation issue
                            // console.log(err.responseJSON);

                        // you can loop through the errors object and show it to the user
                            //console.warn(err.responseJSON.errors);
                        // display errors on each form field

                        $(".text-danger").fadeOut().html('');

                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $('#'+i+'-error'+id);
                            el.html(error[0]).fadeIn();
                        });
                    }
                }
            });
        }
    </script>
@endsection

@section('styles')
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" />
@endsection