<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="icon" type="image/x-icon" href="{{ URL::asset('public/users/images/Logo.png') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ URL::asset('public/users/css/master.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('public/users/css/home.css') }}">
  @yield('css')
  <title>Est Servic | @yield('title')</title>
</head>
  <body @auth class="user-{{ auth()->user()->id }}"  @endauth>


    <!-- ================================= Start Header ======================== -->
    <div class="mainheader">
      <div class="container">
        <header>
          <a href="{{ route('HomePage') }}" class="logo">
            <span class="black" >EstService</span>
            <img src="{{ URL::asset('public/users/images/Logo.png') }}" alt="Logo">
          </a>

          <ul class="menu">
            <li><a href="{{ route('HomePage') }}" class="{{ Route::is('HomePage') ? 'active' : '' }}" >الرئيسة</a></li>
            <li><a href="{{ route('servicesPage') }}" class="{{ Route::is('servicesPage') ? 'active' : '' }}">الخدمات</a></li>
            {{-- <li><a href="#" class="{{ Route::is('servicesPage') ? 'active' : '' }}">كل العروض</a></li> --}}
            <li><a href="{{ route('aboutUsPage') }}" class="{{ Route::is('aboutUsPage') ? 'active' : '' }}">من نحن</a></li>
            <li><a href="{{ route('contactUsPage') }}" class="{{ Route::is('contactUsPage') ? 'active' : '' }}">اتصل بنا</a></li>
            <li><a href="{{ route('MyAccountPage') }}" class="{{ Route::is('MyAccountPage') ? 'active' : '' }}">حسابي</a></li>
          </ul>

          <div class="Actionsbtn">
            @guest
              <a href="{{ route('signupPage') }}" class="btn btn-primary">انشاء حساب</a>
              <a href="{{ route('loginPage') }}" class="btn btn-outline-primary">تسجيل الدخول</a>
            @endguest
            @auth
              <a href="#">مرحبا {{auth()->user()->name}} الذهاب الي حسابي</a>
            @endauth
          </div>
        </header>
      </div>
    </div>
    <!-- ================================= End Header ======================== -->
