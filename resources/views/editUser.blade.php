<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
</head>
<body>
    <form action="{{url('/update')}}" method="post">
        @csrf
        {{-- @csrf //expire page --}}
        Name:
        <input type="text" name="name" value="{{$user->name}}" ><br>
        email:
        <input type="email" name="email" value="{{$user->email}}" ><br>
        <input type="hidden" name="hid" value="{{$user->id}}" >
        <input type="submit" value="submit">
    </form>
</body>
</html>