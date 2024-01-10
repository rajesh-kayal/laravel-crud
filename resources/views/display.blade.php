<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>all users</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    @if (session()->has('message'))
    @if (session()->get('message')=='signin')
        <div class="alert alert-success">User Login Successfully</div>
    @endif
    @endif

    <div class="flot-end">
    <span class="text-info">Hello <sub>{{session('USER')}}</sub><a href="{{url('/logout')}}" class="btn btn-sm btn-danger">Logout</a></span> 
    </div>
        <header class="madal-header"><h2>Displaying all users</h2></header>
        <table class="table-hover table-bordered">
            @if (isset($usersInfo))
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            @php
                $i=1;
            @endphp
            @foreach ($usersInfo as $user)
                <tr>
                <td>{{$i++}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a href="{{url('/editUser')}}/{{$user->id}}" class="btn btn-sm btn-outline-info">Edit</a> |
                    <a href="{{url('/deleteUser')}}/{{$user->id}}"  class="btn btn-sm btn-outline-danger">Delete</a>
                </td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>
</body>
</html>