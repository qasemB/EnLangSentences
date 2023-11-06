<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/bootstrap-5.2.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="/fontawesome-free-6.4.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/toastify/toastify.css">
    @livewireStyles
    <link rel="stylesheet" href="/css/style.css" />
    @yield('pageCss')

    <title>EnWords</title>
</head>

<body class="antialiased">

    @include('partials.mainNavbar')

    <main style="padding-bottom: 57px !important"
        class="main_content row m-0 p-0 justify-content-center align-content-start px-2">
        @yield('content')
    </main>

    @include('partials.mainFooter')

    <script src="/bootstrap-5.2.3/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="/toastify/toastify.js"></script>
    @livewireScripts
    <script type="text/javascript" src="/js/app.js"></script>

    @yield('pageJS')

    @include("partials.alerts")
</body>

</html>
