<?php

namespace User\View\Helper;

use User\Service\AuthenticationService;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;
use Zend\View\Helper\AbstractHelper;

class Authentication extends AbstractHelper implements ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;

    protected $count = 0;

    public function __invoke()
    {
        $this->count++;
        /** @var AuthenticationService $authenticationService */
        $authenticationService = $this
            ->getServiceLocator()
            ->getServiceLocator()
            ->get('User\Service\AuthenticationService');

        if ($authenticationService->hasIdentity()) {
            $identity = $authenticationService->getIdentity();

            $output = "You are logged as $identity->username with role $identity->role";
        } else {
            $output = "You are not logged in";
        }

        return htmlspecialchars($output, ENT_QUOTES, 'UTF-8');
    }
}