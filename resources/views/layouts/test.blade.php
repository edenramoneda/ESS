<!DOCTYPE html>
<html>
    <head>
        <title>Aerolink | ESS</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('image/aerolink.png') }}">
        @yield('stylesheets')
    </head>
    <body>
      @include('sidebar.sidebar')

      @yield('content')

      @yield('scripts')
        
    </body>
</html>