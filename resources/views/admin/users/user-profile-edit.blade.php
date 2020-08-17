@extends('layouts.base')
@section('content')

        <div class="content">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header text-white">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <h2 class="page-title">
                                <a href={{route('admin.user.show',Auth::user()->username)}} class="mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M7.828 11H20v2H7.828l5.364 5.364-1.414 1.414L4 12l7.778-7.778 1.414 1.414z"
                                            fill="rgba(255,255,255,1)" /></svg>
                                </a>
                                Gestion de l'utilisateur
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ml-auto d-print-none">
                            <div class="d-flex align-items-center">
                                <a href={{route('admin.company.users')}} class="d-flex align-items-center text-white mr-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                        class="mr-2">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M20 22h-2v-2a3 3 0 0 0-3-3H9a3 3 0 0 0-3 3v2H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"
                                            fill="rgba(255,255,255,1)" /></svg>
                                    Vue d'ensemble
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                            <div class="card col-lg-3 px-3 py-0"
                                style="max-height: 200px; border:none; box-shadow: none; background-color: transparent;">
                                <input type="file" name="photo" class="file" accept="image/*" hidden>
                                <a href="#" id="profile">
                                    <img class="card-img-top" src="{{($user->photo != null) ? asset($user->photo) : "https://picsum.photos/id/700/400"}}" alt="Profile picture">
                                </a>
                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex align-items-center mt-auto">
                                        <div class="ml-2">
                                            <small class="d-block text-muted"> {{$user->role->name}} </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">

                                <div class="card">
                                    <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
                                        <li class="nav-item">
                                            <a href="#tabs-home-ex6" class="nav-link active" data-toggle="tab">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="15"
                                                    height="15" class="mr-2">
                                                    <path fill="none" d="M0 0h24v24H0z" />
                                                    <path
                                                        d="M19 21H5a1 1 0 0 1-1-1v-9H1l10.327-9.388a1 1 0 0 1 1.346 0L23 11h-3v9a1 1 0 0 1-1 1zm-6-2h5V9.157l-6-5.454-6 5.454V19h5v-6h2v6z" />
                                                </svg>
                                                Profile</a>
                                        </li>
                                        <li class="nav-item ml-auto">
                                            <a href="#" class="nav-link" title="Settings" data-toggle="modal" data-target="#modal-create-role">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18"
                                                    height="18">
                                                    <path fill="none" d="M0 0h24v24H0z" />
                                                    <path
                                                        d="M8.686 4l2.607-2.607a1 1 0 0 1 1.414 0L15.314 4H19a1 1 0 0 1 1 1v3.686l2.607 2.607a1 1 0 0 1 0 1.414L20 15.314V19a1 1 0 0 1-1 1h-3.686l-2.607 2.607a1 1 0 0 1-1.414 0L8.686 20H5a1 1 0 0 1-1-1v-3.686l-2.607-2.607a1 1 0 0 1 0-1.414L4 8.686V5a1 1 0 0 1 1-1h3.686zM6 6v3.515L3.515 12 6 14.485V18h3.515L12 20.485 14.485 18H18v-3.515L20.485 12 18 9.515V6h-3.515L12 3.515 9.515 6H6zm6 10a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                                </svg>
                                                Permissions
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="tabs-home-ex6">

                                                <div class="row">
                                                @csrf
                                                    <div class="col-sm-12 col-md-5">
                                                        <div class="mb-2">
                                                            <label class="form-label">Company</label>
                                                            <input type="text" value="{{$user->employee->site->company()->first()->name}}" class="form-control form-control-rounded"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-7">
                                                        <div class="mb-2">
                                                            <label class="form-label">Nom complet</label>
                                                            <input type="text" name="name" value="{{$user->name}}" class="form-control form-control-rounded"
                                                                placeholder="Saisissez votre nom" required>
                                                            @if($errors->has('name'))
                                                                <span>
                                                                    <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4">
                                                        <div class="mb-2">
                                                            <label class="form-label">Nom d'utilisateur</label>
                                                            <input type="text" name="username" value="{{$user->username}}" class="form-control form-control-rounded"
                                                                placeholder="Saisisez votre nom d'utilisateur" required>
                                                            @if($errors->has('username'))
                                                                <span>
                                                                    <strong class="text-danger">{{ $errors->first('username') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4">
                                                        <div class="mb-2">
                                                            <label class="form-label">Email</label>
                                                            <input type="email" name="email" value="{{$user->email}}" class="form-control form-control-rounded"
                                                                placeholder="Email" required>
                                                            @if($errors->has('email'))
                                                                <span>
                                                                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4">
                                                        <div class="mb-2">
                                                            <label class="form-label">Téléphone</label>
                                                            <input type="tel" name="phone" value="{{$user->phone}}" class="form-control form-control-rounded"
                                                                placeholder="N° de Téléphone" required pattern="[0-9]{3}[0-9]{3}[0-9]{3}">
                                                            @if($errors->has('phone'))
                                                                <span>
                                                                    <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 col-md-4">
                                                        <div class="mb-2">
                                                            <label class="form-label">Addresse</label>
                                                            <input type="text" name="address" value="{{$user->address}}" class="form-control form-control-rounded"
                                                                placeholder="Saisisez votre adresse" required>
                                                            @if($errors->has('address'))
                                                                <span>
                                                                    <strong class="text-danger">{{ $errors->first('address') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <div class="mb-4">
                                                            <label class="form-label"> Site </label>
                                                            <select name="site_id" class="form-select">
                                                                @foreach (Auth::user()->companies->first()->sites as $site)
                                                                    <option {{($user->employee->site_id == $site->id) ? 'selected' : ''}} value="{{$site->id}}"> {{$site->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <div class="mb-4">
                                                            <label class="form-label">Rôle</label>
                                                            <select name="role_id" class="form-select">
                                                                @foreach (App\Role::all() as $role)
                                                                    <option {{($user->role_id == $role->id) ? 'selected' : ''}} value="{{$role->id}}"> {{$role->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="col-sm-12 col-md-3">
                                                        <div class="mb-2">
                                                            <label class="form-label">N° CNI de l'employée</label>
                                                            <input type="text" name="cni_number" value="{{$user->employee->cni_number}}" class="form-control form-control-rounded"
                                                                placeholder="Numéro de CNI">
                                                            @if($errors->has('cni_number'))
                                                                <span>
                                                                    <strong class="text-danger">{{ $errors->first('cni_number') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-5">
                                                        <div class="mb-2">
                                                            <label class="form-label">Personne à contacter en cas d'urgence</label>
                                                            <input type="text" name="contact_name" value="{{$user->employee->contact_name}}" class="form-control form-control-rounded"
                                                                placeholder="Nom du responsable">
                                                            @if($errors->has('contact_name'))
                                                                <span>
                                                                    <strong class="text-danger">{{ $errors->first('contact_name') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <div class="mb-2">
                                                            <label class="form-label">Téléphone</label>
                                                            <input type="text" name="contact_phone" value="{{$user->employee->contact_phone}}" class="form-control form-control-rounded"
                                                                placeholder="Téléphone du responsable">
                                                            @if($errors->has('contact_phone'))
                                                                <span>
                                                                    <strong class="text-danger">{{ $errors->first('contact_phone') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>


                                                    <div class="col-md-12">
                                                        <div class="mb-2 mb-0">
                                                            <label class="form-label"> Bio </label>
                                                            <textarea name="bio" rows="5" class="form-control" placeholder="Here can be your description">{{$user->bio}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="text-right">
                                                        <button type="submit" class="btn btn-primary btn-pill">Mettre à jour</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tabs-settings-ex6">
                                                <div></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-section">
            <div class="modal modal-blur fade" id="modal-save-profile" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" /></svg>
                        </button>
                        <div class="modal-body text-center py-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-xl icon-thin mb-4 text-green" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <circle cx="12" cy="12" r="9" />
                                <path d="M9 12l2 2l4 -4" /></svg>
                            <h3>Sauvegarde reussie</h3>
                            <div class="text-muted">Nous avons sauvegarder les changements effectuer sur le profil de
                                l'utilisateur<div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal modal-blur fade" id="modal-create-role" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title">Ajouter des permissions au {{$user->role->name}} {{$user->name}}</h5>
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
                            <div class="card border-0 shadow-none">
                                <div class="card-header">
                                    <h3 class="card-title">Permissions du {{$user->role->name}} {{$user->name}}</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table">
                                        <thead>
                                            <tr>
                                                <th>Permissions</th>
                                                <th> description </th>
                                            </tr>
                                        </thead>
                                        <tbody id="permissions">
                                            @foreach ($user->role->permissions()->get() as $perm)
                                                <tr id="perm-user-list{{$perm->id}}">
                                                    <td> {{$perm->name}} </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-end">
                                <div class="col-lg-9">
                                    <label class="form-label">Permission</label>
                                    <select name="role" id="select-permission" class="form-select">
                                        @foreach (App\Permission::orderBy('slug')->get() as $perm)
                                            <option value="{{$perm->id}}"> {{$perm->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3 py-0">
                                    <a class="btn btn-light btn-block" onclick="attachPermissionToUser({{$user->id}})">
                                        Ajouter
                                    </a>
                                </div>
                            </div>
                            <div class="card border-0 shadow-none">
                                <div class="card-header">
                                    <h3 class="card-title">Permissions spéciales</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th> action </th>
                                            </tr>
                                        </thead>
                                        <tbody id="permissions-add">
                                            @foreach ($user->permissions()->get() as $perm)
                                                <tr id="perm-user-list{{$perm->id}}">
                                                    <td> {{$perm->name}} </td>
                                                    <td class="text-right">
                                                        <a class="mt-1 text-blue" onclick="detachPermissionToUser({{$user->id}},{{$perm->id}})">
                                                            Supprimer
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" style="width: 100%;" data-dismiss="modal" onclick="roleAdd()">
                                Enregistrer
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection

@section('scripts')
    <script>

        function attachPermissionToUser(user_id){
            var token = '{{csrf_token()}}';
            var permission_id = $('#select-permission').val();
            var permission = $('#select-permission option:selected').text();

            $.ajax({
                url: '/admin/roles/attachPermissionToUser',
                data: {
                    _token : token,
                    user_id : user_id,
                    permission_id : permission_id,
                },
                method : 'post',
                success:function (data) {
                    if(data == 'success'){
                        $("#permissions-add").append("<tr id='perm-user-list"+permission_id+"'><td>"+
                                                permission+
                                            "</td>"+
                                            "<td class='text-right'>"+
                                                "<a class='mt-1 text-blue' onclick='detachPermissionToUser("+user_id+","+permission_id+")'>"+
                                                    "Supprimer"+
                                                "</a>"+
                                            "</td></tr>"
                                    )
                    }
                }
            });
        }

        function detachPermissionToUser(user_id, permission_id){
            var token = '{{csrf_token()}}';

            $.ajax({
                url: '/admin/roles/detachPermissionToUser',
                data: {
                    _token : token,
                    user_id : user_id,
                    permission_id : permission_id,
                },
                method : 'post',
                success:function (data) {
                    if(data == 'success'){
                        $("#perm-user-list"+permission_id).fadeOut();
                    }
                }
            });

        }

        $("#profile").click(function(){
            $(".file").click();

            $('input[type="file"]').change(function(e) {
                var fileName = e.target.files[0].name;
                // $("#file").val(fileName);

                var reader = new FileReader();
                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    pic = "<img src='"+e.target.result+"' class='card-img-top' />";
                    $("#profile").html(pic);
                    // document.getElementById("preview").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });
        })

    </script>
@endsection
