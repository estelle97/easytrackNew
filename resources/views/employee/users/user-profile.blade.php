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
                    Gestion des utilisateurs
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ml-auto d-print-none">
                <div class="d-flex align-items-center">
                    <a href={{route('employee.company.users')}} class="d-flex align-items-center text-white mr-5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M20 22h-2v-2a3 3 0 0 0-3-3H9a3 3 0 0 0-3 3v2H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" fill="rgba(255,255,255,1)"/></svg>
                        Vue d'ensemble
                    </a>

                    <a href="{{ route('employee.user.edit', $user->username) }}" class="d-flex align-items-center text-white mr-5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z" fill="rgba(255,255,255,1)"/></svg>
                        Éditer
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card col-lg-3 px-3 py-0"
            style="max-height: 200px; border:none; box-shadow: none; background-color: transparent;">
            <a href="#">
                <img class="card-img-top" src="{{($user->photo != null) ? asset($user->photo) : "https://picsum.photos/id/700/400"}}" alt="Profile picture">
            </a>
            <div class="card-body d-flex flex-column">
                <div class="d-flex align-items-center mt-auto">
                    <div class="ml-2">
                        <a href="#" class="text-body">{{ $user->name }}</a>
                        <small class="d-block text-muted"> {{$user->role->name}} </small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="row">
                <div class="col-xl-4">
                    <div class="p-4 bg-white border">
                        <div class="mr-4 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48"><path fill="none" d="M0 0h24v24H0z"/><path d="M7.291 20.824L2 22l1.176-5.291A9.956 9.956 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.956 9.956 0 0 1-4.709-1.176zm.29-2.113l.653.35A7.955 7.955 0 0 0 12 20a8 8 0 1 0-8-8c0 1.334.325 2.618.94 3.766l.349.653-.655 2.947 2.947-.655z"/></svg>
                        </div>
                        <div class="media-body align-self-center">
                            <h2 class="mb-1">Messages</h2>
                            <h4 class="text-muted">5300</h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="p-4 bg-white border">
                        <div class="mr-4 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48"><path fill="none" d="M0 0h24v24H0z"/><path d="M4 16V4H2V2h3a1 1 0 0 1 1 1v12h12.438l2-8H8V5h13.72a1 1 0 0 1 .97 1.243l-2.5 10a1 1 0 0 1-.97.757H5a1 1 0 0 1-1-1zm2 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm12 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" fill="rgba(0,0,0,1)"/></svg>
                        </div>
                        <div class="media-body align-self-center">
                            <h2 class="mb-1">Commande passées</h2>
                            <h4 class="text-muted">1953</h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="p-4 bg-white border">
                        <div class="mr-4 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48"><path fill="none" d="M0 0h24v24H0z"/><path d="M7 8V6a5 5 0 1 1 10 0v2h3a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h3zm0 2H5v10h14V10h-2v2h-2v-2H9v2H7v-2zm2-2h6V6a3 3 0 0 0-6 0v2z"/></svg>
                        </div>
                        <div class="media-body align-self-center">
                            <h2 class="mb-1">Total des ventes</h2>
                            <h4 class="text-muted">1450</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-5">
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
                                    <span class="avatar"> <img src="{{asset($user->photo)}}" alt=""> </span>
                                    </td>
                                    <td class="td-truncate">
                                        <div class="text-truncate">
                                            {{$action->action}}
                                        </div>
                                    </td>
                                    <td class="text-nowrap text-muted"> {{$action->createdt_a}} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
