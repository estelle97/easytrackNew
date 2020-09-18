@extends('layouts.base')

@section('content')
<!-- Page title -->
<div class="page-header text-white">
    <div class="row align-items-center">
        <div class="col-auto">
            <h2 class="page-title">
                Agenda
            </h2>
            <span class="order-global-date text-white h4 mt-2 text-capitalize"></span>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ml-auto d-print-none">
            <div class="d-flex align-items-center">
                <a href="#" class="text-white button-click-action mb-0" data-toggle="modal"
                    data-target="#modal-create-agenda">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28" height="28" class="mr-2">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" fill="rgba(255,255,255,1)" /></svg>
                    <span class="h2 align-middle button-click-action mb-0">Nouveau</span>
                </a>
                <span class="dropdown ml-5 button-click-action">
                    <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M12 23.728l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zm4.95-7.778a7 7 0 1 0-9.9 0L12 20.9l4.95-4.95zM12 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"
                                fill="rgba(255,255,255,1)" /></svg>
                        <span class="h2 selected-site align-middle" data-site="all"> Tous les sites </span>
                    </div>

                    <div class="dropdown-menu dropdown-menu-right mt-3">
                        <a class="dropdown-item site" data-site="all">
                            Tous les sites
                        </a>
                        @foreach (Auth::user()->companies->first()->sites as $site)
                        <a class="dropdown-item site" data-site={{$site->id}}>
                            {{$site->name}}
                        </a>
                        @endforeach
                    </div>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="row row-deck row-cards">
    <div class="col-lg-12">
        <div class="card p-4" style="height: 700px; max-height: 700px; overflow-x: hidden;">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="card agenda-card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center justify-content-between">
                                <h6 class="h4">Lundi, 14 Sep 2020</h6>
                            </div>
                            <div class="avatar-list avatar-list-stacked mb-3">
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=William Steve"></span>
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Stephane Tsana"></span>
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Estelle Belinga"></span>
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Yvan Tatsi"></span>
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Alger Diana"></span>
                                <span class="avatar">+3</span>
                            </div>
                            <div class="card-meta d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 23.728l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zm4.95-7.778a7 7 0 1 0-9.9 0L12 20.9l4.95-4.95zM12 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>
                                    <span>Le relais bastos</span>
                                </div>
                                <span class="dropdown">
                                    <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c-.825 0-1.5.675-1.5 1.5S11.175 6 12 6s1.5-.675 1.5-1.5S12.825 3 12 3zm0 15c-.825 0-1.5.675-1.5 1.5S11.175 21 12 21s1.5-.675 1.5-1.5S12.825 18 12 18zm0-7.5c-.825 0-1.5.675-1.5 1.5s.675 1.5 1.5 1.5 1.5-.675 1.5-1.5-.675-1.5-1.5-1.5z"/></svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right mt-3">
                                        <span class="dropdown-header">Menu</span>
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-view-agenda">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9C2.121 6.88 6.608 3 12 3zm0 16a9.005 9.005 0 0 0 8.777-7 9.005 9.005 0 0 0-17.554 0A9.005 9.005 0 0 0 12 19zm0-2.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0-2a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/></svg>
                                            Ouvrir
                                        </a>
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-edit-agenda">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z"/></svg>
                                            Modifier
                                        </a>
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-delete-agenda">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zM9 4v2h6V4H9z"/></svg>
                                            Supprimer
                                        </a>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="card agenda-card">
                        <div class="card-body">
                            <div class="card-title">
                                <h6 class="h4 mb-3">Mardi, 15 Sep 2020</h6>
                            </div>
                            <div class="avatar-list avatar-list-stacked mb-3">
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=William Steve"></span>
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Stephane Tsana"></span>
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Estelle Belinga"></span>
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Yvan Tatsi"></span>
                            </div>
                            <div class="card-meta d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 23.728l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zm4.95-7.778a7 7 0 1 0-9.9 0L12 20.9l4.95-4.95zM12 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>
                                    <span>Le relais bastos</span>
                                </div>
                                <span class="dropdown">
                                    <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c-.825 0-1.5.675-1.5 1.5S11.175 6 12 6s1.5-.675 1.5-1.5S12.825 3 12 3zm0 15c-.825 0-1.5.675-1.5 1.5S11.175 21 12 21s1.5-.675 1.5-1.5S12.825 18 12 18zm0-7.5c-.825 0-1.5.675-1.5 1.5s.675 1.5 1.5 1.5 1.5-.675 1.5-1.5-.675-1.5-1.5-1.5z"/></svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right mt-3">
                                        <span class="dropdown-header">Menu</span>
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-view-agenda">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9C2.121 6.88 6.608 3 12 3zm0 16a9.005 9.005 0 0 0 8.777-7 9.005 9.005 0 0 0-17.554 0A9.005 9.005 0 0 0 12 19zm0-2.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0-2a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/></svg>
                                            Ouvrir
                                        </a>
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-edit-agenda">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z"/></svg>
                                            Modifier
                                        </a>
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-delete-agenda">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zM9 4v2h6V4H9z"/></svg>
                                            Supprimer
                                        </a>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="card agenda-card">
                        <div class="card-body">
                            <div class="card-title">
                                <h6 class="h4 mb-3">Mercedi, 16 Sep 2020</h6>
                            </div>
                            <div class="avatar-list avatar-list-stacked mb-3">
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=William Steve"></span>
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Stephane Tsana"></span>
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Estelle Belinga"></span>
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Yvan Tatsi"></span>
                            </div>
                            <div class="card-meta d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 23.728l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zm4.95-7.778a7 7 0 1 0-9.9 0L12 20.9l4.95-4.95zM12 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>
                                    <span>Le relais bastos</span>
                                </div>
                                <span class="dropdown">
                                    <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c-.825 0-1.5.675-1.5 1.5S11.175 6 12 6s1.5-.675 1.5-1.5S12.825 3 12 3zm0 15c-.825 0-1.5.675-1.5 1.5S11.175 21 12 21s1.5-.675 1.5-1.5S12.825 18 12 18zm0-7.5c-.825 0-1.5.675-1.5 1.5s.675 1.5 1.5 1.5 1.5-.675 1.5-1.5-.675-1.5-1.5-1.5z"/></svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right mt-3">
                                        <span class="dropdown-header">Menu</span>
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-view-agenda">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9C2.121 6.88 6.608 3 12 3zm0 16a9.005 9.005 0 0 0 8.777-7 9.005 9.005 0 0 0-17.554 0A9.005 9.005 0 0 0 12 19zm0-2.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0-2a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/></svg>
                                            Ouvrir
                                        </a>
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-edit-agenda">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z"/></svg>
                                            Modifier
                                        </a>
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-delete-agenda">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zM9 4v2h6V4H9z"/></svg>
                                            Supprimer
                                        </a>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="card agenda-card">
                        <div class="card-body">
                            <div class="card-title">
                                <h6 class="h4 mb-3">Jeudi, 17 Sep 2020</h6>
                            </div>
                            <div class="avatar-list avatar-list-stacked mb-3">
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=William Steve"></span>
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Stephane Tsana"></span>
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Estelle Belinga"></span>
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Yvan Tatsi"></span>
                            </div>
                            <div class="card-meta d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 23.728l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zm4.95-7.778a7 7 0 1 0-9.9 0L12 20.9l4.95-4.95zM12 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>
                                    <span>Le relais bastos</span>
                                </div>
                                <span class="dropdown">
                                    <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c-.825 0-1.5.675-1.5 1.5S11.175 6 12 6s1.5-.675 1.5-1.5S12.825 3 12 3zm0 15c-.825 0-1.5.675-1.5 1.5S11.175 21 12 21s1.5-.675 1.5-1.5S12.825 18 12 18zm0-7.5c-.825 0-1.5.675-1.5 1.5s.675 1.5 1.5 1.5 1.5-.675 1.5-1.5-.675-1.5-1.5-1.5z"/></svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right mt-3">
                                        <span class="dropdown-header">Menu</span>
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-view-agenda">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9C2.121 6.88 6.608 3 12 3zm0 16a9.005 9.005 0 0 0 8.777-7 9.005 9.005 0 0 0-17.554 0A9.005 9.005 0 0 0 12 19zm0-2.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0-2a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/></svg>
                                            Ouvrir
                                        </a>
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-edit-agenda">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z"/></svg>
                                            Modifier
                                        </a>
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-delete-agenda">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zM9 4v2h6V4H9z"/></svg>
                                            Supprimer
                                        </a>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="card agenda-card">
                        <div class="card-body">
                            <div class="card-title">
                                <h6 class="h4 mb-3">Vendredi, 18 Sep 2020</h6>
                            </div>
                            <div class="avatar-list avatar-list-stacked mb-3">
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=William Steve"></span>
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Stephane Tsana"></span>
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Estelle Belinga"></span>
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Yvan Tatsi"></span>
                            </div>
                            <div class="card-meta d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 23.728l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zm4.95-7.778a7 7 0 1 0-9.9 0L12 20.9l4.95-4.95zM12 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>
                                    <span>Le relais bastos</span>
                                </div>
                                <span class="dropdown">
                                    <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c-.825 0-1.5.675-1.5 1.5S11.175 6 12 6s1.5-.675 1.5-1.5S12.825 3 12 3zm0 15c-.825 0-1.5.675-1.5 1.5S11.175 21 12 21s1.5-.675 1.5-1.5S12.825 18 12 18zm0-7.5c-.825 0-1.5.675-1.5 1.5s.675 1.5 1.5 1.5 1.5-.675 1.5-1.5-.675-1.5-1.5-1.5z"/></svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right mt-3">
                                        <span class="dropdown-header">Menu</span>
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-view-agenda">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9C2.121 6.88 6.608 3 12 3zm0 16a9.005 9.005 0 0 0 8.777-7 9.005 9.005 0 0 0-17.554 0A9.005 9.005 0 0 0 12 19zm0-2.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0-2a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/></svg>
                                            Ouvrir
                                        </a>
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-edit-agenda">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z"/></svg>
                                            Modifier
                                        </a>
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-delete-agenda">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zM9 4v2h6V4H9z"/></svg>
                                            Supprimer
                                        </a>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="card agenda-card">
                        <div class="card-body">
                            <div class="card-title">
                                <h6 class="h4 mb-3">Samedi, 18 Sep 2020</h6>
                            </div>
                            <div class="avatar-list avatar-list-stacked mb-3">
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=William Steve"></span>
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Stephane Tsana"></span>
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Estelle Belinga"></span>
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Yvan Tatsi"></span>
                            </div>
                            <div class="card-meta d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 23.728l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zm4.95-7.778a7 7 0 1 0-9.9 0L12 20.9l4.95-4.95zM12 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>
                                    <span>Le relais bastos</span>
                                </div>
                                <span class="dropdown">
                                    <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c-.825 0-1.5.675-1.5 1.5S11.175 6 12 6s1.5-.675 1.5-1.5S12.825 3 12 3zm0 15c-.825 0-1.5.675-1.5 1.5S11.175 21 12 21s1.5-.675 1.5-1.5S12.825 18 12 18zm0-7.5c-.825 0-1.5.675-1.5 1.5s.675 1.5 1.5 1.5 1.5-.675 1.5-1.5-.675-1.5-1.5-1.5z"/></svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right mt-3">
                                        <span class="dropdown-header">Menu</span>
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-view-agenda">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9C2.121 6.88 6.608 3 12 3zm0 16a9.005 9.005 0 0 0 8.777-7 9.005 9.005 0 0 0-17.554 0A9.005 9.005 0 0 0 12 19zm0-2.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0-2a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/></svg>
                                            Ouvrir
                                        </a>
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-edit-agenda">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z"/></svg>
                                            Modifier
                                        </a>
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-delete-agenda">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zM9 4v2h6V4H9z"/></svg>
                                            Supprimer
                                        </a>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="card agenda-card">
                        <div class="card-body">
                            <div class="card-title">
                                <h6 class="h4 mb-3">Dimanche, 19 Sep 2020</h6>
                            </div>
                            <div class="avatar-list avatar-list-stacked mb-3">
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=William Steve"></span>
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Stephane Tsana"></span>
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Estelle Belinga"></span>
                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Yvan Tatsi"></span>
                            </div>
                            <div class="card-meta d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 23.728l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zm4.95-7.778a7 7 0 1 0-9.9 0L12 20.9l4.95-4.95zM12 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>
                                    <span>Le relais bastos</span>
                                </div>
                                <span class="dropdown">
                                    <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c-.825 0-1.5.675-1.5 1.5S11.175 6 12 6s1.5-.675 1.5-1.5S12.825 3 12 3zm0 15c-.825 0-1.5.675-1.5 1.5S11.175 21 12 21s1.5-.675 1.5-1.5S12.825 18 12 18zm0-7.5c-.825 0-1.5.675-1.5 1.5s.675 1.5 1.5 1.5 1.5-.675 1.5-1.5-.675-1.5-1.5-1.5z"/></svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right mt-3">
                                        <span class="dropdown-header">Menu</span>
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-view-agenda">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9C2.121 6.88 6.608 3 12 3zm0 16a9.005 9.005 0 0 0 8.777-7 9.005 9.005 0 0 0-17.554 0A9.005 9.005 0 0 0 12 19zm0-2.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0-2a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/></svg>
                                            Ouvrir
                                        </a>
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-edit-agenda">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z"/></svg>
                                            Modifier
                                        </a>
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-delete-agenda">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zM9 4v2h6V4H9z"/></svg>
                                            Supprimer
                                        </a>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-section">
    <div class="modal modal-blur fade" id="modal-create-agenda" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nouvel agenda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                    </button>
                </div>
                <div class="modal-body bg-white">
                    <div class="row align-items-end">
                        <div class="col-lg-12 mb-4">
                            <label class="form-label">Site</label>
                            <select class="form-select">
                                <option value="" selected disabled>Selectionnez un site</option>
                                @foreach (Auth::user()->companies->first()->sites as $site)
                                    <option value={{$site->id}}> {{$site->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" name="example-text-input"
                            placeholder="Entrez la date">
                        </div>
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Employées</th>
                                            <th>Heure d'arrivé</th>
                                            <th>Heure de départ</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td >
                                                <div class="avatar-list avatar-list-stacked">
                                                    <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=William Steve"></span>
                                                    <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Stephane Tsana"></span>
                                                    <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Estelle Belinga"></span>
                                                    <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Yvan Tatsi"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    08h00
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    19h00
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" data-toggle="modal" data-target="#modal-edit-team">Modifier l'équipe</a>
                                                <a href="#" class="text-red ml-4">Supprimer</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                <div class="avatar-list avatar-list-stacked">
                                                    <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Alger Diana"></span>
                                                    <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Rodrigue Ange"></span>
                                                    <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Vanessa Ebenye"></span>
                                                    <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Alerte Oyono"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    18h00
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    06h00
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" data-toggle="modal" data-target="#modal-edit-team">Modifier l'équipe</a>
                                                <a href="#" class="text-red ml-4">Supprimer</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="button" class="btn btn-white" style="width: 100%;" data-toggle="modal" data-target="#modal-edit-team">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"/></svg>
                                Ajouter une nouvelle équipe
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary mr-auto"
                        data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" style="width: 60%;" data-dismiss="modal">Enregister</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-edit-agenda" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lundi, 14 Sep 2020</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                    </button>
                </div>
                <div class="modal-body bg-white">
                    <div class="row align-items-end">
                        <div class="col-lg-12  mb-4">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" name="example-text-input"
                            placeholder="Entrez la date">
                        </div>
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Employées</th>
                                            <th>Heure d'arrivé</th>
                                            <th>Heure de départ</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td >
                                                <div class="avatar-list avatar-list-stacked">
                                                    <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=William Steve"></span>
                                                    <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Stephane Tsana"></span>
                                                    <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Estelle Belinga"></span>
                                                    <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Yvan Tatsi"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    08h00
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    19h00
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" data-toggle="modal" data-target="#modal-edit-team">Modifier l'équipe</a>
                                                <a href="#" class="text-red ml-4">Supprimer</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                <div class="avatar-list avatar-list-stacked">
                                                    <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Alger Diana"></span>
                                                    <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Rodrigue Ange"></span>
                                                    <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Vanessa Ebenye"></span>
                                                    <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Alerte Oyono"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    18h00
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    06h00
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" data-toggle="modal" data-target="#modal-edit-team">Modifier l'équipe</a>
                                                <a href="#" class="text-red ml-4">Supprimer</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="button" class="btn btn-white" style="width: 100%;" data-toggle="modal" data-target="#modal-edit-team">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"/></svg>
                                Ajouter une nouvelle équipe
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary mr-auto"
                        data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" style="width: 60%;" data-dismiss="modal">Sauvegarder</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-view-agenda" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lundi, 14 Sep 2020</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="table-responsive">
                    <table class="table card-table table-vcenter">
                        <thead>
                            <tr>
                                <th>Employées</th>
                                <th>Heure d'arrivé</th>
                                <th>Heure de départ</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td >
                                    <div class="avatar-list avatar-list-stacked">
                                        <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=William Steve"></span>
                                        <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Stephane Tsana"></span>
                                        <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Estelle Belinga"></span>
                                        <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Yvan Tatsi"></span>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        08h00
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        19h00
                                    </div>
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#modal-view-team">Voir l'équipe</a>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <div class="avatar-list avatar-list-stacked">
                                        <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Alger Diana"></span>
                                        <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Rodrigue Ange"></span>
                                        <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Vanessa Ebenye"></span>
                                        <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Alerte Oyono"></span>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        18h00
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        06h00
                                    </div>
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#modal-view-team">Voir l'équipe</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    <div class="modal modal-blur fade" id="modal-delete-agenda" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">Êtes vous sure ?</div>
                    <div>Si vous continuez, vous perdrez toutes les données de cette agenda.</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary mr-auto"
                        data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Oui, supprimer</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-edit-team" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nouvel équipe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                    </button>
                </div>
                <div class="modal-body bg-white">
                    <div class="row align-items-end">
                        <div class="col-lg-12  mb-4">
                            <label class="form-label">Heure d'arrivé</label>
                            <input type="date" class="form-control" name="example-text-input"
                                placeholder="Entrez l'heure">
                        </div>
                        <div class="col-lg-12  mb-4">
                            <label class="form-label">Heure de départ</label>
                            <input type="date" class="form-control" name="example-text-input"
                            placeholder="Entrez l'heure">
                        </div>
                        <div class="col-lg-9">
                            <label class="form-label">Employées</label>
                            <select class="form-select">
                                <option value="" selected disabled>Selectionnez un utilisateur</option>
                                @foreach (App\Message::getRecipients() as $emp)
                                    <option value={{$emp->user->id}}> {{$emp->user->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <button type="button" class="btn btn-whhite btn-block">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"/></svg>
                                Ajouter
                            </button>
                        </div>
                        <div class="col-lg-12 mt-4">
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nom complet</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="w-1">
                                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=William Steve"></span>
                                            </td>
                                            <td>
                                                <div>
                                                    William Steve
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-1">
                                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Stephane Tsana"></span>
                                            </td>
                                            <td>
                                                <div>
                                                    Stephane Tsana
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-1">
                                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Estelle Belinga"></span>
                                            </td>
                                            <td>
                                                <div>
                                                    Estelle Belinga
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-1">
                                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Yvan Tatsi"></span>
                                            </td>
                                            <td>
                                                <div>
                                                    Yvan Tatsi
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Enregister</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-view-team" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
                <div class="modal-body bg-white">
                    <div class="row align-items-end">
                        <div class="col-lg-4">
                            <div class="h4">Heure d'arrivé</div>
                            <div class="h2">10h00</div>
                        </div>
                        <div class="col-lg-4">
                            <div class="h4">Heure de départ</div>
                            <div class="h2">18h00</div>
                        </div>
                        <div class="col-lg-12 mt-4">
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nom complet</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="w-1">
                                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=William Steve"></span>
                                            </td>
                                            <td>
                                                <div>
                                                    William Steve
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-1">
                                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Stephane Tsana"></span>
                                            </td>
                                            <td>
                                                <div>
                                                    Stephane Tsana
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-1">
                                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Estelle Belinga"></span>
                                            </td>
                                            <td>
                                                <div>
                                                    Estelle Belinga
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-1">
                                                <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name=Yvan Tatsi"></span>
                                            </td>
                                            <td>
                                                <div>
                                                    Yvan Tatsi
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection
