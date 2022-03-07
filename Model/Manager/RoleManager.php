<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\Role;
use App\Model\Entity\User;

final class RoleManager
{

    /**
     * Fetch all roles.
     * @return array
     */
    public static function findAll(): array
    {
        $roles = [];
        $query = DB::getPDO()->query("SELECT * FROM role");
        if($query) {
            foreach($query->fetchAll() as $roleData) {
                $roles[] = (new Role())
                    ->setId($roleData['id'])
                    ->setRoleName($roleData['role_name'])
                ;
            }
        }
        return $roles;
    }

    /**
     * Return all given user roles.
     * @param int $roleId
     * @return array
     */
    public static function getRolesByUser(User $user): array
    {
        $roles = [];
        $rolesQuery = DB::getPDO()->query("
            SELECT * FROM role WHERE id IN (SELECT role_fk FROM user_role WHERE user_fk = {$user->getId()});
        ");

        if($rolesQuery){
            foreach($rolesQuery->fetchAll() as $roleData) {
                $roles[] = (new Role())
                    ->setId($roleData['id'])
                    ->setRoleName($roleData['role_name'])
                ;
            }
        }

        return $roles;
    }

}