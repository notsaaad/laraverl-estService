<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    function index(){
        return view('admin.services');
    }


    function store(Request $request){
      $data['code']   = $request->code;
      $data['name']   = $request->name;
      $data['salary'] = $request->salary;
      $data['parent'] = $request->parent;
      DB::table('service')->insert($data);

      return redirect()->back()->with(['success' => 'Service Added']);
    }

    function api(){
      $all = DB::table('service')->get();

      return response()->json($all);
    }
}
