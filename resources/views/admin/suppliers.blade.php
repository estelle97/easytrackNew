@extends('layouts.base')

@section('content')

    <!-- Page title -->
    <div class="page-header text-white">
        <div class="row align-items-center">
            <div class="col-auto">
                <h2 class="page-title">
                    Les Fournisseurs
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ml-auto d-print-none">
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center">
                        <a href="#" class="text-white mb-0 mr-2" data-toggle="modal" data-target="#modal-create-supplier">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28" height="28" class="mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" fill="rgba(255,255,255,1)"/></svg>
                            <span class="h2 align-middle">Ajouter</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row row-deck row-cards">
        <div class="card p-2">
            <div class="table-responsive">
                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar" class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th class="w-1">
                                <input class="form-check-input m-0 align-middle" type="checkbox">
                            </th>
                            <th class="exportable">name</th>
                            <th class="exportable">compangnie</th>
                            <th class="exportable"> email </th>
                            <th class="exportable">Tel</th>
                            <th class="exportable"> Emplacement </th>
                            <th class="exportable"> BP </th>
                            <th class="exportable"> Site </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="suppliers">
                        @foreach (Auth::user()->companies->first()->sites()->get() as $site)
                            @foreach ($site->suppliers()->get() as $supl)
                                <tr id="supplier{{$supl->id}}">
                                    <td>
                                        <input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select supplier">
                                    </td>
                                    <td>
                                        <a class="text-reset" tabindex="-1" id="supplier-name{{$supl->id}}"> {{$supl->name}} </a>
                                    </td>
                                    <td id="supplier-company_name{{$supl->id}}">
                                        {{$supl->company_name}}
                                    </td>
                                    <td id="supplier-email{{$supl->id}}">
                                        {{$supl->email}}
                                    </td>
                                    <td>
                                        <span id="supplier-phone1{{$supl->id}}">
                                            {{$supl->phone1}}
                                        </span>
                                            -
                                        <span id="supplier-phone2{{$supl->id}}">
                                            {{$supl->phone2}}
                                        </span>
                                    </td>
                                    <td>
                                        <span id="supplier-town{{$supl->id}}">
                                            {{$supl->town}}
                                        </span>
                                        @if($supl->phone2 != null)
                                            <span id="supplier-street{{$supl->id}}">
                                                - {{$supl->street}}
                                            </span>
                                        @endif
                                    </td>
                                    <td id="supplier-postal_code{{$supl->id}}">
                                        {{$supl->postal_code}}
                                    </td>
                                    <td id="supplier-site{{$supl->id}}">
                                        {{$supl->site->name}}
                                    </td>
                                    <td class="text-right">
                                        <a href="#" class="btn btn-white btn-sm mt-1" data-toggle="modal" data-target="#modal-edit-supplier{{$supl->id}}">
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
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-delete-supplier{{$supl->id}}">
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal-section">

        {{-- Modal Add Supplier--}}
        <div class="modal modal-blur fade" id="modal-create-supplier" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un nouveau fournisseur</h5>
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
                                <input type="text" id="supplier-name-add" class="form-control" placeholder="Saisissez le nom du fournisseur" required>
                                <span class="text-danger" id="name-error"></span>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Companie</label>
                                <input type="text" id="supplier-company_name-add" class="form-control"  placeholder="Saisissez la companie du fournisseur" required>
                                <span class="text-danger" id="company_name-error"></span>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Email</label>
                                <input type="email" id="supplier-email-add" class="form-control"  placeholder="Saisissez l'adresse électronique...">
                                <span class="text-danger" id="email-error"></span>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Téléphone N°1</label>
                                <input type="tel" id="supplier-phone1-add" class="form-control" placeholder="Saisissez le numéro de téléphone principal..."  required  pattern="[0-9]{3}[0-9]{3}[0-9]{3}">
                                <span class="text-danger" id="phone1-error"></span>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Téléphone N°2</label>
                                <input type="tel" id="supplier-phone2-add" class="form-control" placeholder="Saisissez le numéro de téléphone..." pattern="[0-9]{3}[0-9]{3}[0-9]{3}">
                                <span class="text-danger" id="phone2-error"></span>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Ville</label>
                                <input type="text" id="supplier-town-add" class="form-control"  placeholder="Saisissez la ville..." required>
                                <span class="text-danger" id="town-error"></span>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Quartier</label>
                                <input type="text" id="supplier-street-add" class="form-control" placeholder="Saisissez le quartier..." required>
                                <span class="text-danger" id="street-error"></span>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Boite postale</label>
                                <input type="text" id="supplier-postal_code-add" class="form-control" placeholder="Saisissez le code postal...">
                                <span class="text-danger" id="postal_code-error"></span>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label"> Site </label>
                                <select name="site_id" id="supplier-site-add" class="form-select">
                                    <option value="all"> Tous les sites</option>
                                     @foreach (Auth::user()->companies->first()->sites()->get() as $site)
                                        <option value="{{$site->id}}"> {{$site->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="addSupplier()" class="btn btn-primary" style="width: 100%;">Ajouter</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Update Supplier--}}
        @foreach (Auth::user()->companies()->first()->sites()->get() as $site)
            @foreach ($site->suppliers()->get() as $supl)
                <div class="modal modal-blur fade" id="modal-edit-supplier{{$supl->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"> Modifier le fournisseur </h5>
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
                                        <input type="text" id="supplier-name-update{{$supl->id}}" value="{{$supl->name}}" class="form-control"
                                            placeholder="Saisissez le nom du fournisseur..." required>
                                            <span class="text-danger" id="name-error{{$supl->id}}"></span>
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <label class="form-label">Companie</label>
                                        <input type="text" id="supplier-company_name-update{{$supl->id}}" value="{{$supl->company_name}}" class="form-control"
                                            placeholder="Saisissez l'adresse..." required>
                                            <span class="text-danger" id="company_name-error{{$supl->id}}"></span>
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <label class="form-label">Email</label>
                                        <input type="email" id="supplier-email-update{{$supl->id}}" value="{{$supl->email}}" class="form-control"
                                            placeholder="Saisissez l'adresse...">
                                            <span class="text-danger" id="email-error{{$supl->id}}"></span>
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <label class="form-label">Téléphone N°1</label>
                                        <input type="tel" id="supplier-phone1-update{{$supl->id}}" value="{{$supl->phone1}}" class="form-control"
                                            placeholder="Saisissez le numéro de téléphone principale..."  pattern="[0-9]{3}[0-9]{3}[0-9]{3}" required>
                                            <span class="text-danger" id="phone1-error{{$supl->id}}"></span>
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <label class="form-label">Téléphone N°2</label>
                                        <input type="tel" id="supplier-phone2-update{{$supl->id}}" value="{{$supl->phone2}}" class="form-control"
                                            placeholder="Saisissez le numéro de téléphone..." pattern="[0-9]{3}[0-9]{3}[0-9]{3}">
                                            <span class="text-danger" id="phone2-error{{$supl->id}}"></span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Ville</label>
                                        <input type="text" id="supplier-town-update{{$supl->id}}" value="{{$supl->town}}" class="form-control"
                                            placeholder="Saisissez la ville..." required>
                                            <span class="text-danger" id="town-error{{$supl->id}}"></span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Quartier</label>
                                        <input type="text" id="supplier-street-update{{$supl->id}}" value="{{$supl->street}}" class="form-control"
                                            placeholder="Saisissez le quartier..." required>
                                            <span class="text-danger" id="street-error{{$supl->id}}"></span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Boite Postale</label>
                                        <input type="text" id="supplier-postal_code-update{{$supl->id}}" value="{{$supl->postal_code}}" class="form-control"
                                            placeholder="Saisissez le quartier..." required>
                                            <span class="text-danger" id="postal_code-error{{$supl->id}}"></span>
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <label class="form-label"> Site </label>
                                        <select name="site_id" id="supplier-site-update{{$supl->id}}" class="form-select">
                                            @foreach (Auth::user()->companies->first()->sites()->get() as $site)
                                                <option {{($site->id == $supl->site->id) ? 'selected' : ''}} value="{{$site->id}}"> {{$site->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button onclick="updateSupplier({{$supl->id}})" type="button" class="btn btn-primary" style="width: 100%;"> Mettre à jour </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach

        @foreach (Auth::user()->companies->first()->sites()->get() as $site)
            @foreach ($site->suppliers()->get() as $supl)
                <div class="modal modal-blur fade" id="modal-delete-supplier{{$supl->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="modal-title">Êtes vous sûre de cette action ?</div>
                                <div>Si vous continuez, vous perdrez toutes les données de ce site.</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link link-secondary mr-auto"
                                    data-dismiss="modal">Annuler</button>
                                <button type="button" class="btn btn-danger" onclick="deleteSupplier({{$supl->id}})">Oui, supprimer</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

    <script>
        function addSupplier(){
            var token = '{{csrf_token()}}';
            var name = $("#supplier-name-add").val();
            var company_name = $("#supplier-company_name-add").val();
            var email = $("#supplier-email-add").val();
            var phone1 = $("#supplier-phone1-add").val();
            var phone2 = $("#supplier-phone2-add").val();
            var town = $("#supplier-town-add").val();
            var street = $("#supplier-street-add").val();
            var postal_code = $("#supplier-postal_code-add").val();
            var site_id = $("#supplier-site-add").val();

            $.ajax({
                url: '/admin/suppliers',
                method: 'post',
                data: {
                    _token : token,
                    name : name,
                    company_name : company_name,
                    email : email,
                    phone1 : phone1,
                    phone2 : phone2,
                    town : town,
                    street : street,
                    postal_code : postal_code,
                    site_id : site_id,
                },
                success: function(data){
                    // $("#modal-create-supplier").modal('hide');
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

        function updateSupplier(id){
            var token = '{{csrf_token()}}';
            var name = $("#supplier-name-update"+id).val();
            var company_name = $("#supplier-company_name-update"+id).val();
            var email = $("#supplier-email-update"+id).val();
            var phone1 = $("#supplier-phone1-update"+id).val();
            var phone2 = $("#supplier-phone2-update"+id).val();
            var town = $("#supplier-town-update"+id).val();
            var street = $("#supplier-street-update"+id).val();
            var postal_code = $("#supplier-postal_code-update"+id).val();
            var site_id = $("#supplier-site-update"+id).val();

            var site = $('#supplier-site-update'+id+' option:selected').text();

            $.ajax({
                url: '/admin/suppliers/'+id,
                method: 'post',
                data: {
                    _token : token,
                    name : name,
                    company_name : company_name,
                    email : email,
                    phone1 : phone1,
                    phone2 : phone2,
                    town : town,
                    street : street,
                    postal_code : postal_code,
                    site_id : site_id,
                },
                success: function(data){
                    if(data == 'success'){
                        $(".text-danger").fadeOut().html('');
                        $("#modal-edit-supplier"+id).modal().hide();
                        $('.modal-backdrop').remove();

                        $("#supplier-name"+id).fadeOut().html(name).fadeIn();
                        $("#supplier-company_name"+id).fadeOut().html(company_name).fadeIn();
                        $("#supplier-postal_code"+id).fadeOut().html(postal_code).fadeIn();
                        $("#supplier-site"+id).fadeOut().html(site).fadeIn();
                        $("#supplier-email"+id).fadeOut().html(email).fadeIn();
                        $("#supplier-phone1"+id).fadeOut().html(phone1).fadeIn();
                        $("#supplier-phone2"+id).fadeOut().html(phone2).fadeIn();
                        $("#supplier-town"+id).fadeOut().html(town).fadeIn();
                        $("#supplier-street"+id).fadeOut().html(street).fadeIn();
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

        function deleteSupplier(supplier){
            var token = '{{csrf_token()}}';

            $.ajax({
                url : '/admin/suppliers/'+supplier+'/destroy',
                method : 'post',
                data: {
                    _token: token,
                },
                success: function(data){
                    $("#modal-delete-supplier"+supplier).hide();
                    $('.modal-backdrop').remove();
                    $("#supplier"+supplier).fadeOut(1500);
                }
            });
        }
    </script>
@endsection

@section('styles')
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/af-2.3.5/b-1.6.2/b-colvis-1.6.2/b-flash-1.6.2/b-html5-1.6.2/b-print-1.6.2/cr-1.5.2/r-2.2.5/rr-1.2.7/sp-1.1.1/sl-1.3.1/datatables.min.css"/>
@endsection
