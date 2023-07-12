<!DOCTYPE html>
<html>
<head>
	<title>S'inscrire</title>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		.register-card {
			max-width: 400px;
			margin: 0 auto;
			margin-top: 50px;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card register-card">
					<div class="card-header">
						<h2>S'inscrire</h2>
					</div>
					<div class="card-body">
						<form action="{{route('login.save')}}" method="post">
							@csrf

  @if(Session::get('success'))
<div class="alert alert-success">
{{Session::get('success')}}     
</div>
  @endif()
  @if(Session::get('fail'))
<div class="alert alert-danger">
{{Session::get('fail')}}
</div>
  @endif()


							<div class="form-group">
								<label for="name">Nom:</label>
								<input type="text" class="form-control"  value="{{old('name')}}" name="name">
								<span class="text-danger">@error('name'){{$message}} @enderror</span>
							</div>
							<div class="form-group">
								<label for="email">Email:</label>
								<input type="email" class="form-control" id="email"value="{{old('email')}}" name="email">
								<span class="text-danger">@error('email'){{$message}} @enderror</span>

							</div>
							<div class="form-group">
								<label for="password">Mot de pass:</label>
								<input type="password" class="form-control" value="{{old('password')}}" id="password" name="password">
								<span class="text-danger">@error('password'){{$message}} @enderror</span>

							</div>
			
							<button type="submit" class="btn btn-primary">Enregistre</button>
						</form>
						<br>
						<p>Déjà un compte ? <a href="/">Connectez-vous ici </a></p>
					</div>
				
					<div class="card-footer">
						&copy; 2023 ORIENTsup
					</div>
				</div>
			</div>
		</div>
	</div>
<style>
	

body{
	background-color: rgb(205, 205, 205);
}




</style>
	
</body>
</html>
