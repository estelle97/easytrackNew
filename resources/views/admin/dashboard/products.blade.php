@extends('layouts.mainlayoutAdmin')

@section('content')
<div class="content">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header text-white">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <h2 class="page-title">
                                Gestion des produits
                            </h2>
                        </div>
                        <div class="col-auto">
                            <div class="text-white text-h5 mt-2">
                                1-10 of 30
                            </div>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ml-auto d-print-none">
                            <div class="d-flex align-items-center">
                                <a href="#" class="btn btn-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                    Ajouter un produit
                                </a>
                                <span class="dropdown ml-3">
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
                                            Type
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18"
                                                height="18" class="mr-2">
                                                <path fill="none" d="M0 0h24v24H0z" />
                                                <path
                                                    d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z" />
                                            </svg>
                                            Categorie
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
                <div class="row">
                    <div class="card col-lg-3 p-3" style="max-height: 400px;">
                        <div class="row">
                            <div class="col-lg-6">
                                <h2 class="">
                                    Catégories
                                </h2>
                            </div>
                            <!-- Page title actions -->
                            <div class="col-lg-6 ">
                                <div class="d-flex flex-row-reverse">

                                    <a href="#" class="btn-e-icon text-black ml-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                            height="20">
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path
                                                d="M12 3c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 14c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-7c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                                        </svg>
                                    </a>
                                    <a href="#" class="btn-e-icon text-black">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                            height="20">
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path
                                                d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="category-list list list-row">
                                <div class="list-item">
                                    <div><input type="checkbox" class="form-check-input"></div>
                                    <a href="#">
                                        <span class="avatar rounded">B</span>
                                    </a>
                                    <div class="text-truncate">
                                        <a href="#" class="text-body d-block">Boissons</a>
                                        <small class="d-block text-muted text-truncate mt-n1">30 produuits</small>
                                    </div>
                                </div>
                                <div class="list-item">
                                    <div><input type="checkbox" class="form-check-input"></div>
                                    <a href="#">
                                        <span class="avatar rounded">L</span>
                                    </a>
                                    <div class="text-truncate">
                                        <a href="#" class="text-body d-block">Liqueurs</a>
                                        <small class="d-block text-muted text-truncate mt-n1">1 produuits</small>
                                    </div>
                                </div>
                                <div class="list-item">
                                    <div><input type="checkbox" class="form-check-input"></div>
                                    <a href="#">
                                        <span class="avatar rounded">F</span>
                                    </a>
                                    <div class="text-truncate">
                                        <a href="#" class="text-body d-block">Friandises</a>
                                        <small class="d-block text-muted text-truncate mt-n1">8 produuits</small>
                                    </div>
                                </div>
                                <div class="list-item">
                                    <div><input type="checkbox" class="form-check-input"></div>
                                    <a href="#">
                                        <span class="avatar rounded">C</span>
                                    </a>
                                    <div class="text-truncate">
                                        <a href="#" class="text-body d-block">Chicha</a>
                                        <small class="d-block text-muted text-truncate mt-n1">10 produuits</small>
                                    </div>
                                </div>
                                <div class="list-item">
                                    <div><input type="checkbox" class="form-check-input"></div>
                                    <a href="#">
                                        <span class="avatar rounded">S</span>
                                    </a>
                                    <div class="text-truncate">
                                        <a href="#" class="text-body d-block">Shawamar</a>
                                        <small class="d-block text-muted text-truncate mt-n1">5 produuits</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap datatable">
                                    <thead>
                                        <tr>
                                            <th class="w-1"><input class="form-check-input m-0 align-middle"
                                                    type="checkbox"></th>
                                            <th class="w-1">No.
                                            </th>
                                            <th>Nom</th>
                                            <th>Type</th>
                                            <th>Categorie</th>
                                            <th>Prix unitaire</th>
                                            <th>Stock disponible</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select invoice"></td>
                                            <td><span class="text-muted">001401</span></td>
                                            <td><a href="invoice.html" class="text-reset" tabindex="-1">Booster</a>
                                            </td>
                                            <td>
                                                Bière
                                            </td>
                                            <td>
                                                Boisson
                                            </td>
                                            <td>
                                                1000XAF
                                            </td>
                                            <td>
                                                400
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-white btn-sm mt-1">
                                                    Modifier
                                                </a>
                                                <span class="dropdown">
                                                    <button class="btn btn-white btn-sm dropdown-toggle align-text-top"
                                                        data-boundary="viewport" data-toggle="dropdown">Actions</button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">
                                                            Dupiquer
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            Marquer comme inactif
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            Ajouter à une categorie
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
                                        <tr>
                                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select invoice"></td>
                                            <td><span class="text-muted">001401</span></td>
                                            <td><a href="invoice.html" class="text-reset" tabindex="-1">Booster</a>
                                            </td>
                                            <td>
                                                Bière
                                            </td>
                                            <td>
                                                Boisson
                                            </td>
                                            <td>
                                                1000XAF
                                            </td>
                                            <td>
                                                400
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-white btn-sm mt-1">
                                                    Modifier
                                                </a>
                                                <span class="dropdown">
                                                    <button class="btn btn-white btn-sm dropdown-toggle align-text-top"
                                                        data-boundary="viewport" data-toggle="dropdown">Actions</button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">
                                                            Action
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            Another action
                                                        </a>
                                                    </div>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select invoice"></td>
                                            <td><span class="text-muted">001401</span></td>
                                            <td><a href="invoice.html" class="text-reset" tabindex="-1">Booster</a>
                                            </td>
                                            <td>
                                                Bière
                                            </td>
                                            <td>
                                                Boisson
                                            </td>
                                            <td>
                                                1000XAF
                                            </td>
                                            <td>
                                                400
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-white btn-sm mt-1">
                                                    Modifier
                                                </a>
                                                <span class="dropdown">
                                                    <button class="btn btn-white btn-sm dropdown-toggle align-text-top"
                                                        data-boundary="viewport" data-toggle="dropdown">Actions</button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">
                                                            Action
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            Another action
                                                        </a>
                                                    </div>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select invoice"></td>
                                            <td><span class="text-muted">001401</span></td>
                                            <td><a href="invoice.html" class="text-reset" tabindex="-1">Booster</a>
                                            </td>
                                            <td>
                                                Bière
                                            </td>
                                            <td>
                                                Boisson
                                            </td>
                                            <td>
                                                1000XAF
                                            </td>
                                            <td>
                                                400
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-white btn-sm mt-1">
                                                    Modifier
                                                </a>
                                                <span class="dropdown">
                                                    <button class="btn btn-white btn-sm dropdown-toggle align-text-top"
                                                        data-boundary="viewport" data-toggle="dropdown">Actions</button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">
                                                            Action
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            Another action
                                                        </a>
                                                    </div>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select invoice"></td>
                                            <td><span class="text-muted">001401</span></td>
                                            <td><a href="invoice.html" class="text-reset" tabindex="-1">Booster</a>
                                            </td>
                                            <td>
                                                Bière
                                            </td>
                                            <td>
                                                Boisson
                                            </td>
                                            <td>
                                                1000XAF
                                            </td>
                                            <td>
                                                400
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-white btn-sm mt-1">
                                                    Modifier
                                                </a>
                                                <span class="dropdown">
                                                    <button class="btn btn-white btn-sm dropdown-toggle align-text-top"
                                                        data-boundary="viewport" data-toggle="dropdown">Actions</button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">
                                                            Action
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            Another action
                                                        </a>
                                                    </div>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select invoice"></td>
                                            <td><span class="text-muted">001401</span></td>
                                            <td><a href="invoice.html" class="text-reset" tabindex="-1">Booster</a>
                                            </td>
                                            <td>
                                                Bière
                                            </td>
                                            <td>
                                                Boisson
                                            </td>
                                            <td>
                                                1000XAF
                                            </td>
                                            <td>
                                                400
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-white btn-sm mt-1">
                                                    Modifier
                                                </a>
                                                <span class="dropdown">
                                                    <button class="btn btn-white btn-sm dropdown-toggle align-text-top"
                                                        data-boundary="viewport" data-toggle="dropdown">Actions</button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">
                                                            Action
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            Another action
                                                        </a>
                                                    </div>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select invoice"></td>
                                            <td><span class="text-muted">001401</span></td>
                                            <td><a href="invoice.html" class="text-reset" tabindex="-1">Booster</a>
                                            </td>
                                            <td>
                                                Bière
                                            </td>
                                            <td>
                                                Boisson
                                            </td>
                                            <td>
                                                1000XAF
                                            </td>
                                            <td>
                                                400
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-white btn-sm mt-1">
                                                    Modifier
                                                </a>
                                                <span class="dropdown">
                                                    <button class="btn btn-white btn-sm dropdown-toggle align-text-top"
                                                        data-boundary="viewport" data-toggle="dropdown">Actions</button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">
                                                            Action
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            Another action
                                                        </a>
                                                    </div>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select invoice"></td>
                                            <td><span class="text-muted">001401</span></td>
                                            <td><a href="invoice.html" class="text-reset" tabindex="-1">Booster</a>
                                            </td>
                                            <td>
                                                Bière
                                            </td>
                                            <td>
                                                Boisson
                                            </td>
                                            <td>
                                                1000XAF
                                            </td>
                                            <td>
                                                400
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-white btn-sm mt-1">
                                                    Modifier
                                                </a>
                                                <span class="dropdown">
                                                    <button class="btn btn-white btn-sm dropdown-toggle align-text-top"
                                                        data-boundary="viewport" data-toggle="dropdown">Actions</button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">
                                                            Action
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            Another action
                                                        </a>
                                                    </div>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select invoice"></td>
                                            <td><span class="text-muted">001401</span></td>
                                            <td><a href="invoice.html" class="text-reset" tabindex="-1">Booster</a>
                                            </td>
                                            <td>
                                                Bière
                                            </td>
                                            <td>
                                                Boisson
                                            </td>
                                            <td>
                                                1000XAF
                                            </td>
                                            <td>
                                                400
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-white btn-sm mt-1">
                                                    Modifier
                                                </a>
                                                <span class="dropdown">
                                                    <button class="btn btn-white btn-sm dropdown-toggle align-text-top"
                                                        data-boundary="viewport" data-toggle="dropdown">Actions</button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">
                                                            Action
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            Another action
                                                        </a>
                                                    </div>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select invoice"></td>
                                            <td><span class="text-muted">001401</span></td>
                                            <td><a href="invoice.html" class="text-reset" tabindex="-1">Booster</a>
                                            </td>
                                            <td>
                                                Bière
                                            </td>
                                            <td>
                                                Boisson
                                            </td>
                                            <td>
                                                1000XAF
                                            </td>
                                            <td>
                                                400
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-white btn-sm mt-1">
                                                    Modifier
                                                </a>
                                                <span class="dropdown">
                                                    <button class="btn btn-white btn-sm dropdown-toggle align-text-top"
                                                        data-boundary="viewport" data-toggle="dropdown">Actions</button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">
                                                            Action
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            Another action
                                                        </a>
                                                    </div>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <p class="m-0 text-muted">Affichage <span>1</span> à <span>10</span> de <span>30</span>
                                    élements</p>
                                <ul class="pagination m-0 ml-auto">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <polyline points="15 6 9 12 15 18" /></svg>
                                            précédent
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            suivant <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <polyline points="9 6 15 12 9 18" /></svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
@endsection
