<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{asset('css/login.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap.min2.css')}}">
	<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
	<script src="{{asset('js/all.min.js')}}"></script>
	
	<title>Login</title>
</head>
<body>
	<div class="modal-dialog text-center">
		<div class="col-sm-12 col-9 main-section">
			<div class="login-box">
				<div class="col-12 user-img">
					<img class="avatar" src="img/fondo1.gif" alt="logo">
				</div>
				<h1>Logins</h1>
				@if (session('mensaje'))
                    <div class="alert alert-success" role="alert">
                        {{ session('mensaje') }}
                    </div>
                @endif
				<form method="POST" action="{{ route('login') }}" class=" form col-12">
					@csrf

					<!-- USERNAME -->
					<div class="form-group">
						<label for="user_name"><i class="fas fa-user"></i> User Name</label>
						<br>
						<input id="user_name" type="text" class="@error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>
					    @error('user_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<!-- PASSWORD -->
					<div class="form-group">
						<label for="password"><i class="fas fa-lock"></i> Password</label>
						<br>
						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
						
					</div>
					<input type="submit" value="Login">
				</form>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

	<script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>