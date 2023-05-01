<?php
namespace Sourcer\Components;

use Source\Components\Field;

class Form {

    private $fields = [];

    public function getFields()
    {
        return $this->fields;
    }

    public function setFields(array $aFields)
    {
        $this->fields = $aFields;
        return $this;
    }

    public function addField(Field $oField) {
        $this->fields[] = $oField;
    }

    public function getContent() {
        $sFields = array_map(function($oField) {
            return $oField->getContent();
        }, $this->getFields());
        return $sFields;
    }
}