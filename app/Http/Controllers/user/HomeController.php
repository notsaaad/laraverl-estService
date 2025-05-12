<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
      return view('users.Home');
    }

    function service(){
      return view('users.service');
    }

    function services(){
      return view('users.services');
    }
}
