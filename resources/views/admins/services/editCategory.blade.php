
@extends('admins.layout.master')



@section('title', 'Edit Category')


@section('content')

        <div class="main-form">
            <div class="container">
                <h2 >Edit {{$cat->name}}</h2>

            <form action="{{ route('admin.service.postEditCategory', $cat->id) }}"  method="POST"  enctype="multipart/form-data">
              @csrf
                <div class="row">
                    <div class="input-div col">
                        <label for="name">name <span>(required)</span></label>
                        <input value="{{ $cat->name }}" type="text" name="name"  id="name" placeholder="Enter user name">
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
                    @if(!empty($cat->image))
                      <img width="100" class="imgEdit" src="{{ URL::asset(CategoriesImagePath().$cat->image) }}" alt="Profile">
                    @else
                      <img width="100" class="imgEdit" src="{{ URL::asset(default_category_image()) }}" alt="Profile">
                    @endif

                </div>





                <div class="row">
                    <div class="input-div">
                        <button type="submit" class="submit-btn">Edit Category</button>
                    </div>
                </div>

            </form>
            </div>
        </div>

@endsection
