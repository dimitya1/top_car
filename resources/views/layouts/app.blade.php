<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Alpine JS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <title>{{ $pageTitle ?? '' }}</title>

    @livewireStyles
    @yield('styles')
</head>
<body>

@yield('content')

@include('layouts.footer')

{{--usermenu scripts--}}
<script>
    const openButton=document.querySelector('#menu-open');
    const closeButton=document.querySelector('#menu-close');

    const menu=document.querySelector('#user-menu');
    openButton.addEventListener('click', ()=>{
        menu.classList.add('show-menu');
    })
    closeButton.addEventListener('click', ()=>{
        menu.classList.remove('show-menu');
    })
</script>
@livewireScripts
@stack('scripts')
</body>
</html>
