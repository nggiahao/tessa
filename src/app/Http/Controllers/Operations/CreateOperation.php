<?php


namespace Nggiahao\Tessa\app\Http\Controllers\Operations;


use Illuminate\Http\Request;
use Livewire\WithPagination;

trait CreateOperation
{
    public function create() {
        $this->setOperation('create');
    }

    public function store(Request $request) {

    }
}