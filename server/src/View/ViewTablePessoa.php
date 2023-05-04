<?php

namespace Source\View;

use Source\Components\Action;

class ViewTablePessoa extends ViewTable
{

    public function init()
    {
        $this->setTitle('Pessoas');
        $this->getTable()
             ->addColumn('id', 'ID')
             ->addColumn('nome', 'Nome')
             ->addColumn('cpf', 'CPF');
        $this->getTable()->addAction(new Action('pessoa'));
        $this->getTable()->setUseSearch(true);
    }
}
