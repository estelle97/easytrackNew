<!DOCTYPE html>
    <html lang="fr">

     <head>
       @include('layouts.partials.auth.head_login')
     </head>

     <body class="antialiased auth-background">
    @yield('content')
    
    @include('layouts.partials.auth.footer_login')
     </body>

    </html>