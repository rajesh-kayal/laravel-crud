<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        @if(session()->has('USER'))
        <div class="container-fluid">
            <header class="modal-header">
                @if(session()->has('USER-ROLE') && session()->get('USER-ROLE') == 'admin')
                <h4>Displaying All User's Profile:</h4>
                @else
                <h4>Displaying {{ $userInfo[0]->name }}'s Info:</h4>
                @endif
            </header>
            <div class="btn btn-sm btn-outline-danger"><a href="{{ url('/logout') }}">Logout</a></div>
        </div>
        @else
        <script>window.location.href="{{url('/signin')}}";</script>
        @endif

        @if(session()->has('message'))
        @if(session()->get('message')=='success')
        <div class="alert alert-success">One user's profile has been updated!</div>
        @elseif(session()->get('message')=='delete')
        <div class="alert alert-info">One user's profile has been deleted!</div>
        @elseif(session()->get('message')=='error')
        <div class="alert alert-danger">Unable to perform task!</div>
        @endif
        @endif

        @if(isset($userInfo))
        <table class="table table-hover table-bordered">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Languages</th>
                <th>Qualifications</th>
                <th>Picture</th>
            </tr>
            @foreach($userInfo as $user)
            <tr>
                <td>
                    <a href="{{ url('/edit') }}/{{ $user->id }}" class="btn btn-sm btn-outline-success">Edit</a> |
                    <a href="{{ url('/delete') }}/{{ $user->id }}" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->languages }}</td>
                <td>{{ $user->qualifications }}</td>
                <td>
                    <img src="{{ asset('uploads') }}/{{ $user->picture }}" alt="no image preview" width='100px' height="100px" title="{{ $user->name }}">
                </td>
            </tr>
            @endforeach
        </table>
        @endif
    </div>
</body>
</html>
