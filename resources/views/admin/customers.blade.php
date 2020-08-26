@extends('layouts.base')

@section('content')

    <!-- Page title -->
    <div class="page-header text-white">
        <div class="row align-items-center">
            <div class="col-auto">
                <h2 class="page-title">
                    Les Clients
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
                    <a href="#" class="btn btn-white" data-toggle="modal" data-target="#modal-create-customer">
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
                <table id="customers" class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th class="w-1">
                                <input class="form-check-input m-0 align-middle" type="checkbox">
                            </th>
                            <th class="exportable">name</th>
                            <th class="exportable">company</th>
                            <th class="exportable"> email </th>
                            <th class="exportable">Tel</th>
                            <th class="exportable"> Emplacement </th>
                            <th class="exportable"> Site </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="customers">
                        @foreach (Auth::user()->companies->first()->sites()->get() as $site)
                            @foreach ($site->customers()->get() as $cus)
                                <tr id="customer{{$cus->id}}">
                                    <td>
                                        <input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select customer">
                                    </td>
                                    <td>
                                        <a class="text-reset" tabindex="-1" id="customer-name{{$cus->id}}"> {{$cus->name}} </a>
                                    </td>
                                    <td id="customer-company_name{{$cus->id}}">
                                        {{$cus->company_name}}
                                    </td>
                                    <td id="customer-email{{$cus->id}}">
                                        {{$cus->email}}
                                    </td>
                                    <td>
                                        <span id="customer-phone{{$cus->id}}">
                                            {{$cus->phone}}
                                        </span>
                                    </td>
                                    <td>
                                        <span id="customer-town{{$cus->id}}">
                                            {{$cus->town}} - {{$cus->street}}
                                        </span>

                                    </td>
                                    <td id="customer-site{{$cus->id}}">
                                        {{$cus->site->name}}
                                    </td>
                                    <td class="text-right">
                                        <a href="#" class="btn btn-white btn-sm mt-1" data-toggle="modal" data-target="#modal-edit-customer{{$cus->id}}">
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal-section">

        {{-- Modal Add customer--}}
        <div class="modal modal-blur fade" id="modal-create-customer" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un nouveau client</h5>
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
                                <input type="text" id="customer-name-add" class="form-control" placeholder="Saisissez le nom du client" required>
                                <span class="text-danger" id="name-error"></span>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Companie</label>
                                <input type="text" id="customer-company_name-add" class="form-control"  placeholder="Saisissez la companie du client" required>
                                <span class="text-danger" id="company_name-error"></span>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Email</label>
                                <input type="email" id="customer-email-add" class="form-control"  placeholder="Saisissez l'adresse électronique...">
                                <span class="text-danger" id="email-error"></span>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Téléphone </label>
                                <input type="tel" id="customer-phone-add" class="form-control" placeholder="Saisissez le numéro de téléphone principal..."  required  pattern="[0-9]{3}[0-9]{3}[0-9]{3}">
                                <span class="text-danger" id="phone-error"></span>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Ville</label>
                                <input type="text" id="customer-town-add" class="form-control"  placeholder="Saisissez la ville..." required>
                                <span class="text-danger" id="town-error"></span>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Quartier</label>
                                <input type="text" id="customer-street-add" class="form-control" placeholder="Saisissez le quartier..." required>
                                <span class="text-danger" id="street-error"></span>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label"> Site </label>
                                <select name="site_id" id="customer-site-add" class="form-select">
                                    <option value="all"> Tous les sites</option>
                                     @foreach (Auth::user()->companies->first()->sites()->get() as $site)
                                        <option value="{{$site->id}}"> {{$site->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="addCustomer()" class="btn btn-primary" style="width: 100%;">Ajouter</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Update customer--}}
        @foreach (Auth::user()->companies()->first()->sites()->get() as $site)
            @foreach ($site->customers()->get() as $cus)
                <div class="modal modal-blur fade" id="modal-edit-customer{{$cus->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"> Modifier le client </h5>
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
                                        <input type="text" id="customer-name-update{{$cus->id}}" value="{{$cus->name}}" class="form-control"
                                            placeholder="Saisissez le nom du client..." required>
                                            <span class="text-danger" id="name-error{{$cus->id}}"></span>
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <label class="form-label">Companie</label>
                                        <input type="text" id="customer-company_name-update{{$cus->id}}" value="{{$cus->company_name}}" class="form-control"
                                            placeholder="Saisissez l'adresse..." required>
                                            <span class="text-danger" id="company_name-error{{$cus->id}}"></span>
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <label class="form-label">Email</label>
                                        <input type="email" id="customer-email-update{{$cus->id}}" value="{{$cus->email}}" class="form-control"
                                            placeholder="Saisissez l'adresse...">
                                            <span class="text-danger" id="email-error{{$cus->id}}"></span>
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <label class="form-label">Téléphone </label>
                                        <input type="tel" id="customer-phone-update{{$cus->id}}" value="{{$cus->phone}}" class="form-control"
                                            placeholder="Saisissez le numéro de téléphone principale..."  pattern="[0-9]{3}[0-9]{3}[0-9]{3}" required>
                                            <span class="text-danger" id="phone-error{{$cus->id}}"></span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Ville</label>
                                        <input type="text" id="customer-town-update{{$cus->id}}" value="{{$cus->town}}" class="form-control"
                                            placeholder="Saisissez la ville..." required>
                                            <span class="text-danger" id="town-error{{$cus->id}}"></span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Quartier</label>
                                        <input type="text" id="customer-street-update{{$cus->id}}" value="{{$cus->street}}" class="form-control"
                                            placeholder="Saisissez le quartier..." required>
                                            <span class="text-danger" id="street-error{{$cus->id}}"></span>
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <label class="form-label"> Site </label>
                                        <select name="site_id" id="customer-site-update{{$cus->id}}" class="form-select">
                                            @foreach (Auth::user()->companies->first()->sites()->get() as $site)
                                                <option {{($site->id == $cus->site->id) ? 'selected' : ''}} value="{{$site->id}}"> {{$site->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button onclick="updateCustomer({{$cus->id}})" type="button" class="btn btn-primary" style="width: 100%;"> Mettre à jour </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
        function addCustomer(){
            var token = '{{csrf_token()}}';
            var name = $("#customer-name-add").val();
            var company_name = $("#customer-company_name-add").val();
            var email = $("#customer-email-add").val();
            var phone = $("#customer-phone-add").val();
            var town = $("#customer-town-add").val();
            var street = $("#customer-street-add").val();
            var site_id = $("#customer-site-add").val();

            $.ajax({
                url: '/admin/customers',
                method: 'post',
                data: {
                    _token : token,
                    name : name,
                    company_name : company_name,
                    email : email,
                    phone : phone,
                    town : town,
                    street : street,
                    site_id : site_id,
                },
                success: function(data){
                    // $("#modal-create-customer").modal('hide');
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

        function updateCustomer(id){
            var token = '{{csrf_token()}}';
            var name = $("#customer-name-update"+id).val();
            var company_name = $("#customer-company_name-update"+id).val();
            var email = $("#customer-email-update"+id).val();
            var phone = $("#customer-phone-update"+id).val();
            var town = $("#customer-town-update"+id).val();
            var street = $("#customer-street-update"+id).val();
            var site_id = $("#customer-site-update"+id).val();

            var site = $('#customer-site-update'+id+' option:selected').text();

            $.ajax({
                url: '/admin/customers/'+id,
                method: 'post',
                data: {
                    _token : token,
                    name : name,
                    company_name : company_name,
                    email : email,
                    phone : phone,
                    town : town,
                    street : street,
                    site_id : site_id,
                },
                success: function(data){
                    if(data == 'success'){
                        $(".text-danger").fadeOut().html('');
                        // $("#modal-edit-customer"+id).modal().hide();

                        $("#customer-name"+id).fadeOut().html(name).fadeIn();
                        $("#customer-company_name"+id).fadeOut().html(company_name).fadeIn();
                        $("#customer-site"+id).fadeOut().html(site).fadeIn();
                        $("#customer-email"+id).fadeOut().html(email).fadeIn();
                        $("#customer-phone"+id).fadeOut().html(phone).fadeIn();
                        $("#customer-town"+id).fadeOut().html(town).fadeIn();
                        $("#customer-street"+id).fadeOut().html(street).fadeIn();
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
