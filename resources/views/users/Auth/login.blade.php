@section('title', 'New Account')





@extends('users.layout.master')


@section('content')

    <div class="container">
      <h2 class="text-center m-4"> تسجيل دخول</h2>
      <div class="row g-2">
        <div class="col-sm-12 col-md-6">
          <form action="" class="p-3">

            <div class="m-2">
              <label for="">البريد الاكتروني</label>
              <input type="text" placeholder="ادخل البريد الاكتروني الخاص بك">
            </div>


            <div class="m-2">
              <label for="">كلمة المرور</label>
              <input type="password" placeholder="كلمة المرور">
            </div>
            <div class="d-flex justify-content-center mt-3">
              <input type="submit" style="width: fit-content; padding: 0 20px;" class="btn btn-primary" value="تسجيل دخول">
            </div>
          </form>

          <p  class="mt-4 text-center">ليس لديك حساب ؟ <a href="{{ route('signupPage') }}">انشاء حساب</a></p>
        </div>
        <div class="col-sm-12 col-md-6  d-md-block d-sm-none">
          <img src="{{ URL::asset('public/users/images/login.png') }}" class="w-100 h-100" alt="Login">
        </div>
      </div>
    </div>





@stop
