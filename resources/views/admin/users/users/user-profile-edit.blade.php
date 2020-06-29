@extends('layouts.mainlayoutAdmin')
@push('css')
    
@endpush
@section('content')

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
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                        class="mr-2">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M20 22h-2v-2a3 3 0 0 0-3-3H9a3 3 0 0 0-3 3v2H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"
                                            fill="rgba(255,255,255,1)" /></svg>
                                    Vue d'ensemble
                                </a>

                                <a href="./user-profile-edit.html" class="d-flex align-items-center text-white mr-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                        class="mr-2">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z"
                                            fill="rgba(255,255,255,1)" /></svg>
                                    Éditer
                                </a>

                                <a href="./user-profile-settings.html" class="d-flex align-items-center text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                        class="mr-2">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M3.34 17a10.018 10.018 0 0 1-.978-2.326 3 3 0 0 0 .002-5.347A9.99 9.99 0 0 1 4.865 4.99a3 3 0 0 0 4.631-2.674 9.99 9.99 0 0 1 5.007.002 3 3 0 0 0 4.632 2.672c.579.59 1.093 1.261 1.525 2.01.433.749.757 1.53.978 2.326a3 3 0 0 0-.002 5.347 9.99 9.99 0 0 1-2.501 4.337 3 3 0 0 0-4.631 2.674 9.99 9.99 0 0 1-5.007-.002 3 3 0 0 0-4.632-2.672A10.018 10.018 0 0 1 3.34 17zm5.66.196a4.993 4.993 0 0 1 2.25 2.77c.499.047 1 .048 1.499.001A4.993 4.993 0 0 1 15 17.197a4.993 4.993 0 0 1 3.525-.565c.29-.408.54-.843.748-1.298A4.993 4.993 0 0 1 18 12c0-1.26.47-2.437 1.273-3.334a8.126 8.126 0 0 0-.75-1.298A4.993 4.993 0 0 1 15 6.804a4.993 4.993 0 0 1-2.25-2.77c-.499-.047-1-.048-1.499-.001A4.993 4.993 0 0 1 9 6.803a4.993 4.993 0 0 1-3.525.565 7.99 7.99 0 0 0-.748 1.298A4.993 4.993 0 0 1 6 12c0 1.26-.47 2.437-1.273 3.334a8.126 8.126 0 0 0 .75 1.298A4.993 4.993 0 0 1 9 17.196zM12 15a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0-2a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"
                                            fill="rgba(255,255,255,1)" /></svg>
                                    Paramètres
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card col-lg-3 px-3 py-0"
                        style="max-height: 200px; border:none; box-shadow: none; background-color: transparent;">
                        <a href="#">
                            <img class="card-img-top" src="https://picsum.photos/id/700/400" alt="Profile picture">
                        </a>
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex align-items-center mt-auto">
                                <div class="ml-2">
                                    <a href="#" class="text-body">{{$lims_user_data->name}}</a>
                                    @if($user->isOnline())
                                        <small class="d-block text-muted">Online</small>
                                    @else
                                        <small class="d-block text-muted">Offline</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">

                        <div class="card">
                            <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
                                <li class="nav-item">
                                    <a href="#tabs-home-ex6" class="nav-link active" data-toggle="tab">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="15"
                                            height="15" class="mr-2">
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path
                                                d="M19 21H5a1 1 0 0 1-1-1v-9H1l10.327-9.388a1 1 0 0 1 1.346 0L23 11h-3v9a1 1 0 0 1-1 1zm-6-2h5V9.157l-6-5.454-6 5.454V19h5v-6h2v6z" />
                                        </svg>
                                        Profile</a>
                                </li>
                                <li class="nav-item ml-auto">
                                    <a href="#tabs-settings-ex6" class="nav-link" title="Settings" data-toggle="tab">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18"
                                            height="18">
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path
                                                d="M8.686 4l2.607-2.607a1 1 0 0 1 1.414 0L15.314 4H19a1 1 0 0 1 1 1v3.686l2.607 2.607a1 1 0 0 1 0 1.414L20 15.314V19a1 1 0 0 1-1 1h-3.686l-2.607 2.607a1 1 0 0 1-1.414 0L8.686 20H5a1 1 0 0 1-1-1v-3.686l-2.607-2.607a1 1 0 0 1 0-1.414L4 8.686V5a1 1 0 0 1 1-1h3.686zM6 6v3.515L3.515 12 6 14.485V18h3.515L12 20.485 14.485 18H18v-3.515L20.485 12 18 9.515V6h-3.515L12 3.515 9.515 6H6zm6 10a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="tabs-home-ex6">
                                    
                                        <form class="row" method="POST" action="{{ route('admin.user.update', $lims_user_data->id) }}">
                                        @csrf
                                        @method('PUT')
                                            <div class="col-md-5">
                                                <div class="mb-2">
                                                    <label class="form-label">Company</label>
                                                    <input type="text" value="" class="form-control form-control-rounded"
                                                         disabled="" placeholder="Company">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="mb-2">
                                                    <label class="form-label">Nom d'utilisateur</label>
                                                    <input type="text" name="username" value="{{$lims_user_data->username}}" class="form-control form-control-rounded"
                                                        placeholder="Saisisez votre nom d'utilisateur">
                                                    @if($errors->has('username'))
                                                        <span>
                                                            <strong>{{ $errors->first('username') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="mb-2">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" name="email" value="{{$lims_user_data->email}}" class="form-control form-control-rounded"
                                                        placeholder="Email">
                                                    @if($errors->has('email'))
                                                        <span>
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="mb-2">
                                                    <label class="form-label">Nom complet</label>
                                                    <input type="text" name="name" value="{{$lims_user_data->name}}" class="form-control form-control-rounded"
                                                        placeholder="Saisissez votre nom">
                                                    @if($errors->has('name'))
                                                        <span>
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label class="form-label">Addresse</label>
                                                    <input type="text" name="address" value="{{$lims_user_data->address}}" class="form-control form-control-rounded"
                                                        placeholder="Saisisez votre adresse">
                                                    @if($errors->has('address'))
                                                        <span>
                                                            <strong>{{ $errors->first('address') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-2 mb-0">
                                                    <label class="form-label">A Propos</label>
                                                    <textarea rows="5" class="form-control"
                                                        placeholder="Here can be your description">Oh so, your weak rhyme You doubt I'll bother, reading into itI'll probably won't, left to my own devices But that's the difference in our opinions.
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary btn-pill">Mettre à jour</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="tabs-settings-ex6">
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-section">
        <div class="modal modal-blur fade" id="modal-save-profile" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <div class="text-muted">Nous avons sauvegarder les changements effectuer sur le profil de
                            l'utilisateur<div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

@endsection
@push('js')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@endpush