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
            ];
        });

        return response()->json($data);
    }


    function single(){
      $service = Service::with('category')
          ->select('id', 'name', 'image', 'price', 'category_id', 'description')
          ->findOrFail($id);

            $path       = default_service_image();
            if($service->image){
              $path = ServiceImagePath().$service->image;
            }
            $service->image = URL::asset($path);

      return response()->json([
          'id' => $service->id,
          'title' => $service->name,
          'image' => $service->image,
          'price' => $service->price,
          'description' => $service->description,
          'category_name' => $service->category?->name,
      ]);
    }
}
