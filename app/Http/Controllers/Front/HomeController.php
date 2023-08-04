<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Blog\BlogServiceInterface;
use App\Service\Product\ProductServiceInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    private $productService;
    private $blogService;
    public function __construct(ProductServiceInterface $productService ,BlogServiceInterface $blogService)
    {
        $this->productService = $productService;
        $this->blogService = $blogService;
    }

    public function index(){

        $featuredProducts=$this->productService->getFeaturedProducts();
        $blogs =$this->blogService->getLatestBlogs();

        //Add To Card
        $carts = Cart::content();
        $subtotal = Cart::subtotal();

        return view('front.index',[
            'featuredProducts'=>$featuredProducts,
            'blogs'=> $blogs,
            compact('carts', 'subtotal')
        ]);
    }

}
