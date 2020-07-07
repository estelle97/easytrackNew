<!DOCTYPE html>
    <html lang="fr">

     <head>
       @include('layouts.partials.admin.head_settings')
     </head>

     <body class="antialiased auth-background">
     <div class="page">
    @include('layouts.partials.admin.header')
    @yield('content')
    
    @include('layouts.partials.footer-scriptsPermissions')
     </body>

</html>