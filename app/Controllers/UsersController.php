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
        if (!empty($_POST))
//            try {
            $validate = new UserRequests($_REQUEST);
//            var_dump($validate);
//            $user = User::signUp($_POST);
//        }
//        catch (InvalidArgumentExceptions $e) {
            $this->view->renderHTML('users/signUp.php', ['errors' => $validate->getErrors()]);
            return;
//        }
        echo 'Норм';
        $this->view->renderHTML('users/signUp.php');
    }

}