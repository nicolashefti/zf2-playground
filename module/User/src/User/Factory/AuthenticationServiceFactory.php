<?php

namespace User\Factory;

use User\Service\AuthenticationService;
use Zend\Authentication\Adapter\DbTable\CredentialTreatmentAdapter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AuthenticationServiceFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $dbAdapter = $serviceLocator->get('Zend\Db\Adapter\Adapter');
        $dbTableAuthAdapter = new CredentialTreatmentAdapter(
            $dbAdapter, 'user', 'username', 'password'
        );
        $authService = new AuthenticationService();
        $authService->setAdapter($dbTableAuthAdapter);
        return $authService;
    }
}