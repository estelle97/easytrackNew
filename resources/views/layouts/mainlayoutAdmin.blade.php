<!DOCTYPE html>
    <html lang="fr">

     <head>
       @include('layouts.partials.head')
     </head>

     <body class="antialiased">
        <div class="page">
          @include('layouts.partials.admin.header')
    
          @yield('content')
        
          @include('layouts.partials.footer')
        </div>
        
          @include('layouts.partials.admin.footer-scripts')
     </body>

    </html>