@extends('layouts.base')

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
                    <a href="./user-roles.html" class="text-white ml-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                            class="mr-2">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M12 14v2a6 6 0 0 0-6 6H4a8 8 0 0 1 8-8zm0-1c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm9 6h1v5h-8v-5h1v-1a3 3 0 0 1 6 0v1zm-2 0v-1a1 1 0 0 0-2 0v1h2z"
                                fill="rgba(255,255,255,1)" /></svg>
                        Gérer les rôles
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
    <div class="row row-deck row-cards">
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row row-sm align-items-center">
                        <div class="col-auto">
                            <span class="avatar avatar-md">PK</span>
                        </div>
                        <div class="col">
                            <h3 class="mb-0">
                                <a href="./user-profile.html">Paweł Kuna</a>
                            </h3>
                            <div class="text-muted text-h5">
                                UI Designer
                            </div>
                        </div>
                        <div class="col-auto lh-1 align-self-start">
                            <span class="badge bg-gray-lt">
                                offline
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
                                <a href="./user-profile.html" class="btn btn-white btn-sm">
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
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row row-sm align-items-center">
                        <div class="col-auto">
                            <span class="avatar avatar-md">JL</span>
                        </div>
                        <div class="col">
                            <h3 class="mb-0">
                                <a href="./user-profile.html">Jeffie Lewzey</a>
                            </h3>
                            <div class="text-muted text-h5">
                                Chemical Engineer
                            </div>
                        </div>
                        <div class="col-auto lh-1 align-self-start">
                            <span class="badge bg-green-lt">
                                online
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
                                    <span class="ml-auto text-h6 strong">42%</span>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-blue" style="width: 42%;" role="progressbar"
                                        aria-valuenow="42" aria-valuemin="0" aria-valuemax="100">
                                        <span class="sr-only">42% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="btn-list">
                                <a href="./user-profile.html" class="btn btn-white btn-sm">
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
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row row-sm align-items-center">
                        <div class="col-auto">
                            <span class="avatar avatar-md">MH</span>
                        </div>
                        <div class="col">
                            <h3 class="mb-0">
                                <a href="./user-profile.html">Mallory Hulme</a>
                            </h3>
                            <div class="text-muted text-h5">
                                Geologist IV
                            </div>
                        </div>
                        <div class="col-auto lh-1 align-self-start">
                            <span class="badge bg-green-lt">
                                online
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
                                    <span class="ml-auto text-h6 strong">57%</span>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-blue" style="width: 57%;" role="progressbar"
                                        aria-valuenow="57" aria-valuemin="0" aria-valuemax="100">
                                        <span class="sr-only">57% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="btn-list">
                                <a href="./user-profile.html" class="btn btn-white btn-sm">
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
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row row-sm align-items-center">
                        <div class="col-auto">
                            <span class="avatar avatar-md">DS</span>
                        </div>
                        <div class="col">
                            <h3 class="mb-0">
                                <a href="./user-profile.html">Dunn Slane</a>
                            </h3>
                            <div class="text-muted text-h5">
                                Research Nurse
                            </div>
                        </div>
                        <div class="col-auto lh-1 align-self-start">
                            <span class="badge bg-green-lt">
                                online
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
                                    <span class="ml-auto text-h6 strong">65%</span>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-blue" style="width: 65%;" role="progressbar"
                                        aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                        <span class="sr-only">65% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="btn-list">
                                <a href="./user-profile.html" class="btn btn-white btn-sm">
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
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row row-sm align-items-center">
                        <div class="col-auto">
                            <span class="avatar avatar-md">PK</span>
                        </div>
                        <div class="col">
                            <h3 class="mb-0">
                                <a href="./user-profile.html">Paweł Kuna</a>
                            </h3>
                            <div class="text-muted text-h5">
                                UI Designer
                            </div>
                        </div>
                        <div class="col-auto lh-1 align-self-start">
                            <span class="badge bg-gray-lt">
                                offline
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
                                <a href="./user-profile.html" class="btn btn-white btn-sm">
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
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row row-sm align-items-center">
                        <div class="col-auto">
                            <span class="avatar avatar-md">JL</span>
                        </div>
                        <div class="col">
                            <h3 class="mb-0">
                                <a href="./user-profile.html">Jeffie Lewzey</a>
                            </h3>
                            <div class="text-muted text-h5">
                                Chemical Engineer
                            </div>
                        </div>
                        <div class="col-auto lh-1 align-self-start">
                            <span class="badge bg-green-lt">
                                online
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
                                    <span class="ml-auto text-h6 strong">42%</span>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-blue" style="width: 42%;" role="progressbar"
                                        aria-valuenow="42" aria-valuemin="0" aria-valuemax="100">
                                        <span class="sr-only">42% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="btn-list">
                                <a href="./user-profile.html" class="btn btn-white btn-sm">
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
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row row-sm align-items-center">
                        <div class="col-auto">
                            <span class="avatar avatar-md">MH</span>
                        </div>
                        <div class="col">
                            <h3 class="mb-0">
                                <a href="./user-profile.html">Mallory Hulme</a>
                            </h3>
                            <div class="text-muted text-h5">
                                Geologist IV
                            </div>
                        </div>
                        <div class="col-auto lh-1 align-self-start">
                            <span class="badge bg-green-lt">
                                online
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
                                    <span class="ml-auto text-h6 strong">57%</span>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-blue" style="width: 57%;" role="progressbar"
                                        aria-valuenow="57" aria-valuemin="0" aria-valuemax="100">
                                        <span class="sr-only">57% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="btn-list">
                                <a href="./user-profile.html" class="btn btn-white btn-sm">
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
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row row-sm align-items-center">
                        <div class="col-auto">
                            <span class="avatar avatar-md">DS</span>
                        </div>
                        <div class="col">
                            <h3 class="mb-0">
                                <a href="./user-profile.html">Dunn Slane</a>
                            </h3>
                            <div class="text-muted text-h5">
                                Research Nurse
                            </div>
                        </div>
                        <div class="col-auto lh-1 align-self-start">
                            <span class="badge bg-green-lt">
                                online
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
                                    <span class="ml-auto text-h6 strong">65%</span>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-blue" style="width: 65%;" role="progressbar"
                                        aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                        <span class="sr-only">65% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="btn-list">
                                <a href="./user-profile.html" class="btn btn-white btn-sm">
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
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row row-sm align-items-center">
                        <div class="col-auto">
                            <span class="avatar avatar-md">PK</span>
                        </div>
                        <div class="col">
                            <h3 class="mb-0">
                                <a href="./user-profile.html">Paweł Kuna</a>
                            </h3>
                            <div class="text-muted text-h5">
                                UI Designer
                            </div>
                        </div>
                        <div class="col-auto lh-1 align-self-start">
                            <span class="badge bg-gray-lt">
                                offline
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
                                <a href="./user-profile.html" class="btn btn-white btn-sm">
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
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row row-sm align-items-center">
                        <div class="col-auto">
                            <span class="avatar avatar-md">JL</span>
                        </div>
                        <div class="col">
                            <h3 class="mb-0">
                                <a href="./user-profile.html">Jeffie Lewzey</a>
                            </h3>
                            <div class="text-muted text-h5">
                                Chemical Engineer
                            </div>
                        </div>
                        <div class="col-auto lh-1 align-self-start">
                            <span class="badge bg-green-lt">
                                online
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
                                    <span class="ml-auto text-h6 strong">42%</span>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-blue" style="width: 42%;" role="progressbar"
                                        aria-valuenow="42" aria-valuemin="0" aria-valuemax="100">
                                        <span class="sr-only">42% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="btn-list">
                                <a href="./user-profile.html" class="btn btn-white btn-sm">
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
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row row-sm align-items-center">
                        <div class="col-auto">
                            <span class="avatar avatar-md">MH</span>
                        </div>
                        <div class="col">
                            <h3 class="mb-0">
                                <a href="./user-profile.html">Mallory Hulme</a>
                            </h3>
                            <div class="text-muted text-h5">
                                Geologist IV
                            </div>
                        </div>
                        <div class="col-auto lh-1 align-self-start">
                            <span class="badge bg-green-lt">
                                online
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
                                    <span class="ml-auto text-h6 strong">57%</span>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-blue" style="width: 57%;" role="progressbar"
                                        aria-valuenow="57" aria-valuemin="0" aria-valuemax="100">
                                        <span class="sr-only">57% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="btn-list">
                                <a href="./user-profile.html" class="btn btn-white btn-sm">
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
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row row-sm align-items-center">
                        <div class="col-auto">
                            <span class="avatar avatar-md">DS</span>
                        </div>
                        <div class="col">
                            <h3 class="mb-0">
                                <a href="./user-profile.html">Dunn Slane</a>
                            </h3>
                            <div class="text-muted text-h5">
                                Research Nurse
                            </div>
                        </div>
                        <div class="col-auto lh-1 align-self-start">
                            <span class="badge bg-green-lt">
                                online
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
                                    <span class="ml-auto text-h6 strong">65%</span>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-blue" style="width: 65%;" role="progressbar"
                                        aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                        <span class="sr-only">65% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="btn-list">
                                <a href="./user-profile.html" class="btn btn-white btn-sm">
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
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row row-sm align-items-center">
                        <div class="col-auto">
                            <span class="avatar avatar-md">PK</span>
                        </div>
                        <div class="col">
                            <h3 class="mb-0">
                                <a href="./user-profile.html">Paweł Kuna</a>
                            </h3>
                            <div class="text-muted text-h5">
                                UI Designer
                            </div>
                        </div>
                        <div class="col-auto lh-1 align-self-start">
                            <span class="badge bg-gray-lt">
                                offline
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
                                    <a href="./user-profile.html" class="btn btn-white btn-sm">
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
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row row-sm align-items-center">
                            <div class="col-auto">
                                <span class="avatar avatar-md">JL</span>
                            </div>
                            <div class="col">
                                <h3 class="mb-0">
                                    <a href="./user-profile.html">Jeffie Lewzey</a>
                                </h3>
                                <div class="text-muted text-h5">
                                    Chemical Engineer
                                </div>
                            </div>
                            <div class="col-auto lh-1 align-self-start">
                                <span class="badge bg-green-lt">
                                    online
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
                                        <span class="ml-auto text-h6 strong">42%</span>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-blue" style="width: 42%;" role="progressbar"
                                            aria-valuenow="42" aria-valuemin="0" aria-valuemax="100">
                                            <span class="sr-only">42% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="btn-list">
                                    <a href="./user-profile.html" class="btn btn-white btn-sm">
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
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row row-sm align-items-center">
                            <div class="col-auto">
                                <span class="avatar avatar-md">MH</span>
                            </div>
                            <div class="col">
                                <h3 class="mb-0">
                                    <a href="./user-profile.html">Mallory Hulme</a>
                                </h3>
                                <div class="text-muted text-h5">
                                    Geologist IV
                                </div>
                            </div>
                            <div class="col-auto lh-1 align-self-start">
                                <span class="badge bg-green-lt">
                                    online
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
                                        <span class="ml-auto text-h6 strong">57%</span>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-blue" style="width: 57%;" role="progressbar"
                                            aria-valuenow="57" aria-valuemin="0" aria-valuemax="100">
                                            <span class="sr-only">57% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="btn-list">
                                    <a href="./user-profile.html" class="btn btn-white btn-sm">
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
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row row-sm align-items-center">
                            <div class="col-auto">
                                <span class="avatar avatar-md">DS</span>
                            </div>
                            <div class="col">
                                <h3 class="mb-0">
                                    <a href="./user-profile.html">Dunn Slane</a>
                                </h3>
                                <div class="text-muted text-h5">
                                    Research Nurse
                                </div>
                            </div>
                            <div class="col-auto lh-1 align-self-start">
                                <span class="badge bg-green-lt">
                                    online
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
                                        <span class="ml-auto text-h6 strong">65%</span>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-blue" style="width: 65%;" role="progressbar"
                                            aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                            <span class="sr-only">65% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="btn-list">
                                    <a href="./user-profile.html" class="btn btn-white btn-sm">
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
        </div>
    </div>
    {{-- Content Body--}}
@endsection