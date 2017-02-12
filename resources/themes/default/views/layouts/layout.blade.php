<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Album example for Bootstrap</title>

    <link href="/css/app.css" rel="stylesheet">

    <link href="/css/blog.css" rel="stylesheet">

</head>

<body>
@include('layouts.partial.nav')


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
</body>
</html>
