<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include(tessa_view('inc.head'))
    <livewire:styles />
</head>
<body class="bg-gray-100 font-mono flex flex-col min-h-screen md:flex-row">

@yield('header')

<div class="relative w-full">
    @yield('content')
</div>

@yield('before_scripts')
@stack('before_scripts')

@include(tessa_view('inc.scripts'))
<livewire:scripts />

@yield('after_scripts')
@stack('after_scripts')

</body>
</html>
