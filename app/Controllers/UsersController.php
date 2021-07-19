<?php


namespace app\Controllers;

use app\View\View;

class UsersController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../public/view');
    }
    public function singUp()
    {
        $this->view->renderHTML('auth/user.php', [], 200);
    }

}