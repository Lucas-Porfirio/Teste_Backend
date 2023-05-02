<?php

namespace Source\View;

use Source\Components\Action;

class ViewTableContato extends ViewTable
{

    public function init()
    {
        $this->setTitle('Contatos');
        $this->getTable()
             ->addColumn('id', 'ID')
             ->addColumn('tipo', 'Tipo')
             ->addColumn('descricao', 'Descrição')
             ->addColumn('Pessoa_nome', 'Nome');
        $this->getTable()->addAction(new Action('contato'));
    }
}
