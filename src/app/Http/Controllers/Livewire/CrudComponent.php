<?php


namespace Nggiahao\Tessa\app\Http\Controllers\Livewire;


use Illuminate\Support\Str;
use Livewire\Component;
use Nggiahao\Tessa\app\Crud\Crud;

class CrudComponent extends Component
{
    public $operation;

    /** @var Crud $crud */
    protected $crud;

    public function __construct($id)
    {
//        $this->crud = new Crud();
        parent::__construct($id);
    }

    public function mount($operation) {
        $this->setOperation($operation);
    }

    public function getCrudProperty() {
        return $this->crud;
    }

    public function setOperation($operation) {
        $this->operation = $operation;

        $this->crud = new Crud();
        $this->setup();
        $this->setupConfigurationForCurrentOperation();

        $route = $this->route();
        $this->emit('urlChange', $route);
    }

    public function render()
    {
        return view(tessa_view('index'));
    }

    protected function setup()
    {
        //
    }

    private function setupConfigurationForCurrentOperation()
    {
        $operation_name = $this->operation;
        $setup_class_name = 'setup' . Str::studly($operation_name) . 'Operation';

        if (method_exists($this, $setup_class_name)) {
            $this->{$setup_class_name}();
        }

    }

    protected function route()
    {
        if ($this->operation === 'list') {
            return route($this->crud->route);
        } else {
            return route($this->crud->route.'.'.$this->operation);
        }
    }
}