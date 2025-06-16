
@extends('admins.layout.master')



@section('title', 'Edit User')


@section('content')

        <div class="main-form">
            <div class="container">
                <h2 >Edit {{$user->name}}</h2>

            <form action="{{ route('admin.users.postEdit', $user->id) }}"  method="POST"  enctype="multipart/form-data">
              @csrf
                <div class="row">
                    <div class="input-div col-sm-12 col-md-6">
                        <label for="name">name <span>(required)</span></label>
                        <input type="text" value="{{ $user->name }}" name="name"  id="name" placeholder="Enter user name">
                        @error('name')
                          <small class="danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="input-div col-sm-12 col-md-6">
                        <label for="email">email <span>(required)</span></label>
                        <input type="email" value="{{ $user->email }}" name="email"  id="email" placeholder="Enter user email">
                        @error('email')
                          <small class="danger">{{$message}}</small>
                        @enderror
                    </div>

                </div>

                <div class="row">
                    <div class="input-div col-sm-12 col-md-6">
                        <label for="phone">phone <span>(required)</span></label>
                        <input type="phone" name="phone"  value="{{ $user->phone }}" id="phone" placeholder="Enter user phone">
                        @error('phone')
                          <small class="danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="input-div col-sm-12 col-md-6">
                        <label for="role">role <span>(required)</span></label>
                        <select class="select2" name="role">
                            <option value="">-- User Role --</option>
                            <option value="customer" {{ $user->role === 'customer' ? 'selected' : '' }}>Customer</option>
                            <option value="tech" {{ $user->role === 'tech' ? 'selected' : '' }}>Technical</option>
                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>

                </div>

                <div class="row">
                    <div class="input-div col-sm-12 col-md-6">
                        <label for="address">Address <span>(required)</span></label>
                        <input type="address" id="address" value="{{ $user->address }}" name="address" placeholder="Enter User Address">
                        @error('address')
                          <small class="danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="input-div col-sm-12 col-md-6">
                        <label for="service-parent">Gender <span>(required)</span></label>
                        <select class="select2" name="gender" >
                            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('gender')
                          <small class="danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="input-div file">
                        <label for="image">Enter User image</label>
                        <input type="file" name="image">
                        @error('image')
                          <small class="danger">{{$message}}</small>
                        @enderror
                        @if(!empty($user->image))
                          <img width="100" src="{{ URL::asset(UsersImagePath().$user->image) }}" alt="Profile">
                        @else
                          <img width="100" src="{{ URL::asset(default_image()) }}" alt="Profile">
                        @endif
                    </div>

                </div>





                <div class="row">
                    <div class="input-div">
                        <button type="submit" class="submit-btn">update User</button>
                    </div>
                </div>

            </form>
            </div>
        </div>

@endsection
