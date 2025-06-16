@extends('admins.layout.master')



@section('title', 'Edit Service')


@section('content')

        <div class="main-form">
            <div class="container">
                <h2 >Edit Service</h2>
                {{-- <p>Add Your new Serive Dynamic.</p> --}}

            <form action="{{ route('admin.service.PostEdit',  $service) }}"  method="POST"  enctype="multipart/form-data">
              @csrf
                <div class="row">
                    <div class="input-div col-sm-12 col-md-6">
                        <label for="name">name <span>(required)</span></label>
                        <input  value="{{ $service->name }}" type="text" name="name"  id="name" placeholder="Enter Service Name">
                        @error('name')
                          <small class="danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="input-div col-sm-12 col-md-6">
                        <label for="price">price <span>(required)</span></label>
                        <input value="{{ $service->price }}" type="price" name="price"  id="price" placeholder="Enter Serive price">
                        @error('price')
                          <small class="danger">{{$message}}</small>
                        @enderror
                    </div>

                  <div class="form-check col-12 col-md-6">
                    <div class="form-check form-switch">
                      <input class="form-check-input" checked name="active" {{ old('active', isset($service) ? $service->active : false) ? 'checked' : '' }}  type="checkbox" role="switch" id="switchCheckDefault">
                      <div class="input-div">
                        <label class="form-check-label" for="switchCheckDefault">Active?</label>
                      </div>
                    </div>
                  </div>
                  <div class="input-div col-12 col-md-6">
                    <label for="Cateogry">Cateogry <span>(required)</span></label>
                    <select class="select2" name="category_id" id="category_id">
                      <option value="">--cateogy--</option>
                      @foreach ($cateogies as $cat)
                        <option {{ old('category_id', isset($service) ? $service->category_id : '') == $cat->id ? 'selected' : '' }} value="{{ $cat->id }}">{{$cat->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3 input-div">
                    <label for="exampleFormControlTextarea1" class="form-label">Description <span>(required)</span></label>
                    <textarea  name="description" class="form-control" id="exampleFormControlTextarea1" rows="7">{{$service->description}}</textarea>
                  </div>
                    <div class="input-div file">
                        <label for="image">Enter Service image</label>
                        <input type="file" name="image">
                        @error('image')
                          <small class="danger">{{$message}}</small>
                        @enderror
                    @if(!empty($service->image))
                      <img width="100" class="imgEdit" src="{{ URL::asset(ServiceImagePath().$service->image) }}" alt="Service">
                    @else
                      <img width="100" class="imgEdit" src="{{ URL::asset(default_service_image()) }}" alt="Service">
                    @endif
                    </div>
                      <div class="input-div">
                        <button type="submit" class="submit-btn">Edit Service</button>
                    </div>
                </div>


            </form>
            </div>
        </div>

@endsection
