<?php

namespace User\Form;

use Zend\Form\Form;

class UserForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('user');

        $this->add([
            'name' => 'id',
            'type' => 'Hidden',
        ]);
        $this->add([
            'name' => 'username',
            'type' => 'Text',
            'options' => [
                'label' => 'Name',
            ],
        ]);
        $this->add([
            'name' => 'password',
            'type' => 'Text',
            'options' => [
                'label' => 'Password',
            ],
        ]);
        $this->add([
            'name' => 'role',
            'type' => 'Text',
            'options' => [
                'label' => 'Role',
            ],
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => [
                'value' => 'Go',
                'id' => 'submitbutton',
            ],
        ]);
    }
}