<?php

namespace App\Repositories\Brand;

use App\Models\Product;
use App\Models\Brand;
use App\Repositories\BaseRepositories;

class BrandRepository extends BaseRepositories implements BrandRepositoryInterface
{

    public function getModel()
    {
        return Brand::class;
    }
}
