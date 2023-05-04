<?php
namespace Source\Components;

class Form {

    private $fields = [];
    private $buttons = [];

    public function getFields()
    {
        return $this->fields;
    }

    public function setFields(array $aFields)
    {
        $this->fields = $aFields;
        return $this;
    }

    public function getButtons() {
        return $this->buttons;
    }

    public function addField(Field | Select $oField) {
        $this->fields[] = $oField;
        return $this;
    }

    public function findField($sName) {
        foreach($this->getFields() as $oField){
            if($oField->getName() === $sName){
                return $oField;
            }
        }
    }

    public function doVisualize() {
        foreach($this->getFields() as $oField){
            $oField->setDisabled(true);
        }
    }

    public function addButtonConfirm() {
        $this->buttons['confirm'] = '<button type="submit" class="btn btn-success mr-2">Confirmar</button>';
    }

    public function addButtonCancel($sLink) {
        $this->buttons['cancel'] = '<a class="btn btn-danger" href="'.$sLink.'">Cancelar</a>';
    }

    public function removeButtonConfirm() {
        unset($this->buttons['confirm']);
    }

    public function removeButtonCancel() {
        unset($this->buttons['cancel']);
    }

    public function loadValues(array $aValues) {
        $oValues = $aValues[0];
        foreach($this->getFields() as $oField){
            $sMethod = 'get'.$oField->getName();
            if(method_exists($oValues, $sMethod)){
                $oField->setValue($oValues->$sMethod());
            }
        }
    }

    public function getContentFields() {
        $aFields = array_map(function($oField) {
            return $oField->getContent();
        }, $this->getFields());
        return implode('', $aFields);
    }

    public function getContentButtons() {
        $aButtons = array_map(function($sButton) {
            return $sButton;
        }, $this->getButtons());
        return implode('', $aButtons);
    }

    public function getContent() {
        $sForm = file_get_contents('/var/www/html/src/Components/Pages/form.html');
        $sFields = $this->getContentFields();
        $sButtons = $this->getContentButtons();
        return str_replace('{{content}}', $sFields.$sButtons, $sForm);
    }

}