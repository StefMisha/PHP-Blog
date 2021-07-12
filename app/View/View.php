<?php

namespace app\View;

class View
{
    private $viewPath;

    public function __construct($viewPath)
    {
        $this->viewPath = $viewPath;
    }

    public function renderHTML ($viewName, $vars = [], $code = 200)
    {
        http_response_code($code);
        extract($vars);

        ob_start();
        include $this->viewPath . '/' . $viewName;
        $buffer = ob_get_contents();
        ob_end_clean();

        echo $buffer;
    }

}