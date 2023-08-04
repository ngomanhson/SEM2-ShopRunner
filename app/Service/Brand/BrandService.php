<?php

namespace App\Service\Brand;

use App\Repositories\Brand\BrandRepository;

use App\Repositories\Brand\BrandRepositoryInterface;
use App\Service\BaseService;

class BrandService extends BaseService implements BrandServiceInterface
{
    public $repository;
    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        $this->repository=$brandRepository;
    }

}
