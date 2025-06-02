<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/master.css') }}">
    <!-- <link rel="stylesheet" href="css/add-user.css"> -->
</head>
    <body>
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
    </body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ URL::asset('public/admin/js/main.js') }}"></script>
</html>
