@extends('layouts.mainlayoutAdmin')
@section('content')

		<div class="content">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header text-white">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <h2 class="page-title">
                                <a href="{{ route('admin.role.index') }}" class="mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M7.828 11H20v2H7.828l5.364 5.364-1.414 1.414L4 12l7.778-7.778 1.414 1.414z"
                                            fill="rgba(255,255,255,1)" /></svg>
                                </a>
                                Gestion des Permissions pour le rôle {{$lims_role_data->name}}
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ml-auto d-print-none">
                            <div class="d-flex align-items-center">
                                <a href="#" class="d-flex align-items-center text-white mr-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M20 22h-2v-2a3 3 0 0 0-3-3H9a3 3 0 0 0-3 3v2H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" fill="rgba(255,255,255,1)"/></svg>
                                    Vue d'ensemble
                                </a>

                                <a href="#" class="d-flex align-items-center text-white mr-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z" fill="rgba(255,255,255,1)"/></svg>
                                    Éditer
                                </a>

                                <a href="#" class="d-flex align-items-center text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M3.34 17a10.018 10.018 0 0 1-.978-2.326 3 3 0 0 0 .002-5.347A9.99 9.99 0 0 1 4.865 4.99a3 3 0 0 0 4.631-2.674 9.99 9.99 0 0 1 5.007.002 3 3 0 0 0 4.632 2.672c.579.59 1.093 1.261 1.525 2.01.433.749.757 1.53.978 2.326a3 3 0 0 0-.002 5.347 9.99 9.99 0 0 1-2.501 4.337 3 3 0 0 0-4.631 2.674 9.99 9.99 0 0 1-5.007-.002 3 3 0 0 0-4.632-2.672A10.018 10.018 0 0 1 3.34 17zm5.66.196a4.993 4.993 0 0 1 2.25 2.77c.499.047 1 .048 1.499.001A4.993 4.993 0 0 1 15 17.197a4.993 4.993 0 0 1 3.525-.565c.29-.408.54-.843.748-1.298A4.993 4.993 0 0 1 18 12c0-1.26.47-2.437 1.273-3.334a8.126 8.126 0 0 0-.75-1.298A4.993 4.993 0 0 1 15 6.804a4.993 4.993 0 0 1-2.25-2.77c-.499-.047-1-.048-1.499-.001A4.993 4.993 0 0 1 9 6.803a4.993 4.993 0 0 1-3.525.565 7.99 7.99 0 0 0-.748 1.298A4.993 4.993 0 0 1 6 12c0 1.26-.47 2.437-1.273 3.334a8.126 8.126 0 0 0 .75 1.298A4.993 4.993 0 0 1 9 17.196zM12 15a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0-2a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" fill="rgba(255,255,255,1)"/></svg>
                                    Paramètres
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card col-lg-3 px-3 py-0"
                        style="max-height: 200px; border:none; box-shadow: none; background-color: transparent;">
                        
					</div>
					
                    <div class="col-lg-9">
					{!! Form::open(['route' => 'admin.role.setPermission', 'method' => 'post']) !!}
                        <div class="card">
                            <div class="p-3">
                                <h2 class="mb-0">Configuration et permissions - {{$lims_role_data->name}}</h2>
                                <span class="text-muted">Vous pouvez configurer le profil de l'utilisateur et lui octroyer des accèss spécifiques sur l'application</span>
							</div>
							<div class="checkbox">
								<input type="checkbox" id="select_all">
								<label for="select_all">Tout sélectionner</label>
							</div>
							<input type="hidden" name="role_id" value="{{$lims_role_data->id}}" />
                            <div class="card border-0 shadow-none">
                                <div class="card-header">
                                    <h3 class="card-title">Magasin</h3>
                                    <h4></h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Voir</th>
                                                <th>Créer</th>
                                                <th>Modifer</th>
                                                <th>Supprimer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Produits
                                                </td>
                                                <td aria-checked="false" aria-disabled="false">
													@if(in_array("read_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("create_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("update_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("delete_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Fournisseurs
                                                </td>
                                                <td aria-checked="false" aria-disabled="false">
													@if(in_array("read_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("create_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("update_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("delete_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card border-0 shadow-none mt-4">
                                <div class="card-header">
                                    <h3 class="card-title">Commandes</h3>
                                    <h4></h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Voir</th>
                                                <th>Créer</th>
                                                <th>Modifer</th>
                                                <th>Supprimer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Commandes clients
                                                </td>
                                                <td aria-checked="false" aria-disabled="false">
													@if(in_array("read_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("create_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("update_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("delete_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Bons de commandes
                                                </td>
                                                <td aria-checked="false" aria-disabled="false">
													@if(in_array("read_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("create_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("update_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("delete_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card border-0 shadow-none mt-4">
                                <div class="card-header">
                                    <h3 class="card-title">Achat</h3>
                                    <h4></h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Voir</th>
                                                <th>Créer</th>
                                                <th>Modifer</th>
                                                <th>Supprimer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Facturations
                                                </td>
                                                <td aria-checked="false" aria-disabled="false">
													@if(in_array("read_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("create_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("update_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("delete_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card border-0 shadow-none mt-4">
                                <div class="card-header">
                                    <h3 class="card-title">Applications</h3>
                                    <h4></h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Voir</th>
                                                <th>Créer</th>
                                                <th>Modifer</th>
                                                <th>Supprimer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Chat
                                                </td>
                                                <td aria-checked="false" aria-disabled="false">
													@if(in_array("read_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("create_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("update_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("delete_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Agenda
                                                </td>
                                                <td aria-checked="false" aria-disabled="false">
													@if(in_array("read_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("create_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("update_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("delete_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Application Android
                                                </td>
                                                <td aria-checked="false" aria-disabled="false">
													@if(in_array("read_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("create_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("update_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("delete_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Application iOS
                                                </td>
                                                <td aria-checked="false" aria-disabled="false">
													@if(in_array("read_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("create_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("update_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" type="checkbox">
													@endif
                                                </td>
                                                <td>
													@if(in_array("delete_user", $all_permission))
													<input class="form-check-input m-0 align-middle" value="1" id="delete_user" checked type="checkbox">
													@else
													<input class="form-check-input m-0 align-middle" value="1" id="delete_user" type="checkbox">
													@endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="text-right p-4">
                                <button type="submit" class="btn btn-primary mr-4" data-toggle="modal" data-target="#modal-save-settings">Sauvegarder</button>
                                <button type="button" class="btn btn-dark">Annuler</button>
                            </div>
                        </div>
					{!! Form::close() !!}
					</div>
					
                </div>
            </div>
        </div>

<script type="text/javascript">

	$("#select_all").on( "change", function() {
	    if ($(this).is(':checked')) {
	        $("tbody input[type='checkbox']").prop('checked', true);
	    } 
	    else {
	        $("tbody input[type='checkbox']").prop('checked', false);
	    }
	});
</script>
@endsection