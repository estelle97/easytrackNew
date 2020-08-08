<div class="collapse navbar-collapse" id="navbar-menu">
    <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href={{route('admin.dashboard')}}>
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                            height="24" class="icon">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M21 20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.49a1 1 0 0 1 .386-.79l8-6.222a1 1 0 0 1 1.228 0l8 6.222a1 1 0 0 1 .386.79V20zm-2-1V9.978l-7-5.444-7 5.444V19h14z"
                                fill="rgba(255,255,255,0.8)" /></svg>
                    </span>
                    <span class="nav-link-title">
                        Accueil
                    </span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-layout" data-toggle="dropdown"
                    role="button" aria-expanded="false">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                            height="24" class="icon">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M6.5 2h11a1 1 0 0 1 .8.4L21 6v15a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6l2.7-3.6a1 1 0 0 1 .8-.4zM19 8H5v12h14V8zm-.5-2L17 4H7L5.5 6h13zM9 10v2a3 3 0 0 0 6 0v-2h2v2a5 5 0 0 1-10 0v-2h2z"
                                fill="rgba(255,255,255,0.8)" />
                        </svg>
                    </span>
                    <span class="nav-link-title">
                        Sites
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="active">
                        <a class="dropdown-item" href={{route('admin.products')}}>
                            Produits
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/admin/suppliers">
                            Fournisseurs
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href={{route('admin.sites')}}>
                            Gérer Sites
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-layout" data-toggle="dropdown"
                    role="button" aria-expanded="false">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                            height="24" class="icon">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M4 16V4H2V2h3a1 1 0 0 1 1 1v12h12.438l2-8H8V5h13.72a1 1 0 0 1 .97 1.243l-2.5 10a1 1 0 0 1-.97.757H5a1 1 0 0 1-1-1zm2 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm12 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"
                                fill="rgba(255,255,255,0.8)" />
                        </svg>
                    </span>
                    <span class="nav-link-title">
                        Commandes
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href={{route('admin.purchases')}}>
                            Commande fournisseur
                        </a>
                    </li>
                    <li class="active">
                        <a class="dropdown-item" href={{route('admin.sales.pos')}}>
                            Enregistrer commande clien
                        </a>
                    </li><li class="active">
                        <a class="dropdown-item" href={{route('admin.sales.all')}}>
                            Afficher commandes clients
                        </a>
                    </li><li class="active">
                        <a class="dropdown-item" href={{route('admin.sales.kanban')}}>
                            Kanban Board
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./invoices.html">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                            height="24" class="icon">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9z"
                                fill="rgba(255,255,255,0.8)" />
                        </svg>
                    </span>
                    <span class="nav-link-title">
                        Facturations
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{route('admin.company.users')}}>
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                            height="24" class="icon">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M2 22a8 8 0 1 1 16 0h-2a6 6 0 1 0-12 0H2zm8-9c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm8.284 3.703A8.002 8.002 0 0 1 23 22h-2a6.001 6.001 0 0 0-3.537-5.473l.82-1.824zm-.688-11.29A5.5 5.5 0 0 1 21 8.5a5.499 5.499 0 0 1-5 5.478v-2.013a3.5 3.5 0 0 0 1.041-6.609l.555-1.943z"
                                fill="rgba(255,255,255,0.8)" />
                        </svg>
                    </span>
                    <span class="nav-link-title">
                        Utilisateurs
                    </span>
                </a>
            </li>
        </ul>

        @yield('search-form')
    </div>
</div>
