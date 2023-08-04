<?php

namespace App\Repositories\Product;

use App\Repositories\RepositoriesInterface;

interface ProductRepositoryInterface extends RepositoriesInterface
{
    public function getRelatedProducts($product, $limit =4);
    public function getFeaturedProductsByCategory($categoryId ,$limit=8);
    public function getProductOnIndex($request);
    public function getProductByCategory($categoryName,$request);
}
