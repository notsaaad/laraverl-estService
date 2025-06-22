<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index(){
      $Category = Category::get();

    foreach ($Category as $cat) {
        $path       = default_category_image();
        if($cat->image){
          $path = $cat->image;
        }
        $cat->image = URL::asset($path);
      }
    }

    return response()->json($Category);
}
