<?php

use App\Controller\AbstractController;
use App\Model\Manager\UserManager;

class UserController extends AbstractController
{
    /**
     * UserController entry point - default action.
     */
    public function index()
    {
        $this->render('user/users-list', [
            'users_list' => UserManager::getAll()
        ]);
    }

    /**
     * Fetch and display some users statistics.
     * @return void
     */
    public function showStats()
    {
        $this->render('user/statistics', [
            'users_count' => UserManager::getUsersCount(),
            'min_age' => UserManager::getMinAge()
        ]);
    }


    /**
     * Display a specific user information.
     * @param int $id
     * @return void
     */
    public function showUser(int $id)
    {
        if(!UserManager::userExists($id)) {
            $this->index();
        }
        else {
            $this->render('user/show-user', [
                'user' => UserManager::getUser($id),
            ]);
        }
    }


    // TODO
    public function editUser(int $id, string $category) {
        echo "edit piaf";
        var_dump([
            '$id' => $id,
            '$category' => $category,
        ]);
    }


    /**
     * Route handling users deletion.
     * @param int $id
     * @return void
     */
    public function deleteUser(int $id)
    {
        if(UserManager::userExists($id)) {
            $user = UserManager::getUser($id);
            $deleted = UserManager::deleteUser($user);
        }
        $this->index();
    }
}
