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

    {{-- Modals --}}

        <div class="modal modal-blur fade" id="modal-switch-account" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Changer de compte</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row mb-3 align-items-end">
                            <div class="col-lg-12 mb-4">
                                <label class="form-label"> Choisir l'utilisateur </label>
                                <div class="input-icon">
                                    <span class="input-icon-addon ml-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path
                                                d="M12 17c3.662 0 6.865 1.575 8.607 3.925l-1.842.871C17.347 20.116 14.847 19 12 19c-2.847 0-5.347 1.116-6.765 2.796l-1.841-.872C5.136 18.574 8.338 17 12 17zm0-15a5 5 0 0 1 5 5v3a5 5 0 0 1-4.783 4.995L12 15a5 5 0 0 1-5-5V7a5 5 0 0 1 4.783-4.995L12 2zm0 2a3 3 0 0 0-2.995 2.824L9 7v3a3 3 0 0 0 5.995.176L15 10V7a3 3 0 0 0-3-3z" />
                                        </svg>
                                    </span>
                                    <select name="" id="username" class="auth-input form-control py-2 px-5">
                                        @if(Auth::user()->is_admin == 2)
                                        @foreach(Auth::user()->companies->first()->sites as $site)
                                            @foreach($site->employees as $emp)
                                                <option value={{$emp->user->username}}> {{$emp->user->name}} | {{$emp->user->email}} </option>
                                            @endforeach
                                        @endforeach
                                        @elseif(Auth::user()->is_admin == 1)
                                            @foreach(Auth::user()->employee->site->employees as $emp)
                                                <option value={{$emp->user->username}}> {{$emp->user->name}} | {{$emp->user->email}} </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-icon">
                                    <span class="input-icon-addon ml-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path
                                                d="M18 8h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h2V7a6 6 0 1 1 12 0v1zM5 10v10h14V10H5zm6 4h2v2h-2v-2zm-4 0h2v2H7v-2zm8 0h2v2h-2v-2zm1-6V7a4 4 0 1 0-8 0v1h8z" />
                                        </svg>
                                    </span>
                                    <input type="password" id="password" class="auth-input form-control py-2 px-5"
                                        placeholder="Mot de passe" required autocomplete="off" minlength="8"/>
                                    <span class="input-icon-addon mr-2">
                                        <a class="link-secondary" id="show-password" title="Show password" data-toggle="tooltip"><svg
                                                xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <circle cx="12" cy="12" r="2" />
                                                <path d="M2 12l1.5 2a11 11 0 0 0 17 0l1.5 -2" />
                                                <path d="M2 12l1.5 -2a11 11 0 0 1 17 0l1.5 2" />
                                            </svg>
                                        </a>
                                    </span>
                                </div>
                                <span class="text-danger" id="password-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="switchAccount btn btn-primary" style="width: 100%;">
                            Connexion
                        </button>
                    </div>
                </div>
            </div>
        </div>

    {{-- End Modals--}}

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

        function showNotifications(){

            var token = '{{@csrf_token()}}';
            var url='';

            if('{{Auth::user()->is_admin}}' == 1){
                url = '/employee/notifications/last'
            }

            if('{{Auth::user()->is_admin}}' == 2){
                url = '/admin/notifications/last'
            }

            if('{{Auth::user()->is_admin}}' == 3){
                url = '/easytrack/notifications/last'
            }

            $.ajax({
                url: url,
                method: 'post',
                data: {
                    _token: token,
                },
                success: function(data){
                    $('#notifications').html(data);
                }
            });

            setTimeout(showNotifications,60000);
        }

        showNotifications();

        $(".switchAccount").click(function(){
            var token = '{{csrf_token()}}';
            var username = $("#username").val();
            var password = $("#password").val();
            $.ajax({
                url: '/switchaccount/',
                method: 'post',
                data: {
                    _token : token,
                    username : username,
                    password : password,
                },
                success: function(data){
                    if(data == 'error'){
                        $(".text-danger").fadeOut().html('');
                        $('#password-error').html('Mot de passe incorrect').fadeIn();
                    } else {
                        if(data.is_admin == 2){
                            window.location.replace("/admin/dashboard");
                        }else{
                            window.location.replace("/employee/dashboard");
                        }
                    }
                },
            });
        });
    </script>

    @if (Auth::user()->is_admin == 2)
        <script src={{asset('template/assets/dist/libs/jquery/dist/jquery.countdown.min.js')}}></script>
        <script>

            $('#clock').countdown('{{Auth::user()->companies->first()->types->last()->pivot->end_date}}', function(event) {
                $(this).html(event.strftime('%D Jour(s)'));
            });

            $('#clock-full').countdown('{{Auth::user()->companies->first()->types->last()->pivot->end_date}}', function(event) {
                $(this).html(event.strftime('%D Jour(s) %H:%M:%S Restantes'));
            });
        </script>
    @endif
    @yield('scripts')

</body>

</html>
