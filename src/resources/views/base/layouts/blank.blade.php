@extends(tessa_view('layouts.app'))

@section('header')
    @include(tessa_view('inc.header'))
@endsection

@section('main')
    <div class="app-body flex">
        @include(tessa_view('inc.sidebar'))

        <main class="relative pt-2 px-5 flex-1">
            <nav class="py-3 rounded w-full ">
                <ol class="flex justify-end">
                    <li><a href="{{route('tessa')}}" class="text-primary">Admin</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li>Dashboard</li>
                </ol>
            </nav>
            @if(!empty($operation))
                @livewire($module, ['operation' => $operation])
            @else
                @livewire($module)
            @endif

        </main>
    </div>
@endsection