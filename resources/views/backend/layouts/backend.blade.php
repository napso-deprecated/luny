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
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/simplemde.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<body>
@include('backend.layouts.partial.nav')


<div class="blog-header">
    <div class="container">
        <h1 class="blog-title">Admin theme</h1>
        <p class="lead blog-description">This is the admin theme</p>
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
    @include('backend.layouts.partial.footer')

</div>

<script src="/js/backend.js"></script>
<script src="/js/simplemde.min.js"></script>
</body>
</html>
