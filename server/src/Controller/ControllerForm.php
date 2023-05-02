<?php

namespace Source\Controller;

abstract class ControllerForm extends ControllerBase
{

    abstract public function form($aParam = null);

    abstract public function show($aParam);

    abstract public function confirmDelete($aParam);

    public function update($aParam = null, $aData = null) {
        if(!$oModel = $this->getModel()->getRepository()->find($aParam['id'])){
            echo'Registro não encontrado para o ID: '.$aParam['id'];
            die;
        }
        $this->loadData($oModel, $aData);
        $oModel->setId($aParam['id']);
        $this->getModel()->getEntityManager()->flush();
    }

    public function create($aData) {
        $aData['id'] = null;
        $this->loadData($this->getModel(), $aData);
        $this->getModel()->getEntityManager()->persist($this->getModel());
        $this->getModel()->getEntityManager()->flush();
    }

    public function delete($aParam = null) {
        if(!$oModel = $this->getModel()->getRepository()->find($aParam['id'])){
            echo'Registro não encontrado para o ID: '.$aParam['id'];
            die;
        }
        $this->getModel()->getEntityManager()->remove($oModel);
        $this->getModel()->getEntityManager()->flush();
    }

    public function loadData($oModel, $aData) {
        foreach($aData as $sKey => $xData){
            $oModel->{'set'.$sKey}($xData);
        }
    }
}
