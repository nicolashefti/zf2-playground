<?php

namespace User\Controller;

use User\Service\AuthenticationService;
use Zend\Mvc\Controller\AbstractActionController;

class AuthController extends AbstractActionController
{
    public function loginAction()
    {
        $request = $this->getRequest();

        if ($request->isPost()) {
            /** @var AuthenticationService $authenticationService */
            $authenticationService = $this->serviceLocator->get('User\Service\AuthenticationService');

            $post = $request->getPost();

            $result = $authenticationService
                ->getAdapter()
                ->setIdentity($post->username)
                ->setCredential($post->password)
                ->authenticate();

            if ($result->isValid()) {
                $authenticationService->getStorage()->write(
                    $authenticationService->getAdapter()->getResultRowObject([
                        'username', 'role'
                    ])
                );

                $this->flashMessenger()->addMessage('Bonjour et bienvenue');

                return $this->redirect()->toUrl('/');
            } else {
                $this->flashMessenger()->addMessage('Invalid credentials');
            }
        }
    }

    public function logoutAction()
    {
        /** @var AuthenticationService $authenticationService */
        $authenticationService = $this->serviceLocator->get('User\Service\AuthenticationService');

        $authenticationService->clearIdentity();

        $this->flashMessenger()->addMessage('You have been logged out');

        return $this->redirect()->toUrl('/');
    }
}