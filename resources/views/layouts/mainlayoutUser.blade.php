<!DOCTYPE html>
    <html lang="fr">

     <head>
       @include('layouts.partials.head')
     </head>

     <body class="antialiased">
        <div class="page">
          @include('layouts.partials.user.header')
    
          @yield('content')
        
          @include('layouts.partials.footer')
        </div>
        
          @include('layouts.partials.user.footer-scripts')
     </body>

    </html>