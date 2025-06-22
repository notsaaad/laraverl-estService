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
      $service = Service::with('category', 'fields')->findOrFail($id);

          $path = default_service_image();
          if ($service->image) {
              $path = ServiceImagePath() . $service->image;
          }

          return response()->json([
              'id' => $service->id,
              'title' => $service->name,
              'image' => URL::asset($path),
              'price' => $service->price,
              'description' => $service->description,
              'category_name' => $service->category?->name,
              'fields' => $service->fields->map(function ($field) {
                  return [
                      'id' => $field->id,
                      'label' => $field->label,
                      'type' => $field->type,
                      'options' => $field->options,
                      'required' => (bool) $field->required,
                  ];
              })->toArray(),
          ]);
        return response()->json($data);
    }

}
