<?php

namespace Source\Controller;

use Source\Model\ModelPessoa;
use Source\View\ViewFormPessoa;

class ControllerFormPessoa extends ControllerBase
{

    public function getInstanceView()
    {
        return new ViewFormPessoa();
    }

    public function getInstanceModel()
    {
        return new ModelPessoa();
    }

    public function form($aParam = null)
    {
        if(isset($aParam['id'])){
            $this->getView()->loadValues([$this->getModel()->getRepository()->find($aParam['id'])]);
            $this->getView()->getForm()->findField('id')->setDisabled(true);
        }
        $this->getView()->render();
    }

    public function show($aParam) {
        $this->getView()->getForm()->doVisualize();
        $this->getView()->getForm()->removeButtonConfirm();
        $this->form($aParam);
    }
}
