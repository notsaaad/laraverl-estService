<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | login </title>
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/master.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/styles.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('public/users/images/Logo.png') }}">
</head>
    <body>
        <div class="main">
            <div class="left-section">
            </div>
            <div class="right-section">
                <div class="login-container">
                    <h1>Hi</h1>
                    <p style="margin-bottom: 10px;">Welcome to ESTservice</p>
                    <form action="{{ route('admin.login.post') }}" >
                      @csrf
                      <input type="email" name="email" placeholder="Email">
                      <input type="password" name="password" placeholder="Password">
                      <button type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
