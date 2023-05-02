<?php

namespace Source\Components;


class Table
{

    private $columns = [];
    private $lines = [];
    private $action;
    private $find = '';
    private $msgWithoutRegisters = '<tr><td class="font-weight-bold text-center" colspan="9">Registro não encontrado</td></tr>';

    public function getColumns()
    {
        return $this->columns;
    }

    public function addColumn(string $sName, string $sTitle = '')
    {
        $this->columns[$sName] = $sTitle;
        return $this;
    }

    public function getLines()
    {
        return $this->lines;
    }

    public function addLine(string $sLine)
    {
        $this->lines[] = $sLine;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function addAction(Action $oAction)
    {
        $this->action = $oAction;
        return $this;
    }

    public function getFind()
    {
        return $this->find;
    }

    public function setFind(string|null $sFind)
    {
        $this->find = $sFind;
        return $this;
    }

    public function getMsgWithoutRegisters()
    {
        return $this->msgWithoutRegisters;
    }

    public function setMsgWithoutRegisters($msgWithoutRegisters)
    {
        $this->msgWithoutRegisters = '<tr><td class="font-weight-bold text-center" colspan="9">' . $msgWithoutRegisters . '</td></tr>';
        return $this;
    }

    public function loadValues($aValues)
    {
        foreach ($aValues as $oValue) {
            $aColumns = array_map(function ($sName) use ($oValue) {
                return '<td>' . $this->_get($oValue, $sName) . '</td>';
            }, array_keys($this->getColumns()));
            if ($this->getAction()) {
                $this->getAction()->setKey($oValue->getId());
                $aColumns[] = $this->getAction()->loadActions();
            }
            $this->addLine('<tr>' . implode('', $aColumns) . '</tr>');
        };
    }
    protected function _get($oModel, $sName) {
        $aRoute = explode('_', $sName);
        if(count($aRoute) > 1){
            $sMethod = array_shift($aRoute);
            return $this->_get($oModel->{'getModel'.$sMethod}(), implode('_', $aRoute));
        }
        $oModel = $oModel->getRepository()->find($oModel->getId());
        return $oModel->{'get'.array_shift($aRoute)}();
    }

    public function getTableHeaders()
    {
        return array_map(function ($sTitle) {
            return '<th>' . $sTitle . '</th>';
        }, $this->getColumns());
    }

    public function getContent()
    {
        $sTable = file_get_contents('/var/www/html/src/Components/Pages/table.html');
        $sTable = str_replace('{{Columns.title}}', implode('', $this->getTableHeaders()), $sTable);
        $sTable = str_replace('{{find}}', $this->getFind(), $sTable);
        $sTable = str_replace('{{Columns.values}}', $this->getLines() ? implode('', $this->getLines()) : $this->getMsgWithoutRegisters(), $sTable);
        return $this->getAction()->getCreate().$sTable;
    }
}
