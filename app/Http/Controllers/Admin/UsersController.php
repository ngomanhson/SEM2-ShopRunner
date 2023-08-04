<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Service\User\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    private $userService;
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService =$userService;
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
            $users =User::onlyTrashed()->paginate(10);
        }else{

            $search='';
            if ($request->input('search')){
                $search=$request->input('search');
            }
            $users =User::where('name','LIKE',"%{$search}%")->paginate(10);
        }
        $count_user_active =User::count();
        $count_user_trash =User::onlyTrashed()->count();
        $count =[$count_user_active,$count_user_trash];
        return view('admin.user.index',compact('users','count','list_act','status'));
    }

    public function show($id){

       $user =User::find($id);
        return view('admin.user.show',['user' => $user]);
    }
    public function edit($id){
        $roles =Role::all();
        $user =User::find($id);
        return view('admin.user.edit',[
            'roles'=>$roles,
            'user' => $user]);
    }

    public function create(){
        $user =User::all();
        $roles =Role::all();
        return view('admin.user.create',[
            'roles'=>$roles,
            'user' => $user]);
    }
    public function store(Request $request){
        $request->validate([
                'name'=>'required|string|max:255',
                'email'=>'required|string|email|max:255|unique:users',
                'password'=>'required',
                'password_confirmation'=>'required',
                'company_name'=>'required',
                'country'=>'required',
                'street_address'=>'required',
                'phone'=>'required',
                'town_city'=>'required',
                'postcode_zip'=>'required',

            ]
        );
        // Kiểm tra số điện thoại đã tồn tại trong bảng người dùng chưa
        $phoneExists = User::where('phone', $request->input('phone'))->exists();
        if ($phoneExists) {
            return back()->with('notification', 'ERROR: Phone number already exists');
        }

        //KIEM TRA PASSWORD
        if ($request->get('password') != $request ->get('password_confirmation')){
            return back()
                ->with('notification','ERROR: Confirm password does not match');

        }
        $data =$request->all();
        $data['password'] = bcrypt($request->get('password'));
        $users =$this->userService->create($data);

        return redirect('admin/user/show/' . $users->id);
    }
    public function delete($id)
    {

        if (Auth::id() != $id) {
            $user = User::find($id);
            $user->delete();
            return redirect('admin/user/')->with('status', 'Deleted member successfully');
        }else{
            return redirect('admin/user/')->with('status', 'You cannot remove yourself from the system');
        }

    }
    public function action(Request $request){
        $list_check =$request->input('list_check');
        if ($list_check){
            foreach ($list_check as $k => $id){
                if (Auth::id() == $id){
                    unset($list_check[$k]);
                }
            }
            if (!empty($list_check)){
                $act =$request->input('act');
                if ($act == 'delete'){
                    User::destroy($list_check);
                    return redirect('admin/user')->with('status','You have successfully deleted');
                }
                if ($act == 'restore'){
                    User::withTrashed()
                        ->whereIn('id',$list_check)
                        ->restore();
                    return redirect('admin/user')->with('status','You have successfully recovered');
                }
                if ($act == 'forceDelete'){
                    User::withTrashed()
                        ->whereIn('id',$list_check)
                        ->forceDelete();
                    return redirect('admin/user')->with('status','You have permanently deleted');
                }
            }
            return redirect('admin/user')->with('status','You cannot operate on your account');
        }else{
            return redirect('admin/user')->with('status','You need to choose to perform');
        }
    }
    public function update(Request $request, $id)
    {

        $data = $request->all();

        // Lấy thông tin người dùng cần cập nhật
        $user = User::findOrFail($id);

        // Kiểm tra số điện thoại
        $phoneNumber = $request->input('phone');
        $existingUser = User::where('phone', $phoneNumber)
            ->where('id', '!=', $user->id)
            ->first();
        if ($existingUser) {
            return back()->with('notification', 'ERROR: Phone number is already taken');
        }

        // Xử lý mật khẩu
        $password = $request->input('password');
        $passwordConfirmation = $request->input('password_confirmation');
        if (!empty($password)) {
            if ($password != $passwordConfirmation) {
                return back()->with('notification', 'ERROR: Confirm password does not match');
            }
            $data['password'] = bcrypt($password);
        } else {
            unset($data['password']);
        }

        // Cập nhật dữ liệu người dùng

        $user->update($data);
        $user->roles()->sync($request->input('roles'));
        return redirect('admin/user/show/' . $user->id);

    }
}
