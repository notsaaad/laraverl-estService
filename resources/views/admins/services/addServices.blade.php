@extends('admins.layout.master')



@section('title', 'add Service')


@section('content')

        <div class="main-form">
            <div class="container">
                <h2 >Add new Service</h2>
                <p>Add Your new Serive Dynamic.</p>

            <form action="{{ route('admin.service.insertData') }}"  method="POST">
              @csrf
                <div class="row">
                    <div class="input-div col-sm-12 col-md-6">
                        <label for="name">name <span>(required)</span></label>
                        <input type="text" name="name"  id="name" placeholder="Enter Service Name">
                        @error('name')
                          <small class="danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="input-div col-sm-12 col-md-6">
                        <label for="code">code <span>(required)</span></label>
                        <input type="code" name="code"  id="code" placeholder="Enter Serive code">
                        @error('code')
                          <small class="danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="input-div col-sm-12 col-md-6">
                        <label for="salary">salary</label>
                        <input type="number" id="salary" name="price" placeholder="salary">
                        @error('salary')
                          <small class="danger">{{$message}}</small>
                        @enderror
                    </div>

                    {{-- <div class="input-div col-sm-12 col-md-6">
                        <label for="service-parent">Parent</label>
                        <select name="parent" >
                            <option value="no_parents">no parents</option>
                            <option value="Serv1">Serv1</option>
                            <option value="serv2">serv2</option>
                        </select>
                    </div> --}}

                </div>





                <div class="row">
                    <div class="input-div">
                        <button type="submit" class="submit-btn">Add Service</button>
                    </div>
                </div>

            </form>
            </div>
        </div>

@endsection
