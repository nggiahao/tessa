<?php


namespace Nggiahao\Tessa\app\Crud;



use Illuminate\Http\Request;
use Nggiahao\Tessa\app\Crud\Traits\Columns;
use Nggiahao\Tessa\app\Crud\Traits\Settings;

class Crud
{
    use Settings, Columns;

    protected $model;
    public $entity_name = 'entry'; // what name will show up on the buttons, in singular
    public $entity_name_plural = 'entries'; // what name will show up on the buttons, in plural (ex: Delete 5 entities)
    public $route;

    public $entry;

    protected $request;

    public function __construct()
    {

    }

    /**
     * Set the request instance for this CRUD.
     *
     * @param \Illuminate\Http\Request|null $request
     */
    public function setRequest(Request $request = null)
    {
        $this->request = $request ?? \Request::instance();
    }

    /**
     * @param $model_namespace
     *
     * @throws \Exception
     */
    public function setModel($model_namespace)
    {
        if (! class_exists($model_namespace)) {
            throw new \Exception('The model does not exist.', 500);
        }

        $this->model = new $model_namespace;
        $this->entry = null;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setRoute($route_name) {
        $this->route = $route_name;
    }

    public function setEntityNameStrings($singular, $plural)
    {
        $this->entity_name = $singular;
        $this->entity_name_plural = $plural;
    }

}