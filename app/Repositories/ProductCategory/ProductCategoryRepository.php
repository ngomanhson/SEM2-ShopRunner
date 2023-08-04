<?php

namespace App\Repositories\ProductCategory;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Repositories\BaseRepositories;

class ProductCategoryRepository extends BaseRepositories implements ProductCategoryRepositoryInterface
{

    public function getModel()
    {
        return ProductCategory::class;
    }
}
