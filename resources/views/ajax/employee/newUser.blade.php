<div id="employee{{$emp->user->id}}" class="col-md-6 col-lg-3">
    <div class="card">
        <div class="card-body">
            <div class="row row-sm align-items-center">
                <div class="col-auto">
                        @if ($emp->user->photo)
                            <span class="avatar avatar-md"  style="background-image: url('{{asset($emp->user->photo)}}')"> </span>
                        @else
                            <span class="avatar avatar-md"  style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name={{$emp->user->name}}')"> </span>
                        @endif
                </div>
                <div class="col-auto">

                </div>
                <div class="col">
                    <h3 class="mb-0">
                        <a href={{route('admin.user.show', $emp->user->username)}}> {{$emp->user->name}} </a>
                    </h3>
                    <div class="text-muted text-h4">
                    {{$emp->user->role->name}}
                    </div>
                </div>
            </div>
            <div class="row align-items-center  mt-4">
                <div class="col">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mr-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="12" cy="11" r="3"></circle><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 0 1 -2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0z"></path></svg>
                        {{$emp->site->name}}
                    </div>
                </div>
                <div class="col-auto card-actions">
                    <span class="dropdown button-click-action">
                        <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                    height="20">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M12 3c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 14c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-7c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                                </svg>
                        </div>

                        <div class="dropdown-menu dropdown-menu-right">
                            <span class="dropdown-header">Actions</span>
                            <a class="dropdown-item" href="{{route('admin.user.show', $emp->user->username)}}">
                                Gérer l'employé
                            </a>
                            <a class="dropdown-item" href="#">
                                Envoyer un message
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal"
                                data-target="#modal-delete-user{{$emp->user->id}}">
                                Supprimer
                            </a>
                        </div>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
