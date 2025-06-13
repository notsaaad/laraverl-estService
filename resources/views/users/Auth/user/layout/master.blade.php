@section('title', 'My Account')





@extends('users.layout.master')


@section('content')



    <div class="container my-5">
      <div class="row">

        <div class="col-md-3">
          @include('users.Auth.user.layout.aside')
        </div>


        <div class="col-md-9">
          @yield('account-content')
        </div>
      </div>
    </div>


@stop
