<?php


namespace Nggiahao\Tessa\app\Http\Controllers\Operations;


trait ListOperation
{
    public $data;

    public function list() {
        $this->setOperation('list');
    }
}