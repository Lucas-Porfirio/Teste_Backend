<?php

namespace Source\Controller;

use Source\Model\ModelContato;
use Source\View\ViewTableContato;

class ControllerTableContato extends ControllerBase
{

    public function getInstanceView()
    {
        return new ViewTableContato();
    }

    public function getInstanceModel()
    {
        return new ModelContato();
    }

    public function index($aParam = null) {
        if(isset($aParam['nome'])){
            $this->getView()->loadValues($this->getQueryFindByName($aParam['nome'])->getResult());
            $this->getView()->getTable()->setFind($aParam['nome']);
            $this->getView()->render();
        }else{
            parent::index();
        }
    }
    
    public function getQueryFindByName($sName) {
        $oQueryBuilder = $this->getModel()->getEntityManager()->createQueryBuilder();
        $oQueryBuilder->select('p')
                      ->from('Source\Model\ModelContato', 'p')
                      ->where('LOWER(p.nome) LIKE :nome')
                      ->setParameter('nome', '%'.strtolower($sName).'%');
        return $oQueryBuilder->getQuery();
    }
}
