<!DOCTYPE html>
<!--
* easytrak - Application pour la gestion de stock
* @version 1.0.0
* @link https://github.com/estelle97/Easytrak
* Copyright 2020 easytech
* Licensed under MIT (https://easytrak.com/license)
-->
<html lang="en">

{{-- Head Section --}}
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Easytrak - Connexion</title>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
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
    <!-- CSS files -->
    <link href={{asset("template/assets/dist/libs/jqvmap/dist/jqvmap.min.css")}} rel="stylesheet" />
    <link href={{asset("template/assets/dist/css/easytrak.min.css")}} rel="stylesheet" />
    <link href={{asset("template/assets/dist/css/demo.min.css")}} rel="stylesheet" />
    <link href={{asset("template/assets/dist/css/custom.css")}} rel="stylesheet" />
    <style>
        body {
            display: none;
            background: #fff !important;
        }
        .welcome-message {
            font-size: 3.5rem !important;
            font-weight: 300 !important;
        }
        .feature-title {
            font-size: 1.8rem;
        }
        .features-list li {
            font-size: 1.2rem;
        }
    </style>

    @yield('styles')

</head>
{{-- // End Head --}}

{{-- Body Section--}}
<body class="antialiased auth-background">
    <div class="auth-page row flex-fill d-flex flex-row justify-content-center">

        {{-- App infos section--}}
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 d-flex flex-column justify-content-center align-items-left">
            <h1 class="welcome-message mb-3"><b>Gérer</b> votre snack comme un Pro</h1>
            <h3 class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</h3>
            <h2 class="feature-title">Fonctionalités</h2>
            <ul class="features-list">
                <li>Gestionnaire de stock</li>
                <li>Gestions des rôles et permissions</li>
                <li>Notification en temps réels</li>
                <li>Kanban commander</li>
                <li>Agenda</li>
                <li>Chat </li>
            </ul>
            <div class="social-networks mt-4">
                <h2 class="mb-2">Rejoignez-nous sur le web</h2>
                <a href="#" class="mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5z"/></svg>
                </a>
                <a href="#" class="mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M6.94 5a2 2 0 1 1-4-.002 2 2 0 0 1 4 .002zM7 8.48H3V21h4V8.48zm6.32 0H9.34V21h3.94v-6.57c0-3.66 4.77-4 4.77 0V21H22v-7.93c0-6.17-7.06-5.94-8.72-2.91l.04-1.68z"/></svg>
                </a>
                <a href="#" class="mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6zm0-2a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm6.5-.25a1.25 1.25 0 0 1-2.5 0 1.25 1.25 0 0 1 2.5 0zM12 4c-2.474 0-2.878.007-4.029.058-.784.037-1.31.142-1.798.332-.434.168-.747.369-1.08.703a2.89 2.89 0 0 0-.704 1.08c-.19.49-.295 1.015-.331 1.798C4.006 9.075 4 9.461 4 12c0 2.474.007 2.878.058 4.029.037.783.142 1.31.331 1.797.17.435.37.748.702 1.08.337.336.65.537 1.08.703.494.191 1.02.297 1.8.333C9.075 19.994 9.461 20 12 20c2.474 0 2.878-.007 4.029-.058.782-.037 1.309-.142 1.797-.331.433-.169.748-.37 1.08-.702.337-.337.538-.65.704-1.08.19-.493.296-1.02.332-1.8.052-1.104.058-1.49.058-4.029 0-2.474-.007-2.878-.058-4.029-.037-.782-.142-1.31-.332-1.798a2.911 2.911 0 0 0-.703-1.08 2.884 2.884 0 0 0-1.08-.704c-.49-.19-1.016-.295-1.798-.331C14.925 4.006 14.539 4 12 4zm0-2c2.717 0 3.056.01 4.122.06 1.065.05 1.79.217 2.428.465.66.254 1.216.598 1.772 1.153a4.908 4.908 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428.047 1.066.06 1.405.06 4.122 0 2.717-.01 3.056-.06 4.122-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 0 1-1.153 1.772 4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.428.465-1.066.047-1.405.06-4.122.06-2.717 0-3.056-.01-4.122-.06-1.065-.05-1.79-.218-2.428-.465a4.89 4.89 0 0 1-1.772-1.153 4.904 4.904 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.013 15.056 2 14.717 2 12c0-2.717.01-3.056.06-4.122.05-1.066.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772A4.897 4.897 0 0 1 5.45 2.525c.638-.248 1.362-.415 2.428-.465C8.944 2.013 9.283 2 12 2z"/></svg>
                </a>
                <a href="#" class="mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M22.162 5.656a8.384 8.384 0 0 1-2.402.658A4.196 4.196 0 0 0 21.6 4c-.82.488-1.719.83-2.656 1.015a4.182 4.182 0 0 0-7.126 3.814 11.874 11.874 0 0 1-8.62-4.37 4.168 4.168 0 0 0-.566 2.103c0 1.45.738 2.731 1.86 3.481a4.168 4.168 0 0 1-1.894-.523v.052a4.185 4.185 0 0 0 3.355 4.101 4.21 4.21 0 0 1-1.89.072A4.185 4.185 0 0 0 7.97 16.65a8.394 8.394 0 0 1-6.191 1.732 11.83 11.83 0 0 0 6.41 1.88c7.693 0 11.9-6.373 11.9-11.9 0-.18-.005-.362-.013-.54a8.496 8.496 0 0 0 2.087-2.165z"/></svg>
                </a>
            </div>
        </div>
        <div class="col-lg-2"></div>
        {{-- End App infos --}}


        @yield('content')

    </div>
    <!-- Libs JS -->
    <script src={{asset("template/assets/dist/libs/jquery/dist/jquery.slim.min.js")}}> </script>
    <script src={{asset("template/assets/dist/libs/jquery/dist/jquery.min.js")}}> </script>
    <!-- easytrak Core -->
    <script src={{asset("template/assets/dist/js/easytrak.min.js")}}> </script>
    <script>
        document.body.style.display = "block";

        // Show and hide password
        $("#show-password").click(function(){
            let input = document.getElementById('password');
            if (input.type == "password") {
                input.type = 'text';
            } else {
                input.type = 'password';
            }
        });
    </script>
    @yield('scripts')

    {!! Notify::render() !!}
</body>

</html>
