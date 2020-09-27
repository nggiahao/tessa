<?php


namespace Nggiahao\Tessa\app\Http\Controllers\Livewire;


use Livewire\Component;
use Nggiahao\Tessa\app\Http\Controllers\Operations\CreateOperation;
use Nggiahao\Tessa\app\Http\Controllers\Operations\ListOperation;

class User extends CrudComponent
{
    use ListOperation, CreateOperation;

    /**
     * @throws \Exception
     */
    public function setup()
    {
        $this->crud->setModel(\App\User::class);
        $this->crud->setRoute('tessa.user');
        $this->crud->setEntityNameStrings('user', 'users');
    }

    public function setupListOperation() {
        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'Name'
        ]);

        $this->crud->addColumn([
            'name' => 'email',
            'label' => 'Email'
        ]);
    }

    public function setupCreateOperation() {

    }
}