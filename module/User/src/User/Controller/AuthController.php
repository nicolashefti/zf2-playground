<?php

namespace User\Controller;

use User\Service\AuthenticationService;
use Zend\Mvc\Controller\AbstractActionController;

class AuthController extends AbstractActionController
{
    public function loginAction()
    {
        /** @var AuthenticationService $authenticationService */
        $authenticationService = $this->serviceLocator->get('User\Service\AuthenticationService');

        $result = $authenticationService
            ->getAdapter()
            ->setIdentity('admin')
            ->setCredential('pass')
            ->authenticate();

        var_dump($result->getIdentity());

        print_r($authenticationService->getAdapter()->getResultRowObject());

        $authenticationService->getStorage()->write(
            $authenticationService->getAdapter()->getResultRowObject([
                'username', 'role'
            ])
        );

        $this->flashMessenger()->addMessage('Bonjour et bienvenue');

    }

    public function logoutAction()
    {

    }
}