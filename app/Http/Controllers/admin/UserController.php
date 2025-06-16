<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function add(){
      return view('admins.users.add');
    }


    function postuser(Request $request){

      $data = $request->validate([
        'name'     => 'required|string',
        'image'    => 'sometimes|nullable|mimes:png,jpg,jpeg,webp|max:2048',
        'email'    => 'required|unique:users,email',
        'address'  => 'required',
        'password' => 'required',
        'role'     => 'required',
        'phone'    => 'required',
        'gender'   => 'required',
      ]);

      $data['password'] = Hash::make($request->password);



      if($request->hasFile('image')){
        $path           = UsersImagePath();
        $imagepath      = uploadImage($request->image, $path);
        $data['image']  = $imagepath;
      }

      User::create($data);

      return back()->with('success', 'تم انشاء المستخدم');
    }


    function view(){
      $users = User::paginate(self::Pagination_count);
      return view('admins.users.index', get_defined_vars());
    }

    function edit(User $user){
      return view('admins.users.edit', get_defined_vars());
    }

    function editpost(User $user, Request $request){
      $data = $request->validate([
        'name'     => 'required|string',
        'image'    => 'sometimes|nullable|mimes:png,jpg,jpeg,webp|max:2048',
        'email'    => 'required|unique:users,email,'.$user->id,
        'address'  => 'required',
        'role'     => 'required',
        'phone'    => 'required',
        'gender'   => 'required',
      ]);

      if($request->hasFile('image')){
        $path           = UsersImagePath();
        $imagepath      = uploadImage($request->image, $path);
        $data['image']  = $imagepath;
      }
      // return $data;

      $user->update($data);
      return redirect()->route('admin.users.view')->with('success', 'تم تحديث المستخدم بنجاح');
    }


    function delete(Request $request){
      $user_id = $request->id;
      $user    = User::findOrFail($user_id);
      $user->delete();
      return redirect()->route('admin.users.view')->with('success', 'تم مسح المستخدم بنجاح');
    }
}
