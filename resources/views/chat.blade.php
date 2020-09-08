@extends('layouts.base')

@section('content')
<!-- Page title -->
<div class="page-header text-white">
    <div class="row align-items-center">
        <div class="col-auto">
            <h2 class="page-title">
                Chat
            </h2>
            <span class="order-global-date text-white h4 mt-2 text-capitalize"></span>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ml-auto d-print-none">
            <div class="d-flex align-items-center">
                <a href="#" class="text-white button-click-action mb-0" data-toggle="modal" data-target="#modal-create-message">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path
                            d="M14 3v2H4v13.385L5.763 17H20v-7h2v8a1 1 0 0 1-1 1H6.455L2 22.5V4a1 1 0 0 1 1-1h11zm5 0V0h2v3h3v2h-3v3h-2V5h-3V3h3z"
                            fill="rgba(255,255,255,1)" /></svg>
                    <span class="h2 align-middle button-click-action mb-0">Nouveau</span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row row-deck row-cards">
    <div class="col-lg-12">
        <div class="card">
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
            <div class="container">
                <section class="content inbox">
                    <div class="container-fluid">
                        <div class="row clearfix">
                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <ul class="mail_list list-group list-unstyled">
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-body d-flex align-items-center">
                                                <div class="user mr-4">
                                                    <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?name=Estelle+Belinga&background=E4E4E4&color=919191&font-size=0.30');"></span>
                                                </div>
                                                <div class="message content">
                                                    <div class="media-heading">
                                                        <a href="mail-single.html" class="m-r-10">Estelle Beligan</a>
                                                        <small class="float-right text-muted">
                                                            <time class="hidden-sm-down" datetime="2017">12:35 AM</time>
                                                        </small>
                                                    </div>
                                                    <p class="msg">
                                                        Lorem Ipsum is simply dumm dummy text of the printing and typesetting industry.
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-body d-flex align-items-center">
                                                <div class="user mr-4">
                                                    <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?name=Nana+Boligo&background=E4E4E4&color=919191&font-size=0.30');"></span>
                                                </div>
                                                <div class="message content">
                                                    <div class="media-heading">
                                                        <a href="mail-single.html" class="m-r-10">Nana bolingo</a>
                                                        <small class="float-right text-muted">
                                                            <time class="hidden-sm-down" datetime="2017">12:35 AM</time>
                                                        </small>
                                                    </div>
                                                    <p class="msg">
                                                        Lorem Ipsum is simply dumm dummy text of the printing and typesetting industry.
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-body d-flex align-items-center">
                                                <div class="user mr-4">
                                                    <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?name=Steve+Wiltek&background=E4E4E4&color=919191&font-size=0.30');"></span>
                                                </div>
                                                <div class="message content">
                                                    <div class="media-heading">
                                                        <a href="mail-single.html" class="m-r-10">Steve Wiltek</a>
                                                        <small class="float-right text-muted">
                                                            <time class="hidden-sm-down" datetime="2017">12:35 AM</time>
                                                        </small>
                                                    </div>
                                                    <p class="msg">
                                                        Lorem Ipsum is simply dumm dummy text of the printing and typesetting industry.
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-body d-flex align-items-center">
                                                <div class="user mr-4">
                                                    <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?name=Stephane+Tsana&background=E4E4E4&color=919191&font-size=0.30');"></span>
                                                </div>
                                                <div class="message content">
                                                    <div class="media-heading">
                                                        <a href="mail-single.html" class="m-r-10">Stephane Tsana</a>
                                                        <small class="float-right text-muted">
                                                            <time class="hidden-sm-down" datetime="2017">12:35 AM</time>
                                                        </small>
                                                    </div>
                                                    <p class="msg">
                                                        Lorem Ipsum is simply dumm dummy text of the printing and typesetting industry.
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-body d-flex align-items-center">
                                                <div class="user mr-4">
                                                    <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?name=Alger+Diana&background=E4E4E4&color=919191&font-size=0.30');"></span>
                                                </div>
                                                <div class="message content">
                                                    <div class="media-heading">
                                                        <a href="mail-single.html" class="m-r-10">Alger Diana</a>
                                                        <small class="float-right text-muted">
                                                            <time class="hidden-sm-down" datetime="2017">12:35 AM</time>
                                                        </small>
                                                    </div>
                                                    <p class="msg">
                                                        Lorem Ipsum is simply dumm dummy text of the printing and typesetting industry.
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-body d-flex align-items-center">
                                                <div class="user mr-4">
                                                    <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?name=Ange+Rodrigue&background=E4E4E4&color=919191&font-size=0.30');"></span>
                                                </div>
                                                <div class="message content">
                                                    <div class="media-heading">
                                                        <a href="mail-single.html" class="m-r-10">Ange Rodrigue</a>
                                                        <small class="float-right text-muted">
                                                            <time class="hidden-sm-down" datetime="2017">12:35 AM</time>
                                                        </small>
                                                    </div>
                                                    <p class="msg">
                                                        Lorem Ipsum is simply dumm dummy text of the printing and typesetting industry.
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-body d-flex align-items-center">
                                                <div class="user mr-4">
                                                    <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?name=Estelle+Belinga&background=E4E4E4&color=919191&font-size=0.30');"></span>
                                                </div>
                                                <div class="message content">
                                                    <div class="media-heading">
                                                        <a href="mail-single.html" class="m-r-10">Velit a labore</a>
                                                        <small class="float-right text-muted">
                                                            <time class="hidden-sm-down" datetime="2017">12:35 AM</time>
                                                        </small>
                                                    </div>
                                                    <p class="msg">
                                                        Lorem Ipsum is simply dumm dummy text of the printing and typesetting industry.
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-body d-flex align-items-center">
                                                <div class="user mr-4">
                                                    <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?name=Henry+Fotso&background=E4E4E4&color=919191&font-size=0.30');"></span>
                                                </div>
                                                <div class="message content">
                                                    <div class="media-heading">
                                                        <a href="mail-single.html" class="m-r-10">Yvant Tatsi</a>
                                                        <small class="float-right text-muted">
                                                            <time class="hidden-sm-down" datetime="2017">12:35 AM</time>
                                                        </small>
                                                    </div>
                                                    <p class="msg">
                                                        Lorem Ipsum is simply dumm dummy text of the printing and typesetting industry.
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<div class="modal-section">
    <div class="modal modal-blur fade" id="modal-create-message" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nouveau message</h5>
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
                    <div class="row align-items-end">
                        <div class="col-lg-12 mb-4">
                            <select class="form-select">
                                <option value="" selected disabled>Selectionnez un utilisateur</option>
                                <option value="1">Estelle Belinga</option>
                                <option value="2">Steve Wiltek</option>
                                <option value="3">Stephane Tsana</option>
                            </select>
                          </div>
                        <div class="col-lg-12">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" name="example-textarea-input" rows="6" placeholder="Saisissez le contenu votre message..."></textarea>
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
