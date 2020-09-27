    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}" /> {{-- Encrypted CSRF token for Laravel, in order for Ajax requests to work --}}
    <title>{{ isset($title) ? $title.' :: '.config('tessa.base.project_name') : config('tessa.base.project_name') }}</title>

    @yield('before_styles')
    @stack('before_styles')

    <livewire:styles />
    @if (config('tessa.base.styles') && count(config('tessa.base.styles')))
        @foreach (config('tessa.base.styles') as $path)
        <link rel="stylesheet" type="text/css" href="{{ asset($path)}}">
        @endforeach
    @endif

    @yield('after_styles')
    @stack('after_styles')