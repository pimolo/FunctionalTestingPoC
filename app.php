<?php

use App\Controller\ListController;

require_once "vendor/autoload.php";

$controller = new ListController();

parse_str($_SERVER['QUERY_STRING'], $action);
ob_start('ob_gzhandler');

switch ($action['action']) {
    case 'list':
        $controller->index();
        break;
    case 'add':
        $controller->add();
        break;
    case 'remove':
        $controller->delete();
        break;
    default:
        $controller->noResourceFound();
        break;
}
ob_end_flush();
