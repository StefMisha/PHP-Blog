<?php

namespace app\View;

class View
{
    private $viewPath;

    private $extraVars = [];

    public function __construct($viewPath)
    {
        $this->viewPath = $viewPath;
    }

    public function setVar($name, $value)
    {
        $this->extraVars[$name] = $value;
    }

    public function renderHTML ($viewName, $vars = [], $code = 200)
    {
        http_response_code($code);
        extract($this->extraVars);
        extract($vars);

        ob_start();
        include $this->viewPath . '/' . $viewName;
        $buffer = ob_get_contents();
        ob_end_clean();

        echo $buffer;
    }

}