<?php

namespace User\View\Helper;


use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;
use Zend\View\Helper\AbstractHelper;

class Acl extends AbstractHelper implements ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;

    public function __invoke()
    {
        $acl = $this
            ->getServiceLocator()
            ->getServiceLocator()
            ->get('');

        return $acl;
    }
}