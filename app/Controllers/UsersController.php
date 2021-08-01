<?php


namespace app\Controllers;

use app\Exceptions\InvalidArgumentExceptions;
use app\Services\EmailService;
use app\Services\UserActivationService;
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

            $user = User::signUp($_POST); //TODO::передавать из валиации массив с отвалидированными данными из input
            echo '<pre>';
var_dump($user);
            if ($user instanceof User) {
                $code = UserActivationService::createActivationCode($user);

                EmailService::send($user, 'Активация', 'userActivation.php', [
                    'userId' => $user->getId(),
                    'code' => $code
                ]);

                $this->view->renderHTML('users/signUpSuccessful.php');
                return;
            }
        }
        $this->view->renderHTML('users/signUp.php');
    }
    public function activate($userId, $activationCode)//активация условная, сервис по отправки почты не работает локально
    {
        $user = User::find($userId);
        $isCodeValid = UserActivationService::checkActivationCode($user, $activationCode);
        if ($isCodeValid) {
            $user->activate();
            echo 'Ok';
        }
    }
}