<?php

namespace Source\View;

use Source\Components\Form;

abstract class ViewForm extends ViewBase
{
    private $Form;

    /**
     * @return Form
     */
    public function getForm()
    {
        $this->Form ??= new Form();
        return $this->Form;
    }

    public function setForm($Form)
    {
        $this->Form = $Form;
        return $this;
    }

    public function getContent()
    {
        return $this->getForm()->getContent();
    }

    public function loadValues(array $aValues)
    {
        $this->getForm()->loadValues($aValues);
    }
}
