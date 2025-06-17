<?php

namespace App\Http\Controllers\user;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    function index(){
      return view('users.Home');
    }

    function service(Service $service){
      return view('users.service', get_defined_vars());
    }

    function services(){
      $services = Service::where('active', 1)->paginate(self::Pagination_count);
      return view('users.services' , get_defined_vars());
    }


    public function search(Request $request)
    {
        $term = $request->input('query');

        $results = Service::where('name', 'LIKE', "%{$term}%")
            ->select('id', 'name', 'image')
            ->limit(10)
            ->get();

            foreach ($results as $result) {
                if (!empty($result->image)) {
                    $result->image = ServiceImagePath() . $result->image;
                } else {
                    $result->image = default_service_image();
                }
            }

        return response()->json($results);
    }
}
