<?php

use App\Routing\AbstractRouter;
use App\Routing\ArticleRouter;
use App\Routing\HomeRouter;
use App\Routing\LoginRouter;
use App\Routing\UserRouter;

require __DIR__ . '/../includes.php';

$page = AbstractRouter::secure($_GET['c'])?? 'home';
$method = AbstractRouter::secure($_GET['a']) ?? 'index';

// Defining the right controller.
switch ($page) {
    case 'home':
        HomeRouter::route();
        break;
    case 'user':
        UserRouter::route($method);
        break;
    case 'article':
        ArticleRouter::route($method);
        break;
    case 'login':
        LoginRouter::route();
        break;
    default:
        (new ErrorController())->error404($page);
}
