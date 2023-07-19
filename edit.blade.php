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
		<header class="modal-header">
			<h4>Sign Up:</h4>
		</header>
		<form action="{{ url('/update') }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" id="name" value="{{$user->name}}" class="form-control">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" id="email" value="{{$user->email}}" class="form-control">
			</div>
			<div class="form-group">
				<label>Phone</label>
				<input type="number" name="phone" id="phone" value="{{$user->phone}}" class="form-control">
			</div>
			<div class="form-group">
				<?php
					$languages=$user->languages;
					$languages=explode(',',$languages);
				?>
				<label>Languages</label>
				<select name="lang[]" class='form-control' multiple>
					<option @if(in_array('Bengali',$languages)){{'selected'}}@endif>Bengali</option>
					<option @if(in_array('Hindi',$languages)){{'selected'}}@endif>Hindi</option>
					<option @if(in_array('English',$languages)){{'selected'}}@endif>English</option>
				</select>
			</div>
			<div class="form-group">
				<?php
					$Qualifications=$user->qualifications;
					$Qualifications=explode(',',$Qualifications);
				?>
				<label>Qualifications</label>
				<input type="checkbox" id="ch_all"  onchange="selectAll()" >Select All
				<input type="checkbox" name="ch[]" id="ch1"  value="10th" @if(in_array('10th',$Qualifications)){{'checked'}}@endif>10 <sub>th</sub>
				<input type="checkbox" name="ch[]" id="ch2"  value="12th" @if(in_array('12th',$Qualifications)){{'checked'}}@endif>12 <sub>th</sub>
				<input type="checkbox" name="ch[]" id="ch3"  value="Graduation" @if(in_array('Graduation',$Qualifications)){{'checked'}}@endif>Graduation
                <script src="{{ asset('qualifications.js') }}"></script>
			</div>
			<input type="hidden" name="hid" value="{{ $user->id }}">
			<div class="form-group">
				<input type="submit" value="Submit" class="btn btn-sm btn-primary"> |
				<input type="reset" value="Reset" class="btn btn-sm btn-danger">
			</div>

		</form>
	</div>
	
</body>
</html>