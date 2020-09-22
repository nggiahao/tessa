@if (config('tessa.base.scripts') && count(config('tessa.base.styles')))
    @foreach (config('tessa.base.scripts') as $path)
        <script src="{{ asset($path)}}"></script>
    @endforeach
@endif