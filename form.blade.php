<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form</title>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		@if(session()->has('message'))
		@if(session()->get('message')=='success')
		<div class="alert alert-success">Sign up successfull</div>
		@elseif(session()->get('message')=='error');
		<div class="aler alert-danger">Unable to sign up!</div>
		@endif
		@endif
		<header class="modal-header">
			<h4>Sign Up:</h4>
			@if(session()->has('USER'))
        @if(session()->get('USER-ROLE') == 'admin')
            <h4>Displaying All User Profiles:</h4>
        @else
            <h4>Displaying {{ $userInfo[0]->name }}'s Info:</h4>
        @endif
    @else
        <script>window.location.href="{{url('/signin')}}";</script>
    @endif

		</header>
		<form action="{{ url('/insert') }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" id="name" class="form-control">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" id="email" class="form-control">
			</div>
			<div class="form-group">
				<label>Phone</label>
				<input type="text" name="phone" id="phone" class="form-control">
			</div>
			<div class="form-group">
				<label>Languages</label>
				<select name="lang[]" class='form-control' multiple>
					<option>Bengali</option>
					<option>Hindi</option>
					<option>English</option>
				</select>
			</div>
			<div class="form-group">
				<label>Qualifications</label>
				<input type="checkbox" id="ch_all"  onchange="selectAll()">Select All
				<input type="checkbox" name="ch[]" id="ch1"  value="10th">10 <sub>th</sub>
				<input type="checkbox" name="ch[]" id="ch2"  value="12th">12 <sub>th</sub>
				<input type="checkbox" name="ch[]" id="ch3"  value="Graduation">Graduation
                <script src="{{ asset('qualifications.js') }}"></script>
			</div>
			<div class="form-group">
				<input type="file" name="avatar" id="avatar" class="form-control">
				<img  id="preview" class="img-thumbnail" width="100px" height="100px" style="display:none;">
				<script src="{{ asset('preview.js') }}"></script>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="pass1" class="form-control">
			</div>
			<div class="form-group">
				<label>Confirm Password</label>
				<input type="password" name="pass_confirmation" class="form-control">
			</div>
			<div class="form-group">
				<input type="submit" value="Submit" class="btn btn-sm btn-primary"> |
				<input type="reset" value="Reset" class="btn btn-sm btn-danger">
			</div>

		</form>
	</div>
	
</body>
</html>