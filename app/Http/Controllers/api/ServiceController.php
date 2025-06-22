<?php

namespace App\Http\Controllers\api;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    function index(){
        $services = Service::with('category')->where('active', 1)->select('id', 'name', 'image', 'price', 'category_id')->get();
        foreach ($services as $service) {
            $path       = default_service_image();
            if($service->image){
              $path = ServiceImagePath().$service->image;
            }
            $service->image = URL::asset($path);
          }
        // تنسيق JSON حسب ما يحتاج Flutter

        $data = $services->map(function ($service) {
            return [
                'id' => $service->id,
                'title' => $service->name,
                'image' => $service->image,
                'price' => $service->price,
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
            ];
        });



        return response()->json($data);
    }


    function single($id){
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

    }

    function search(Request $request){
    $keyword = $request->input('query');

    if (!$keyword) {
        return response()->json([
            'success' => false,
            'message' => 'يرجى إدخال كلمة البحث'
        ], 400);
    }

    $services = Service::where(function ($q) use ($keyword) {
            $q->where('title', 'LIKE', "%$keyword%");
        })
        ->take(10)
        ->get();


      return response()->json([
        'success'  => true,
        'services' => $results,
      ]);
    }
}
