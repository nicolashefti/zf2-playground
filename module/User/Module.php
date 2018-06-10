<?php

namespace User;

use User\Model\User;
use User\Model\UserTable;
use User\Service\AuthenticationService;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Mvc\MvcEvent;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function onBootstrap(MvcEvent $mvcEvent)
    {
        /** @var AuthenticationService $authenticationService */
        $authenticationService = $mvcEvent->getApplication()->getServiceManager()->get('User\Service\AuthenticationService');

        if ($authenticationService->hasIdentity()) {
            var_dump('Current id:', $authenticationService->getIdentity());
        }
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                'User\Model\UserTable' => function ($sm) {
                    $tableGateway = $sm->get('UserTableGateway');
                    $table = new UserTable($tableGateway);
                    return $table;
                },
                'UserTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new User());
                    return new TableGateway('user', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }

}