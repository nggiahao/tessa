@php
    /** @var \Nggiahao\Tessa\app\Crud\Crud $crud */
@endphp

<h2 class="text-4xl font-semibold">
    <span class="capitalize">{{$crud->entity_name_plural}}</span>
    <span class="text-base font-normal">Showing 1 to 1 of 1 entries</span>
</h2>
<a class="text-center cursor-pointer text-white rounded-large bg-gradient-primary px-4 py-3 mb-3 inline-block" wire:click="create()">
    <svg class="inline w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
    Add User
</a>
@dump($crud)

<div class=""
    x-data="{}"
    x-init="dataTable = new simpleDatatables.DataTable($refs.dataTable)"
>
    <table class="table-auto bg-white" x-ref="dataTable">
        <thead>
            <tr>
                @foreach($crud->columns() as $column)
                    <th class="px-4 py-2">{!! $column['label'] !!}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($crud->getModel()->all() as $entry)
                <tr>
                    @foreach($crud->columns() as $column)
                        <td class="px-4 py-2">{{ $entry->{$column['name']} }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@push('after_styles')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
@endpush

@push('after_scripts')
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
@endpush