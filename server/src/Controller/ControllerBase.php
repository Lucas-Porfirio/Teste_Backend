<?php
namespace Source\Controller;
abstract class ControllerBase {

    private $View;
    private $Model;

    abstract public function getInstanceView();

    abstract public function getInstanceModel();

    public function getView()
    {
        $this->View ??= $this->getInstanceView();
        return $this->View;
    }

    public function setView($View)
    {
        $this->View = $View;
        return $this;
    }

    public function getModel()
    {
        $this->Model ??= $this->getInstanceModel();
        return $this->Model;
    }

    public function setModel($Model)
    {
        $this->Model = $Model;
        return $this;
    }

    public function index($aParam = null)
    {
        $this->getView()->loadValues($this->getModel()->getRepository()->findAll());
        $this->getView()->render();
    }

}