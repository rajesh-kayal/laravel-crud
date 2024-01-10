<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container">
                    @if (session()->has('message'))
        @if (session()->get('message')=='update')
            <div class="alert alert-success">One user profile has been updated</div>
            @elseif (session()->get('message')=='unupdate')
            <div class="alert alert-danger">update unsuccessfull</div>
            @elseif(session()->get('message')=='delete')
            <div class="alert alert-success">One user profile has been deleted</div>
            @elseif (session()->get('message')=='undelete')
            <div class="alert alert-danger">delete unsuccessfull</div>
        @endif
        @endif
        @if (session()->has('message'))
        @if (session()->get('message')=='success')
            <div class="alert alert-success">You have successfully login</div>
        @endif
        @endif
        <div class="float-end">
            <span class="text-info">Welcome <sub>{{session('USER')}}</sub><a href="{{url('/logout')}}" class="btn btn-sm btn-danger">Logout</a></span>
        </div>
        <header class="moadal-header">
            <h3>Displaying All users info:</h3>
        </header>
        <table class="table table-hover table-bordered">
            @if (isset($usersInfo))
            <tr>
                <th>sl/</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Languages</th>
                <th>Qualifications</th>
                <th>Profile pic:</th>
                <th>Action</th>
                @php
                    $i=1;
                @endphp
            </tr>
            @foreach ($usersInfo as $user)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->gender}}</td>
                    <td>{{$user->languages}}</td>
                    <td>{{$user->qualification}}</td>
                    <td>
                        <img src="{{asset('/uploads')}}/{{$user->picture}}" alt="no image" width="100px" height="100x" class="img-thumbnail" title="{{$user->name}}'s image">
                    </td>
                    <td>
                        <a href="{{url('/edit')}}/{{$user->id}}" class="btn btn-sm btn-outline-success">Edit</a> |
                        <a href="{{url('/delete')}}/{{$user->id}}" class="btn btn-sm btn-outline-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            <div>{{$usersInfo->links()}}</div>
            @endif
        </table>
    </div>
</body>
</html>