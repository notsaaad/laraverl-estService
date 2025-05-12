<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function signup(){
      return view('users.Auth.signup');
    }

    function login(){
      return view('users.Auth.login');
    }
}
