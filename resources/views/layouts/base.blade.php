<!doctype html>
{{--
* easytrak - Application pour la gestion de stock
* @version 1.0.0
* @link https://github.com/estelle97/Easytrak
* Copyright 2020 easytech
* Licensed under MIT (https://easytrak.com/license)
--}}
<html lang="en">

{{-- Head Section --}}
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
<title>Easytrak | {{ ($title ?? 'Application de gestion de stock') }}</title>
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
    {{-- CSS files --}}
    <link href={{asset("template/assets/dist/libs/jqvmap/dist/jqvmap.min.css")}} rel="stylesheet" />
    <link href={{asset("template/assets/dist/css/easytrak.min.css")}} rel="stylesheet" />
    <link href={{asset("template/assets/dist/css/demo.min.css")}} rel="stylesheet" />
    <link href={{asset("template/assets/dist/css/custom.css")}} rel="stylesheet" />

    {{-- Icons CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    {{-- Editor CSS --}}
    <link rel="stylesheet" href={{asset("template/assets/dist/css/editor/select2.css")}}>
    <link rel="stylesheet" href={{asset("template/assets/dist/css/editor/datetimepicker.css")}}>
    <link rel="stylesheet" href={{asset("template/assets/dist/css/editor/x-editor-style.css")}}>

    {{-- Data-table CSS --}}
    <link rel="stylesheet" href={{asset("template/assets/dist/css/data-table/bootstrap-table.css")}}>
    <style>
        body {
            display: none;
        }

    </style>
    @yield('styles')
</head>
{{-- End Head Section --}}

<body class="antialiased">

    {{-- Page Body--}}
    <div class="page">
        {{-- Header --}}
        <header class="navbar navbar-expand-md navbar-dark navbar-bg-gradient navbar-overlap">
            <div class="container-xl mt-2">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @if (Auth::user()->is_admin == 1)
                    <a href={{route('employee.dashboard')}} class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pr-0 pr-md-3">
                        <img src={{asset("template/assets/static/logo-white.svg")}} alt="easytrak" class="navbar-brand-image" />
                    </a>
                @elseif(Auth::user()->is_admin == 2)
                    <a href={{route('admin.dashboard')}} class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pr-0 pr-md-3">
                        <img src={{asset("template/assets/static/logo-white.svg")}} alt="easytrak" class="navbar-brand-image" />
                    </a>
                @else
                    <a href={{route('easytrack.dashboard')}} class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pr-0 pr-md-3">
                        <img src={{asset("template/assets/static/logo-white.svg")}} alt="easytrak" class="navbar-brand-image" />
                    </a>
                @endif


                {{-- User Bloc--}}
                    @if (Auth::user()->is_admin == 1)
                        @include("partials.employee.userBloc")
                    @elseif(Auth::user()->is_admin == 2)
                        @include("partials.admin.userBloc")
                    @else
                        @include("partials.superAdmin.userBloc")
                    @endif

                {{-- End User Bloc--}}


                {{-- Menu de navigation--}}
                    @if (Auth::user()->is_admin == 1)
                        @include("partials.employee.navigation")
                    @elseif(Auth::user()->is_admin == 2)
                        @include("partials.admin.navigation")
                    @else
                        @include("partials.superAdmin.navigation")
                    @endif

                {{-- End Menu de navigation--}}

            </div>
        </header>
        {{-- End Header--}}

        {{-- Page Content --}}
        <div class="content">
            <div class="container-xl">

                @yield('content')

            </div>

            {{-- Footer --}}
                @if (Auth::user()->is_admin == 1)
                    @include("partials.employee.footer")
                @elseif(Auth::user()->is_admin == 2)
                    @include("partials.admin.footer")
                @else
                    @include("partials.superAdmin.footer")
                @endif
            {{-- End Footer--}}

        </div>
        {{-- End Page Content--}}
    </div>
    {{-- End Page Body--}}

    {{-- Libs JS --}}
    <script src={{asset("template/assets/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js")}}></script>
    <script src={{asset("template/assets/dist/libs/jquery/dist/jquery.min.js")}}></script>
    <script src={{asset("template/assets/dist/libs/jqvmap/dist/jquery.vmap.min.js")}}></script>
    <script src={{asset("template/assets/dist/libs/jqvmap/dist/maps/jquery.vmap.world.js")}}></script>
    <script src={{asset("template/assets/dist/libs/peity/jquery.peity.min.js")}}></script>
    <script src={{asset("template/assets/dist/libs/apexcharts/dist/apexcharts.min.js")}}></script>

    <script src={{asset("template/assets/dist/libs/data-table/bootstrap-table.js")}}></script>
    <script src={{asset("template/assets/dist/libs/data-table/tableExport.js")}}></script>
    <script src={{asset("template/assets/dist/libs/data-table/data-table-active.js")}}></script>
    <script src={{asset("template/assets/dist/libs/data-table/bootstrap-table-resizable.js")}}></script>
    <script src={{asset("template/assets/dist/libs/data-table/colResizable-1.5.source.js")}}></script>
    <script src={{asset("template/assets/dist/libs/data-table/bootstrap-table-export.js")}}></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    {{-- easytrak Core --}}
    <script src={{asset("template/assets/dist/js/easytrak.min.js")}}></script>
    {{-- c'chart-revenue-bg --}}

    @include('flashy::message')

    <script>
        document.body.style.display = "block"

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

</body>

</html>
