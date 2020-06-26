@extends('layouts.mainlayoutAdmin')

@section('content')

        <div class="content">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header text-white">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <h2 class="page-title">
                                <a href="#" class="mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M7.828 11H20v2H7.828l5.364 5.364-1.414 1.414L4 12l7.778-7.778 1.414 1.414z"
                                            fill="rgba(255,255,255,1)" /></svg>
                                </a>
                                Gestion de l'utilisateur
                            </h2>
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
                                    <a href="#" class="text-body">Paweł Kuna</a>
                                    <small class="d-block text-muted">Online</small>
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
                                    
                                        <form class="row" method="POST" action="{{ route('admin.user.profileUpdate', ['id'=>Auth::id()]) }}">
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

@endsection