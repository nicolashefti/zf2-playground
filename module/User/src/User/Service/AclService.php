<?php

namespace User\Service;

use Zend\Mvc\MvcEvent;
use Zend\Permissions\Acl\Acl;

class AclService extends Acl
{
    private $authenticationService;

    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    public function checkAcl(MvcEvent $e)
    {
        $userRole = 'guest';

        if ($this->authenticationService->hasIdentity()) {
            $storage = $this->authenticationService->getStorage()->read();
            $userRole = $storage->role;
        }

        $controller = $e->getRouteMatch()->getParam('controller');
        $action = $e->getRouteMatch()->getParam('action');

        $resource = $controller . "::" . $action;

        if (!$this->isAllowed($userRole, $resource)) {
            $response = $e->getResponse();
            //location to page or what ever
            $response->getHeaders()->addHeaderLine('Location', $e->getRequest()->getBaseUrl() . '/404');
            $response->setStatusCode(404);
        }
    }

    /**
     * @param null $resource
     * @param null $privilege
     * @return bool
     */
    public function isCurrentUserAllowed($resource = null, $privilege = null)
    {
        if ($this->authenticationService->hasIdentity()) {
            $role = $this->authenticationService->getStorage()->read()->role;

            return parent::isAllowed($role, $resource, $privilege);
        } else {
            return false;
        }
    }
}