<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign In:</title>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		@if(session()->has('message'))
		<div class="alert alert-danger">{{ session()->get('message') }}</div>
		@endif
		<header class="modal-header">
			<h4>Sign In:</h4>
		</header>
		<form action="{{ url('/login') }}" method="post">
			@csrf
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" class="form-control">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="pass1" class="form-control">
			</div>
			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-sm btn-outline-primary" value="Login">
			</div>
		</form>
	</div>
</body>
</html>