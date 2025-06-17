<?php

namespace App\Http\Controllers\user;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    function index(){
      $categories = Category::paginate(self::Pagination_count);

      return view('users.Category.Category', get_defined_vars());
    }

    function CatPage(Category $cat){
      $services = $cat->services->where('active', 1);
      return view('users.Category.singleCat', get_defined_vars());
    }
}
