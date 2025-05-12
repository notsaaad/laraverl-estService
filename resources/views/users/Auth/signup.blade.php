@section('title', 'New Account')





@extends('users.layout.master')


@section('content')


    <div class="container">
      <h2 class="text-center m-4"> انشاء حساب جديد</h2>
      <div class="row g-2">
        <div class="col-sm-12 col-md-6">
          <form action="" class="p-3">
            <div class="m-2">
              <label for="">الاسم بالكامل</label>
              <input type="text" placeholder="ادخل اسمك">
            </div>
            <div class="m-2">
              <label for="">البريد الاكتروني</label>
              <input type="text" placeholder="ادخل البريد الاكتروني الخاص بك">
            </div>
            <div class="m-2">
              <label for="">رقم الهاتف</label>
              <input type="text" placeholder="رقم الهاتف">
            </div>
            <div class="m-2">
              <label for="">اضف مهنتك</label>
              <input type="text" placeholder="ما هي مهنتك">
            </div>
            <div class="m-2">
              <label for="">كلمة المرور</label>
              <input type="password" placeholder="كلمة المرور">
            </div>
            <div class="d-flex justify-content-center mt-3">
              <input type="submit" style="width: fit-content; padding: 0 20px;" class="btn btn-primary" value="انشاء حساب">
            </div>
          </form>

          <p  class="mt-4 text-center">هل لديك حساب بالفعل <a href="{{ route('loginPage') }}">تسجيل دخول</a></p>
        </div>
        <div class="col-sm-12 col-md-6  d-md-block d-sm-none">
          <img src="{{ URL::asset('public/users/images/signup.png') }}" class="w-100 h-100" alt="Login">
        </div>
      </div>
    </div>





@stop
