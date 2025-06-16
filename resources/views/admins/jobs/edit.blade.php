
@extends('admins.layout.master')



@section('title', 'Edit Job')


@section('content')

        <div class="main-form">
            <div class="container">
                <h2 >Edit Job</h2>

            <form action="{{ route('admin.jobs.postEdit', $Job->id) }}"  method="POST" >
              @csrf
                <div class="row">
                    <div class="input-div col-sm-12 col-md-4">
                        <label for="name">name <span>(required)</span></label>
                        <input value="{{ $Job->name }}" type="text" name="name"  id="name" placeholder="Enter job name">
                        @error('name')
                          <small class="danger">{{$message}}</small>
                        @enderror
                    </div>

                  <div class="form-check col-12 col-md-6">
                    <div class="form-check form-switch">
                      <input class="form-check-input" {{ old('active', isset($Job) ? $Job->active : false) ? 'checked' : '' }} checked name="active"  type="checkbox" role="switch" id="switchCheckDefault">
                      <div class="input-div">
                        <label class="form-check-label" for="switchCheckDefault">Active?</label>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="mb-3 input-div">
                    <label for="exampleFormControlTextarea1" class="form-label">Description <span>(required)</span></label>
                    <textarea  name="description" class="form-control" id="exampleFormControlTextarea1" rows="7">{{$Job->description}}</textarea>
                  </div>
                </div>





                <div class="row">
                    <div class="input-div">
                        <button type="submit" class="submit-btn">Edit Job</button>
                    </div>
                </div>

            </form>
            </div>
        </div>

@endsection
