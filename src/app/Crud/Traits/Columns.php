<?php


namespace Nggiahao\Tessa\app\Crud\Traits;


trait Columns
{
    // ------------
    // COLUMNS
    // ------------

    /**
     * Get the CRUD columns for the current operation.
     *
     * @return array CRUD columns.
     */
    public function columns()
    {
        return $this->getOperationSetting('columns', 'list') ?? [];
    }

    /**
     * Add a column at the end of to the CRUD object's "columns" array.
     *
     * @param array|string $column
     *
     * @return self
     */
    public function addColumn($column)
    {
        $column = $this->makeSureColumnHasNeededAttributes($column);
        $this->addColumnToOperationSettings($column);

        return $this;
    }

    public function makeSureColumnHasNeededAttributes($column) {
        return $column;
    }

    public function addColumnToOperationSettings($column) {
        $all_columns = $this->columns();
        $all_columns = array_merge($all_columns, [$column]);

        $this->setOperationSetting('columns', $all_columns, 'list');
    }
}