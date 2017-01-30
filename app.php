<?php

use App\Controller\ListController;

require_once "vendor/autoload.php";

$controller = new ListController();

parse_str($_SERVER['QUERY_STRING'], $action);

switch ($action['action']) {
    case 'list':
        $controller->index();
        break;
    case 'add':
        $controller->add();
        break;
    default:
        $controller->noResourceFound();
        break;
}

