<?php

namespace Source\Components;

class Field
{

    public function __construct($sType, $sName, $sTitle, $sPlaceHolder = '')
    {
        $this->setType($sType);
        $this->setName($sName);
        $this->setTitle($sTitle);
        $this->setPlaceHolder($sPlaceHolder);
    }

    private $value = '';
    private $type;
    private $name;
    private $placeHolder;
    private $title;

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getPlaceHolder()
    {
        return $this->placeHolder;
    }

    public function setPlaceHolder($placeHolder)
    {
        $this->placeHolder = $placeHolder;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getContent()
    {
        $sField = file_get_contents('/var/www/html/src/Components/Pages/field.html');
        $sField = str_replace('{{title}}', $this->getTitle(), $sField);
        $sField = str_replace('{{type}}', $this->getType(), $sField);
        $sField = str_replace('{{name}}', $this->getName(), $sField);
        $sField = str_replace('{{placeHolder}}', $this->getPlaceHolder(), $sField);
        $sField = str_replace('{{value}}', $this->getValue(), $sField);
        return $sField;
    }
}
