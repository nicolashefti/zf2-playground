<?php

namespace User\Controller;

use User\Form\UserForm;
use User\Model\User;
use User\Model\UserTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController
{
    protected $userTable;

    public function indexAction()
    {
        return new ViewModel([
            'users' => $this->getUserTable()->fetchAll(),
        ]);
    }

    public function addAction()
    {
        $form = new UserForm();
        $form->get('submit')->setValue('Add');

        var_dump('add');
        $request = $this->getRequest();
        if ($request->isPost()) {
            var_dump('post');
            $user = new User();
            $form->setInputFilter($user->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $user->exchangeArray($form->getData());

                var_dump($user);
                $this->getUserTable()->saveUser($user);

                // Redirect to list of users
                return $this->redirect()->toRoute('user');
            } else {
                $messages = $form->getMessages();

                foreach ($messages as $message) {
                    $this->flashMessenger()->addMessage($message);
                }
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('user', [
                'action' => 'add'
            ]);
        }

        // Get the User with the specified id.  An exception is thrown
        // if it cannot be found, in which case go to the index page.
        try {
            $user = $this->getUserTable()->getUser($id);
        } catch (\Exception $ex) {
            return $this->redirect()->toRoute('user', [
                'action' => 'index'
            ]);
        }

        $form = new UserForm();
        $form->bind($user);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($user->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getUserTable()->saveUser($user);

                // Redirect to list of users
                return $this->redirect()->toRoute('user');
            }
        }

        return [
            'id' => $id,
            'form' => $form,
        ];
    }

    public function deleteAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('user');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int)$request->getPost('id');
                $this->getUserTable()->deleteUser($id);
            }

            // Redirect to list of users
            return $this->redirect()->toRoute('user');
        }

        return array(
            'id' => $id,
            'user' => $this->getUserTable()->getUser($id)
        );
    }

    /**
     * @return UserTable
     */
    public function getUserTable(): UserTable
    {
        if (!$this->userTable) {
            $sm = $this->getServiceLocator();
            $this->userTable = $sm->get('User\Model\UserTable');
        }
        return $this->userTable;
    }
}