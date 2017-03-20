<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Luny') }}</title>

    <!-- Styles -->
{{--<link href="/css/simplemde.min.css" rel="stylesheet">--}}

<!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

</head>

<body>

{{--@include('layouts.partial.nav')--}}

{{--<div id="app"></div>--}}


@yield('image-header')

<div class="container">
    <div class="layout-content">
        @yield('content')
    </div>

    <div class="layout-sidebar">
        @yield('sidebar')
    </div>


    {{--    @include('layouts.partial.footer')--}}

</div>

<script src="/js/app.js"></script>
<script src="/js/simplemde.min.js"></script>
@yield('scripts')
</body>
</html>
