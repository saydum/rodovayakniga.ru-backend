<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('app-files/css/styles.css') }}">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
            rel="stylesheet"
    />
    <!-- MDB -->
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css"
            rel="stylesheet"
    />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <script type="text/javascript">
        window.dgSocialWidgetData = {
            widgetId: '46032888-58dc-474b-b210-8a579efe9ac3',
            apiUrl: 'https://app.daily-grow.com/sw/api/v1',
        };
    </script>
    <script type="text/javascript" src="https://app.daily-grow.com/social-widget/init.js" defer></script>
</head>
<body id="app">

<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    @include('layouts.embed.app.sidebar')

    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        @include('layouts.embed.app.navbar')

        <!-- Page content-->
        <div class="container-fluid">
            <div class="card my-4 p-2">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<!-- MDB -->
<script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"
></script>

<!-- Core theme JS-->
<script src="{{ asset('app-files/js/scripts.js') }}"></script>
</body>
</html>
