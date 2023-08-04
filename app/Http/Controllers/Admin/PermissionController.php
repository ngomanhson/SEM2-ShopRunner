<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    function add()
    {
        $permissions = Permission::all()->groupBy(function ($permission){
           return explode('.' ,$permission->slug)[0];
        });
        return view('admin.permission.add',compact('permissions'));
    }
    function store(Request $request){
        $validated =$request->validate([
           'name' =>'required|max:255',
           'slug' =>'required' ,

        ]);
        Permission::create([
            'name'=>$request->input('name'),
            'slug'=>$request->input('slug'),
            'description'=>$request->input('description'),
        ]);
        return redirect()->route('permission.add')->with('status','Permission added successfully');

    }
     public function  edit($id){

        $permissions = Permission::all()->groupBy(function ($permission){
            return explode('.' ,$permission->slug)[0];
        });
        $permission =Permission::find($id);
        return view('admin.permission.edit',[
            'permissions'=>$permissions,
            'permission' =>$permission
        ]);
    }
    public function update(Request $request, $id){
        $validate =$request->validate([
            'name' =>'required|max:255',
            'slug' =>'required' ,
        ]);
        Permission::where('id',$id)->update([
           'name'=>$request->input('name'),
            'slug'=>$request->input('slug'),
            'description'=>$request->input('description'),
        ]);
        return redirect()->route('permission.add')->with('status','Edited successfully');
    }
    function delete($id){
            Permission::where('id',$id)
                ->delete();
            return redirect()->route('permission.add')->with('status','You have successfully deleted');
    }
}
