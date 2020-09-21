@extends('layouts.base')

@section('content')

    <!-- Page title -->
    <div class="page-header text-white">
        <div class="row align-items-center">
            <div class="col-auto">
                <h2 class="page-title">
                    <a href="{{route('easytrack.companies')}}" class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M7.828 11H20v2H7.828l5.364 5.364-1.414 1.414L4 12l7.778-7.778 1.414 1.414z"
                                fill="rgba(255,255,255,1)" />
                        </svg>
                    </a>
                    Gestion des rôles
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ml-auto d-print-none">
                <div class="d-flex align-items-center">
                    <a href="#" class="text-white" data-toggle="modal" data-target="#modal-create-role">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        Ajouter un rôle
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th>Nom du rôle</th>
                            <th>Description</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (App\Role::all() as $role)
                            <tr id="role{{$role->id}}">
                                <td class="w-1">
                                <span id="role-name{{$role->id}}"> {{$role->name}} </span>
                                </td>
                                <td class="td-truncate">
                                    <div id="role-description{{$role->id}}" class="text-truncate">
                                            {{$role->description}}
                                    </div>
                                </td>
                                <td class="text-right">
                                    <a class="btn btn-white btn-sm mt-1" data-toggle="modal"
                                        data-target="#modal-edit-role{{$role->id}}">
                                        Modifier
                                    </a>
                                    <span class="dropdown">
                                        <button class="btn btn-white btn-sm dropdown-toggle align-text-top"
                                            data-boundary="viewport" data-toggle="dropdown">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">

                                            <a class="dropdown-item" data-toggle="modal"
                                                data-target="#modal-delete-role">
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
            @foreach (App\Role::all() as $role)
            <div class="modal modal-blur fade" id="modal-edit-role{{$role->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modifier le rôle</h5>
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
                                        <label class="form-label ml-4">Nom</label>
                                    <input type="text" class="form-control" id="name{{$role->id}}" name="name" placeholder="Saisissez le nom..."
                                            value="{{$role->name}}" />
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <label class="form-label ml-4">Description</label>
                                    <input type="text" id="description{{$role->id}}" class="form-control" placeholder="Saisissez la description..."
                                            value="{{$role->description}}" />
                                    </div>
                                    <div class="col-lg-9">
                                        <label class="form-label">Permission</label>
                                        <select name="roleUpdate" id="select-permission-update{{$role->id}}" class="form-select">
                                            @foreach(App\Permission::orderBy('slug')->get() as $newPerm)
                                                <option id="edit-perm-option{{$role->id}}-{{$newPerm->id}}" value="{{$newPerm->id}}"  {{$newPerm->roles->contains($role->id) ? 'disabled' : ''}}> {{$newPerm->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3 py-0">
                                    <a class="btn btn-light btn-block" id="perm-add-button{{$role->id}}" onclick="attachPermissionToRole({{$role->id}})">
                                            Ajouter
                                        </a>
                                    </div>
                                </div>
                                <div class="card border-0 shadow-none">
                                    <div class="card-header">
                                        <h3 class="card-title">Permissions</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-vcenter card-table">
                                            <thead>
                                                <tr>
                                                    <th>Description</th>
                                                    <th> action </th>
                                                </tr>
                                            </thead>
                                            <tbody id="permission-edit{{$role->id}}">
                                                @foreach ($role->permissions as $role_perm)
                                                    <tr id="perm-role-list{{$role->id}}-{{$role_perm->id}}">
                                                        <td>
                                                            {{$role_perm->name}}
                                                        </td>
                                                        <td class="text-right">
                                                            <a class="mt-1 text-blue" onclick="detachPermissionToRole({{$role->id}},{{$role_perm->id}})">
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
                                <button type="button" class="btn btn-primary" style="width: 100%;" data-dismiss="modal" onclick="roleUpdate({{$role->id}})">
                                    Enregistrer
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
                                données lié à ce rôle.
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

            <div class="modal modal-blur fade" id="modal-create-role" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ajouter un nouveau role</h5>
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
                                    <label class="form-label ml-4">Nom</label>
                                    <input id="name-add" type="text" class="form-control" placeholder="Saisissez le nom..." />
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <label class="form-label ml-4">Description</label>
                                    <input id="description-add" type="text" class="form-control" placeholder="Saisissez la description..." />
                                </div>
                                <div class="col-lg-9">
                                    <label class="form-label">Permission</label>
                                    <select name="role" id="select-permission" class="form-select">
                                        @foreach (App\Permission::orderBy('slug')->get() as $perm)
                                             <option id="select-permission-text{{$perm->id}}" value="{{$perm->id}}"> {{$perm->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3 py-0">
                                    <a class="btn btn-light btn-block" onclick="addPermissionToRole()">
                                        Ajouter
                                    </a>
                                </div>
                            </div>
                            <div class="card border-0 shadow-none">
                                <div class="card-header">
                                    <h3 class="card-title">Permissions</h3>
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
        var permissions = [];

        function addPermissionToRole(){
            var permission_id = $('#select-permission').val();
            var permission = $('#select-permission-text'+permission_id).text();
            if(!permissions.includes(permission_id)){
                $("#permissions-add").append("<tr id='perm"+permission_id+"'><td>"+
                                                permission+
                                            "</td>"+
                                            "<td class='text-right'>"+
                                                "<a class='mt-1 text-blue' onclick='removePermissionToRole("+permission_id+")'>"+
                                                    "Supprimer"+
                                                "</a>"+
                                            "</td></tr>"
                                        );
                // Ajout de l'identifiant de la permission dans le tableau permissions[]
                permissions.push(permission_id);
            }
        }

        function removePermissionToRole(id){
            // Retrait de l'identifiant de la permission dans le tableau permissions[]
            $("#perm"+id).fadeOut();
            permissions = jQuery.grep(permissions, function(value) {
                return value != id;
            });
        }

        function roleAdd(){
            var token = '{{csrf_token()}}';
            var name = $("#name-add").val();
            var description = $("#description-add").val();

            $.ajax({
                url: '/easytrack/roles/add',
                data: {
                    _token : token,
                    name : name,
                    description : description,
                    permissions : permissions,
                },
                method : 'post',
                success:function (data) {
                    document.location.reload(true);
                }
            });
        }

        function roleUpdate(id){
            var token = '{{csrf_token()}}';
            var name = $("#name"+id).val();
            var description = $("#description"+id).val();

            $.ajax({
                url: '/easytrack/roles/update',
                data: {
                    _token : token,
                    name : name,
                    description : description,
                    role_id : id,
                },
                method : 'post',
                success:function (data) {
                    if(data == 'success'){
                        $("#role-name"+id).hide().fadeIn().html(name);
                         $("#role-description"+id).hide().fadeIn().html(description);
                    }
                }
            });
        }

        function attachPermissionToRole(id){
            var token = '{{csrf_token()}}';
            var permission_id = $('#select-permission-update'+id).val();
            var permission = $('#edit-perm-option'+id+'-'+permission_id).text();

            $.ajax({
                url: '/easytrack/roles/attachPermissionToRole',
                data: {
                    _token : token,
                    role_id : id,
                    permission_id : permission_id,
                },
                method : 'post',
                success:function (data) {
                    if(data == 'success'){
                        $("#permission-edit"+id).append("<tr id='perm-role-list"+id+"-"+permission_id+"'><td>"+
                                                permission+
                                            "</td>"+
                                            "<td class='text-right'>"+
                                                "<a class='mt-1 text-blue' onclick='detachPermissionToRole("+id+","+permission_id+")'>"+
                                                    "Supprimer"+
                                                "</a>"+
                                            "</td></tr>"
                                    )
                    }
                }
            });
        }

        function detachPermissionToRole(role_id, permission_id){
            var token = '{{csrf_token()}}';

            $.ajax({
                url: '/easytrack/roles/detachPermissionToRole',
                data: {
                    _token : token,
                    role_id : role_id,
                    permission_id : permission_id,
                },
                method : 'post',
                success:function (data) {
                    if(data == 'success'){
                        $("#perm-role-list"+role_id+"-"+permission_id).fadeOut();
                    }
                }
            });

        }
    </script>
@endsection
