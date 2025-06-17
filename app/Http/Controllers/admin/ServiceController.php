<?php

namespace App\Http\Controllers\admin;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    function index(){
      $Services = Service::paginate(self::Pagination_count);
      return view('admins.services.viewService', get_defined_vars());
    }
    function add(){
      $cateogies = Category::get();
      return view('admins.services.addServices', get_defined_vars());
    }

    function save(Request $request){


      $data = $request->validate([
          'name'        => 'required|string|max:255',
          'price'       => 'required|numeric|min:0',
          'category_id' => 'exists:categories,id',
          'image'       => 'sometimes|nullable|mimes:png,jpg,jpeg,webp',
          'description' => 'required',
          'active'      => 'nullable',
      ]);

      if($request->hasFile('image')){
        $path           = ServiceImagePath();
        $imagepath      = uploadImage($request->image, $path);
        $data['image']  = $imagepath;
      }
      $data['active'] = $request->has('active') ? 1 : 0;
      Service::create($data);
      return redirect()->route('admin.service.add')->with('success', 'تم انشاء الخدمة بنجاح');;
    }

    function postEdit(Service $service, Request $request){
      $data = $request->validate([
          'name'        => 'required|string|max:255',
          'price'       => 'required|numeric|min:0',
          'category_id' => 'exists:categories,id',
          'image'       => 'sometimes|nullable|mimes:png,jpg,jpeg,webp',
          'description' => 'required',
          'active'      => 'nullable',
      ]);

      if($request->hasFile('image')){
        $path           = ServiceImagePath();
        $imagepath      = uploadImage($request->image, $path);
        $data['image']  = $imagepath;
      }
      $data['active'] = $request->has('active') ? 1 : 0;
      $service->update($data);

      return redirect()->route('admin.service.view')->with('success', 'تم التعديل بنجاح');
    }

    function addCategory(){
      return view('admins.services.addCategory');
    }

    function postAddCategory(Request $request){
      $data = $request->validate([
        'name'     => 'required|string',
        'image'    => 'sometimes|nullable|mimes:png,jpg,jpeg,webp|max:2048',
      ]);

      if($request->hasFile('image')){
        $path           = CategoriesImagePath();
        $imagepath      = uploadImage($request->image, $path);
        $data['image']  = $imagepath;
      }


      Category::create($data);

      return redirect()->route('admin.service.viewCategory')->with('success', 'تم انشاء التصنيف بنجاح');
    }

    function viewCategory(){
      $Categories = Category::paginate(self::Pagination_count);
      return view('admins.services.viewCatgory', get_defined_vars());
    }

    function editCategory(Category $cat){
      return view('admins.services.editCategory', get_defined_vars());
    }

    function posteditCategory(Category $cat, Request $request){
      $data = $request->validate([
        'name'     => 'required|string',
        'image'    => 'sometimes|nullable|mimes:png,jpg,jpeg,webp|max:2048',
      ]);

      if($request->hasFile('image')){
        $path           = CategoriesImagePath();
        $imagepath      = uploadImage($request->image, $path);
        $data['image']  = $imagepath;
      }
      $cat->update($data);
      return redirect()->route('admin.service.viewCategory')->with('success', 'تم تعديل التصنيف بنجاح');
    }

    function deleteCateogy(Request $request){
      $cat_id = $request->id;
      $cat    = Category::findOrFail($cat_id);
      $cat->delete();

      return redirect()->route('admin.service.viewCategory')->with('success', 'تم مسح التصنيف بنجاح');
    }

    function Edit(Service $service){
      $cateogies = Category::get();
      return view('admins.services.EditServices', get_defined_vars());
    }


}
