<?php

namespace User\View\Helper;

use User\Service\AuthenticationService;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;
use Zend\View\Helper\AbstractHelper;

class Authentication extends AbstractHelper implements ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;

    public function __invoke()
    {
        /** @var AuthenticationService $authenticationService */
        $authenticationService = $this
            ->getServiceLocator()
            ->getServiceLocator()
            ->get('User\Service\AuthenticationService');

        return $authenticationService;
    }
}