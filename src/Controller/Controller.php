<?php

namespace App\Controller;

class Controller
{
    public function render($templatePath, array $parameters = [])
    {
        ob_start('ob_gzhandler');
        extract($parameters);
        require 'src/View/' . $templatePath;
        ob_end_flush();
    }
}
