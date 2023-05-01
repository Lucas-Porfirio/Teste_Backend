<?php

namespace Source\Controller;

use Source\Model\ModelPessoa;
use Source\View\ViewTablePessoa;
use Doctrine\Common\Collections\Criteria;

class ControllerPessoa extends ControllerBase
{

    public function getInstanceView()
    {
        return new ViewTablePessoa();
    }

    public function getInstanceModel()
    {
        return new ModelPessoa();
    }

    public function index($aParam = null) {
        if($aParam){
            $oCriteria = Criteria::create()->where(Criteria::expr()->contains('nome', $aParam['nome']));
            $this->getView()->loadValues($this->getModel()->getRepository()->matching($oCriteria)->getValues());
            $this->getView()->render();
        }else{
            parent::index();
        }
    }

    public static function form()
    {
        require_once('./src/View/ViewFormPessoa.php');
    }

}
