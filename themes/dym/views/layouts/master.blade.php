<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'Dym') }}</title>
    <link href="{{ asset('/dym/img/favicon.png') }}" rel="icon" type="image/png">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.css" rel="stylesheet" media="all">
    <link type="text/css" href="{{ asset('dym/css/app.css') }}" rel="stylesheet">
    @stack('css')
</head>

<body class="position-relative bg-white">
    @include('alert.success')
    @include('layouts.navbars.navbar')

    <div class="main-content {{ $class ?? '' }}">
        @yield('content')
    </div>

    @include('layouts.footers.footer')

    <script src="{{ mix('dym/js/app.min.js') }}"></script>

    <!-- ScrollTop -->
    <a href="#" id="scrollTop" class="scroll" style="display: none;">
        <img src="{{ asset('/dym/img/icons/arrow-up.svg') }}" />
    </a>

    @stack('js')
</body>
</html>
