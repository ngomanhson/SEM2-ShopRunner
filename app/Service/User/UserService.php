<?php

namespace App\Service\User;

use App\Repositories\User\UserRepository;

use App\Repositories\User\UserRepositoryInterface;
use App\Service\BaseService;

class UserService extends BaseService implements UserServiceInterface
{
    public $repository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->repository=$userRepository;
    }
    public function searchAndPaginate(){
        return $this->repository->searchAndPaginate();
    }


}
