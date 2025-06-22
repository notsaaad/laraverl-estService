<?php

namespace App\Http\Controllers\api;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    function index(){
      $Category = Category::get();

    foreach ($Category as $cat) {
        $path       = default_category_image();
        if($cat->image){
          $path = CategoriesImagePath().$cat->image;
        }
        $cat->image = URL::asset($path);
      }
      return response()->json($Category);
    }


    function services($id){
      $services = Service::where('category_id', $id)
          ->where('active', 1)
          ->select('id', 'name', 'image', 'price', 'description', 'category_id')
          ->get();

        foreach ($services as $service) {
            $path       = default_service_image();
            if($service->image){
              $path = ServiceImagePath().$service->image;
            }
            $service->image = URL::asset($path);
          }

        $data = $services->map(function ($service) {
            return [
                'id' => $service->id,
                'title' => $service->name,
                'image' => $service->image,
                'price' => $service->price,
                'category_name' => $service->category?->name,
            ];
        });

        return response()->json($data);
    }

}
