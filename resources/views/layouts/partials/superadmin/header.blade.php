        <header class="navbar navbar-expand-md navbar-dark navbar-bg-gradient navbar-overlap">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="{{ route('superadmin.dashboard') }}" class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pr-0 pr-md-3">
                    <img src="{{ asset('dashboard/static/logo-white.svg') }}" alt="easytrak" class="navbar-brand-image">
                </a>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-toggle="dropdown">
                            <span class="avatar"
                                style="background-image: url('https://ui-avatars.com/api/?name={{Auth::user()->name}}&background=FFFFFF&color=267FC9&font-size=0.30');">
                                <span class="badge bg-red"></span>
                            </span>
                            <div class="d-none d-xl-block pl-2">
                                <div>{{Auth::user()->name}}</div>
                                <div class="mt-1 small text-muted">
                                    Super Admin
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="./profile.html">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                    class="icon dropdown-item-icon">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M12 17c3.662 0 6.865 1.575 8.607 3.925l-1.842.871C17.347 20.116 14.847 19 12 19c-2.847 0-5.347 1.116-6.765 2.796l-1.841-.872C5.136 18.574 8.338 17 12 17zm0-15a5 5 0 0 1 5 5v3a5 5 0 0 1-4.783 4.995L12 15a5 5 0 0 1-5-5V7a5 5 0 0 1 4.783-4.995L12 2zm0 2a3 3 0 0 0-2.995 2.824L9 7v3a3 3 0 0 0 5.995.176L15 10V7a3 3 0 0 0-3-3z" />
                                </svg>
                                Mon profile
                            </a>
                            <a class="dropdown-item" href="./agenda.html">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M17 3h4a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h4V1h2v2h6V1h2v2zm-2 2H9v2H7V5H4v4h16V5h-3v2h-2V5zm5 6H4v8h16v-8z"/></svg>
                                Agenda
                            </a>
                            <a class="dropdown-item" href="./notifications.html">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M5 18h14v-6.969C19 7.148 15.866 4 12 4s-7 3.148-7 7.031V18zm7-16c4.97 0 9 4.043 9 9.031V20H3v-8.969C3 6.043 7.03 2 12 2zM9.5 21h5a2.5 2.5 0 1 1-5 0z"/></svg>
                                Notifications
                            </a>
                            <a class="dropdown-item" href="./chat.html">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M10 3h4a8 8 0 1 1 0 16v3.5c-5-2-12-5-12-11.5a8 8 0 0 1 8-8zm2 14h2a6 6 0 1 0 0-12h-4a6 6 0 0 0-6 6c0 3.61 2.462 5.966 8 8.48V17z"/></svg>
                                Chat
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
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                    class="icon dropdown-item-icon">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M4 18h2v2h12V4H6v2H4V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3zm2-7h7v2H6v3l-5-4 5-4v3z" />
                                </svg>
                                Se déconnecter</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="./index.html">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><svg
                                            xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Accueil
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./users.html">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 11a5 5 0 0 1 5 5v6h-2v-6a3 3 0 0 0-2.824-2.995L12 13a3 3 0 0 0-2.995 2.824L9 16v6H7v-6a5 5 0 0 1 5-5zm-6.5 3c.279 0 .55.033.81.094a5.947 5.947 0 0 0-.301 1.575L6 16v.086a1.492 1.492 0 0 0-.356-.08L5.5 16a1.5 1.5 0 0 0-1.493 1.356L4 17.5V22H2v-4.5A3.5 3.5 0 0 1 5.5 14zm13 0a3.5 3.5 0 0 1 3.5 3.5V22h-2v-4.5a1.5 1.5 0 0 0-1.356-1.493L18.5 16c-.175 0-.343.03-.5.085V16c0-.666-.108-1.306-.309-1.904.259-.063.53-.096.809-.096zm-13-6a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zm13 0a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zm-13 2a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1zm13 0a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1zM12 2a4 4 0 1 1 0 8 4 4 0 0 1 0-8zm0 2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" fill="rgba(255,255,255,0.8)"/></svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Clients
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./snacks.html">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M21 13.242V20h1v2H2v-2h1v-6.758A4.496 4.496 0 0 1 1 9.5c0-.827.224-1.624.633-2.303L4.345 2.5a1 1 0 0 1 .866-.5H18.79a1 1 0 0 1 .866.5l2.702 4.682A4.496 4.496 0 0 1 21 13.242zm-2 .73a4.496 4.496 0 0 1-3.75-1.36A4.496 4.496 0 0 1 12 14.001a4.496 4.496 0 0 1-3.25-1.387A4.496 4.496 0 0 1 5 13.973V20h14v-6.027zM5.789 4L3.356 8.213a2.5 2.5 0 0 0 4.466 2.216c.335-.837 1.52-.837 1.856 0a2.5 2.5 0 0 0 4.644 0c.335-.837 1.52-.837 1.856 0a2.5 2.5 0 1 0 4.457-2.232L18.21 4H5.79z" fill="rgba(255,255,255,0.8)"/></svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Snacks
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./console.html">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M13 21V11h8v10h-8zM3 13V3h8v10H3zm6-2V5H5v6h4zM3 21v-6h8v6H3zm2-2h4v-2H5v2zm10 0h4v-6h-4v6zM13 3h8v6h-8V3zm2 2v2h4V5h-4z" fill="rgba(255,255,255,0.8)"/></svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Console
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#navbar-layout" data-toggle="dropdown"
                                    role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M6.75 2.5A4.25 4.25 0 0 1 11 6.75V11H6.75a4.25 4.25 0 1 1 0-8.5zM9 9V6.75A2.25 2.25 0 1 0 6.75 9H9zm-2.25 4H11v4.25A4.25 4.25 0 1 1 6.75 13zm0 2A2.25 2.25 0 1 0 9 17.25V15H6.75zm10.5-12.5a4.25 4.25 0 1 1 0 8.5H13V6.75a4.25 4.25 0 0 1 4.25-4.25zm0 6.5A2.25 2.25 0 1 0 15 6.75V9h2.25zM13 13h4.25A4.25 4.25 0 1 1 13 17.25V13zm2 2v2.25A2.25 2.25 0 1 0 17.25 15H15z" fill="rgba(255,255,255,0.8)"/></svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Applications
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="active">
                                        <a class="dropdown-item" href="./chat.html">
                                            Chat
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="./agenda.html">
                                            Agenda
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <div
                            class="ml-md-auto pl-md-4 py-2 py-md-0 mr-md-4 order-first order-md-last flex-grow-1 flex-md-grow-0">
                            <form action="." method="get">
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <circle cx="10" cy="10" r="7" />
                                            <line x1="21" y1="21" x2="15" y2="15" /></svg>
                                    </span>
                                    <input type="text" class="form-control form-control-rounded form-control-dark"
                                        placeholder="Search…">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>