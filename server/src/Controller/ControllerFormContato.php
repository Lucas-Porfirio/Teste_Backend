<?php

namespace Source\Controller;

use Source\Model\ModelContato;
use Source\View\ViewFormContato;

class ControllerFormContato extends ControllerForm
{

    public function getInstanceView()
    {
        return new ViewFormContato();
    }

    public function getInstanceModel()
    {
        return new ModelContato();
    }

    public function form($aParam = null)
    {
        if(isset($aParam['id'])){
            $this->getView()->loadValues([$this->getModel()->getRepository()->find($aParam['id'])]);
            $this->getView()->getForm()->findField('id')->setDisabled(true);
            $this->getView()->setTitle('Alterar Contato');
        }else{
            $this->getView()->getForm()->findField('id')->setHidden(true);
        }
        $this->loadValuesSelects();
        $this->getView()->render();
    }

    public function show($aParam) {
        $this->getView()->getForm()->doVisualize();
        $this->getView()->getForm()->removeButtonConfirm();
        $this->getView()->loadValues([$this->getModel()->getRepository()->find($aParam['id'])]);
        $this->loadValuesSelects();
        $this->getView()->setTitle('Visualizar Contato');
        $this->getView()->render();
    }

    public function confirmDelete($aParam) {
        $this->getView()->getForm()->doVisualize();
        $this->getView()->loadValues([$this->getModel()->getRepository()->find($aParam['id'])]);
        $this->loadValuesSelects();
        $this->getView()->setTitle('Excluir Contato');
        $this->getView()->render();
    }

    protected function loadValuesSelects() {
        $this->getView()->getForm()->findField('Pessoa_id')->loadValues($this->getValuesSelectPessoa());
        $this->getView()->getForm()->findField('tipo')->loadValues($this->getValuesSelectTipo());
    }

    protected function getValuesSelectPessoa() {
        return array_map(function($oPessoa) {
            return [
                'value' => $oPessoa->getId(),
                'name'  => $oPessoa->getNome()
            ];
        }, $this->getModel()->getModelPessoa()->getRepository()->findAll());
    }

    protected function getValuesSelectTipo() {
        return [
            [
                'value' => 0,
                'name'  => 'Telefone'
            ],
            [
                'value' => 1,
                'name'  => 'Email'
            ]
        ];
    }

    public function create($aData) {
        $this->getModel()->setModelPessoa($this->getModel()->getModelPessoa()->getRepository()->find($aData['Pessoa_id']));
        parent::create($aData);
    }
}
