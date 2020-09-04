@extends('layouts.base')

@section('content')
     {{-- Page Header --}}
    <div class="page-header text-white">
        <div class="row align-items-center">
            <div class="col-auto">
                <h2 class="page-title">
                    Gestion des companies
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ml-auto d-print-none">
                <div class="d-flex align-items-center">
                    <a href="#" class="text-white" data-toggle="modal" data-target="#modal-create-company">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        Ajouter une compagnie
                    </a>
                    <span class="dropdown button-click-action ml-3">
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
                                Ville
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
    {{-- end Page Header --}}


    {{-- Content Body--}}
    <div class="row row-deck row-cards">
        <div class="card">
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th class="w-1"><input class="form-check-input m-0 align-middle"
                                    type="checkbox"></th>
                            <th>Logo</th>
                            <th>Nom</th>
                            <th>Ville</th>
                            <th>Email</th>
                            <th>Tel</th>
                            <th>Tel</th>
                            <th>Licence</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                    aria-label="Select invoice"></td>
                            <td>
                                <span class="avatar avatar-md" style="background-image: url(https://ui-avatars.com/api/?name=Black+White)"></span>
                            </td>
                            <td><a href="./user-profile.html" class="text-reset" tabindex="-1">Black & white</a>
                            </td>
                            <td>
                                Yaoundé
                            </td>
                            <td>
                                service@blackandwhite.com
                            </td>
                            <td>
                                +237 691234567
                            </td>
                            <td>
                                +237 678214588
                            </td>
                            <td>
                                <div>
                                    <div class="d-flex mb-1 align-items-center lh-1">
                                        <div class="text-h5 font-weight-bolder m-0">
                                            1 an
                                        </div>
                                        <span class="ml-auto text-h6 strong">60%</span>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-blue" style="width: 60%;" role="progressbar"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                                            <span class="sr-only">60% d'utilisation</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-right">
                                <a href="#" class="btn btn-white btn-sm mt-1" data-toggle="modal" data-target="#modal-edit-snack">
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
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-delete-snack">
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- end Content Body--}}

    <div class="modal-section">
        <div class="modal modal-blur fade" id="modal-create-company" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un nouvelle compagnie</h5>
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
                                    <span class="avatar-upload-text">Logo</span>
                                </a>
                            </div>
                            <div class="col-lg-9">
                                <label class="form-label">Nom</label>
                                <input type="text" class="form-control form-control-rounded"
                                    placeholder="Saisissez le nom complet...">
                            </div>
                            <div class="col-lg-12 mt-4">
                                <label class="form-label">Ville</label>
                                <input type="text" class="form-control form-control-rounded"
                                    placeholder="Saisissez la ville...">
                            </div>
                            <div class="col-lg-12 mt-4">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control form-control-rounded"
                                    placeholder="Saisissez l'email...">
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Tel N°1</label>
                                <input type="text" class="form-control form-control-rounded"
                                    placeholder="Saisissez le numéro de téléphone...">
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Tel N°2</label>
                                <input type="text" class="form-control form-control-rounded"
                                    placeholder="Saisissez le numéro de téléphone...">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-pill" style="width: 100%;"
                            data-dismiss="modal">Ajouter</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal modal-blur fade" id="modal-delete-snack" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="modal-title">Êtes vous sure ?</div>
                  <div>Si vous continuez, vous perdrez toutes les données de ce snack.</div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Annuler</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Oui, supprimer</button>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
