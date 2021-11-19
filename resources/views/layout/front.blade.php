<!DOCTYPE html>
<html  lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Blog')</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
{{--    @if(!request()->route()->uri == '/')--}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-rtl.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}?v_day={{ date('ja') }}" rel="stylesheet">
{{--    @else--}}
{{--        <link rel="stylesheet" href="{{ asset('css/searchPageV2.build.min.css') }}">--}}
{{--    @endif--}}
    @livewireStyles
    @stack('css')
    @yield('css')
</head>
<body class="rtl">

<x-header></x-header>

@yield('content')


<script src="{{ asset('js/app.js') }}?v_day={{ date('ja') }}"></script>
@livewireScripts
@stack('js')
@yield('js')
</body>
</html>
