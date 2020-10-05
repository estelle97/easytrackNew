@extends('layouts.base')

@section('content')
<!-- Page title -->
<div class="page-header text-white">
    <div class="row align-items-center">
        <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 p-0 pl-2 message_list-header">
            <div class="row">
                <div class="col-auto">
                    <h2 class="page-title">
                        Chat
                    </h2>
                    <span class="order-global-date text-white h4 mt-2 text-capitalize"></span>
                </div>
                <div class="col-auto ml-auto d-print-none">
                    <div class="d-flex align-items-center">
                        <a href="#" class="text-white button-click-action mb-0 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z" fill="rgba(255,255,255,1)"/></svg>
                            {{-- <span class="h2 align-middle button-click-action mb-0">Nouveau</span> --}}
                        </a>
                        <a href="#" class="text-white button-click-action mb-0 mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M14 3v2H4v13.385L5.763 17H20v-7h2v8a1 1 0 0 1-1 1H6.455L2 22.5V4a1 1 0 0 1 1-1h11zm5 0V0h2v3h3v2h-3v3h-2V5h-3V3h3z"
                                    fill="rgba(255,255,255,1)" /></svg>
                            {{-- <span class="h2 align-middle button-click-action mb-0">Nouveau</span> --}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ml-auto d-print-none">
            <div class="d-flex align-items-center">
                <span class="dropdown button-click-action mr-2">
                    <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c-.825 0-1.5.675-1.5 1.5S11.175 6 12 6s1.5-.675 1.5-1.5S12.825 3 12 3zm0 15c-.825 0-1.5.675-1.5 1.5S11.175 21 12 21s1.5-.675 1.5-1.5S12.825 18 12 18zm0-7.5c-.825 0-1.5.675-1.5 1.5s.675 1.5 1.5 1.5 1.5-.675 1.5-1.5-.675-1.5-1.5-1.5z" fill="rgba(255,255,255,1)"/></svg>
                    </div>

                    <div class="dropdown-menu dropdown-menu-right mt-3">
                        <a class="dropdown-item mb-2" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-3"><path fill="none" d="M0 0h24v24H0z"/><path d="M6.455 19L2 22.5V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H6.455zM4 18.385L5.763 17H20V5H4v13.385zM13.414 11l2.475 2.475-1.414 1.414L12 12.414 9.525 14.89l-1.414-1.414L10.586 11 8.11 8.525l1.414-1.414L12 9.586l2.475-2.475 1.414 1.414L13.414 11z"/></svg>
                            Effacer les messages
                        </a>
                        <a class="dropdown-item mb-2" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-3"><path fill="none" d="M0 0h24v24H0z"/><path d="M2.808 1.393l19.799 19.8-1.415 1.414-3.608-3.608L6.455 19 2 22.5V4c0-.17.042-.329.116-.469l-.723-.723 1.415-1.415zm1.191 4.02L4 18.385 5.763 17h9.821L4 5.412zM21 3a1 1 0 0 1 1 1v13.785l-2-2V5L9.213 4.999 7.214 3H21z"/></svg>
                            Bloquer les notifications
                        </a>
                        <a class="dropdown-item mb-2" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-3"><path fill="none" d="M0 0h24v24H0z"/><path d="M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zm-9 3h2v6H9v-6zm4 0h2v6h-2v-6zM9 4v2h6V4H9z" fill="rgba(231,76,60,1)"/></svg>
                            Supprimer
                        </a>
                    </div>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="row row-deck row-cards">
    <div class="col-lg-12">
        <div class="card" style="max-height: 700px">
            <section class="inbox">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 pt-3">
                            <ul class="message_list list-group list-unstyled">
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-body d-flex align-items-center">
                                            <div class="user mr-4">
                                                <span class="avatar"
                                                    style="background-image: url('https://ui-avatars.com/api/?name=Carelle+Essama&background=C9DFF2&color=2680C9&font-size=0.30');"></span>
                                            </div>
                                            <div class="message content">
                                                <div class="media-heading">
                                                    <a href="mail-single.html" class="m-r-10">Carelle Essama</a>
                                                    <small class="float-right text-muted">
                                                        <time class="hidden-sm-down" datetime="2017">12:35 AM</time>
                                                    </small>
                                                </div>
                                                <p class="msg">
                                                    Lorem Ipsum is simply dumm dummy text of the printing and
                                                    typesetting industry.
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-body d-flex align-items-center">
                                            <div class="user mr-4">
                                                <span class="avatar"
                                                    style="background-image: url('https://ui-avatars.com/api/?name=Paul+Kamegni&background=C8EBF0&color=26B0C3&font-size=0.30');"></span>
                                            </div>
                                            <div class="message content">
                                                <div class="media-heading">
                                                    <a href="mail-single.html" class="m-r-10">Paul Kamegni</a>
                                                    <small class="float-right text-muted">
                                                        <time class="hidden-sm-down" datetime="2017">12:35 AM</time>
                                                    </small>
                                                </div>
                                                <p class="msg">
                                                    Lorem Ipsum is simply dumm dummy text of the printing and
                                                    typesetting industry.
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-body d-flex align-items-center">
                                            <div class="user mr-4">
                                                <span class="avatar"
                                                    style="background-image: url('https://ui-avatars.com/api/?name=Serge+Nono&background=C9F6FB&color=23B0C3&font-size=0.30');"></span>
                                            </div>
                                            <div class="message content">
                                                <div class="media-heading">
                                                    <a href="mail-single.html" class="m-r-10">Serge Nono</a>
                                                    <small class="float-right text-muted">
                                                        <time class="hidden-sm-down" datetime="2017">12:35 AM</time>
                                                    </small>
                                                </div>
                                                <p class="msg">
                                                    Lorem Ipsum is simply dumm dummy text of the printing and
                                                    typesetting industry.
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-body d-flex align-items-center">
                                            <div class="user mr-4">
                                                <span class="avatar"
                                                    style="background-image: url('https://ui-avatars.com/api/?name=Lewis+Tchinda&background=D7EDC7&color=61B820&font-size=0.30');"></span>
                                            </div>
                                            <div class="message content">
                                                <div class="media-heading">
                                                    <a href="mail-single.html" class="m-r-10">Lewis Tchinda</a>
                                                    <small class="float-right text-muted">
                                                        <time class="hidden-sm-down" datetime="2017">12:35 AM</time>
                                                    </small>
                                                </div>
                                                <p class="msg">
                                                    Lorem Ipsum is simply dumm dummy text of the printing and
                                                    typesetting industry.
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-body d-flex align-items-center">
                                            <div class="user mr-4">
                                                <span class="avatar"
                                                    style="background-image: url('https://ui-avatars.com/api/?name=Alima+Soso&background=CBD2F7&color=324CDE&font-size=0.30');"></span>
                                            </div>
                                            <div class="message content">
                                                <div class="media-heading">
                                                    <a href="mail-single.html" class="m-r-10">Alima Soso</a>
                                                    <small class="float-right text-muted">
                                                        <time class="hidden-sm-down" datetime="2017">12:35 AM</time>
                                                    </small>
                                                </div>
                                                <p class="msg">
                                                    Lorem Ipsum is simply dumm dummy text of the printing and
                                                    typesetting industry.
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-body d-flex align-items-center">
                                            <div class="user mr-4">
                                                <span class="avatar"
                                                    style="background-image: url('https://ui-avatars.com/api/?name=Jean+Gregoire&background=E6C6F7&color=9A1CDD&font-size=0.30');"></span>
                                            </div>
                                            <div class="message content">
                                                <div class="media-heading">
                                                    <a href="mail-single.html" class="m-r-10">Jean Gregoire</a>
                                                    <small class="float-right text-muted">
                                                        <time class="hidden-sm-down" datetime="2017">12:35 AM</time>
                                                    </small>
                                                </div>
                                                <p class="msg">
                                                    Lorem Ipsum is simply dumm dummy text of the printing and
                                                    typesetting industry.
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="cols-sm-0 col-md-7 col-lg-7 col-xl-7 p-0 message_inbox">
                            <div class="messages p-2">
                                <ul>
                                    <li class="sent">
                                        <p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!</p>
                                    </li>
                                    <li class="replies">
                                        <p>When you're backed against the wall, break the god damn thing down.</p>
                                    </li>
                                    <li class="replies">
                                        <p>Excuses don't win championships.</p>
                                    </li>
                                    <li class="sent">
                                        <p>Oh yeah, did Michael Jordan tell you that?</p>
                                    </li>
                                    <li class="replies">
                                        <p>No, I told him that.</p>
                                    </li>
                                    <li class="replies">
                                        <p>What are your choices when someone puts a gun to your head?</p>
                                    </li>
                                    <li class="sent">
                                        <p>What are you talking about? You do what they say or they shoot you.</p>
                                    </li>
                                    <li class="replies">
                                        <p>Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="pl-3 pr-3">
                                <div class="input-group input-group-flat">
                                    <input type="text" class="form-control">
                                    <span class="input-group-text">
                                        <a href="#" class="link-secondary" title="" data-toggle="tooltip" data-original-title="Clear search">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"/></svg>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<div class="modal-section">
    <div class="modal modal-blur fade" id="modal-create-message" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nouvelle discussion</h5>
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
                            <select class="form-select">
                                <option value="" selected disabled>Selectionnez un utilisateur</option>
                                @foreach (App\Message::getRecipients() as $emp)
                                <option value={{$emp->user->id}}> {{$emp->user->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" name="example-textarea-input" rows="6"
                                placeholder="Saisissez le contenu votre message..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" style="width: 100%;" data-dismiss="modal">
                        Envoyer
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('styles')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href={{asset("template/assets/dist/css/chat.css")}} rel="stylesheet" />
    @endsection
