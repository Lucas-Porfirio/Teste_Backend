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
        if($aParam['nome']){
            $this->getView()->loadValues($this->getQueryFindByName($aParam['nome'])->getResult());
            $this->getView()->getTable()->setFind($aParam['nome']);
            $this->getView()->render();
        }else{
            parent::index();
        }
    }

    public static function form()
    {
        require_once('./src/View/ViewFormPessoa.php');
    }

    public function getQueryFindByName($sName) {
        $oQueryBuilder = $this->getModel()->getEntityManager()->createQueryBuilder();
        $oQueryBuilder->select('p')
                      ->from('Source\Model\ModelPessoa', 'p')
                      ->where('LOWER(p.nome) LIKE :nome')
                      ->setParameter('nome', '%'.strtolower($sName).'%');
        return $oQueryBuilder->getQuery();
    }
}
