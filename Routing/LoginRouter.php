<?php
namespace App\Routing;

use ErrorController;
use UserController;
use LoginController;

class LoginRouter extends AbstractRouter
{
//todo
    public static function route(?string $action = null)
    {
        (new \LoginController())->index();
        $controller = new UserController();
        switch ($action) {
            case 'index':
                $controller->index();
                break;
            case 'verification':
                $controller->addUser($_POST['username']);
                break;
            default:
                (new ErrorController())->error404($action);
        }
    }

}