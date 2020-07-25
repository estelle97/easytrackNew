@foreach (Auth::user()->companies()->first()->sites()->get() as $site)
    
    <?php 
        $employees = $site->employees()->whereHas('user', function($query) use($text){
            $query->where('name','like','%'.$text.'%')
                    ->orWhere('email','like','%'.$text.'%')
                    ->orWhere('username','like','%'.$text.'%');
        })->get()
    ?>
    
    @foreach ($employees as $emp)
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row row-sm align-items-center">
                        <div class="col-auto">
                                <span class="avatar avatar-md"  style="background-image: url('https://ui-avatars.com/api/?name={{$emp->user->name}}')"> </span>
                        </div>
                        <div class="col">
                            <h3 class="mb-0">
                                <a href={{route('admin.user.show', $emp->user->username)}}> {{$emp->user->name}} </a>
                            </h3>
                            <div class="text-muted text-h5">
                               {{$emp->user->role->name}}
                            </div>
                        </div>
                        <div class="col-auto lh-1 align-self-start">
                            <span class="badge bg-info">
                                {{$emp->site->name}}
                            </span>
                        </div>
                    </div>
                    <div class="row align-items-center mt-4">
                        <div class="col">
                            <div>
                                <div class="d-flex mb-1 align-items-center lh-1">
                                    <div class="text-h5 font-weight-bolder m-0">
                                        Temps de travail
                                    </div>
                                    <span class="ml-auto text-h6 strong">84%</span>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-blue" style="width: 84%;" role="progressbar"
                                        aria-valuenow="84" aria-valuemin="0" aria-valuemax="100">
                                        <span class="sr-only">84% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="btn-list">
                                <a href={{route('admin.user.show', $emp->user->username)}} class="btn btn-white btn-sm">
                                    Gérer
                                </a>
                                <a class="btn btn-white btn-sm" data-toggle="modal"
                                    data-target="#modal-delete-user">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="13"
                                        height="15">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M7 4V2h10v2h5v2h-2v15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6H2V4h5zM6 6v14h12V6H6zm3 3h2v8H9V9zm4 0h2v8h-2V9z"
                                            fill="rgba(0,0,0,1)" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endforeach