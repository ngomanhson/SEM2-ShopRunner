<?php

namespace App\Service\ProductCategory;

use App\Repositories\ProductCategory\ProductCategoryRepositoryInterface;
use App\Service\BaseService;

class ProductCategoryService extends BaseService implements ProductCategoryServiceInterface
{
    public $repository;
    public function __construct(ProductCategoryRepositoryInterface $productCategoryRepository)
    {
        $this->repository=$productCategoryRepository;
    }

}
