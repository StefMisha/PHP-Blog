<?php


namespace app\Controllers;

use app\Exceptions\InvalidArgumentExceptions;
use app\View\View;
use app\Models\Users\User;
use app\Requests\UserRequests;

class UsersController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../public/view');
    }
    public function signUp()
    {
        if (!empty($_POST)) {
            $validate = new UserRequests($_REQUEST);
            if (($validate->getErrors())) {
                $this->view->renderHTML('users/signUp.php', ['errors' => $validate->getErrors()]);
                return;
            }

            echo 'Норм';
            $user = User::signUp($_POST);

            if ($user instanceof User) {
                $this->view->renderHTML('users/signUpSuccessful.php');
                return;
            }
        }
        $this->view->renderHTML('users/signUp.php');
    }
}