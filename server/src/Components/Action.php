<?php
namespace Source\Components;
class Action {

    public function __construct($sLink) {
        $this->setLink($sLink);
    }

    private $link;
    private $key;

    public function getLink()
    {
        return $this->link;
    }

    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    public function getCreate() {
        return '<a class="btn btn-success mr-2 mb-4" href="/'.$this->getLink().'/new'.'">Novo</a>';
    }

    public function getDelete() {
        return '<a href="/'.$this->getLink().'/confirm-delete/'.$this->getKey().'"><i class="bi ms-3 bi-trash"></i></a>';
    }

    public function getEdit() {
        return '<a href="/'.$this->getLink().'/edit/'.$this->getKey().'"><i class="bi ms-3 bi-pencil"></i></a>';
    }

    public function getVisualize() {
        return '<a href="/'.$this->getLink().'/view/'.$this->getKey().'"><i class="bi bi-eye-fill"></i></a>';
    }

    public function loadActions() {
        $sActions  = $this->getVisualize();
        $sActions .= $this->getEdit();
        $sActions .= $this->getDelete();
        return '<td class="col-1">'.$sActions.'</td>';
    }
}