<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\ShopController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/',function (){
 //  return view('front.index') ;
  //return \App\Models\Blog::all();
  //  return \App\Models\Product::find(1)->brand;
//});

//Route::get('/',function (\App\Repositories\Product\ProductRepositoryInterface $productRepository){
//   return $productRepository->all();
//});
//Route::get('/',function (\App\Service\Product\ProductServiceInterface $productService){
//   return $productService->find(2);
//});
// trang chủ
Route::get('/',[\App\Http\Controllers\Front\HomeController::class,'index']);



Route::prefix("/shop")->group(function () {
    Route::get('/',[\App\Http\Controllers\Front\ShopController::class,'index']);
    Route::get('/product/{slug}',[\App\Http\Controllers\Front\ShopController::class,'show']);
    Route::post('/product/{slug}',[\App\Http\Controllers\Front\ShopController::class,'postComment']);
    Route::get('/category/{categoryName}',[\App\Http\Controllers\Front\ShopController::class,'category']);
});



//trang shop cart
Route::prefix('shop')->group(function (){
    //sản phẩm chi tiết
    Route::get('product/{slug}',[\App\Http\Controllers\Front\ShopController::class,'show']);
//đăng comment
    Route::post('product/{slug}',[\App\Http\Controllers\Front\ShopController::class,'postComment']);
//trang sản phẩm
    Route::get('',[\App\Http\Controllers\Front\ShopController::class,'index']);
    Route::get('category/{categoryName}',[\App\Http\Controllers\Front\ShopController::class,'category']);
});
Route::prefix('/cart')->group(function (){
    Route::get('/',[\App\Http\Controllers\Front\CartController::class,'index']);
//    Route::get('add',[\App\Http\Controllers\Front\CartController::class,'add']);
    Route::get('add', [\App\Http\Controllers\Front\CartController::class, 'add'])->name('cart.add');

    Route::get('delete',[\App\Http\Controllers\Front\CartController::class,'delete']);
    Route::get('update',[\App\Http\Controllers\Front\CartController::class,'update']);
});

//trang checkout
Route::prefix('/checkout')->group(function (){
    Route::get('/',[\App\Http\Controllers\Front\CheckoutController::class,'index']);
    Route::post("/",[\App\Http\Controllers\Front\CheckoutController::class,"placeOrder"]);
    Route::post("/update-total",[\App\Http\Controllers\Front\CheckoutController::class,"updateTotal"]);
    Route::get("/thank-you/",[\App\Http\Controllers\Front\CheckoutController::class,"thankYou"]);
    Route::get('/success-transaction/{order}', [\App\Http\Controllers\Front\CheckoutController::class, 'successTransaction'])->name('successTransaction');
    Route::get('/cancel-transaction/{order}', [\App\Http\Controllers\Front\CheckoutController::class, 'cancelTransaction'])->name('cancelTransaction');
});

//trang blog
Route::prefix('/blog')->group(function () {
    Route::get('/',[\App\Http\Controllers\Front\BlogController::class,'index']);
    Route::get('/{slug}',[\App\Http\Controllers\Front\BlogController::class,'blogDetail']);
});

//trang contacts
Route::get('contact',[\App\Http\Controllers\Front\ContactsController::class,'index']);

//Account
Route::prefix('account')->group(function () {
    Route::get('login',[\App\Http\Controllers\Front\AccountController::class,'login']);
    Route::post('login',[\App\Http\Controllers\Front\AccountController::class,'checkLogin']);
    Route::get('logout',[\App\Http\Controllers\Front\AccountController::class,'logout']);
    Route::get('register',[\App\Http\Controllers\Front\AccountController::class,'register']);
    Route::post('register',[\App\Http\Controllers\Front\AccountController::class,'postRegister']);


    Route::prefix('my-order')->middleware('CheckMemberLogin')->group(function (){
        Route::get('/',[\App\Http\Controllers\Front\AccountController::class,'myOrder']);
        Route::get('/{orderCode}',[\App\Http\Controllers\Front\AccountController::class,'orderDetail']);
    });
});

//dashboard(Admin)
Route::prefix('admin')->middleware('CheckAdminLogin')->group(function (){
    Route::redirect('','admin/dashboard');
    Route::resource('product/{product_id}/image',\App\Http\Controllers\Admin\ProductImageController::class);
    Route::resource('product/{product_id}/detail',\App\Http\Controllers\Admin\ProductDetailController::class);

    //xử lý phân quyền nâng cao
    Route::get('/permission/add',[\App\Http\Controllers\Admin\PermissionController::class,'add'])->name('permission.add');
    Route::post('/permission/store',[\App\Http\Controllers\Admin\PermissionController::class,'store'])->name('permission.store');
    Route::get('/permission/edit/{id}',[\App\Http\Controllers\Admin\PermissionController::class,'edit'])->name('permission.edit');
    Route::post('/permission/update/{id}',[\App\Http\Controllers\Admin\PermissionController::class,'update'])->name('permission.update');
    Route::get('/permission/delete/{id}',[\App\Http\Controllers\Admin\PermissionController::class,'delete'])->name('permission.delete');

    Route::get('/role',[\App\Http\Controllers\Admin\RoleController::class,'index'])->name('role.index')->can('role.view');
    Route::get('/role/add',[\App\Http\Controllers\Admin\RoleController::class,'add'])->name('role.add')->can('role.add');
    Route::post('/role/store',[\App\Http\Controllers\Admin\RoleController::class,'store'])->name('role.store')->can('role.add');
    Route::get('/role/edit/{role}',[\App\Http\Controllers\Admin\RoleController::class,'edit'])->name('role.edit')->can('role.edit');
    Route::post('/role/update/{role}',[\App\Http\Controllers\Admin\RoleController::class,'update'])->name('role.update')->can('role.edit');
    Route::get('/role/delete/{role}',[\App\Http\Controllers\Admin\RoleController::class,'delete'])->name('role.delete')->can('role.delete');






//xử lý route category
    Route::prefix('category')->group(function (){
        Route::get('',[\App\Http\Controllers\Admin\ProductCategoryController::class,'index'])->can('category.view');
        Route::get('create',[\App\Http\Controllers\Admin\ProductCategoryController::class,'create'])->can('category.add');
        Route::post('store',[\App\Http\Controllers\Admin\ProductCategoryController::class,'store'])->can('category.add');
        Route::post('action',[\App\Http\Controllers\Admin\ProductCategoryController::class,'action'])->can('category.view');
        Route::get('edit/{id}',[\App\Http\Controllers\Admin\ProductCategoryController::class,'edit'])->name('category.edit')->can('category.edit');
        Route::post('edit/update/{id}',[\App\Http\Controllers\Admin\ProductCategoryController::class,'update'])->name('category.update')->can('category.edit');
        Route::get('delete/{id}',[\App\Http\Controllers\Admin\ProductCategoryController::class,'delete'])->name('delete_category')->can('category.delete');

    });
    //xử lý product
    Route::prefix('product')->group(function (){
        Route::get('',[\App\Http\Controllers\Admin\ProductController::class,'index'])->can('product.view');
        Route::get('create',[\App\Http\Controllers\Admin\ProductController::class,'create'])->can('product.add');
        Route::post('store',[\App\Http\Controllers\Admin\ProductController::class,'store'])->can('product.add');
        Route::get('edit/{id}',[\App\Http\Controllers\Admin\ProductController::class,'edit'])->name('product.edit')->can('product.edit');
        Route::post('edit/update/{id}',[\App\Http\Controllers\Admin\ProductController::class,'update'])->name('product.update')->can('product.edit');
        Route::get('show/{id}',[\App\Http\Controllers\Admin\ProductController::class,'show'])->name('product.show');
        Route::post('action',[\App\Http\Controllers\Admin\ProductController::class,'action'])->can('product.view');
        Route::get('delete/{id}',[\App\Http\Controllers\Admin\ProductController::class,'delete'])->name('delete_product')->can('product.delete');
        //xử lý ảnh product

    });
//xử lý Brand
    Route::prefix('brand')->group(function (){
        Route::get('',[\App\Http\Controllers\Admin\BrandController::class,'index'])->can('brand.view');
        Route::get('create',[\App\Http\Controllers\Admin\BrandController::class,'create'])->can('brand.add');
        Route::post('store',[\App\Http\Controllers\Admin\BrandController::class,'store'])->can('brand.add');
        Route::post('action',[\App\Http\Controllers\Admin\BrandController::class,'action'])->can('brand.view');
        Route::get('edit/{id}',[\App\Http\Controllers\Admin\BrandController::class,'edit'])->name('brand.edit')->can('brand.edit');
        Route::post('edit/update/{id}',[\App\Http\Controllers\Admin\BrandController::class,'update'])->name('brand.update')->can('brand.edit');
        Route::get('delete/{id}',[\App\Http\Controllers\Admin\BrandController::class,'delete'])->name('delete_brand')->can('brand.delete');
    });
//xử lý route user
    Route::prefix('user')->group(function (){
        Route::get('',[\App\Http\Controllers\Admin\UsersController::class,'index'])->can('user.view');
        Route::get('show/{id}',[\App\Http\Controllers\Admin\UsersController::class,'show'])->name('user.show');
        Route::get('create',[\App\Http\Controllers\Admin\UsersController::class,'create'])->can('user.add');
        Route::post('store',[\App\Http\Controllers\Admin\UsersController::class,'store'])->can('user.add');
        Route::post('action',[\App\Http\Controllers\Admin\UsersController::class,'action'])->can('user.view');
        Route::get('edit/{id}',[\App\Http\Controllers\Admin\UsersController::class,'edit'])->name('user.edit')->can('user.edit');
        Route::post('edit/update/{id}',[\App\Http\Controllers\Admin\UsersController::class,'update'])->name('user.update')->can('user.edit');
        Route::get('delete/{id}',[\App\Http\Controllers\Admin\UsersController::class,'delete'])->name('delete_user')->can('user.delete');
    });

    Route::get('dashboard',[\App\Http\Controllers\Admin\DashboardController::class,'index']);
    Route::get('/statistical',[\App\Http\Controllers\Admin\DashboardController::class,'statistical']);
    Route::get('/order7Days',[\App\Http\Controllers\Admin\DashboardController::class,'order7Days']);
    Route::get('orders',[\App\Http\Controllers\Admin\OrdersController::class,'index'])->can('orders.view');
    Route::post('/confirm-payment', [\App\Http\Controllers\Admin\OrdersController::class, 'confirmPayment'])->name('confirm.payment');
    Route::post('/orders/{orderId}/cancel', [\App\Http\Controllers\Admin\OrdersController::class,'cancelOrder']);

    Route::get('orders/show/{id}',[\App\Http\Controllers\Admin\OrdersController::class,'show'])->name('order.show');


// xử lý route login
    Route::prefix('login')->group(function (){
        Route::get('',[\App\Http\Controllers\Admin\HomeController::class,'getLogin'])->withoutMiddleware('CheckAdminLogin');
        Route::post('',[\App\Http\Controllers\Admin\HomeController::class,'postLogin'])->withoutMiddleware('CheckAdminLogin');
    });
    Route::get('logout',[\App\Http\Controllers\Admin\HomeController::class,'logout']);
});

