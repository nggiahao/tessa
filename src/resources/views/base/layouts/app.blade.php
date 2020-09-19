<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include(tessa_view('inc.head'))
    <livewire:styles />
</head>
<body class="text-default bg-main-background overflow-hidden relative flex flex-col h-screen">

@yield('header')

@yield('main')

@yield('footer')

@yield('before_scripts')
@stack('before_scripts')

@include(tessa_view('inc.scripts'))
<livewire:scripts />

@yield('after_scripts')
@stack('after_scripts')

</body>
</html>
