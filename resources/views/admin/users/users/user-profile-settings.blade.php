@extends('layouts.settingslayout')

@section('content')

<div class="page">
        <header class="navbar navbar-expand-md navbar-dark navbar-bg-gradient navbar-overlap">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="." class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pr-0 pr-md-3">
                    <img src="" alt="easytrak" class="navbar-brand-image" />
                </a>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-toggle="dropdown">
                            <span class="avatar"
                                style="background-image: url('https://ui-avatars.com/api/?name={{ $users->name }}&background=FFFFFF&color=267FC9&font-size=0.30');">
                                <span class="badge bg-red"></span>
                            </span>
                            <div class="d-none d-xl-block pl-2">
                                <div>Astride</div>
                                <div class="mt-1 small text-muted">
                                    Admin
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('admin.user.profile', $users->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                    class="icon dropdown-item-icon">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M12 17c3.662 0 6.865 1.575 8.607 3.925l-1.842.871C17.347 20.116 14.847 19 12 19c-2.847 0-5.347 1.116-6.765 2.796l-1.841-.872C5.136 18.574 8.338 17 12 17zm0-15a5 5 0 0 1 5 5v3a5 5 0 0 1-4.783 4.995L12 15a5 5 0 0 1-5-5V7a5 5 0 0 1 4.783-4.995L12 2zm0 2a3 3 0 0 0-2.995 2.824L9 7v3a3 3 0 0 0 5.995.176L15 10V7a3 3 0 0 0-3-3z" />
                                </svg>
                                Mon profile
                            </a>
                            <a class="dropdown-item" href="./agenda.html">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                    class="icon dropdown-item-icon">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M17 3h4a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h4V1h2v2h6V1h2v2zm-2 2H9v2H7V5H4v4h16V5h-3v2h-2V5zm5 6H4v8h16v-8z" />
                                </svg>
                                Agenda
                            </a>
                            <a class="dropdown-item" href="./notifications.html">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                    class="icon dropdown-item-icon">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M5 18h14v-6.969C19 7.148 15.866 4 12 4s-7 3.148-7 7.031V18zm7-16c4.97 0 9 4.043 9 9.031V20H3v-8.969C3 6.043 7.03 2 12 2zM9.5 21h5a2.5 2.5 0 1 1-5 0z" />
                                </svg>
                                Notifications
                            </a>
                            <a class="dropdown-item" href="./chat.html">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                    class="icon dropdown-item-icon">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M10 3h4a8 8 0 1 1 0 16v3.5c-5-2-12-5-12-11.5a8 8 0 0 1 8-8zm2 14h2a6 6 0 1 0 0-12h-4a6 6 0 0 0-6 6c0 3.61 2.462 5.966 8 8.48V17z" />
                                </svg>
                                Chat
                            </a>
                            <a class="dropdown-item" href="./help.html">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                    class="icon dropdown-item-icon">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-1-5h2v2h-2v-2zm2-1.645V14h-2v-1.5a1 1 0 0 1 1-1 1.5 1.5 0 1 0-1.471-1.794l-1.962-.393A3.501 3.501 0 1 1 13 13.355z" />
                                </svg>
                                Aide
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                    class="icon dropdown-item-icon">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M4 18h2v2h12V4H6v2H4V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3zm2-7h7v2H6v3l-5-4 5-4v3z" />
                                </svg>
                                Se déconnecter</a>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="./index.html">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                            height="24" class="icon">
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path
                                                d="M21 20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.49a1 1 0 0 1 .386-.79l8-6.222a1 1 0 0 1 1.228 0l8 6.222a1 1 0 0 1 .386.79V20zm-2-1V9.978l-7-5.444-7 5.444V19h14z"
                                                fill="rgba(255,255,255,0.8)" /></svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Accueil
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#navbar-layout" data-toggle="dropdown"
                                    role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                            height="24" class="icon">
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path
                                                d="M6.5 2h11a1 1 0 0 1 .8.4L21 6v15a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6l2.7-3.6a1 1 0 0 1 .8-.4zM19 8H5v12h14V8zm-.5-2L17 4H7L5.5 6h13zM9 10v2a3 3 0 0 0 6 0v-2h2v2a5 5 0 0 1-10 0v-2h2z"
                                                fill="rgba(255,255,255,0.8)" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Magasin
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="./products.html">
                                            Produits
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="./vendors.html">
                                            Fournisseurs
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#navbar-layout" data-toggle="dropdown"
                                    role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                            height="24" class="icon">
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path
                                                d="M4 16V4H2V2h3a1 1 0 0 1 1 1v12h12.438l2-8H8V5h13.72a1 1 0 0 1 .97 1.243l-2.5 10a1 1 0 0 1-.97.757H5a1 1 0 0 1-1-1zm2 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm12 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"
                                                fill="rgba(255,255,255,0.8)" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Commandes
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="active">
                                        <a class="dropdown-item" href="./salesorders.html">
                                            Commandes clients
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="./purchaseorders.html">
                                            Bons de commandes
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./invoices.html">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                            height="24" class="icon">
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path
                                                d="M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9z"
                                                fill="rgba(255,255,255,0.8)" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Facturations
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="./users.html">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                            height="24" class="icon">
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path
                                                d="M2 22a8 8 0 1 1 16 0h-2a6 6 0 1 0-12 0H2zm8-9c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm8.284 3.703A8.002 8.002 0 0 1 23 22h-2a6.001 6.001 0 0 0-3.537-5.473l.82-1.824zm-.688-11.29A5.5 5.5 0 0 1 21 8.5a5.499 5.499 0 0 1-5 5.478v-2.013a3.5 3.5 0 0 0 1.041-6.609l.555-1.943z"
                                                fill="rgba(255,255,255,0.8)" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Utilisateurs
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div
                            class="ml-md-auto pl-md-4 py-2 py-md-0 mr-md-4 order-first order-md-last flex-grow-1 flex-md-grow-0">
                            <form action="." method="get">
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <circle cx="10" cy="10" r="7" />
                                            <line x1="21" y1="21" x2="15" y2="15" />
                                        </svg>
                                    </span>
                                    <input type="text" class="form-control form-control-rounded form-control-dark"
                                        placeholder="Search…" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
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
                                            fill="rgba(255,255,255,1)" /></svg>
                                </a>
                                Gestion de l'utilisateur
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ml-auto d-print-none">
                            <div class="d-flex align-items-center">
                                <a href="./user-profile.html" class="d-flex align-items-center text-white mr-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M20 22h-2v-2a3 3 0 0 0-3-3H9a3 3 0 0 0-3 3v2H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" fill="rgba(255,255,255,1)"/></svg>
                                    Vue d'ensemble
                                </a>

                                <a href="./user-profile-edit.html" class="d-flex align-items-center text-white mr-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z" fill="rgba(255,255,255,1)"/></svg>
                                    Éditer
                                </a>

                                <a href="./user-profile-settings.html" class="d-flex align-items-center text-white">
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
                        <a>
                            <img class="card-img-top" src="https://picsum.photos/id/700/400" alt="Profile picture">
                        </a>
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex align-items-center mt-auto">
                                <div class="ml-2">
                                    <a class="text-body">Paweł Kuna</a>
                                    <small class="d-block text-muted">Online</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="p-3">
                                <h2 class="mb-0">Configuration et permissions</h2>
                                <span class="text-muted">Vous pouvez configurer le profil de l'utilisateur et lui octroyer des accèss spécifiques sur l'application</span>
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
                                                <th>Nom</th>
                                                <th class="text-right">Activer/Desactiver</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Chat
                                                </td>
                                                <td class="text-right">
                                                    <input class="form-check-input m-0 align-middle" type="checkbox" checked>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Agenda
                                                </td>
                                                <td class="text-right">
                                                    <input class="form-check-input m-0 align-middle" type="checkbox">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Application Android
                                                </td>
                                                <td class="text-right">
                                                    <input class="form-check-input m-0 align-middle" type="checkbox" checked>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Application iOS
                                                </td>
                                                <td class="text-right">
                                                    <input class="form-check-input m-0 align-middle" type="checkbox" checked>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
                                                <th class="text-right">Action</th>
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
                                                    Recevoir les notifications d’alerte
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
                            <div class="text-right p-4">
                                <button type="submit" class="btn btn-primary mr-4" data-toggle="modal" data-target="#modal-save-settings">Sauvegarder</button>
                                <button type="button" class="btn btn-dark">Annuler</button>
                            </div>
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
    <div class="modal modal-blur fade" id="modal-save-settings" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" /></svg>
                </button>
                <div class="modal-body text-center py-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-xl icon-thin mb-4 text-green" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <circle cx="12" cy="12" r="9" />
                        <path d="M9 12l2 2l4 -4" /></svg>
                    <h3>Sauvegarde reussie</h3>
                    <div class="text-muted">Nous avons sauvegarder les changements effectuer sur les paramètre du profil de
                        l'utilisateur<div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection