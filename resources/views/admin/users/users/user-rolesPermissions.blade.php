@extends('layouts.rolelayout')

@section('content')

<div class="page">
        <div class="content">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header text-white">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <h2 class="page-title">
                                <a href="./users.html" class="mr-2">
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

                                <span class="dropdown ml-5">
                                    <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                            height="24">
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path
                                                d="M2 18h7v2H2v-2zm0-7h9v2H2v-2zm0-7h20v2H2V4zm18.674 9.025l1.156-.391 1 1.732-.916.805a4.017 4.017 0 0 1 0 1.658l.916.805-1 1.732-1.156-.391c-.41.37-.898.655-1.435.83L19 21h-2l-.24-1.196a3.996 3.996 0 0 1-1.434-.83l-1.156.392-1-1.732.916-.805a4.017 4.017 0 0 1 0-1.658l-.916-.805 1-1.732 1.156.391c.41-.37.898-.655 1.435-.83L17 11h2l.24 1.196c.536.174 1.024.46 1.434.83zM18 18a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"
                                                fill="rgba(255,255,255,1)" />
                                        </svg>
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
                                    <tr>
                                        <td class="w-1">
                                            <span>Caissier</span>
                                        </td>
                                        <td class="td-truncate">
                                            <div class="text-truncate">
                                                Lorem ipsum dolor sit amet,
                                                consectetur adipiscing elit
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <a class="btn btn-white btn-sm mt-1" data-toggle="modal"
                                                data-target="#modal-edit-role">
                                                Modifier
                                            </a>
                                            <span class="dropdown">
                                                <button class="btn btn-white btn-sm dropdown-toggle align-text-top"
                                                    data-boundary="viewport" data-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">
                                                        Dupliquer
                                                    </a>
                                                    <a class="dropdown-item" data-toggle="modal"
                                                        data-target="#modal-delete-role">
                                                        Supprimer
                                                    </a>
                                                </div>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-1">
                                            <span>Magasinier</span>
                                        </td>
                                        <td class="td-truncate">
                                            <div class="text-truncate">
                                                Lorem ipsum dolor sit amet,
                                                consectetur adipiscing elit
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <a class="btn btn-white btn-sm mt-1" data-toggle="modal"
                                                data-target="#modal-edit-role">
                                                Modifier
                                            </a>
                                            <span class="dropdown">
                                                <button class="btn btn-white btn-sm dropdown-toggle align-text-top"
                                                    data-boundary="viewport" data-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">
                                                        Dupliquer
                                                    </a>
                                                    <a class="dropdown-item" data-toggle="modal"
                                                        data-target="#modal-delete-role">
                                                        Supprimer
                                                    </a>
                                                </div>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-1">
                                            <span>Gérant</span>
                                        </td>
                                        <td class="td-truncate">
                                            <div class="text-truncate">
                                                Lorem ipsum dolor sit amet,
                                                consectetur adipiscing elit
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <a class="btn btn-white btn-sm mt-1" data-toggle="modal"
                                                data-target="#modal-edit-role">
                                                Modifier
                                            </a>
                                            <span class="dropdown">
                                                <button class="btn btn-white btn-sm dropdown-toggle align-text-top"
                                                    data-boundary="viewport" data-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">
                                                        Dupliquer
                                                    </a>
                                                    <a class="dropdown-item" data-toggle="modal"
                                                        data-target="#modal-delete-role">
                                                        Supprimer
                                                    </a>
                                                </div>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-1">
                                            <span>Serveur</span>
                                        </td>
                                        <td class="td-truncate">
                                            <div class="text-truncate">
                                                Lorem ipsum dolor sit amet,
                                                consectetur adipiscing elit
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <a class="btn btn-white btn-sm mt-1" data-toggle="modal"
                                                data-target="#modal-edit-role">
                                                Modifier
                                            </a>
                                            <span class="dropdown">
                                                <button class="btn btn-white btn-sm dropdown-toggle align-text-top"
                                                    data-boundary="viewport" data-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">
                                                        Dupliquer
                                                    </a>
                                                    <a class="dropdown-item" data-toggle="modal"
                                                        data-target="#modal-delete-role">
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
            </div>
            <footer class="footer footer-transparent">
                <div class="container">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-lg-auto ml-lg-auto">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    <a href="" class="link-secondary">Aide</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="./terms-of-service.html" class="link-secondary">Conditions
                                        d'utilisation</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="link-secondary">Licence</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            Copyright © 2020
                            <a href="." class="link-secondary">Easytrak</a>.
                            Tous droits réservés.
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <div class="modal-section">
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
                                <input type="text" class="form-control" placeholder="Saisissez le nom..." />
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label ml-4">Description</label>
                                <input type="text" class="form-control" placeholder="Saisissez la description..." />
                            </div>
                            <div class="col-lg-9">
                                <label class="form-label">Permission</label>
                                <select name="role" id="select-permission" class="form-select">
                                    <option value="101" disabled>Valider mouvement de stock</option>
                                    <option value="103" disabled>Recevoir Gérer chat</option>
                                    <option value="104" disabled>Consulter commande</option>
                                    <option value="105" disabled>Valider commande</option>
                                    <option value="106" disabled>Gérer facturation</option>
                                    <option value="107" disabled>Consulter agenda</option>
                                    <option value="108">Rechercher agenda</option>
                                    <option value="109">Rechercher les produits</option>
                                    <option value="110">Consulter les produits</option>
                                    <option value="111">Gérer les commande</option>
                                    <option value="112">Consulter les factures</option>
                                    <option value="113">Effectue tous les
                                        macros-cas</option>
                                    <option value="114">Payer Abonnement</option>
                                </select>
                            </div>
                            <div class="col-lg-3 py-0">
                                <a class="btn btn-light btn-block">
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
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                Valider mouvement de stock
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="mt-1">
                                                    Supprimer
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Recevoir les notifications
                                                d’alerte
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="mt-1">
                                                    Supprimer
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Gérer le chat
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="mt-1">
                                                    Supprimer
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Consulter commande
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="mt-1">
                                                    Supprimer
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Valider commande
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="mt-1">
                                                    Supprimer
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Gérer facturation
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="mt-1">
                                                    Supprimer
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Consulter agenda
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="mt-1">
                                                    Supprimer
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" style="width: 100%;" data-dismiss="modal">
                            Enregistrer
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal modal-blur fade" id="modal-edit-role" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <input type="text" class="form-control" placeholder="Saisissez le nom..."
                                    value="caissier" />
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label ml-4">Description</label>
                                <input type="text" class="form-control" placeholder="Saisissez la description..."
                                    value="Lorem ipsum dolor sit amet, consectetur adipiscing elit" />
                            </div>
                            <div class="col-lg-9">
                                <label class="form-label">Permission</label>
                                <select name="role" id="select-permission" class="form-select">
                                    <option value="101" disabled>Valider mouvement de stock</option>
                                    <option value="103" disabled>Recevoir Gérer chat</option>
                                    <option value="104" disabled>Consulter commande</option>
                                    <option value="105" disabled>Valider commande</option>
                                    <option value="106" disabled>Gérer facturation</option>
                                    <option value="107" disabled>Consulter agenda</option>
                                    <option value="108">Rechercher agenda</option>
                                    <option value="109">Rechercher les produits</option>
                                    <option value="110">Consulter les produits</option>
                                    <option value="111">Gérer les commande</option>
                                    <option value="112">Consulter les factures</option>
                                    <option value="113">Effectue tous les
                                        macros-cas</option>
                                    <option value="114">Payer Abonnement</option>
                                </select>
                            </div>
                            <div class="col-lg-3 py-0">
                                <a class="btn btn-light btn-block">
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
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                Valider mouvement de stock
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="mt-1">
                                                    Supprimer
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Recevoir les notifications
                                                d’alerte
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="mt-1">
                                                    Supprimer
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Gérer le chat
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="mt-1">
                                                    Supprimer
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Consulter commande
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="mt-1">
                                                    Supprimer
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Valider commande
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="mt-1">
                                                    Supprimer
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Gérer facturation
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="mt-1">
                                                    Supprimer
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Consulter agenda
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="mt-1">
                                                    Supprimer
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" style="width: 100%;" data-dismiss="modal">
                            Enregistrer
                        </button>
                    </div>
                </div>
            </div>
        </div>
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
    </div>

@endsection