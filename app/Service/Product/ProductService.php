<?php

namespace App\Service\Product;

use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Service\BaseService;

class ProductService extends BaseService implements ProductServiceInterface
{
    public $repository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
       $this->repository = $productRepository;
    }

    public function find($id)
    {
        if (is_numeric($id)) {
            // Tìm kiếm bằng id nếu giá trị truyền vào là số nguyên
            $product = $this->repository->find($id);
        } else {
            // Tìm kiếm bằng slug nếu giá trị truyền vào không phải số nguyên
            $product = $this->repository->findBySlug($id);
        }

        $sumRating = 0;
        $countRating = 0;
        if ($product->productComments !== null) {
            foreach ($product->productComments as $comment) {
                $sumRating += $comment->rating;
                $countRating++;
            }
        }
        $avgRating = $countRating != 0 ? $sumRating / $countRating : 0;
        $product->avgRating = $avgRating;

        return $product;
    }


    public function getRelatedProducts($product, $limit =4)
    {
       return $this->repository->getRelatedProducts($product,$limit);
    }
    public function getFeaturedProducts()
    {
        return [
          "men"=> $this->repository->getFeaturedProductsByCategory(1,8),
          "women"=>$this->repository->getFeaturedProductsByCategory(2,8),
        ];
    }

    public function getProductOnIndex($request)
    {
        return $this->repository->getProductOnIndex($request);
    }


    public function getProductByCategory($categoryName,$request)
    {
        return $this->repository->getProductByCategory($categoryName,$request);
    }
    public function updateProductQty($product_id, $qty)
    {
        $product = Product::find($product_id);

        if ($product) {
            $product->qty = $qty;
            $product->save();
        }
    }

}
