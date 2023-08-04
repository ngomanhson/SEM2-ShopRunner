<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\User;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductCategoryController extends Controller
{
    private $productCategoryService;
    public function __construct(ProductCategoryServiceInterface $productCategoryService)

    {
        $this->productCategoryService = $productCategoryService;
    }
    public function index(Request $request)
    {
        $status =$request->input('status');
        $list_act =[
            'delete'=>'Temporary delete'
        ];
        if ($status == 'trash'){
            $list_act =[
                'restore'=>'Restore',
                'forceDelete'=>'Permanently deleted'
            ];
            $productCategory =ProductCategory::onlyTrashed()->paginate(10);
        }else{

            $search='';
            if ($request->input('search')){
                $search=$request->input('search');
            }
            $productCategory =ProductCategory::where('name','LIKE',"%{$search}%")->paginate(10);
        }
        $count_user_active =ProductCategory::count();
        $count_user_trash =ProductCategory::onlyTrashed()->count();
        $count =[$count_user_active,$count_user_trash];
        return view('admin.category.index',compact('productCategory','count','list_act','status'));

//        $productCategory =$this->productCategoryService->searchAndPaginate('name',$request->get('search'));
//        return view('admin.category.index' ,compact('productCategory'));
    }
    public function delete($id)
    {
        $productCategory = ProductCategory::find($id);

        if ($productCategory->products()->count() > 0) {
            // Có sản phẩm liên quan đến danh mục, không thể xóa
            return redirect('admin/category')->with('warning', 'Cannot delete category. There are products associated with it.');
        }

        $productCategory->delete();
        return redirect('admin/category')->with('status', 'Deleted category successfully');
    }

    public function action(Request $request){
        $list_check = $request->input('list_check');
        if ($list_check) {
            if (!empty($list_check)) {
                $act = $request->input('act');

                if ($act == 'delete') {
                    ProductCategory::destroy($list_check);
                    return redirect('admin/category')->with('status', 'You have successfully deleted');
                } elseif ($act == 'restore') {
                    ProductCategory::withTrashed()
                        ->whereIn('id', $list_check)
                        ->restore();
                    return redirect('admin/category')->with('status', 'You have successfully recovered');
                } elseif ($act == 'forceDelete') {
                    ProductCategory::withTrashed()
                        ->whereIn('id', $list_check)
                        ->forceDelete();
                    return redirect('admin/category')->with('status', 'You have permanently deleted');
                } else {
                    return redirect('admin/category')->with('status', 'Invalid action');
                }
            }

            return redirect('admin/category')->with('status', 'You need to choose an action to perform');
        }

        return redirect('admin/category')->with('status', 'No items selected');
    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(Request $request){
        $request->validate([
                'name'=>'required|string|max:255',
            ]
        );
        $name = $request->input('name');

        // Kiểm tra xem tên danh mục đã tồn tại hay chưa
        $existingCategory = ProductCategory::where('name', $name)->first();
        if ($existingCategory) {
            return back()->with('notification', 'ERROR: Category name already exists');
        }
        $data =$request->all();
        $this->productCategoryService->create($data);
        return redirect('admin/category')->with('status','You have successfully added');
    }
    public function edit($id)
    {
    $productCategory =ProductCategory::find($id);
    return view('admin.category.edit',['productCategory' => $productCategory]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
                'name'=>'required|string|max:255',
            ]
        );
        $name = $request->input('name');

        // Kiểm tra xem tên danh mục đã tồn tại hay chưa
        $existingCategory = ProductCategory::where('name', $name)->first();
        if ($existingCategory) {
            return back()->with('notification', 'ERROR: Category name already exists');
        }
        $data =$request->all();
        $this->productCategoryService->update($data,$id);
        return redirect('admin/category')->with('status','You have successfully fixed');
    }



}
