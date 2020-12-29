@extends('layouts.base')

@section('content')
    <!-- Page title -->
    <div class="page-header text-white">
        <div class="row align-items-center">
            <div class="col-auto">
                <h2 class="page-title">
                    <a href="{{route('employee.company.users')}}" class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M7.828 11H20v2H7.828l5.364 5.364-1.414 1.414L4 12l7.778-7.778 1.414 1.414z"
                                fill="rgba(255,255,255,1)" /></svg>
                    </a>
                    Gestion des employés
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ml-auto d-print-none">
                <div class="d-flex align-items-center">
                    <a href={{route('employee.company.users')}} class="d-flex align-items-center text-white mr-5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M20 22h-2v-2a3 3 0 0 0-3-3H9a3 3 0 0 0-3 3v2H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" fill="rgba(255,255,255,1)"/></svg>
                        Vue d'ensemble
                    </a>

                    @if(Auth::user()->hasPermissionTo('update_employee','manage_role_and_permissions'))
                        <a href="{{ route('employee.user.edit', $user->username) }}" class="d-flex align-items-center text-white mr-5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z" fill="rgba(255,255,255,1)"/></svg>
                            Éditer
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card col-lg-3 px-3 py-0"
            style="max-height: 500px; border:none; box-shadow: none; background-color: transparent;">
            {{-- <a>
                    <img class="card-img-top" style="border-radius: 10px;" src="{{($user->photo != null) ? asset($user->photo) : asset("template/assets/static/avatar.png")}}"
            alt="Profile picture">
            </a>
            <div class="card-body d-flex flex-column">
                <div class="d-flex align-items-center mt-auto">
                    <div class="ml-2">
                        <a class="h2 text-body">{{ $user->name }}</a>
                        <small class="d-block text-muted"> {{Auth::user()->role->name}} </small>
                    </div>
                </div>
            </div> --}}
            <a class="card card-link" href="#">
                <div class="card-body d-flex align-items-center">
                    <div class="float-left mr-3">
                        <img class="card-img-top" style="border-radius: 10px; max-width: 65px;"
                            src="{{($user->photo != null) ? asset($user->photo) : asset("template/assets/static/avatar-2.png")}}"
                            alt="Profile picture">
                    </div>
                    <div class="lh-sm">
                        <div class="strong">{{ $user->name }}</div>
                        <div class="text-muted">{{Auth::user()->role->name}}</div>
                    </div>
                </div>
            </a>
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Informations</div>
                    @if($user->employee->cni_number)
                    <div class="button-click-action mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mr-2 text-muted opacity-50" viewBox="0 0 24 24"
                            width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M2 3.993A1 1 0 0 1 2.992 3h18.016c.548 0 .992.445.992.993v16.014a1 1 0 0 1-.992.993H2.992A.993.993 0 0 1 2 20.007V3.993zM4 5v14h16V5H4zm2 2h6v6H6V7zm2 2v2h2V9H8zm-2 6h12v2H6v-2zm8-8h4v2h-4V7zm0 4h4v2h-4v-2z" />
                        </svg>
                        CNI : <strong> {{$user->employee->cni_number}} </strong>
                    </div>
                    @endif
                    <div class="button-click-action mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mr-2 text-muted opacity-50" viewBox="0 0 24 24"
                            width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M12 20.9l4.95-4.95a7 7 0 1 0-9.9 0L12 20.9zm0 2.828l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zM12 13a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 2a4 4 0 1 1 0-8 4 4 0 0 1 0 8z" />
                            </svg>
                        Adresse : <strong> {{$user->address}} </strong>
                    </div>
                    <div class="button-click-action mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mr-2 text-muted opacity-50" viewBox="0 0 24 24"
                            width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M20 12a8 8 0 1 0-3.562 6.657l1.11 1.664A9.953 9.953 0 0 1 12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10v1.5a3.5 3.5 0 0 1-6.396 1.966A5 5 0 1 1 15 8H17v5.5a1.5 1.5 0 0 0 3 0V12zm-8-3a3 3 0 1 0 0 6 3 3 0 0 0 0-6z" />
                            </svg>
                        Email : <strong> {{$user->email}} </strong>
                    </div>
                    <div class="button-click-action mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mr-2 text-muted opacity-50" viewBox="0 0 24 24"
                            width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M21 16.42v3.536a1 1 0 0 1-.93.998c-.437.03-.794.046-1.07.046-8.837 0-16-7.163-16-16 0-.276.015-.633.046-1.07A1 1 0 0 1 4.044 3H7.58a.5.5 0 0 1 .498.45c.023.23.044.413.064.552A13.901 13.901 0 0 0 9.35 8.003c.095.2.033.439-.147.567l-2.158 1.542a13.047 13.047 0 0 0 6.844 6.844l1.54-2.154a.462.462 0 0 1 .573-.149 13.901 13.901 0 0 0 4 1.205c.139.02.322.042.55.064a.5.5 0 0 1 .449.498z" />
                            </svg>
                        Telephone : <strong>+237 {{$user->phone}} </strong>
                    </div>
                    @if ($user->employee->contact_phone)
                    <div class="button-click-action mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mr-2 text-muted opacity-50" viewBox="0 0 24 24"
                            width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M21 16.42v3.536a1 1 0 0 1-.93.998c-.437.03-.794.046-1.07.046-8.837 0-16-7.163-16-16 0-.276.015-.633.046-1.07A1 1 0 0 1 4.044 3H7.58a.5.5 0 0 1 .498.45c.023.23.044.413.064.552A13.901 13.901 0 0 0 9.35 8.003c.095.2.033.439-.147.567l-2.158 1.542a13.047 13.047 0 0 0 6.844 6.844l1.54-2.154a.462.462 0 0 1 .573-.149 13.901 13.901 0 0 0 4 1.205c.139.02.322.042.55.064a.5.5 0 0 1 .449.498z" />
                        </svg>
                        Urgence : <strong>+237 {{$user->employee->contact_phone}} </strong>
                    </div>
                    @endif
                    <div class="button-click-action mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mr-2 text-muted opacity-50" viewBox="0 0 24 24"
                            width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M3 19V5.7a1 1 0 0 1 .658-.94l9.671-3.516a.5.5 0 0 1 .671.47v4.953l6.316 2.105a1 1 0 0 1 .684.949V19h2v2H1v-2h2zm2 0h7V3.855L5 6.401V19zm14 0v-8.558l-5-1.667V19h5z" />
                            </svg>
                        Site : <strong> {{$user->employee->site->name}} </strong>
                    </div>
                </div>
            </div>
            <div class="card" data-color="red">
                <div class="card-body">
                    <div class="d-flex align-item-center justify-content-between mb-2">
                        <span class="d-flex align-item-center">
                            <div class="card-title mb-1">Salaire</div>
                        </span>
                        {{-- <div class="actions">
                            <a class="button-click-action" data-toggle="modal" data-target="#modal-edit-salary">
                                <svg xmlns="http://www.w3.org/2000/svg" data-toggle="tooltip" data-placement="bottom"
                                    title="Modifier" viewBox="0 0 24 24" width="24" height="24">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z"
                                        fill="rgba(0,0,0,1)" /></svg>
                            </a>
                            <a class="button-click-action ml-3" data-toggle="modal" data-target="#modal-stop-payment">
                                <svg xmlns="http://www.w3.org/2000/svg" data-toggle="tooltip" data-placement="bottom"
                                    title="Arrêter de payer" viewBox="0 0 24 24" width="24" height="24">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-5-7h9v2h-4v3l-5-5zm5-4V6l5 5H8V9h4z" />
                                    </svg>
                            </a>
                        </div> --}}
                    </div>
                    <h3 class="h2 mt-2" id="salary-show">
                        {{($user->employee->salary != 0) ? $user->employee->salary. ' Fcfa' : 'Non défini'}} </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card card-max-size">
                <div class="card-header">
                    <h3 class="card-title">Activités générales</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter">
                        <thead>
                            <tr>
                                <th>Utilisateur</th>
                                <th>Action</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->actions->reverse() as $action)
                            <tr>
                                <td class="w-1">
                                    @if ($action->initiator->photo)
                                    <span class="avatar"> <img src="{{asset($action->initiator->photo)}}" alt=""> </span>
                                    @else
                                    <span class="avatar"
                                        style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name={{$action->initiator->name}}')">
                                    </span>
                                    @endif
                                </td>
                                <td class="td-truncate">
                                    <div class="text-truncate">
                                        {{$action->action}}
                                    </div>
                                </td>
                                <td class="text-nowrap text-muted"> {{date('j-m-y à H:i', strtotime($action->created_at))}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
