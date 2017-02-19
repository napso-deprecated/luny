<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blog') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/blog.css" rel="stylesheet">
    <link href="/css/simplemde.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<body>
@include('layouts.partial.nav')

<div id="app"></div>

<div class="blog-header">
    <div class="container">
        <h1 class="blog-title">Blog Default Theme</h1>
        <p class="lead blog-description">Welcome to my blog everyone</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
            @yield('content')
        </div>
        <div class="col-sm-3 offset-sm-1 blog-sidebar">
            @yield('sidebar')
        </div>
    </div>
    @include('layouts.partial.footer')

</div>

<script src="/js/app.js"></script>
<script src="/js/simplemde.min.js"></script>
@yield('scripts')
</body>
</html>
