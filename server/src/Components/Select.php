<?php
namespace Source\Components;

class Select {

    public function __construct($sName, $sTitle)
    {
        $this->setName($sName);
        $this->setTitle($sTitle);
    }

    private $options = [];
    private $value = '';
    private $name;
    private $title;
    private $disabled = false;
    private $hidden = false;

    public function getOptions()
    {
        return $this->options;
    }

    public function setOptions(array $options)
    {
        $this->options = $options;
        return $this;
    }

    public function addOption($sOption) {
        $this->options[] = $sOption;
    }
    
    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;

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

    public function loadValues($aValues) {
        foreach($aValues as $aValue) {
            $sSelected = $this->getValue() == $aValue['value'] ? 'selected' : '';
            $this->addOption('<option '.$sSelected.' value="'.$aValue['value'].'">'.$aValue['name'] .'</option>');
        };
    }

    public function getContent()
    {
        $sSelect = file_get_contents('/var/www/html/src/Components/Pages/select.html');
        $sSelect = str_replace('{{title}}', $this->getTitle(), $sSelect);
        $sSelect = str_replace('{{name}}', $this->getName(), $sSelect);
        $sSelect = str_replace('{{value}}', $this->getValue(), $sSelect);
        $sSelect = str_replace('{{hidden}}', $this->getHidden() ? 'hidden' : '', $sSelect);
        $sSelect = str_replace('{{disabled}}', $this->getDisabled() ? 'disabled' : '', $sSelect);
        $sSelect = str_replace('{{options}}', implode('', $this->getOptions()), $sSelect);
        return $sSelect;
    }

}