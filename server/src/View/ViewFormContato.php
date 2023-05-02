<?php

namespace Source\View;
use Source\Components\Field;
use Source\Components\Select;

class ViewFormContato extends ViewForm
{

    public function init()
    {
        $this->setTitle('Contatos');
        $this->getForm()
             ->addField(new Field('number', 'id', 'ID'))
             ->addField(new Select('tipo', 'Tipo'))
             ->addField(new Field('text', 'descricao', 'Descrição'))
             ->addField(new Select('Pessoa_id', 'Pessoa'));
        $this->getForm()->addButtonConfirm();
        $this->getForm()->addButtonCancel('/contato');
    }
}
