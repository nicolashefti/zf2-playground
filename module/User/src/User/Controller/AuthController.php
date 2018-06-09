<?php

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class AuthController extends AbstractActionController
{
    public function loginAction()
    {
        $this->flashMessenger()->addMessage('Bonjour et bienvenue');

    }

    public function logoutAction()
    {

    }
}