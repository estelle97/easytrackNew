<div class="navbar-nav flex-row order-md-last">
    <div class="nav-item dropdown">
        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-toggle="dropdown">
            <span class="avatar"
        style="background-image: url('https://ui-avatars.com/api/?name={{Auth::user()->name}}&background=FFFFFF&color=267FC9&font-size=0.30');">
                <span class="badge bg-green"></span>
            </span>
            <div class="d-none d-xl-block pl-2">
            <div> {{Auth::user()->name}} </div>
                <div class="mt-1 small text-muted">
                    Super Admin
                </div>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href={{route('easytrack.profile')}}>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                    class="icon dropdown-item-icon">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M12 17c3.662 0 6.865 1.575 8.607 3.925l-1.842.871C17.347 20.116 14.847 19 12 19c-2.847 0-5.347 1.116-6.765 2.796l-1.841-.872C5.136 18.574 8.338 17 12 17zm0-15a5 5 0 0 1 5 5v3a5 5 0 0 1-4.783 4.995L12 15a5 5 0 0 1-5-5V7a5 5 0 0 1 4.783-4.995L12 2zm0 2a3 3 0 0 0-2.995 2.824L9 7v3a3 3 0 0 0 5.995.176L15 10V7a3 3 0 0 0-3-3z" />
                </svg>
                Mon profile
            </a>
            {{-- <a class="dropdown-item" href="./agenda.html">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                    class="icon dropdown-item-icon">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M17 3h4a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h4V1h2v2h6V1h2v2zm-2 2H9v2H7V5H4v4h16V5h-3v2h-2V5zm5 6H4v8h16v-8z" />
                </svg>
                Agenda
            </a> --}}
            <a class="dropdown-item" href="./notifications.html">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                    class="icon dropdown-item-icon">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M5 18h14v-6.969C19 7.148 15.866 4 12 4s-7 3.148-7 7.031V18zm7-16c4.97 0 9 4.043 9 9.031V20H3v-8.969C3 6.043 7.03 2 12 2zM9.5 21h5a2.5 2.5 0 1 1-5 0z" />
                </svg>
                Notifications &nbsp;<span class="badge text-info"> 5 </span>
            </a>
            <a class="dropdown-item" href="./chat.html">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                    class="icon dropdown-item-icon">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M10 3h4a8 8 0 1 1 0 16v3.5c-5-2-12-5-12-11.5a8 8 0 0 1 8-8zm2 14h2a6 6 0 1 0 0-12h-4a6 6 0 0 0-6 6c0 3.61 2.462 5.966 8 8.48V17z" />
                </svg>
                Chat  &nbsp;<span class="badge text-info"> 5 </span>
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
