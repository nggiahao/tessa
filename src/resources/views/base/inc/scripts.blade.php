<livewire:scripts />

@if (config('tessa.base.scripts') && count(config('tessa.base.styles')))
    @foreach (config('tessa.base.scripts') as $path)
        <script src="{{ asset($path)}}"></script>
    @endforeach
@endif

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        window.livewire.on('urlChange', (url) => {
            history.pushState(null, null, url);
        });
    });
</script>