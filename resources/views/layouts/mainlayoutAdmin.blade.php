<!DOCTYPE html>
    <html lang="fr">

     <head>
       @include('layouts.partials.head')
     </head>

     <body>
    @include('layouts.partials.admin.header')
    
    @yield('content')
    @include('layouts.partials.footer')
    @include('layouts.partials.admin.footer-scripts')
     </body>

    </html>