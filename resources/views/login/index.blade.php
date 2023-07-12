<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		.login-card {
			max-width: 400px;
			margin: 0 auto;
			margin-top: 50px;
		}
		body{
			background-color: rgb(205, 205, 205)
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card login-card">
					<div class="card-header">
						<h2>Connexion</h2>
					</div>
					<div class="card-body">
						<form action="{{route('login.check')}}" method="post">

                            @if(session('fail'))

<div class="alert alert-danger">
    {{Session::get('fail')}}
</div>
                            @endif
                            @csrf
							<div class="form-group">
								<label for="email">Email :</label>
								<input type="email" class="form-control" autocomplete="off" id="email" value="{{old('email')}}" name="email">
                                <span class="text-danger">@error('email') {{$message}}  @enderror</span>
							</div>
							<div class="form-group">
								<label for="password">Mot de Pass :</label>
								<input autocomplete="off" type="password" class="form-control" id="password" name="password">
                                <span class="text-danger">@error('password'){{$message}} @enderror</span>
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-primary">Connexion</button>
							</div>
						</form>
                        <br>
						<p>Nouvel Utilisateur ? <a href="login/register">, Inscrivez-vous ici</a></p>
                
					</div>
						<div class="card-footer">
							&copy; 2023 ORIENTsup
						</div>
				</div>
			</div>
		</div>
	</div>
