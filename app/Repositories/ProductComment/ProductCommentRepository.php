<?php

namespace App\Repositories\ProductComment;

use App\Models\Product;
use App\Models\ProductComment;
use App\Repositories\BaseRepositories;

class ProductCommentRepository extends BaseRepositories implements ProductCommentRepositoryInterface
{

    public function getModel()
    {
        return ProductComment::class;
    }
}
