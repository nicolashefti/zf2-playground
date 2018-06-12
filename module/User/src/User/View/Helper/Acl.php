<?php

namespace User\View\Helper;


use User\Service\AclService;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;
use Zend\View\Helper\AbstractHelper;

class Acl extends AbstractHelper implements ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;

    public function __invoke()
    {
        /** @var AclService $acl */
        $acl = $this
            ->getServiceLocator()
            ->getServiceLocator()
            ->get('User\Service\Acl');

        return $acl;
    }
}