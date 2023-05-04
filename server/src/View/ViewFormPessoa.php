<?php

namespace Source\View;
use Source\Components\Field;

class ViewFormPessoa extends ViewForm
{

    public function init()
    {
        $this->setTitle('Pessoas');
        $oFieldCpf = new Field('text', 'cpf', 'CPF', '11');
        $oFieldCpf->setExpr('\d{3}\.?\d{3}\.?\d{3}-?\d{2}');
        $this->getForm()
             ->addField(new Field('number', 'id', 'ID', '', '', false))
             ->addField(new Field('text', 'nome', 'Nome'))
             ->addField($oFieldCpf);
        $this->getForm()->addButtonConfirm();
        $this->getForm()->addButtonCancel('/');
    }

    public function getScript()
    {
        return file_get_contents('src/View/js/ViewFormPessoa.js');
    }
}
