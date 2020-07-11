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
        h1 {
            font-size: 3.5rem !important;
            font-weight: 300 !important;
        }
    </style>
    
    @yield('styles')

</head>
{{-- // End Head --}}

{{-- Body Section--}}
<body class="antialiased auth-background">
    <div class="auth-page row flex-fill d-flex flex-row justify-content-center">
        
        {{-- Title section--}}
        <div class="col-lg-4 d-flex flex-row align-items-center">
            <h1 class="text-white"><b>Gérer</b> votre snack<br>comme un Pro</h1>
        </div>
        {{-- End Title --}}


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
