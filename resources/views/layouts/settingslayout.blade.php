<!DOCTYPE html>
    <html lang="fr">

     <head>
       @include('layouts.partials.admin.head_settings')
     </head>

     <body class="antialiased">
    @yield('content')
    
    @include('layouts.partials.auth.footer_login)
     </body>

    </html>