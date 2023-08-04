<?php

namespace App\Service\User;

use App\Service\ServiceInterface;

interface UserServiceInterface extends ServiceInterface
{
    public function searchAndPaginate();
}
