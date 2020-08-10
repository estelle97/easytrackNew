@extends('layouts.base', ['title' => 'Liste ees employées'])

@section('search-form')
    <div class="ml-md-auto pl-md-4 py-2 py-md-0 mr-md-4 order-first order-md-last flex-grow-1 flex-md-grow-0">
        <form>
            <div class="input-icon">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <circle cx="10" cy="10" r="7" />
                        <line x1="21" y1="21" x2="15" y2="15" />
                    </svg>
                </span>
                <input type="text" onkeyup="search(this.value)" class="form-control form-control-rounded form-control-dark" placeholder="Rechercher" />
            </div>
        </form>
    </div>
@endsection

@section('content')
    {{-- Page Header --}}
    <div class="page-header text-white">
        <div class="row align-items-center">
            <div class="col-auto">
                <h2 class="page-title">
                    Gestion des utilisateurs
                </h2>
            </div>
            <div class="col-auto">
                <div class="text-white text-h5 mt-2">
                    1-18 of 413 people
                </div>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ml-auto d-print-none">
                <div class="d-flex align-items-center">
                    <a href="#" class="text-white" data-toggle="modal" data-target="#modal-create-user">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        Ajouter un utilisateur
                    </a>
                    <span class="dropdown ml-5">
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
                                Équipe
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
    {{-- end Page Header--}}

    {{-- Content Body--}}
    <div class="row row-deck row-cards" id="employees">

        @foreach ($site->employees()->where('user_id', '!=', Auth::user()->id)->get()->reverse() as $emp)
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row row-sm align-items-center">
                            <div class="col-auto">
                                <span class="avatar avatar-md"  style="background-image: url('https://ui-avatars.com/api/?name={{$emp->user->name}}')"> </span>
                            </div>
                            <div class="col">
                                <h3 class="mb-0">
                                    <a href={{route('employee.user.show', $emp->user->username)}}> {{$emp->user->name}} </a>
                                </h3>
                                <div class="text-muted text-h5">
                                {{$emp->user->role->name}}
                                </div>
                            </div>
                            <div class="col-auto lh-1 align-self-start">
                                <span class="badge bg-info">
                                    {{$emp->site->name}}
                                </span>
                            </div>
                        </div>
                        <div class="row align-items-center mt-4">
                            <div class="col">
                                <div>
                                    <div class="d-flex mb-1 align-items-center lh-1">
                                        <div class="text-h5 font-weight-bolder m-0">
                                            Temps de travail
                                        </div>
                                        <span class="ml-auto text-h6 strong">84%</span>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-blue" style="width: 84%;" role="progressbar"
                                            aria-valuenow="84" aria-valuemin="0" aria-valuemax="100">
                                            <span class="sr-only">84% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="btn-list">
                                    <a href={{route('employee.user.show', $emp->user->username)}} class="btn btn-white btn-sm">
                                        Gérer
                                    </a>
                                    <a class="btn btn-white btn-sm" data-toggle="modal"
                                        data-target="#modal-delete-user">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="13"
                                            height="15">
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path
                                                d="M7 4V2h10v2h5v2h-2v15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6H2V4h5zM6 6v14h12V6H6zm3 3h2v8H9V9zm4 0h2v8h-2V9z"
                                                fill="rgba(0,0,0,1)" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- Content Body--}}

    {{-- Modal section--}}

    <div class="modal-section">
        <div class="modal modal-blur fade" id="modal-create-user" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un nouvel utilisateur</h5>
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
                            <div class="col-lg-3">
                                <a href="#" class="avatar avatar-upload rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" /></svg>
                                    <span class="avatar-upload-text">Photo</span>
                                </a>
                            </div>
                            <div class="col-lg-9 mb-4">
                                <label class="form-label">Nom complet</label>
                                <input type="text" id="user-name-add" class="form-control"
                                    placeholder="Saisissez le nom complet..." required>
                                    <span class="text-danger" id="name-error"></span>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Adresse email</label>
                                <input type="email" id="user-email-add" class="form-control"
                                    placeholder="Saisissez l'adresse email d'utilisateur..." required>
                                    <span class="text-danger" id="email-error"></span>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Nom d'utilisateur</label>
                                <input type="text" id="user-username-add" class="form-control"
                                    placeholder="Saisissez le pseudo..." required>
                                    <span class="text-danger" id="username-error"></span>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Adresse</label>
                                <input type="text" id="user-address-add" class="form-control"
                                    placeholder="Saisissez l'adresse..." required>
                                    <span class="text-danger" id="address-error"></span>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label"> Téléphone </label>
                                <input type="tel" id="user-phone-add" class="form-control"
                                    placeholder="Saisissez le numéro de téléphone..." required
                                    pattern="[0-9]{3}[0-9]{3}[0-9]{3}">
                                    <span class="text-danger" id="phone-error"></span>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">
                                    Mot de passe
                                    <a id="show-password" class="link-secondary" title="Show password" data-toggle="tooltip"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="12" r="2" />
                                        <path d="M2 12l1.5 2a11 11 0 0 0 17 0l1.5 -2" />
                                        <path d="M2 12l1.5 -2a11 11 0 0 1 17 0l1.5 2" />
                                    </svg>
                                </a>
                                </label>
                                <input type="password" id="password" class="form-control"
                                    placeholder="Saisissez le mot de passe..." required minlength="8">

                                    <span class="text-danger" id="password-error"></span>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Rôle de l'utilisateur</label>
                                <select name="role" id="user-role-add" class="form-select">
                                     @foreach (App\Role::all() as $role)
                                        <option value="{{$role->id}}"> {{$role->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label"> Site de l'utilisateur </label>
                                <select name="role" id="user-site-add" class="form-select">
                                    <option value={{Auth::user()->employee->site->id}}> {{Auth::user()->employee->site->name}} </option>
                                </select>
                            </div>
                             <div class="col-lg-12 mb-4">
                                <label class="form-label"> Bio </label>
                                <textarea placeholder="Description..." class="form-control" id="user-bio-add"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button onclick="addUser()" type="button" class="btn btn-primary" style="width: 100%;">Ajouter</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal modal-blur fade" id="modal-delete-user" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="modal-title">Êtes vous sure ?</div>
                        <div>Si vous continuez, vous perdrez toutes les données de cette utilisateurs.</div>
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
    <script>
        function addUser(){
            var token = '{{csrf_token()}}';
            var name = $("#user-name-add").val();
            var email = $("#user-email-add").val();
            var username = $("#user-username-add").val();
            var phone = $("#user-phone-add").val();
            var address = $("#user-address-add").val();
            var bio = $("#user-bio-add").val();
            var password = $("#password").val();
            var site = $("#user-site-add").val();
            var role = $("#user-role-add").val();

            $.ajax({
                url : '/admin/users/store',
                method : 'post',
                data : {
                    _token : token,
                    name : name,
                    email : email,
                    username : username,
                    phone : phone,
                    address : address,
                    bio : bio,
                    site_id : site,
                    role_id : role,
                    password : password
                },
                success : function(){
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

        function search(text){
            var token = '{{csrf_token()}}';
            var site = '{{$site->id}}';

            $.ajax({
                url : '/admin/users',
                method : 'post',
                data: {
                    _token: token,
                    text: text,
                    site_id: site,
                },
                success: function(data){
                    $("#employees").html(data);
                }
            });
        }
    </script>
@endsection
