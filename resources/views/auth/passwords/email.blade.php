<!DOCTYPE html>
<!--
* easytrak - Application pour la gestion de stock
* @version 1.0.0
* @link https://github.com/estelle97/Easytrak
* Copyright 2020 easytech
* Licensed under MIT (https://easytrak.com/license)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Easytrak - Mot de passe oublié</title>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <meta name="msapplication-TileColor" content="#206bc4" />
    <meta name="theme-color" content="#206bc4" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="MobileOptimized" content="320" />
    <meta name="robots" content="noindex,nofollow,noarchive" />
    <link rel="icon" href="{{ asset('dashboard/favicon.png') }}" type="image/png" />
    <link rel="shortcut icon" href="{{ asset('dashboard/favicon.png') }}" type="image/png" />
    <!-- CSS files -->
    <link href="{{ asset('dashboard/dist/css/easytrak.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/dist/css/demo.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/dist/css/custom.css') }}" rel="stylesheet" />
    <style>
        body {
            display: none;
            background: #fff !important;
        }

    </style>
</head>

<body class="antialiased d-flex flex-column">
    <div class="flex-fill d-flex flex-column justify-content-center">
        <div class="container-tight py-6">
            <div class="text-center mb-4">
                <img src="{{ asset('dashboard/static/logo.svg') }}" height="36" alt="" />
            </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            <form class="card card-md auth-card" method="POST" action="{{ route('password.email') }}">
            @csrf
                <div class="card-body">
                    <h2 class="mb-2 text-center text-black">Mot de passe oublié</h2>
                    <h4 class="mb-5 text-center text-muted">
                        Saisissez votre adresse électronique et un nous vous enverrons un lien pour le rénitialiser.
                    </h4>
                    <div class="mb-3">
                        <div class="input-icon">
                            <span class="input-icon-addon ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M20 12a8 8 0 1 0-3.562 6.657l1.11 1.664A9.953 9.953 0 0 1 12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10v1.5a3.5 3.5 0 0 1-6.396 1.966A5 5 0 1 1 15 8H17v5.5a1.5 1.5 0 0 0 3 0V12zm-8-3a3 3 0 1 0 0 6 3 3 0 0 0 0-6z" />
                                    </svg>
                            </span>
                            <input type="text" class="auth-input form-control @error('email') is-invalid @enderror form-control-rounded py-2 px-5"
                                placeholder="Votre email" autocomplete="off" id="email" name="email" value="{{ old('email') }}" required autofocus />

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-gradient btn-block btn-pill btn-no-border">
                            Envoyer
                        </button>
                    </div>
                </div>
            </form>
            <div class="text-center text-muted">
                J'ai un compte,
                <a href="{{ route('login') }}" tabindex="-1">Me connecter</a>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <script src="{{ asset('dashboard/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- easytrak Core -->
    <script src="{{ asset('dashboard/dist/js/easytrak.min.js') }}"></script>
    <script>
        document.body.style.display = "block";

    </script>
</body>

</html>