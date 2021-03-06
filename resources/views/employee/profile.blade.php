@extends('layouts.base')

@section('content')

<!-- Page title -->
<div class="page-header text-white">
    <div class="row align-items-center">
        <div class="col-auto">
            <h2 class="page-title">
                <a href={{route('employee.dashboard')}} class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path
                            d="M7.828 11H20v2H7.828l5.364 5.364-1.414 1.414L4 12l7.778-7.778 1.414 1.414z"
                            fill="rgba(255,255,255,1)" /></svg>
                </a>
                Mon compte
            </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ml-auto d-print-none">
            <div class="d-flex align-items-center">
                <a href={{route('employee.profile.edit')}} class="d-flex align-items-center text-white mr-2">
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
        <a>
            <img class="card-img-top" style="border-radius: 10px;" src="{{(Auth::user()->photo != null) ? asset(Auth::user()->photo) : asset("template/assets/static/avatar.png")}}" alt="Profile picture">
        </a>
        <div class="card-body d-flex flex-column">
            <div class="d-flex align-items-center mt-auto">
                <div class="ml-2">
                    <a class="h2 text-body"> {{Auth::user()->name}} </a>
                    <small class="d-block text-muted">En ligne</small>
                </div>
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
                        @foreach (Auth::user()->actions->reverse() as $action)
                            <tr>
                                <td class="w-1">
                                    @if ($action->initiator->photo)
                                        <span class="avatar"> <img src="{{asset($action->initiator->photo)}}" alt=""> </span>
                                    @else
                                        <span class="avatar"  style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name={{$action->initiator->name}}')"> </span>
                                    @endif
                                </td>
                                <td class="td-truncate">
                                    <div class="text-truncate">
                                        {{$action->action}}
                                    </div>
                                </td>
                                <td class="text-nowrap text-muted"> {{date('j-m-y à H:i', strtotime($action->created_at))}} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
