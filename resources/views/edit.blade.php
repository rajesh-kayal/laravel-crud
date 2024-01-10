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
        <header class="modal-header"><h2>Update Form:</h2></header>
        <form action="{{url('/update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="number" name="phone" id="phone" value="{{$user->phone}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <input type="radio" name="gen" id="gen" value="Male" @if ($user->gender == 'Male'){{'checked'}}@endif>Male
            <input type="radio" name="gen" id="gen" value="Female" @if ($user->gender == 'Female'){{'checked'}}@endif>Female
        </div>
        <?php
        $languages=$user->languages;
        $languages=explode(',',$languages);           
        ?>
        <div class="form-group">
            <select name="lang[]" id="lang" multiple>
                <option disabled>--choose a field--</option>
                <option @if (in_array('English',$languages)){{'selected'}}@endif>English</option>
                <option @if (in_array('Hindi',$languages)){{'selected'}}@endif>Hindi</option>
                <option @if (in_array('Bengali',$languages)){{'selected'}}@endif>Bengali</option>
            </select>
        </div>
        <?php
        $qualifications=$user->qualification;
        $qualifications=explode(',',$qualifications);           
        ?>
        <div class="form-group">
            <input type="checkbox" name="chall" id="chall" onclick="selectAll">Select All
            <input type="checkbox" name="ch[]" id="ch1" value="10th" @if (in_array('10th',$qualifications)){{'checked'}}@endif>10 <sub>th</sub>
            <input type="checkbox" name="ch[]" id="ch2" value="12th" @if (in_array('12th',$qualifications)){{'checked'}}@endif>12 <sub>th</sub>
            <input type="checkbox" name="ch[]" id="ch3" value="Gradutation" @if (in_array('Gradutation',$qualifications)){{'checked'}}@endif>Gradutation
            <input type="checkbox" name="ch[]" id="ch4" value="Post Gradutation" @if (in_array('Post Gradutation',$qualifications)){{'checked'}}@endif>Post Gradutation
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
            <img id="preview" src="{{asset('/uploads')}}/{{$user->picture}}" alt="no image preview" width="100px" height="100px" class="img-thumbnail" >
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
        <input type="hidden" name="hid" value="{{$user->id}}">
        <div class="form-group">
            <input type="submit" value="UPDATE" class="btn btn-md btn-outline-primary">
        </div>
    </form>
    </div>
</body>
</html>