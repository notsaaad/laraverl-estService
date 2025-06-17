@extends('users.Auth.user.layout.master')




@section('account-content')


  <form action="{{ route('myAccount.update') }}" class="border rounded p-4 mb-4" method="post">
    @csrf
    <div class="form-group">
      <label for="name">الاسم</label>
      <input type="text" value="{{ auth()->user()->name }}" class="form-control" name="name" placeholder="الاسم">
      @error('name')
        <small class="text-danger">{{$message}}</small>
      @enderror
    </div>
    <div class="form-group">
      <label for="email">البريد الاكتروني</label>
      <input type="email" value="{{ auth()->user()->email }}" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ادخل البريد الاكتروني">
      @error('email')
        <small class="text-danger">{{$message}}</small>
      @enderror
    </div>
    <div class="form-group">
      <label for="phone">رقم الهاتف</label>
      <input type="text" value="{{ auth()->user()->phone }}" class="form-control" name="phone" placeholder="ادخل الهاتف">
      @error('phone')
        <small class="text-danger">{{$message}}</small>
      @enderror
    </div>
    <div class="form-group">
      <label for="phone">العنوان</label>
      <input type="text" value="{{ auth()->user()->address }}" class="form-control" name="address" placeholder="ادخل العنوان">
      @error('address')
        <small class="text-danger">{{$message}}</small>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary mt-2">تحديث</button>
  </form>

@endsection
