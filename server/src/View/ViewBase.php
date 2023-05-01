<?php

namespace Source\View;

abstract class ViewBase
{
    private $title = '';

    public function __construct()
    {   
        $this->init();
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

    public function render() {
        $sIndex = file_get_contents('/var/www/html/src/Components/Pages/index.html');
        $sIndex = str_replace('{{title}}', $this->getTitle(), $sIndex);
        $sIndex = str_replace('{{content}}', $this->getContent(), $sIndex);
        echo $sIndex;
    }

    abstract public function getContent();

    abstract public function init();
    
    abstract public function loadValues(array $aValues);
}
