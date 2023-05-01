<?php

namespace Source\View;

use Source\Components\Table;

abstract class ViewTable extends ViewBase
{
    private $Table;

    /**
     * @return Table
     */
    public function getTable()
    {
        $this->Table ??= new Table();
        return $this->Table;
    }

    public function setTable($Table)
    {
        $this->Table = $Table;
        return $this;
    }

    public function getContent()
    {
        return $this->getTable()->getContent();
    }

    public function loadValues(array $aValues)
    {
        $this->getTable()->loadValues($aValues);
    }
}
