<?php

use App\Model\Manager\UserManager;
class LoginController extends UserController
{
    public function index()
    {
        $this->render('login/login');
    }
//todo
    public function addUser(...$params) {
        if ($_POST['submit']) {
            $make = UserManager::makeUser()->setEmail($_POST['username']);
        }
    }
}
