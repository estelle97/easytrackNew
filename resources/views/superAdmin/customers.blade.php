@extends('layouts.base')

@section('content')
    {{-- Page Header --}}
    <div class="page-header text-white">
        <div class="row align-items-center">
            <div class="col-auto">
                <h2 class="page-title">
                    Gestion des clients
                </h2>
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
                        Nouveau
                    </a>
                    <a href="{{route('easytrack.packages')}}" class="text-white ml-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10a9.96 9.96 0 0 1-6.383-2.302l-.244-.209.902-1.902a8 8 0 1 0-2.27-5.837l-.005.25h2.5l-2.706 5.716A9.954 9.954 0 0 1 2 12C2 6.477 6.477 2 12 2zm1 4v2h2.5v2H10a.5.5 0 0 0-.09.992L10 11h4a2.5 2.5 0 1 1 0 5h-1v2h-2v-2H8.5v-2H14a.5.5 0 0 0 .09-.992L14 13h-4a2.5 2.5 0 1 1 0-5h1V6h2z" fill="rgba(255,255,255,1)"/></svg>
                        Gérer les forfaits
                    </a>
                    <a href="{{route('easytrack.roles')}}" class="text-white ml-4">
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
                                Adresse
                            </a>
                            <a class="dropdown-item" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18"
                                    height="18" class="mr-2">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z" />
                                </svg>
                                companie
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
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Tel</th>
                            <th>Adresse</th>
                            <th>Rôle</th>
                            <th>companie</th>
                            <th>Licence</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                    aria-label="Select invoice"></td>
                            <td><a href="./user-profile.html" class="text-reset" tabindex="-1">Steve Mangekwu</a>
                            </td>
                            <td>
                                steve.mangekwu@gmail.com
                            </td>
                            <td>
                                +237 691234567
                            </td>
                            <td>
                                Mendong
                            </td>
                            <td>
                                Admin
                            </td>
                            <td>
                                Black & white
                            </td>
                            <td>
                                <div>
                                    <div class="d-flex mb-1 align-items-center lh-1">
                                        <div class="text-h5 font-weight-bolder m-0">
                                            1 an
                                        </div>
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
                                <span class="dropdown">
                                    <button class="btn btn-white btn-sm dropdown-toggle align-text-top"
                                        data-boundary="viewport" data-toggle="dropdown">Actions</button>
                                    <div class="dropdown-menu dropdown-menu-right">

                                        <a class="dropdown-item" data-toggle="modal" data-target="#modal-edit-licence">
                                            Mettre à jour la licene
                                        </a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#modal-edit-user">
                                            Modifier
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            Bloquer
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">
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
        <div class="modal modal-blur fade" id="modal-create-user" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un nouveau client</h5>
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
                        <div class="row mb-3">
                            <div class="register-step-1">
                                <div class="mb-4">
                                    <div class="input-icon">
                                        <span class="input-icon-addon ml-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-4.987-3.744A7.966 7.966 0 0 0 12 20c1.97 0 3.773-.712 5.167-1.892A6.979 6.979 0 0 0 12.16 16a6.981 6.981 0 0 0-5.147 2.256zM5.616 16.82A8.975 8.975 0 0 1 12.16 14a8.972 8.972 0 0 1 6.362 2.634 8 8 0 1 0-12.906.187zM12 13a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                                        </span>
                                        <input type="text" name="username" id="username" class="auth-input form-control py-2 px-5"
                                            placeholder="Nom complet (Obligatoire)" autocomplete="off" required/>
                                    </div>
                                    <span class="text-danger" id="username-error"> </span>
                                </div>
                                <div class="mb-4">
                                    <div class="input-icon">
                                        <span class="input-icon-addon ml-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 23.728l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zm4.95-7.778a7 7 0 1 0-9.9 0L12 20.9l4.95-4.95zM12 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>
                                        </span>
                                        <input type="text" name="useraddress" id="useraddress" class="auth-input form-control py-2 px-5"
                                            placeholder="Adresse (Obligatoire)" autocomplete="off" required/>
                                    </div>
                                    <span class="text-danger" id="useraddress-error"> </span>
                                </div>
                                <div class="mb-4">
                                    <div class="input-icon">
                                        <span class="input-icon-addon ml-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0h24v24H0z"/><path d="M9.366 10.682a10.556 10.556 0 0 0 3.952 3.952l.884-1.238a1 1 0 0 1 1.294-.296 11.422 11.422 0 0 0 4.583 1.364 1 1 0 0 1 .921.997v4.462a1 1 0 0 1-.898.995c-.53.055-1.064.082-1.602.082C9.94 21 3 14.06 3 5.5c0-.538.027-1.072.082-1.602A1 1 0 0 1 4.077 3h4.462a1 1 0 0 1 .997.921A11.422 11.422 0 0 0 10.9 8.504a1 1 0 0 1-.296 1.294l-1.238.884zm-2.522-.657l1.9-1.357A13.41 13.41 0 0 1 7.647 5H5.01c-.006.166-.009.333-.009.5C5 12.956 11.044 19 18.5 19c.167 0 .334-.003.5-.01v-2.637a13.41 13.41 0 0 1-3.668-1.097l-1.357 1.9a12.442 12.442 0 0 1-1.588-.75l-.058-.033a12.556 12.556 0 0 1-4.702-4.702l-.033-.058a12.442 12.442 0 0 1-.75-1.588z"/></svg>
                                        </span>
                                        <input pattern="[0-9]{3}[0-9]{3}[0-9]{3}" type="tel" name="userphone" id="userphone" class="auth-input form-control py-2 px-5"
                                            placeholder="Téléphone (Obligatoire)" autocomplete="off" required/>
                                    </div>
                                    <span class="text-danger" id="userphone-error"> </span>
                                </div>
                                <div class="mb-4">
                                    <div class="input-icon">
                                        <span class="input-icon-addon ml-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0h24v24H0z"/><path d="M20 12a8 8 0 1 0-3.562 6.657l1.11 1.664A9.953 9.953 0 0 1 12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10v1.5a3.5 3.5 0 0 1-6.396 1.966A5 5 0 1 1 15 8H17v5.5a1.5 1.5 0 0 0 3 0V12zm-8-3a3 3 0 1 0 0 6 3 3 0 0 0 0-6z"/></svg>
                                        </span>
                                        <input type="email" name="useremail" id="useremail" class="auth-input form-control py-2 px-5"
                                            placeholder="Email (Obligatoire)" autocomplete="off" required/>
                                    </div>
                                    <span class="text-danger" id="useremail-error"> </span>
                                </div>
                                <div class="mb-4">
                                    <div class="input-icon">
                                        <span class="input-icon-addon ml-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                                <path fill="none" d="M0 0h24v24H0z" />
                                                <path
                                                    d="M12 17c3.662 0 6.865 1.575 8.607 3.925l-1.842.871C17.347 20.116 14.847 19 12 19c-2.847 0-5.347 1.116-6.765 2.796l-1.841-.872C5.136 18.574 8.338 17 12 17zm0-15a5 5 0 0 1 5 5v3a5 5 0 0 1-4.783 4.995L12 15a5 5 0 0 1-5-5V7a5 5 0 0 1 4.783-4.995L12 2zm0 2a3 3 0 0 0-2.995 2.824L9 7v3a3 3 0 0 0 5.995.176L15 10V7a3 3 0 0 0-3-3z" />
                                            </svg>
                                        </span>
                                        <input type="text" name="userusername" id="userusername" class="auth-input form-control py-2 px-5"
                                            placeholder="Nom d'utilisateur (Obligatoire)" autocomplete="off" required/>
                                    </div>
                                    <span class="text-danger" id="userusername-error"> </span>
                                </div>
                                <div class="mb-3">
                                    <div class="input-icon">
                                        <span class="input-icon-addon ml-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                                <path fill="none" d="M0 0h24v24H0z" />
                                                <path
                                                    d="M18 8h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h2V7a6 6 0 1 1 12 0v1zM5 10v10h14V10H5zm6 4h2v2h-2v-2zm-4 0h2v2H7v-2zm8 0h2v2h-2v-2zm1-6V7a4 4 0 1 0-8 0v1h8z" />
                                            </svg>
                                        </span>
                                        <input type="password" name="userpassword" id="password" class="auth-input form-control py-2 px-5"
                                            placeholder="Mot de passe (au moins 8 caractères)" required autocomplete="off" minlength="8"/>
                                        <span class="input-icon-addon mr-2">
                                            <a class="link-secondary" id="show-password" title="Show password" data-toggle="tooltip"><svg
                                                    xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" />
                                                    <circle cx="12" cy="12" r="2" />
                                                    <path d="M2 12l1.5 2a11 11 0 0 0 17 0l1.5 -2" />
                                                    <path d="M2 12l1.5 -2a11 11 0 0 1 17 0l1.5 2" />
                                                </svg>
                                            </a>
                                        </span>
                                    </div>
                                    <span class="text-danger" id="userpassword-error"> </span>
                                </div>
                                <div class="form-footer mb-3">
                                    <button type="text" class="btn btn-gradient btn-block btn-submit-step-1 btn-no-border">
                                        Continuer
                                    </button>
                                </div>
                            </div>
                            <div class="register-step-6">
                                <div class="text-center mt-5 mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="120" height="120"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-.997-4L6.76 11.757l1.414-1.414 2.829 2.829 5.656-5.657 1.415 1.414L11.003 16z" fill="rgba(47,204,113,1)"/></svg>
                                </div>
                                <h1 class="text-center mb-3">Inscription réussie </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal modal-blur fade" id="modal-edit-user" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modifier l'utilisateur</h5>
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
                        <div class="row mb-3">
                            <div class="register-step-1">
                                <div class="mb-4">
                                    <div class="input-icon">
                                        <span class="input-icon-addon ml-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-4.987-3.744A7.966 7.966 0 0 0 12 20c1.97 0 3.773-.712 5.167-1.892A6.979 6.979 0 0 0 12.16 16a6.981 6.981 0 0 0-5.147 2.256zM5.616 16.82A8.975 8.975 0 0 1 12.16 14a8.972 8.972 0 0 1 6.362 2.634 8 8 0 1 0-12.906.187zM12 13a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                                        </span>
                                        <input type="text" name="username" id="username" class="auth-input form-control py-2 px-5"
                                            placeholder="Nom complet (Obligatoire)" autocomplete="off" required/>
                                    </div>
                                    <span class="text-danger" id="username-error"> </span>
                                </div>
                                <div class="mb-4">
                                    <div class="input-icon">
                                        <span class="input-icon-addon ml-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 23.728l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zm4.95-7.778a7 7 0 1 0-9.9 0L12 20.9l4.95-4.95zM12 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>
                                        </span>
                                        <input type="text" name="useraddress" id="useraddress" class="auth-input form-control py-2 px-5"
                                            placeholder="Adresse (Obligatoire)" autocomplete="off" required/>
                                    </div>
                                    <span class="text-danger" id="useraddress-error"> </span>
                                </div>
                                <div class="mb-4">
                                    <div class="input-icon">
                                        <span class="input-icon-addon ml-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0h24v24H0z"/><path d="M9.366 10.682a10.556 10.556 0 0 0 3.952 3.952l.884-1.238a1 1 0 0 1 1.294-.296 11.422 11.422 0 0 0 4.583 1.364 1 1 0 0 1 .921.997v4.462a1 1 0 0 1-.898.995c-.53.055-1.064.082-1.602.082C9.94 21 3 14.06 3 5.5c0-.538.027-1.072.082-1.602A1 1 0 0 1 4.077 3h4.462a1 1 0 0 1 .997.921A11.422 11.422 0 0 0 10.9 8.504a1 1 0 0 1-.296 1.294l-1.238.884zm-2.522-.657l1.9-1.357A13.41 13.41 0 0 1 7.647 5H5.01c-.006.166-.009.333-.009.5C5 12.956 11.044 19 18.5 19c.167 0 .334-.003.5-.01v-2.637a13.41 13.41 0 0 1-3.668-1.097l-1.357 1.9a12.442 12.442 0 0 1-1.588-.75l-.058-.033a12.556 12.556 0 0 1-4.702-4.702l-.033-.058a12.442 12.442 0 0 1-.75-1.588z"/></svg>
                                        </span>
                                        <input pattern="[0-9]{3}[0-9]{3}[0-9]{3}" type="tel" name="userphone" id="userphone" class="auth-input form-control py-2 px-5"
                                            placeholder="Téléphone (Obligatoire)" autocomplete="off" required/>
                                    </div>
                                    <span class="text-danger" id="userphone-error"> </span>
                                </div>
                                <div class="mb-4">
                                    <div class="input-icon">
                                        <span class="input-icon-addon ml-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0h24v24H0z"/><path d="M20 12a8 8 0 1 0-3.562 6.657l1.11 1.664A9.953 9.953 0 0 1 12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10v1.5a3.5 3.5 0 0 1-6.396 1.966A5 5 0 1 1 15 8H17v5.5a1.5 1.5 0 0 0 3 0V12zm-8-3a3 3 0 1 0 0 6 3 3 0 0 0 0-6z"/></svg>
                                        </span>
                                        <input type="email" name="useremail" id="useremail" class="auth-input form-control py-2 px-5"
                                            placeholder="Email (Obligatoire)" autocomplete="off" required/>
                                    </div>
                                    <span class="text-danger" id="useremail-error"> </span>
                                </div>
                                <div class="mb-4">
                                    <div class="input-icon">
                                        <span class="input-icon-addon ml-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                                <path fill="none" d="M0 0h24v24H0z" />
                                                <path
                                                    d="M12 17c3.662 0 6.865 1.575 8.607 3.925l-1.842.871C17.347 20.116 14.847 19 12 19c-2.847 0-5.347 1.116-6.765 2.796l-1.841-.872C5.136 18.574 8.338 17 12 17zm0-15a5 5 0 0 1 5 5v3a5 5 0 0 1-4.783 4.995L12 15a5 5 0 0 1-5-5V7a5 5 0 0 1 4.783-4.995L12 2zm0 2a3 3 0 0 0-2.995 2.824L9 7v3a3 3 0 0 0 5.995.176L15 10V7a3 3 0 0 0-3-3z" />
                                            </svg>
                                        </span>
                                        <input type="text" name="userusername" id="userusername" class="auth-input form-control py-2 px-5"
                                            placeholder="Nom d'utilisateur (Obligatoire)" autocomplete="off" required/>
                                    </div>
                                    <span class="text-danger" id="userusername-error"> </span>
                                </div>
                                <div class="mb-3">
                                    <div class="input-icon">
                                        <span class="input-icon-addon ml-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                                <path fill="none" d="M0 0h24v24H0z" />
                                                <path
                                                    d="M18 8h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h2V7a6 6 0 1 1 12 0v1zM5 10v10h14V10H5zm6 4h2v2h-2v-2zm-4 0h2v2H7v-2zm8 0h2v2h-2v-2zm1-6V7a4 4 0 1 0-8 0v1h8z" />
                                            </svg>
                                        </span>
                                        <input type="password" name="userpassword" id="password" class="auth-input form-control py-2 px-5"
                                            placeholder="Mot de passe (au moins 8 caractères)" required autocomplete="off" minlength="8"/>
                                        <span class="input-icon-addon mr-2">
                                            <a class="link-secondary" id="show-password" title="Show password" data-toggle="tooltip"><svg
                                                    xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" />
                                                    <circle cx="12" cy="12" r="2" />
                                                    <path d="M2 12l1.5 2a11 11 0 0 0 17 0l1.5 -2" />
                                                    <path d="M2 12l1.5 -2a11 11 0 0 1 17 0l1.5 2" />
                                                </svg>
                                            </a>
                                        </span>
                                    </div>
                                    <span class="text-danger" id="userpassword-error"> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" style="width: 100%;"
                            data-dismiss="modal">Sauvegarder</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal modal-blur fade" id="modal-edit-licence" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modifier la licence</h5>
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
                        <div class="mb-4">
                            <div class="input-icon">
                                <span class="input-icon-addon ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0h24v24H0z"/><path d="M14 9V4H5v16h6.056c.328.417.724.785 1.18 1.085l1.39.915H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8v1h-7zm-2 2h9v5.949c0 .99-.501 1.916-1.336 2.465L16.5 21.498l-3.164-2.084A2.953 2.953 0 0 1 12 16.95V11zm2 5.949c0 .316.162.614.436.795l2.064 1.36 2.064-1.36a.954.954 0 0 0 .436-.795V13h-5v3.949z"/></svg>
                                </span>
                                <select name="type" id="type" class="auth-input form-select form-control-rounded py-2 px-5">
                                    {{-- @foreach(App\Type::all())
                                        <option id="type{{$t->id}}" value="{{$t->id}}"> {{$t->title}} </option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" style="width: 100%;"
                            data-dismiss="modal">Sauvegarder</button>
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
<script src={{asset("https://cdn.jsdelivr.net/gh/contributte/live-form-validation@master/live-form-validation.js")}}> </script>
<script src={{asset("https://cdn.jsdelivr.net/gh/contributte/live-form-validation@master/live-form-validation.js")}}> </script>
<script>
    document.body.style.display = "block";

    $(".register-step-2, .register-step-3, .register-step-4, .register-step-5, .register-step-6").toggle();
    $(".btn-back-step-1").click(function() {
        $(".register-step-1").toggle();
        $(".register-step-2").toggle();
    });

    // Submit step1
    $(".btn-submit-step-1").click(function() {
        var token = '{{csrf_token()}}';

        $.ajax({
            type: "post",
            url: "register",
            data: {
                _token: token,
                username : $("#username").val(),
                useremail : $("#useremail").val(),
                userusername : $("#userusername").val(),
                userphone : $("#userphone").val(),
                useraddress : $("#useraddress").val(),
                userpassword : $("#password").val(),
                step: 'one'
            },
            dataType: 'json',              // let's set the expected response format
            success: function(data){
                $(".text-danger").html('');
                $(".register-step-1").toggle();
                $(".register-step-2").toggle();
            },
            error: function (err) {
                if (err.status == 422) { // when status code is 422, it's a validation issue
                    //console.log(err.responseJSON);
                    // $('#success_message').fadeIn().html(err.responseJSON.message);

                    // you can loop through the errors object and show it to the user
                    //console.warn(err.responseJSON.errors);
                    // display errors on each form field

                    $(".text-danger").html('');

                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $('#'+i+'-error');
                        el.html(error);
                    });
                }
            }
        });
    });

    $(".btn-back-step-2").click(function() {
        $(".register-step-2").toggle();
        $(".register-step-3").toggle();
    });

    // submit step2
    $(".btn-submit-step-2").click(function() {
        var token = '{{csrf_token()}}';

        $.ajax({
            type: "post",
            url: "register",
            data: {
                _token: token,

                companyname : $("#companyname").val(),
                companyemail : $("#companyemail").val(),
                companyphone1 : $("#companyphone1").val(),
                companyphone2 : $("#companyphone2").val(),
                companystreet : $("#companystreet").val(),
                companytown : $("#companytown").val(),
                step: 'two'
            },
            dataType: 'json',              // let's set the expected response format
            success: function(data){
                $(".text-danger").html('');
                $(".register-step-2").toggle();
                $(".register-step-3").toggle();
            },
            error: function (err) {
                if (err.status == 422) { // when status code is 422, it's a validation issue
                    // console.log(err.responseJSON);
                    // $('#success_message').fadeIn().html(err.responseJSON.message);

                    // you can loop through the errors object and show it to the user
                    // console.warn(err.responseJSON.errors);
                    // display errors on each form field

                    $(".text-danger").html('');

                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $('#'+i+'-error');
                        el.html(error);
                    });
                }
            }
        });
    });

    $(".btn-back-step-3").click(function() {
        $(".register-step-3").toggle();
        $(".register-step-4").toggle();
    });

    // submit steph3
    $(".btn-submit-step-3").click(function() {
        var token = '{{csrf_token()}}';

        $.ajax({
            type: "post",
            url: "register",
            data: {
                _token: token,

                sitename : $("#sitename").val(),
                sitetown : $("#sitetown").val(),
                sitestreet : $("#sitestreet").val(),
                sitephone1 : $("#sitephone1").val(),
                sitephone2 : $("#sitephone2").val(),
                siteemail : $("#siteemail").val(),
                step: 'three'
            },
            dataType: 'json',              // let's set the expected response format
            success: function(data){
                $(".text-danger").html('');
                $(".register-step-3").toggle();
                $(".register-step-4").toggle();

                $(".auth-title").hide();
            },
            error: function (err) {
                if (err.status == 422) { // when status code is 422, it's a validation issue
                    // console.log(err.responseJSON);
                    // $('#success_message').fadeIn().html(err.responseJSON.message);

                    // you can loop through the errors object and show it to the user
                    // console.warn(err.responseJSON.errors);
                    // display errors on each form field

                    $(".text-danger").html('');

                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $('#'+i+'-error');
                        el.html(error);
                    });
                }
            }
        });
    });


    $(".btn-submit-step-4, .btn-back-step-4").click(function() {
        $(".register-step-4").toggle();
        $(".register-step-5").toggle();
        $(".auth-title").hide();

        $("#user-recap-name").html($('#username').val());
        $("#username-recap-name").html($('#userusername').val());
        $("#company-recap-name").html($('#companyname').val());
        $("#site-recap-name").html($('#sitename').val());
        $("#company-recap-type").html($('#type option:selected').text());
    });
    $(".btn-submit-step-5").click(function() {

    });
</script>

<script>
    function register(){
        var token = '{{csrf_token()}}';


        $.ajax({
            type: "post",
            url: "register",
            data: {
                _token: token,

                username : $("#username").val(),
                useremail : $("#useremail").val(),
                userusername : $("#userusername").val(),
                userphone : $("#userphone").val(),
                useraddress : $("#useraddress").val(),
                userpassword : $("#password").val(),

                companyname : $("#companyname").val(),
                companyemail : $("#companyemail").val(),
                companyphone1 : $("#companyphone1").val(),
                companyphone2 : $("#companyphone2").val(),
                companystreet : $("#companystreet").val(),
                companytown : $("#companytown").val(),

                sitename : $("#sitename").val(),
                sitetown : $("#sitetown").val(),
                sitestreet : $("#sitestreet").val(),
                sitephone1 : $("#sitephone1").val(),
                sitephone2 : $("#sitephone2").val(),
                siteemail : $("#siteemail").val(),
                step : 'last',
                type : $("#type").val(),
            },
            dataType: 'json',              // let's set the expected response format
            success: function(data){
                //console.log(data);
                $(".register-step-5").toggle();
                $(".register-step-6").toggle();
                $(".auth-title").hide();
            },
            error: function (err) {
                if (err.status == 422) { // when status code is 422, it's a validation issue
                    // console.log(err.responseJSON);
                    // $('#success_message').fadeIn().html(err.responseJSON.message);

                    // you can loop through the errors object and show it to the user
                    // console.warn(err.responseJSON.errors);
                    // display errors on each form field

                    $(".text-danger").html('');

                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $('#'+i+'-error');
                        el.html(error);
                    });

                    $(".register-step-5").toggle();
                    $(".register-step-1").toggle();
                }
            }
        });
    }
</script>
@endsection
