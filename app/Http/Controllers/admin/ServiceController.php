<?php

namespace App\Http\Controllers\admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    function add(){
      return view('admins.services.addServices');
    }

    function save(Request $request){


      $request->validate([
          'name'   => 'required|string|max:255',
          'price'  => 'required|numeric|min:0',
          'code'   => 'required|string|unique:services,code|max:100',
      ]);

      Service::create([
        'name'  => $request->name,
        'price' => $request->price,
        'code'  => $request->code,
      ]);


      return redirect()->route('admin.service.add')->with('success', 'Service created successfully.');;
    }
}
