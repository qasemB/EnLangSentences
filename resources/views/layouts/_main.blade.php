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


    <!-- apple pwa config ------------------ -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="ELW">
    <link rel="apple-touch-icon" sizes="57x57" href="/images/icons/original/icon-57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/images/icons/original/icon-60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/icons/original/icon-72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/icons/original/icon-76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/icons/original/icon-114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/icons/original/icon-120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/images/icons/original/icon-144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/images/icons/original/icon-152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/icons/original/icon-180.png">

    <!-- IE pwa config ------------------ -->
    <meta name="msapplication-TileImage" content="/images/icons/original/icon-144.png">
    <meta name="msapplication-TileColor" content="#3182ce">
    <meta name="theme-color" content="#3182ce">

    <link rel="manifest" href="/manifest.json">

    <title>ELWords</title>
</head>

<body class="antialiased">

    @include('partials.mainNavbar')

    <main style="padding-bottom: 57px !important"
        class="main_content row m-0 p-0 justify-content-center align-content-start px-2">
        @yield('content')
        <div id="install-prompt" class="w-md-50 hoverable pointer">
            <i id="close-install-prompt" class="fa-solid fa-xmark text_pink p-3 pointer hoverable_text" style="position: absolute; left: 20px"></i>
            برنامه رو نصب کن. به همین راحتی
            <i class="fa-solid fa-download text-white ms-2"></i>
        </div>
    </main>

    @include('partials.mainFooter')

    <script src="/bootstrap-5.2.3/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="/toastify/toastify.js"></script>
    @livewireScripts
    <script type="text/javascript" src="/js/app5.js"></script>

    @yield('pageJS')

    @include('partials.alerts')
</body>

</html>
