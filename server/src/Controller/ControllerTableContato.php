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

}
