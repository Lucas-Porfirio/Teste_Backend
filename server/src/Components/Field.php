<?php

namespace Source\Components;

class Field
{

    public function __construct($sType, $sName, $sTitle, $sLength = '', $sPlaceHolder = '')
    {
        $this->setType($sType);
        $this->setName($sName);
        $this->setTitle($sTitle);
        $this->setLength($sLength);
        $this->setPlaceHolder($sPlaceHolder);
    }

    private $value = '';
    private $type;
    private $name;
    private $placeHolder;
    private $title;
    private $disabled = false;
    private $hidden = false;
    private $expr = '';
    private $length;

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

    public function getDisabled()
    {
        return $this->disabled;
    }

    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;
        return $this;
    }

    public function getHidden()
    {
        return $this->hidden;
    }

    public function setHidden($hidden)
    {
        $this->hidden = $hidden;
        return $this;
    }

    public function getExpr()
    {
        return $this->expr;
    }

    public function setExpr($expr)
    {
        $this->expr = $expr;
        return $this;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function setLength($length)
    {
        $this->length = $length;

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
        $sField = str_replace('{{hidden}}', $this->getHidden() ? 'hidden' : '', $sField);
        $sField = str_replace('{{disabled}}', $this->getDisabled() ? 'disabled' : '', $sField);
        $sField = str_replace('{{expr}}', $this->getExpr() ? 'preg="'.$this->getExpr().'"' : '', $sField);
        $sField = str_replace('{{length}}', $this->getLength(), $sField);
        return $sField;
    }

}
