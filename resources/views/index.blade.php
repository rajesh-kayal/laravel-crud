<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ( $errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
        @if (session()->has('message'))
        @if (session()->get('message')=='signup')
            <div class="alert alert-success">You have successfully signup</div>
            @elseif (session()->get('message')=='unsignup')
            <div class="alert alert-danger">signup unsuccessfull</div>
        @endif
        @endif
        <header class="modal-header"><h2>Sign Up:</h2></header>
        <form action="{{url('/insert')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="number" name="phone" id="phone" class="form-control">
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <input type="radio" name="gen" id="gen" value="Male">Male
            <input type="radio" name="gen" id="gen" value="Female">Female
        </div>
        <div class="form-group">
            <select name="lang[]" id="lang" multiple>
                <option disabled>--choose a field--</option>
                <option>English</option>
                <option>Hindi</option>
                <option>Bengali</option>
            </select>
        </div>
        <div class="form-group">
            <input type="checkbox" name="chall" id="chall" onclick="selectAll">Select All
            <input type="checkbox" name="ch[]" id="ch1" value="10th">10 <sub>th</sub>
            <input type="checkbox" name="ch[]" id="ch2" value="12th">12 <sub>th</sub>
            <input type="checkbox" name="ch[]" id="ch3" value="Gradutation">Gradutation
            <input type="checkbox" name="ch[]" id="ch4" value="Post Gradutation">Post Gradutation
        </div>
        <script>
            function selectAll(){
                var chall=document.getElementById('chall');
                var ch1=document.getElementById('ch1');
                var ch2=document.getElementById('ch2');
                var ch3=document.getElementById('ch3');
                var ch4=document.getElementById('ch4');
                if(chall.checked){
                    ch1.checked = ch2.checked =ch3.checked = ch4.checked =true;
                }else{
                    ch1.checked = ch2.checked =ch3.checked = ch4.checked =false;
                }
            }
        </script>
        <div class="form-group">
            <input type="file" name="avatar" id="avatar" class="form-control">
            <img id="preview" alt="no image preview" width="100px" height="100px" class="img-thumbnail" style="display: none">
        </div>
        <script>
            $(document).ready(function(){
                $("#avatar").change(function(){
                    var preview=$("#preview");
                    if(this.files && this.files[0]){
                        preview[0].src=URL.createObjectURL(this.files[0]);
                        preview.show()
                    }else{
                        preview.hide();
                    }
                });
            });
        </script>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="pass" id="pass" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Confirm Password</label>
            <input type="password" name="pass_confirmation" id="pass_confirmation" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="SIGN UP" class="btn btn-md btn-outline-primary"> | 
            <input type="reset" value="RESET" class="btn btn-md btn-outline-danger"> 
        </div>
    </form>
    </div>
</body>
</html>