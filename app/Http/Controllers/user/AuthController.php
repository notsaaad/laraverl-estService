<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function signup(){
      return view('users.Auth.signup');
    }

    function login(){
      return view('users.Auth.login');
    }


    public function loginpost(Request $request)
    {
      // return $request;
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);


        $user = User::where('email', $request->email)->first();


        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.',
            ])->withInput();
        }

        Auth::login($user);


        return redirect()->route('HomePage')->with('success', 'تم تسجيل الدخول بنجاح');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('loginPage')->with('success', 'تم تسجيل الخروج بنجاح');
    }


    function account(){
      return view('users.Auth.user.dashbord');
    }

    function Tech_my_account(){
      return view('users.Auth.tech.dashbord');
    }
}
