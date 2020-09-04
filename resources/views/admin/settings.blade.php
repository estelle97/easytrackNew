@extends('layouts.base')

@section('content')

<!-- Page title -->
<div class="page-header text-white">
    <div class="row align-items-center">
        <div class="col-auto">
            <h2 class="page-title">
                <a href={{str_replace(url('/'), '', url()->previous())}} class="app-back-button mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path d="M7.828 11H20v2H7.828l5.364 5.364-1.414 1.414L4 12l7.778-7.778 1.414 1.414z"
                            fill="rgba(255,255,255,1)" /></svg>
                </a>
                Mes paramètres
            </h2>
        </div>
    </div>
</div>

<div class="row">
    <div class="card col-lg-3 px-3 py-0"
        style="max-height: 200px; border:none; box-shadow: none; background-color: transparent;">
        <a href="#">
            <img class="card-img-top"
                src={{(Auth::user()->photo != null) ? Auth::user()->photo : "https://picsum.photos/id/700/400"}}
                alt="Profile picture">
        </a>
        <div class="card-body d-flex flex-column">
            <div class="d-flex align-items-center mt-auto">
                <div class="ml-2">
                    <a href="#" class="text-body"> {{Auth::user()->name}} </a>
                    <small class="d-block text-muted">Online</small>
                </div>
            </div>
        </div>
    </div>
    <div class="card col-lg-5" style="max-height: 400px;">
        <div class="row">

        </div>
    </div>
    <div class="card col-lg-3 ml-3 p-3">
        <div class="d-flex align-item-center justify-content-between mb-2">
            <span class="d-flex align-item-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M11 2l7.298 2.28a1 1 0 0 1 .702.955V7h2a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1l-3.22.001c-.387.51-.857.96-1.4 1.33L11 22l-5.38-3.668A6 6 0 0 1 3 13.374V5.235a1 1 0 0 1 .702-.954L11 2zm0 2.094L5 5.97v7.404a4 4 0 0 0 1.558 3.169l.189.136L11 19.58 14.782 17H10a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h7V5.97l-6-1.876zM11 12v3h9v-3h-9zm0-2h9V9h-9v1z"
                        fill="rgba(38,127,201,1)" /></svg>
                <h3 class="ml-2">Gold</h3 class="ml-2">
            </span>
            <a href="#">Se désabonner</a>
        </div>
        <h1>180 Jours</h1>
        <p class="mb-0 text-muted">
            <span class="text-nowrap text-gray">18-05-2020 / 15-11-2020</span>
            <div class="progress progress-sm mt-3">
                <div class="progress-bar bg-blue" style="width: 35%" role="progressbar" aria-valuenow="75"
                    aria-valuemin="0" aria-valuemax="100">
                    <span class="sr-only">75% Complete</span>
                </div>
            </div>
        </p>
        <a href="#" class="btn btn-outline-primary btn-block mb-3">
            Payer une nouvelle licence
        </a>
        <h3 class="mb-1">Historique</h3>
        <table class="table card-table table-vcenter">
            <thead>
                <tr>
                    <th>Abonnement</th>
                    <th>Paiment</th>
                    <th colspan="2">Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Gold</td>
                    <td>500k FCFA</td>
                    <td>18-05-2020</td>
                </tr>
                <tr>
                    <td>Gold</td>
                    <td>500k FCFA</td>
                    <td>18-05-2020</td>
                </tr>
                <tr>
                    <td>Gold</td>
                    <td>500k FCFA</td>
                    <td>18-05-2020</td>
                </tr>
                <tr>
                    <td>Gold</td>
                    <td>500k FCFA</td>
                    <td>18-05-2020</td>
                </tr>
                <tr>
                    <td>Gold</td>
                    <td>500k FCFA</td>
                    <td>18-05-2020</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection


@section('scripts')


@endsection

@section('styles')
<link href={{asset("template/assets/dist/css/easytrak-payments.min.css")}} rel="stylesheet" />
@endsection
