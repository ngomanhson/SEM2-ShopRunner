<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepositories;

class UserRepository extends BaseRepositories implements UserRepositoryInterface
{

    public function getModel()
    {
        return User::class;
    }
    public function searchAndPaginate(){
        $users = $this->model->paginate(3);
        return $users;
    }
}
