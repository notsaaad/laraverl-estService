<?php

namespace App\Http\Controllers\user;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class othersController extends Controller
{
    function contactUS(){
      return view('users.others.contactUS');
    }

    function AboutUs(){
      return view('users.others.aboutUs');
    }


  function getServiceFields(Service $service){
    return "true";
    return response()->json($service->fields);
  }
}
