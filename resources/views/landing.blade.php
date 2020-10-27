<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Easytrak - Application pour la gestion de stock</title>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <meta name="msapplication-TileColor" content="#206bc4" />
    <meta name="theme-color" content="#206bc4" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="MobileOptimized" content="320" />
    <meta name="robots" content="noindex,nofollow,noarchive" />
    <link rel="icon" href={{asset("template/assets/static/favicon.png")}} type="image/png" />
    <link rel="shortcut icon" href={{asset("template/assets/static/favicon.png")}} type="image/png" />
    <!-- Plugins CSS -->
    <link rel="stylesheet" href={{asset("template/assets/dist/libs/bootstrap-4.3.1/css/bootstrap.min.css")}}>
    <link rel="stylesheet" href={{asset("template/assets/dist/libs/fancybox-master/jquery.fancybox.min.css")}}>
    <link rel="stylesheet" href={{asset("template/assets/dist/libs/aos-animation/aos.css")}}>
    <!-- fonts -->
    <link rel="stylesheet" href={{asset("template/assets/dist/fonts/ep-icon-fonts/css/style.css")}}>
    <link rel="stylesheet" href={{asset("template/assets/dist/fonts/fontawesome-5/css/all.min.css")}}>
    <link rel="stylesheet" href={{asset("template/assets/dist/fonts/typography-font/typo-fonts.css")}}>
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href={{asset("template/assets/dist/css/landing.css")}}>
    <link rel="stylesheet" href={{asset("template/assets/dist/css/landing-settings.css")}}>
    <link rel="stylesheet" href={{asset("template/assets/dist/css/landing-custom.css")}}>
    <link rel="stylesheet" href="https://startbootstrap.github.io/startbootstrap-new-age/device-mockups/device-mockups.min.css">
</head>

<body>
    <div class="site-wrapper">
        <div class="preloader-wrap">
            <div class="berlin-cube-grid">
                <div class="berlin-cube berlin-cube1"></div>
                <div class="berlin-cube berlin-cube2"></div>
                <div class="berlin-cube berlin-cube3"></div>
                <div class="berlin-cube berlin-cube4"></div>
                <div class="berlin-cube berlin-cube5"></div>
                <div class="berlin-cube berlin-cube6"></div>
                <div class="berlin-cube berlin-cube7"></div>
                <div class="berlin-cube berlin-cube8"></div>
                <div class="berlin-cube berlin-cube9"></div>
            </div>
        </div>
        <!-- Header Starts -->
        <header class="site-header d-none d-lg-block">
            <div class="container-fluid pl-lg--35 pr-lg--35">
                <div class="row justify-content-between align-items-top position-relative">
                    <div class="col">
                        <!-- Brand Logo -->
                        <div class="brand-logo">
                            <a href=""><img src={{asset("template/assets/static/logo.svg")}} alt="" /></a>
                        </div>
                    </div>

                    <!-- Menu Block -->
                    <div class="col">
                        <div class="main-navigation ">
                            <ul class="main-menu">
                                <li class="menu-item"><a href="#home">Accueil</a></li>
                                <li class="menu-item"><a href="#mobile">Mobile</a></li>
                                <li class="menu-item"><a href="">Contact</a></li>
                            </ul>
                        </div>
                        <div class="mobile-menu"></div>
                    </div>

                    <!-- Profile menu -->
                    <div class="col">
                        <div class="header-btns">
                            @if (Auth::check())
                                <div class="profile-menu d-none d-flex flex-column text-reset">
                                    <div class="profile-info d-flex align-items-center justify-content-end">
                                        <span class="mr-3" style="color: #000;">
                                            <span class="greeting">Hi,</span> {{Auth::user()->name}}
                                        </span>
                                        <img src="https://ui-avatars.com/api/?name={{Auth::user()->name}}&background=E4E4E4&color=7D7D7D&font-size=0.30" alt="" style="height: 45px; width: 45px; border-radius: 100px;">
                                    </div>

                                    <div class="profile-sub-menu pt-2 d-flex flex-column">
                                        @if (Auth::user()->is_admin == 1)
                                            <a class="sub-menu-link" href="{{route('employee.dashboard')}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M21 20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.49a1 1 0 0 1 .386-.79l8-6.222a1 1 0 0 1 1.228 0l8 6.222a1 1 0 0 1 .386.79V20zm-2-1V9.978l-7-5.444-7 5.444V19h14z"/></svg>
                                                Tableau de bord
                                            </a>
                                            <a class="sub-menu-link" href="{{route('employee.notifications')}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M18 10a6 6 0 1 0-12 0v8h12v-8zm2 8.667l.4.533a.5.5 0 0 1-.4.8H4a.5.5 0 0 1-.4-.8l.4-.533V10a8 8 0 1 1 16 0v8.667zM9.5 21h5a2.5 2.5 0 1 1-5 0z"/></svg>
                                                Notifications
                                            </a>
                                            <a class="sub-menu-link" href="{{route('employee.profile')}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                    <path fill="none" d="M0 0h24v24H0z" />
                                                    <path
                                                        d="M12 17c3.662 0 6.865 1.575 8.607 3.925l-1.842.871C17.347 20.116 14.847 19 12 19c-2.847 0-5.347 1.116-6.765 2.796l-1.841-.872C5.136 18.574 8.338 17 12 17zm0-15a5 5 0 0 1 5 5v3a5 5 0 0 1-4.783 4.995L12 15a5 5 0 0 1-5-5V7a5 5 0 0 1 4.783-4.995L12 2zm0 2a3 3 0 0 0-2.995 2.824L9 7v3a3 3 0 0 0 5.995.176L15 10V7a3 3 0 0 0-3-3z" />
                                                </svg>
                                                Profle
                                            </a>
                                        @endif
                                        @if (Auth::user()->is_admin == 2)
                                            <a class="sub-menu-link" href="{{route('admin.dashboard')}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M21 20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.49a1 1 0 0 1 .386-.79l8-6.222a1 1 0 0 1 1.228 0l8 6.222a1 1 0 0 1 .386.79V20zm-2-1V9.978l-7-5.444-7 5.444V19h14z"/></svg>
                                                Tableau de bord
                                            </a>
                                            <a class="sub-menu-link" href="{{route('admin.notifications')}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M18 10a6 6 0 1 0-12 0v8h12v-8zm2 8.667l.4.533a.5.5 0 0 1-.4.8H4a.5.5 0 0 1-.4-.8l.4-.533V10a8 8 0 1 1 16 0v8.667zM9.5 21h5a2.5 2.5 0 1 1-5 0z"/></svg>
                                                Notifications
                                            </a>
                                            <a class="sub-menu-link" href="{{route('admin.profile')}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M20 22h-2v-2a3 3 0 0 0-3-3H9a3 3 0 0 0-3 3v2H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/></svg>
                                                Profle
                                            </a>
                                        @endif
                                        @if (Auth::user()->is_admin == 3)
                                            <a class="sub-menu-link" href="{{route('easytrack.dashboard')}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M21 20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.49a1 1 0 0 1 .386-.79l8-6.222a1 1 0 0 1 1.228 0l8 6.222a1 1 0 0 1 .386.79V20zm-2-1V9.978l-7-5.444-7 5.444V19h14z"/></svg>
                                                Tableau de bord
                                            </a>
                                            <a class="sub-menu-link" href="{{route('easytrack.profile')}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M20 22h-2v-2a3 3 0 0 0-3-3H9a3 3 0 0 0-3 3v2H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/></svg>
                                                Profle
                                            </a>
                                            <a class="sub-menu-link" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M7.253 18.494l.724.423A7.953 7.953 0 0 0 12 20a8 8 0 1 0-8-8c0 1.436.377 2.813 1.084 4.024l.422.724-.653 2.401 2.4-.655zM2.004 22l1.352-4.968A9.954 9.954 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.954 9.954 0 0 1-5.03-1.355L2.004 22zM8.391 7.308c.134-.01.269-.01.403-.004.054.004.108.01.162.016.159.018.334.115.393.249.298.676.588 1.357.868 2.04.062.152.025.347-.093.537a4.38 4.38 0 0 1-.263.372c-.113.145-.356.411-.356.411s-.099.118-.061.265c.014.056.06.137.102.205l.059.095c.256.427.6.86 1.02 1.268.12.116.237.235.363.346.468.413.998.75 1.57 1l.005.002c.085.037.128.057.252.11.062.026.126.049.191.066a.35.35 0 0 0 .367-.13c.724-.877.79-.934.796-.934v.002a.482.482 0 0 1 .378-.127c.06.004.121.015.177.04.531.243 1.4.622 1.4.622l.582.261c.098.047.187.158.19.265.004.067.01.175-.013.373-.032.259-.11.57-.188.733a1.155 1.155 0 0 1-.21.302 2.378 2.378 0 0 1-.33.288 3.71 3.71 0 0 1-.125.09 5.024 5.024 0 0 1-.383.22 1.99 1.99 0 0 1-.833.23c-.185.01-.37.024-.556.014-.008 0-.568-.087-.568-.087a9.448 9.448 0 0 1-3.84-2.046c-.226-.199-.435-.413-.649-.626-.89-.885-1.562-1.84-1.97-2.742A3.47 3.47 0 0 1 6.9 9.62a2.729 2.729 0 0 1 .564-1.68c.073-.094.142-.192.261-.305.127-.12.207-.184.294-.228a.961.961 0 0 1 .371-.1z"/></svg>
                                                Asssitance technique
                                            </a>
                                        @endif
                                        <hr class="mt-3 mb-3">
                                        <a class="sub-menu-link" href="{{route('logout')}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M5 22a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v3h-2V4H6v16h12v-2h2v3a1 1 0 0 1-1 1H5zm13-6v-3h-7v-2h7V8l5 4-5 4z"/></svg>
                                            Se déconnecter
                                        </a>
                                    </div>
                                </div>
                            @else
                                {{-- <a href="{{route('login')}}" class="btn btn--transparent "> Connexion </a>
                                <a href="{{route('register')}}" class="btn btn--primary hvr-shine">S'enregister</a> --}}
                                <a class="menu-link" style="color: #000;" href="{{route('register')}}">
                                    S'inscrire
                                </a>
                                <a class="menu-link ml-5" style="color: #000;" href="{{route('login')}}">
                                    Se Connecter
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="ml-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M14 14.252v2.09A6 6 0 0 0 6 22l-2-.001a8 8 0 0 1 10-7.748zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm7.418 6h3.586v2h-3.586l1.829 1.828-1.414 1.415L15.59 18l4.243-4.243 1.414 1.415L19.418 17z"/></svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Mobile menu Header Starts -->
        <header class="mobile-header d-lg-none">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4 col-7">
                        <a href="/" class="site-brand">
                            <img src={{asset("template/assets/static/logo.svg")}} alt="">
                        </a>
                    </div>
                    <div class="col-md-8 col-5 text-right">
                        <div class="header-top-widget">
                            <ul class="header-links">
                                <li class="single-link">
                                    <a href="#" class="link-icon hamburger-icon off-canvas-btn"><i
                                            class="icon icon-menu-34"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--Off Canvas Navigation Start-->
        <aside class="off-canvas-wrapper">
            <div class="btn-close-off-canvas">
                <i class="icon icon-simple-remove"></i>
            </div>
            <div class="off-canvas-inner">
                <!-- Header buttons start -->
                <div class="header-btns offcanvas">
                    <div class="header-btns">
                        <div class="profile-sub-menu pt-2 d-flex flex-column">
                            @if (Auth::check())
                                <span class="user-infos"><span class="greeting">Hi,</span> {{Auth::user()->name}}</span>
                                <a class="sub-menu-link" href="#home">Accueil</a>
                                <a class="sub-menu-link" href="#mobile">Mobile</a>
                                <a class="sub-menu-link" href="">Contact</a>
                                @if (Auth::user()->is_admin == 1)
                                    <a class="sub-menu-link" href="{{route('employee.dashboard')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M21 20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.49a1 1 0 0 1 .386-.79l8-6.222a1 1 0 0 1 1.228 0l8 6.222a1 1 0 0 1 .386.79V20zm-2-1V9.978l-7-5.444-7 5.444V19h14z"/></svg>
                                        Tableau de bord
                                    </a>
                                    <a class="sub-menu-link" href="{{route('employee.notifications')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M18 10a6 6 0 1 0-12 0v8h12v-8zm2 8.667l.4.533a.5.5 0 0 1-.4.8H4a.5.5 0 0 1-.4-.8l.4-.533V10a8 8 0 1 1 16 0v8.667zM9.5 21h5a2.5 2.5 0 1 1-5 0z"/></svg>
                                        Notifications
                                    </a>
                                    <a class="sub-menu-link" href="{{route('employee.profile')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M20 22h-2v-2a3 3 0 0 0-3-3H9a3 3 0 0 0-3 3v2H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/></svg>
                                        Profle
                                    </a>
                                @endif
                                @if (Auth::user()->is_admin == 2)
                                    <a class="sub-menu-link" href="{{route('admin.dashboard')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M21 20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.49a1 1 0 0 1 .386-.79l8-6.222a1 1 0 0 1 1.228 0l8 6.222a1 1 0 0 1 .386.79V20zm-2-1V9.978l-7-5.444-7 5.444V19h14z"/></svg>
                                        Tableau de bord
                                    </a>
                                    <a class="sub-menu-link" href="{{route('admin.notifications')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M18 10a6 6 0 1 0-12 0v8h12v-8zm2 8.667l.4.533a.5.5 0 0 1-.4.8H4a.5.5 0 0 1-.4-.8l.4-.533V10a8 8 0 1 1 16 0v8.667zM9.5 21h5a2.5 2.5 0 1 1-5 0z"/></svg>
                                        Notifications
                                    </a>
                                    <a class="sub-menu-link" href="{{route('admin.profile')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M20 22h-2v-2a3 3 0 0 0-3-3H9a3 3 0 0 0-3 3v2H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/></svg>
                                        Profle
                                    </a>
                                @endif
                                @if (Auth::user()->is_admin == 3)
                                    <a class="sub-menu-link" href="{{route('easytrack.dashboard')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M21 20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.49a1 1 0 0 1 .386-.79l8-6.222a1 1 0 0 1 1.228 0l8 6.222a1 1 0 0 1 .386.79V20zm-2-1V9.978l-7-5.444-7 5.444V19h14z"/></svg>
                                        Tableau de bord
                                    </a>
                                    <a class="sub-menu-link" href="{{route('easytrack.profile')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon dropdown-item-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M20 22h-2v-2a3 3 0 0 0-3-3H9a3 3 0 0 0-3 3v2H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/></svg>
                                        Profle
                                    </a>
                                    <a class="sub-menu-link" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M7.253 18.494l.724.423A7.953 7.953 0 0 0 12 20a8 8 0 1 0-8-8c0 1.436.377 2.813 1.084 4.024l.422.724-.653 2.401 2.4-.655zM2.004 22l1.352-4.968A9.954 9.954 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.954 9.954 0 0 1-5.03-1.355L2.004 22zM8.391 7.308c.134-.01.269-.01.403-.004.054.004.108.01.162.016.159.018.334.115.393.249.298.676.588 1.357.868 2.04.062.152.025.347-.093.537a4.38 4.38 0 0 1-.263.372c-.113.145-.356.411-.356.411s-.099.118-.061.265c.014.056.06.137.102.205l.059.095c.256.427.6.86 1.02 1.268.12.116.237.235.363.346.468.413.998.75 1.57 1l.005.002c.085.037.128.057.252.11.062.026.126.049.191.066a.35.35 0 0 0 .367-.13c.724-.877.79-.934.796-.934v.002a.482.482 0 0 1 .378-.127c.06.004.121.015.177.04.531.243 1.4.622 1.4.622l.582.261c.098.047.187.158.19.265.004.067.01.175-.013.373-.032.259-.11.57-.188.733a1.155 1.155 0 0 1-.21.302 2.378 2.378 0 0 1-.33.288 3.71 3.71 0 0 1-.125.09 5.024 5.024 0 0 1-.383.22 1.99 1.99 0 0 1-.833.23c-.185.01-.37.024-.556.014-.008 0-.568-.087-.568-.087a9.448 9.448 0 0 1-3.84-2.046c-.226-.199-.435-.413-.649-.626-.89-.885-1.562-1.84-1.97-2.742A3.47 3.47 0 0 1 6.9 9.62a2.729 2.729 0 0 1 .564-1.68c.073-.094.142-.192.261-.305.127-.12.207-.184.294-.228a.961.961 0 0 1 .371-.1z"/></svg>
                                        Asssitance technique
                                    </a>
                                @endif
                                <hr class="mt-2 mb-2">
                                <a class="sub-menu-link" href="{{route('logout')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M5 22a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v3h-2V4H6v16h12v-2h2v3a1 1 0 0 1-1 1H5zm13-6v-3h-7v-2h7V8l5 4-5 4z"/></svg>
                                    Se déconnecter
                                </a>
                            @else
                                <a class="sub-menu-link" href="#home">Accueil</a>
                                <a class="sub-menu-link" href="#mobile">Mobile</a>
                                <a class="sub-menu-link mb-4" href="">Contact</a>
                                <a class="sub-menu-link" href="{{route('login')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M6 8V7a6 6 0 1 1 12 0v1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h2zm13 2H5v10h14V10zm-8 5.732a2 2 0 1 1 2 0V18h-2v-2.268zM8 8h8V7a4 4 0 1 0-8 0v1z"/></svg>
                                    Se connecter
                                </a>
                                <a class="sub-menu-link" href="{{route('register')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M14 14.252v2.09A6 6 0 0 0 6 22l-2-.001a8 8 0 0 1 10-7.748zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm6.586 6l-1.829-1.828 1.415-1.415L22.414 18l-4.242 4.243-1.415-1.415L18.586 19H15v-2h3.586z"/></svg>
                                    S'enregister
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Header buttons end -->
            </div>
        </aside>
        <!--Off Canvas Navigation End-->

        <!-- Banner Section -->
        <section id="home" class="hero-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 d-lg-none" style="margin-top: -13rem; margin-bottom: 18rem;">
                        <div class="dashboard-img" data-aos="fade-up" data-aos-duration='1500' data-aos-once="true">
                            <img src={{asset("template/assets/static/landing/dashboard.png")}} alt="">
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-10">
                        <div class="hero-content">
                            <h1 class="title h2">Améliorez votre Business</h1>
                            <p>La solution logicielle simple, intuitive, efficace et surtout très complète</p>
                            <div class="hero-btn">
                                <a href="#" class="btn btn--primary hvr-shine">Essayez maintenant</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-none d-lg-block">
                        <div class="dashboard-img" data-aos="fade-up" data-aos-duration='1500' data-aos-once="true">
                            <img src={{asset("template/assets/static/landing/dashboard.png")}} alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="hero-shape"><img src="image/hero-shape.png" alt=""></div> -->
            <div class="custom-background">
                <div class="area">
                    <ul class="circles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                    </ul>
                </div >
            </div>
        </section>


        <!-- Feature Section -->
        <div class="feature-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-9 col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration='1500'
                        data-aos-once="true" data-aos-delay="300">
                        <div class="widget01 feature--widget">
                            <div class="widget__icon">
                                <span class="inner-circle circle-bg-1"></span>
                                <span class="outer-circle circle-bg-1"></span>
                            </div>
                            <div class="widget__body divider--right">
                                <h3 class="widget__heading h6">Gestion des stocks</h3>
                                <p>Gérez vos produits en toute simplicité et réalisez facilement vos inventaires.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9 col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration='1500'
                        data-aos-once="true" data-aos-delay='800'>
                        <div class="widget01 feature--widget">
                            <div class="widget__icon">
                                <span class="inner-circle circle-bg-2"></span>
                                <span class="outer-circle circle-bg-2"></span>
                            </div>
                            <div class="widget__body divider--right">
                                <h3 class="widget__heading h6">Notifications</h3>
                                <p>Visualisez  instantanément l'état de votre caisse ou de vos stocks  et détecter rapidement d’éventuelles anomalies.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9 col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration='1500'
                        data-aos-once="true" data-aos-delay='1300'>
                        <div class="widget01 feature--widget">
                            <div class="widget__icon">
                                <span class="inner-circle circle-bg-3"></span>
                                <span class="outer-circle circle-bg-3"></span>
                            </div>
                            <div class="widget__body">
                                <h3 class="widget__heading h6">Gestion d’équipe</h3>
                                <p>Administrez efficacement le travail de vos employés en suivant quotidiennement leur performance.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Section -->
        <div class="content-section bg-light-white section-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="content-img content-img-group-1">
                            <div class="image-1 d-none d-md-block " data-aos="fade-left" data-aos-duration='1500'
                                data-aos-once="true">
                                <img src={{asset("template/assets/static/landing/kanban.png")}} alt="" class="">
                            </div>
                            <div class="image-2 image-overlay d-none d-md-block" data-aos="fade-right" dat
                                data-aos-duration="1500" data-aos-once="true">
                                <img src={{asset("template/assets/static/landing/sales-stats.png")}} alt="">
                            </div>
                            <div class="image-mobile d-md-none">
                                <img src={{asset("template/assets/static/landing/sales.png")}} alt="" class="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 offset-xl-1 col-lg-6 col-md-6">
                        <div class="content-section-text">
                            <h2 class="title">Gérer les ventes</h2>
                            <p>L’efficacité et la rentabilité de vos  ventes  sont privilégiées  grâce à une facturation personnalisable et une traçabilité nette et agile  par messagerie instantanée.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Section 2 -->
        <div class="content-section section-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-6 col-md-6 order-md-2">
                        <div class="content-img content-img-group-2">
                            <div class="image-1 d-none d-md-block" data-aos="fade-right" data-aos-duration='1500'
                                data-aos-once="true">
                                <img src={{asset("template/assets/static/landing/stats.png")}} alt="">
                            </div>
                            <div class="image-2 d-none d-md-block" data-aos="fade-left" data-aos-duration='1500'
                                data-aos-once="true">
                                <img src={{asset("template/assets/static/landing/content-2-2.png")}} alt="">
                            </div>
                            <div class="image-mobile d-md-none">
                                <img src={{asset("template/assets/static/landing/stats.png")}} alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 col-md-6 order-md-1">
                        <div class="content-section-text">
                            <h2 class="title">Données statistiques <br class="d-none d-xs-block">et rapports</h2>
                            <p>L’algorithme superpuissant d’Easytrack calculera en temps réel votre résultat net en fonction de vos ventes, et traquera les produits les plus vendus par période pour vous assurer une meilleure prise de décisions.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div id="mobile" class="content-section section-padding">
            <div class="container">
                <div class="section-heading text-center">
                    <h2>Easytrack sur votre petit écran</h2>
                    <p class="text-muted mt-3">Retrouvez notre plateforme de gestion sur votre smartphone</p>
                    <hr>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-4 my-auto">
                        <div class="device-container">
                            <div class="device-mockup iphone6_plus portrait white">
                                <div class="device">
                                    <div class="screen">
                                        <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                        <img src={{asset("template/assets/static/landing/screen.png")}} class="img-fluid" alt="">
                                    </div>
                                    <div class="button">
                                        <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 my-auto">
                        <div class="container-fluid">
                            <div class="row mb-4">
                                <div class="col-sm-9 col-md-6 col-lg-6" data-aos="fade-up" data-aos-duration='1500'
                                    data-aos-once="true" data-aos-delay="300">
                                    <div class="widget01 feature--widget">
                                        <div class="widget__icon">
                                            <span class="inner-circle circle-bg-3"></span>
                                            <span class="outer-circle circle-bg-3"></span>
                                        </div>
                                        <div class="widget__body divider--right">
                                            <h3 class="widget__heading h6">Notifications</h3>
                                            <p>Suivez votre activité en temps réel via votre mobile.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9 col-md-6 col-lg-6" data-aos="fade-up" data-aos-duration='1500'
                                    data-aos-once="true" data-aos-delay='800'>
                                    <div class="widget01 feature--widget">
                                        <div class="widget__icon">
                                            <span class="inner-circle circle-bg-4"></span>
                                            <span class="outer-circle circle-bg-4"></span>
                                        </div>
                                        <div class="widget__body">
                                            <h3 class="widget__heading h6">Chat</h3>
                                            <p>Discutez instantanément avec tout vos employés</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9 col-md-6 col-lg-6" data-aos="fade-up" data-aos-duration='1500'
                                    data-aos-once="true" data-aos-delay="1300">
                                    <div class="widget01 feature--widget">
                                        <div class="widget__icon">
                                            <span class="inner-circle circle-bg-2"></span>
                                            <span class="outer-circle circle-bg-2"></span>
                                        </div>
                                        <div class="widget__body divider--right">
                                            <h3 class="widget__heading h6">Gestion des ventes</h3>
                                            <p>Gérer facilement vos commande grâce au Kanban Commander</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9 col-md-6 col-lg-6" data-aos="fade-up" data-aos-duration='1500'
                                    data-aos-once="true" data-aos-delay='1600'>
                                    <div class="widget01 feature--widget">
                                        <div class="widget__icon">
                                            <span class="inner-circle circle-bg-1"></span>
                                            <span class="outer-circle circle-bg-1"></span>
                                        </div>
                                        <div class="widget__body">
                                            <h3 class="widget__heading h6">Gestion d'équipes</h3>
                                            <p>Suivez en temps réel la performance de vos employés.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="content-section section-padding bg-gradient text-center" id="download">
            <div class="container">
              <div class="row">
                <div class="col-md-9 mx-auto">
                  <h2 class="section-heading text-white m-0" style="font-size: 70px;">Découvrez<br>Easytrack sur mobile</h2>
                  <p class="text-white mt-4 mb-4" style="font-size: 18px; line-height: 1.5;">Notre application est disponible sur tous les appareils mobiles via un Smartphone, une tablette ou votre ordinateur. Téléchargez-la maintenant pour vous connecter sur notre plateforme !</p>
                  <div class="badges">
                    <a class="badge-link" href="#"><img src={{asset("template/assets/static/landing/google-play-badge.svg")}} alt=""></a>
                    <a class="badge-link" href="#"><img src={{asset("template/assets/static/landing/app-store-badge.svg")}} alt=""></a>
                  </div>
                </div>
              </div>
            </div>
          </section>

        <!-- Footer Section -->
        <footer class="mt-2">
            <div class="container">

                <div class="copyright-area pt-md--40 pb--40">
                    <div class="row align-items-center space-db--10">
                        <div class="col-lg-2 offset-lg-2 col-md-3 order-md-3 mb--10">
                            <ul class="footer-list social-list">
                                <li><a href=""><i class="icon icon-logo-twitter"></i></a></li>
                                <li><a href=""><i class="icon icon-logo-fb-simple"></i></a></li>
                                <li><a href=""><i class="icon icon-google"></i></a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 offset-lg-1 col-md-5 col-sm-7 order-md-2 mb--10">
                            <ul class="footer-list list-inline">
                                <li><a href="">Politique de confidentialité</a></li>
                                <li><a href="">Termes & Conditions</a></li>
                                <li><a href="">Aide</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-5 order-md-1  mb--10">
                            <p class="mb-0">© 2020 Easytrack. Tout droits réservés</p>
                        </div>

                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Vendor JS-->
    <script src={{asset("template/assets/dist/libs/jquery/dist/jquery.min.js")}}></script>
    <script src={{asset("template/assets/dist/libs/jquery/dist/jquery-migrate.min.js")}}></script>
    <script src={{asset("template/assets/dist/libs/bootstrap-4.3.1/js/bootstrap.bundle.js")}}></script>

    <!-- Plugins JS -->
    <script src={{asset("template/assets/dist/libs/fancybox-master/jquery.fancybox.min.js")}}></script>
    <script src={{asset("template/assets/dist/libs/aos-animation/aos.js")}}></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.2/particles.min.js"></script>

    <!-- Custom JS -->
    <script src={{asset("template/assets/dist/js/active.js")}}></script>
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
    {{-- <script>
        window.onload = function () {
            Particles.init({
                selector: '.parctcle-background',
                maxParticles: 50,
                connectParticles: true,
            });
        };
    </script> --}}

</body>

</html>
