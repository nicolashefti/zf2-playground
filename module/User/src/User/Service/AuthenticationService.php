<?php

namespace User\Service;

Use Zend\Authentication\AuthenticationService as ZfAuthenticationService;

class AuthenticationService extends ZfAuthenticationService
{
    public function getCurrentUser()
    {
        if ($this->hasIdentity()) {
            $identity = $this->getIdentity();

            $output = "You are logged as $identity->username with role $identity->role";
        } else {
            $output = "You are not logged in";
        }
    }
}