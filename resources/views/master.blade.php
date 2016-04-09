<!DOCTYPE html>
<html>
    <head>
        <title> @yield('title') </title>
        
        <link href="{!! asset('css/vendor/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">

        <!-- Loading Flat UI -->
        <link href="{!! asset('css/flat-ui.min.css') !!}" rel="stylesheet">
        
    </head>
    <body>

        @include('partials.navbar')

        @yield('content')

    </body>

    <footer>

        <script src="{!! asset('js/vendor/jquery.min.js') !!}"></script>
        <script src="{!! asset('js/flat-ui.min.js') !!}"></script>
        <script src="{!! asset('js/application.js') !!}"></script>
        
    </footer>
</html>