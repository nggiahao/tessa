@extends(tessa_view('layouts.app'))

@section('header')
    @include(tessa_view('inc.header'))
@endsection

@section('main')
    @include(tessa_view('inc.sidebar'))

    <main class="relative">

        @yield('content')

    </main>
@endsection