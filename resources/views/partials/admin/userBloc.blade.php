<div class="navbar-nav flex-row order-md-last">
    <div class="nav-item dropdown d-none d-md-flex mr-3">
        <a href="#" class="nav-link px-0" data-toggle="dropdown" tabindex="-1" aria-expanded="false">
            <span id="clock"></span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="ml-3">
                <path fill="none" d="M0 0h24v24H0z" />
                <path
                    d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 18c4.42 0 8-3.58 8-8s-3.58-8-8-8-8 3.58-8 8 3.58 8 8 8zm3.536-12.95l1.414 1.414-4.95 4.95L10.586 12l4.95-4.95z"
                    fill="rgba(255,255,255,1)" /></svg>
        </a>

        <div class="dropdown-menu notification-menu dropdown-menu-right dropdown-menu-card">
            <div class="card">
                <div class="progress card-progress">
                    <div class="progress-bar bg-gray" style="width: 45%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                      <span class="sr-only">45% Complete</span>
                    </div>
                  </div>
                <div class="card-body">
                    <div class="float-right">
                        <a href="{{route('admin.settings')}}">Voir les details</a>
                    </div>
                    <div class="text-gray font-weight-normal mt-0">Abonement</div>
                    <h3 class="h2 mt-2 mb-3" id="clock-full"> </h3>
                    <p class="mb-0 text-muted">
                        <span class="text-yellow d-inline-flex align-items-center lh-1">
                            {{Auth::user()->companies->first()->subscription()->percentage}}%
                        </span>
                        <span class="text-nowrap text-gray ml-6"> {{date('d-m-Y', strtotime(Auth::user()->companies->first()->types->last()->pivot->created_at))}} / {{date('d-m-Y', strtotime(Auth::user()->companies->first()->types->last()->pivot->end_date))}}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="nav-item d-none d-md-flex mr-2">
        <a href="{{route('chat')}}" class="nav-link px-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                <path fill="none" d="M0 0h24v24H0z" />
                <path
                    d="M10 3h4a8 8 0 1 1 0 16v3.5c-5-2-12-5-12-11.5a8 8 0 0 1 8-8zm2 14h2a6 6 0 1 0 0-12h-4a6 6 0 0 0-6 6c0 3.61 2.462 5.966 8 8.48V17z"
                    fill="rgba(255,255,255,1)" />
            </svg>
        </a>
    </div>

    <div class="nav-item dropdown d-none d-md-flex mr-3">
        <a href="#" class="nav-link px-0" data-toggle="dropdown" tabindex="-1" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                <path fill="none" d="M0 0h24v24H0z" />
                <path
                    d="M18 10a6 6 0 1 0-12 0v8h12v-8zm2 8.667l.4.533a.5.5 0 0 1-.4.8H4a.5.5 0 0 1-.4-.8l.4-.533V10a8 8 0 1 1 16 0v8.667zM9.5 21h5a2.5 2.5 0 1 1-5 0z"
                    fill="rgba(255,255,255,1)" /></svg>
            <span class="badge bg-red"></span>
        </a>
        <div class="dropdown-menu notification-menu dropdown-menu-right dropdown-menu-card">
            <div class="card">
                <div class="card-header pt-2 pb-2">
                    <div class="col-auto">
                        <h3 class="card-title">Notifications</h3>
                    </div>
                    <div class="col-auto ml-auto">
                        <a href="{{route('admin.notifications')}}">Voir plus</a>
                    </div>
                </div>
                <div id="notifications">

                </div>
            </div>
        </div>
    </div>
    <div class="nav-item dropdown">
        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-toggle="dropdown">
            <span class="avatar"
                style="background-image: url('https://ui-avatars.com/api/?name={{Auth::user()->name}}&background=FFFFFF&color=267FC9&font-size=0.30');">
                <span class="badge bg-green"></span>
            </span>
            <div class="d-none d-xl-block pl-2">
                <div> {{Auth::user()->name}} </div>
                <div class="mt-1 small text-muted">
                    Admin
                </div>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href={{route('admin.profile')}}>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                    class="icon dropdown-item-icon">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M12 17c3.662 0 6.865 1.575 8.607 3.925l-1.842.871C17.347 20.116 14.847 19 12 19c-2.847 0-5.347 1.116-6.765 2.796l-1.841-.872C5.136 18.574 8.338 17 12 17zm0-15a5 5 0 0 1 5 5v3a5 5 0 0 1-4.783 4.995L12 15a5 5 0 0 1-5-5V7a5 5 0 0 1 4.783-4.995L12 2zm0 2a3 3 0 0 0-2.995 2.824L9 7v3a3 3 0 0 0 5.995.176L15 10V7a3 3 0 0 0-3-3z" />
                </svg>
                Mon Profile
            </a>
            <a class="dropdown-item" href="{{route('admin.team')}}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M17 3h4a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h4V1h2v2h6V1h2v2zm3 8H4v8h16v-8zm-5-6H9v2H7V5H4v4h16V5h-3v2h-2V5zm-9 8h2v2H6v-2zm5 0h2v2h-2v-2zm5 0h2v2h-2v-2z"/></svg>
                Agenda
            </a>
            <a class="dropdown-item" href="{{route('admin.settings')}}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 1l9.5 5.5v11L12 23l-9.5-5.5v-11L12 1zm0 2.311L4.5 7.653v8.694l7.5 4.342 7.5-4.342V7.653L12 3.311zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                Paramètres
            </a>
            <a class="dropdown-item" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                    class="icon dropdown-item-icon">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-1-5h2v2h-2v-2zm2-1.645V14h-2v-1.5a1 1 0 0 1 1-1 1.5 1.5 0 1 0-1.471-1.794l-1.962-.393A3.501 3.501 0 1 1 13 13.355z" />
                </svg>
                Aide
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href={{route('logout')}}>
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
