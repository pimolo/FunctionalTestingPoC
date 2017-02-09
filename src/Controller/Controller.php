<?php

namespace App\Controller;

class Controller
{
    public function render($templatePath, array $parameters = [])
    {
        extract($parameters);
        require 'src/View/' . $templatePath;
    }
}
