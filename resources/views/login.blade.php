<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="{{asset('assets/css/login/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="box">
            <h1>Login</h1>
            @if (Session::get('failed'))
            <div class="alert alert-danger">
                {{ Session::get('failed')}}
            </div>
            @endif
            @if (session('notAllowed'))
            <div class="alert alert-danger">
                {{ session('notAllowed') }}
            </div>
            @endif
            <form action="{{route('login.auth')}}" method="POST">
                @csrf
                <label>Email</label>
                <div>
                    <i class="fa-solid fa-user"></i>
                    <input name="email" type="text" placeholder="Enter Email">
                </div>
                <label>Password</label>
                <div>
                    <i class="fa-solid fa-lock"></i>
                    <input name="password" type="password" placeholder="Enter Password">
                </div>
                <input type="submit" value="Login">
            </form>
            <a href="/" class="back">back</a>
        </div>
    </div>
</body>

</html>