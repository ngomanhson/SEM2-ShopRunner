<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Service\Product\ProductServiceInterface;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    private $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService =  $productService;
    }

    public function index()
    {
        $carts = Cart::content();
        $subtotal = str_replace(',', '', Cart::subtotal());
        $vatRate = 0.1;
        $vatAmount = $subtotal * $vatRate;
        $total = $subtotal + $vatAmount;

        $subtotal = number_format($subtotal, 2, '.', '');
        $vatAmount = number_format($vatAmount, 2, '.', '');
        $total = number_format($total, 2, '.', '');

        foreach ($carts as $cart) {
            $product = Product::where('id', $cart->id)->first();
            $cart->slug = $product->slug;

            $cart->productDetails = $product->productDetails;
        }


        return view('front.shop.cart', compact('carts', 'total', 'subtotal', 'vatAmount', 'vatRate'));
    }




    public function add(Request $request){

        if ($request->ajax()){
            $product = $this->productService->find($request->productId);
            $response['cart']= Cart::add([
                'id' => $product->id,
                'name'=>$product->name,
                'qty'=>1,
                'price'=>  $product-> price,
                'weight'=> $product -> weight ?? 0 ,
                'options'=> [

                    'images'=>$product->productImages,
                ],
            ]);
            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
            return $response;
        }

        return back();
    }

    public function delete(Request $request){
        if ($request->ajax()){
            $response['cart'] = Cart::remove($request->rowId);

            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
            $response['subtotal'] = Cart::subtotal();
            return $response;
        }
        return back();
    }


    public function update(Request $request)
    {
        if ($request->ajax()) {
            $response['cart'] = Cart::update($request->rowId, $request->qty);

            $response['count'] = Cart::count();
            $response['total'] = number_format(floatval(str_replace(',', '', Cart::total())), 2, '.', '');
            $response['subtotal'] = number_format(floatval(str_replace(',', '', Cart::subtotal())), 2, '.', '');

            return $response;
        }
    }

}

