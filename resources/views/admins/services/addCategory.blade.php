
@extends('admins.layout.master')



@section('title', 'add Category')


@section('content')

        <div class="main-form">
            <div class="container">
                <h2 >Add new Category</h2>

            <form action="{{ route('admin.service.postAddCategory') }}"  method="POST"  enctype="multipart/form-data">
              @csrf
                <div class="row">
                    <div class="input-div col">
                        <label for="name">name <span>(required)</span></label>
                        <input type="text" name="name"  id="name" placeholder="Enter user name">
                        @error('name')
                          <small class="danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="input-div file">
                        <label for="image">Enter Cateogry image</label>
                        <input type="file" name="image">
                        @error('image')
                          <small class="danger">{{$message}}</small>
                        @enderror
                    </div>

                </div>





                <div class="row">
                    <div class="input-div">
                        <button type="submit" class="submit-btn">Add Category</button>
                    </div>
                </div>

            </form>
            </div>
        </div>

@endsection
