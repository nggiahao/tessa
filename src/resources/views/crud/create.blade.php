@php
    /** @var \Nggiahao\Tessa\app\Crud\Crud $crud */
@endphp

<h2 class="text-4xl font-semibold">
    <span class="capitalize">{{$crud->entity_name}}</span>
    <span class="text-base font-normal">Add User</span>
    <a class="text-sm font-normal text-primary cursor-pointer" wire:click="list()"><< Back</a>
</h2>
<div>
    @dump($crud, $operation)
</div>