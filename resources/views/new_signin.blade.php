<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Login form</title>
</head>
<body>
    <div class="container">
        @if (session()->has('message'))
    @if (session()->get('message')=='notexists')
        <div class="alert alert-warning">User Dose't exists!</div>
        @elseif (session()->get('message'=='wrong'))
        <div class="alert alert-danger">Wrong Crendital!</div>
    @endif
    @endif

        <header class="modal-header"><h2>Login Form</h2></header>
        <form action="{{url('/login')}}" method="post">
            @csrf 
            {{--@csrf for Page expire --}}
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="pass" id="pass" class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-outline-primary">Login</button>
        </div>
        </form>
    </div>
</body>
</html>