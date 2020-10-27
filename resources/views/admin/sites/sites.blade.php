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
            <!-- Page title actions -->
            <div class="col-auto ml-auto d-print-none">
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center">
                        <a href="#" class="text-white mb-0 mr-2" data-toggle="modal" data-target="#modal-create-site">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28" height="28" class="mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" fill="rgba(255,255,255,1)"/></svg>
                            <span class="h2 align-middle">Ajouter</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-deck row-cards">
        <div class="card card-max-size p-2">
            <div class="table-responsive">
                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar" class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th class="w-1">
                                <input class="form-check-input m-0 align-middle" type="checkbox">
                            </th>
                            <th class="exportable">Nom</th>
                            <th class="exportable">Email</th>
                            <th class="exportable"> Emplacement </th>
                            <th class="exportable">Teléphone</th>
                            <th class="exportable"> Employés </th>
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
                                    @if ($site->employees()->count() == 0)
                                        Aucun employé
                                    @else
                                <a href={{route('admin.site.employees',$site->slug)}}> {{$site->employees()->count()}} Employé(s)</a>
                                    @endif
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
                                                 Afficher
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

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
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/af-2.3.5/b-1.6.2/b-colvis-1.6.2/b-flash-1.6.2/b-html5-1.6.2/b-print-1.6.2/cr-1.5.2/r-2.2.5/rr-1.2.7/sp-1.1.1/sl-1.3.1/datatables.min.css"/>
@endsection
