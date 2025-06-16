
@extends('admins.layout.master')



@section('title', 'add Service')


@section('content')

        <div class="main-form">
            <div class="container">
                <h2 >Add new User</h2>

            <form action="{{ route('admin.user.postadd') }}"  method="POST"  enctype="multipart/form-data">
              @csrf
                <div class="row">
                    <div class="input-div col-sm-12 col-md-4">
                        <label for="name">name <span>(required)</span></label>
                        <input type="text" name="name"  id="name" placeholder="Enter user name">
                        @error('name')
                          <small class="danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="input-div col-sm-12 col-md-4">
                        <label for="email">email <span>(required)</span></label>
                        <input type="email" name="email"  id="email" placeholder="Enter user email">
                        @error('email')
                          <small class="danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="input-div col-sm-12 col-md-4">
                        <label for="phone">phone <span>(required)</span></label>
                        <input type="phone" name="phone"  id="phone" placeholder="Enter user phone">
                        @error('phone')
                          <small class="danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="input-div col-sm-12 col-md-6">
                        <label for="password">password <span>(required)</span></label>
                        <input type="password" id="password" name="password" placeholder="password">
                        @error('password')
                          <small class="danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="input-div col-sm-12 col-md-6">
                        <label for="role">role <span>(required)</span></label>
                        <select class="select2" name="role" id="role" >
                            <option value="">-- User Role --</option>
                            <option value="customer">Customer</option>
                            <option value="tech">Technical</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <div class="input-div col-sm-12 col-md-6" id="job-container" style="display: none">
                        <label for="job_id">job</label>
                        <select class="select2" name="job_id" id="job_id" >
                            <option value="">-- Technical job --</option>
                            @foreach ($jobs as $job)
                              <option value="{{$job->id}}">{{$job->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="row">
                    <div class="input-div col-sm-12 col-md-6">
                        <label for="address">Address <span>(required)</span></label>
                        <input type="address" id="address" name="address" placeholder="Enter User Address">
                        @error('address')
                          <small class="danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="input-div col-sm-12 col-md-6">
                        <label for="service-parent">Gender <span>(required)</span></label>
                        <select class="select2" name="gender" >
                            <option value="male">Male</option>
                            <option value="female">Female</option>
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
                    </div>

                </div>





                <div class="row">
                    <div class="input-div">
                        <button type="submit" class="submit-btn">Add User</button>
                    </div>
                </div>

            </form>
            </div>
        </div>

@endsection


@section('js')
    <script>
        $(document).ready(function () {
            function toggleJobField() {
                if ($('#role').val() === 'tech') {
                    $('#job-container').slideDown();
                } else {
                    $('#job-container').slideUp();
                    $('#job_id').val(null).trigger('change');
                }
            }


            $('#role').on('change', toggleJobField);

            toggleJobField();
        });
    </script>
@endsection
