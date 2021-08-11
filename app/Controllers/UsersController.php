<?php


namespace app\Controllers;

use app\Services\EmailService;
use app\Services\UserActivationService;
use app\Services\UsersAuthService;
use app\Models\Users\User;
use app\Requests\UserRequests;

class UsersController extends AbstractController
{
    public function signUp()
    {
        if (!empty($_POST)) {
            $validate = new UserRequests($_REQUEST);
            if (($validate->getErrors())) {
                $this->view->renderHTML('users/signUp.php', ['errors' => $validate->getErrors()]);
                return;
            }

            $user = User::signUp($_POST); //TODO::передавать из валиации массив с отвалидированными данными из input

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

    public function login()
    {
        if (!empty($_POST)){
            $validate = new UserRequests($_REQUEST);
            if ($validate->getErrors()){
                $this->view->renderHTML('users/login.php', ['errors' => $validate->getErrors()]);
                return;
            }
            $user = User::login($_POST);
            UsersAuthService::createToken($user);
            header('Location: /');
            exit();
        }
        $this->view->renderHTML('users/login.php');
    }

    public function logout()
    {
        if (!empty($_COOKIE['token'])){
            UsersAuthService::deleteTokenInCookie();
            header('Location: /');
            exit();
        }
    }
}