<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Easytrak - Application pour la gestion de stock</title>
    @notifyCss
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
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
    <link href="{{ asset('dashboard/dist/libs/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/dist/css/easytrak.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/dist/css/demo.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/dist/css/custom.css') }}" rel="stylesheet" />
    <style>
        body {
            display: none;
        }

    </style>
</head>
