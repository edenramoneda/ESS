<!DOCTYPE html>
<html>
    <head>
        <title>Aerolink | ESS</title>
        <link rel="icon" href="{{ asset('image/aerolink.png') }}">
        @yield('stylesheets')
    </head>
    <body>
      @include('sidebar.sidebar')

      @yield('content')

      @yield('scripts')
        
    </body>
</html>