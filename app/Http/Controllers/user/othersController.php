<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class othersController extends Controller
{
    function contactUS(){
      return view('users.others.contactUS');
    }

    function AboutUs(){
      return view('users.others.aboutUs');
    }
}
