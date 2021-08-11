<?php


namespace app\Controllers;


use app\Services\UsersAuthService;
use app\View\View;

abstract class AbstractController
{
    /**
     * @var mixed|null
     */
    protected $user;

    protected $view;

    public function __construct()
    {
        $this->user = UsersAuthService::getUserByToken();
        $this->view = new View(__DIR__ . '/../../public/view');
        $this->view->setVar('user', $this->user);
    }

}