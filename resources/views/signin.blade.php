<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        @if (session()->has('message'))
        @if (session()->get('message')=='signiup')
            <div class="alert alert-success">You have successfully signup</div>
            @elseif (session()->get('message')=='error')
            <div class="alert alert-danger">signup unsuccessfull</div>
        @endif
        @endif
        @if (session()->has('message'))
        @if (session()->get('message')=='success')
            <div class="alert alert-success">You have successfully login</div>
            @elseif (session()->get('message')=='exists')
            <div class="alert alert-warning">users dose not exists!</div>
            @elseif (session()->get('message')=='error')
            <div class="alert alert-danger">Wrong crediential!</div>
            @elseif (session()->get('message')=='logout')
            <div class="alert alert-success">You have successfully logout!</div>
        @endif
        @endif
        <header class="modal-header"><h3>Sign in:</h3></header>
        <form action="{{url('/login')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="pass" id="pass" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="login" class="btn btn-md btn-outline-danger">
        </div>
    </form>
    </div>
</body>
</html>