<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\User;
use App\Service\Brand\BrandServiceInterface;
use App\Service\Product\ProductServiceInterface;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    private $productService;
    private  $brandService;
    private $productCategoryService;
    public function __construct(ProductServiceInterface $productService,
    BrandServiceInterface $brandService,
    ProductCategoryServiceInterface $productCategoryService)
    {
        $this->productService=$productService;
        $this->brandService=$brandService;
        $this->productCategoryService=$productCategoryService;
    }

    public function index(Request $request){
        $status = $request->input('status');
        $list_act = [
            'delete' => 'Temporary delete'
        ];
        if ($status == 'trash') {
            $list_act = [
                'restore' => 'Restore',
                'forceDelete' => 'Permanently deleted'
            ];
            $product = Product::onlyTrashed()->paginate(10);
        } else {

            $search = '';
            if ($request->input('search')) {
                $search = $request->input('search');
            }
            $product = Product::where('name', 'LIKE', "%{$search}%")->paginate(10);
        }
        $count_user_active = Product::count();
        $count_user_trash = Product::onlyTrashed()->count();
        $count = [$count_user_active, $count_user_trash];
        return view('admin.product.index', compact('product', 'count', 'list_act', 'status'));
    }
    public function show($id){
        $product =Product::find($id);
        return view('admin.product.show',['product' => $product]);
    }
    public function create(){
        $brands=$this->brandService->all();
        $productCategories=$this->productCategoryService->all();
        return view('admin.product.create',compact('brands','productCategories'));
    }
    public function store(Request $request){
//        $request->validate([
//                'name'=>'required|string|max:255',
//               'tag'=>'required',
//                'sku'=>'required',
//                'weight'=>'required',
//                'country'=>'required',
//                'price'=>'required',
//                'content'=>'required',
//                'product_category_id'=>'required',
//                'brand_id'=>'required',
//                'description'=>'required'
//            ]
//        );
        $data =$request->all();
        $data['qty']= 0;
        $data['slug'] = Str::slug($data['name']);
        $data['featured'] = 0;
        $product=$this->productService->create($data);
        return redirect('admin/product/show/' . $product->id);
    }
    public function edit($id){
        $product =Product::find($id);
        $brands=$this->brandService->all();
        $productCategories=$this->productCategoryService->all();
        return view('admin.product.edit',['product' => $product,
            'brands'=>$brands,
            'productCategories'=>$productCategories]);
    }
    public function update(Request $request, $id)
    {

        $data = $request->all();

        // Lấy thông tin người dùng cần cập nhật
        $product = Product::findOrFail($id);


        // Cập nhật dữ liệu người dùng
        $product->update($data);

        return redirect('admin/product/show/' . $product->id);

    }
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('admin/product')->with('status', 'Deleted member successfully');
    }
    public function action(Request $request){
        $list_check =$request->input('list_check');
        if ($list_check) {
            if (!empty($list_check)) {
                $act = $request->input('act');

                if ($act == 'delete') {
                    Product::destroy($list_check);
                    return redirect('admin/product')->with('status', 'You have successfully deleted');
                } elseif ($act == 'restore') {
                    Product::withTrashed()
                        ->whereIn('id', $list_check)
                        ->restore();
                    return redirect('admin/product')->with('status', 'You have successfully recovered');
                } elseif ($act == 'forceDelete') {
                    Product::withTrashed()
                        ->whereIn('id', $list_check)
                        ->forceDelete();
                    return redirect('admin/product')->with('status', 'You have permanently deleted');
                } else {
                    return redirect('admin/product')->with('status', 'Invalid action');
                }
            }

            return redirect('admin/product')->with('status', 'You need to choose an action to perform');
        }

        return redirect('admin/product')->with('status', 'No items selected');
    }

}
