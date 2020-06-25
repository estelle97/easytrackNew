@extends('layouts.mainlayoutAdmin')

@section('content')
<div class="content">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header text-white">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <h2 class="page-title">
                                Agenda (Équipe de la caisse)
                            </h2>
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
                                    Ajouter un évènement
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card col-lg-3 p-3" style="max-height: 400px;">
                        <div class="row">
                            <div class="col-lg-6">
                                <h2 class="">
                                    Équipes
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
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                            height="24">
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" /></svg>
                                    </a>
                                </div>
                            </div>
                            <div class="category-list list list-row">
                                <div class="list-item">
                                    <div><input type="checkbox" class="form-check-input"></div>
                                    <div class="text-truncate">
                                        <div class="avatar-list avatar-list-stacked">
                                            <span class="avatar"
                                                style="background-image: url('https://picsum.photos/id/300/200')"></span>
                                            <span class="avatar"
                                                style="background-image: url('https://picsum.photos/id/301/200')"></span>
                                            <span class="avatar"
                                                style="background-image: url('https://picsum.photos/id/302/200')"></span>
                                            <span class="avatar"
                                                style="background-image: url('https://picsum.photos/id/308/200')"></span>
                                            <span class="avatar"
                                                style="background-image: url('https://picsum.photos/id/304/200')"></span>
                                            <span class="avatar"
                                                style="background-image: url('https://picsum.photos/id/305/200')"></span>
                                            <span class="avatar"
                                                style="background-image: url('https://picsum.photos/id/306/200')"></span>
                                            <span class="avatar"
                                                style="background-image: url('https://picsum.photos/id/307/200')"></span>
                                            <span class="avatar">+4</span>
                                        </div>
                                        <a href="#" class="text-body d-block">Équipe de serveurs</a>
                                        <small class="d-block text-muted text-truncate mt-n1">Black and White</small>
                                    </div>
                                </div>
                                <div class="list-item">
                                    <div><input type="checkbox" class="form-check-input"></div>
                                    <div class="text-truncate">
                                        <div class="avatar-list avatar-list-stacked">
                                            <span class="avatar"
                                                style="background-image: url('https://picsum.photos/id/400/200')"></span>
                                            <span class="avatar"
                                                style="background-image: url('https://picsum.photos/id/401/200')"></span>
                                            <span class="avatar">VO</span>
                                        </div>
                                        <a href="#" class="text-body d-block">Équipe en charge du magazin</a>
                                        <small class="d-block text-muted text-truncate mt-n1">Black and White</small>
                                    </div>
                                </div>
                                <div class="list-item">
                                    <div><input type="checkbox" class="form-check-input"></div>
                                    <div class="text-truncate">
                                        <div class="avatar-list avatar-list-stacked">
                                            <span class="avatar"
                                                style="background-image: url('https://picsum.photos/id/501/200')"></span>
                                            <span class="avatar"
                                                style="background-image: url('https://picsum.photos/id/502/200')"></span>
                                        </div>
                                        <a href="#" class="text-body text-primary d-block">Équipe en charge de la
                                            caisse</a>
                                        <small class="d-block text-muted text-truncate mt-n1">Black and White</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <div id="calendar-main" class="card-calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
        </div>      
@endsection
