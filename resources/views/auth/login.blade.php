<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bibit Bunga Murah - Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">
    <link rel="stylesheet" type="text/css" href="/bibit/css/loginfix.css">
  </head>
  <body>
    <div class="header mb-3 text-center"><a href="/"><img src="/bibit/assets/title.png"></a>
    </div>
    <div class="alert alert-primary text-center texts"><h6>Dapatkan berbagai macam bibit secara online dan sampai langsung dirumah anda. terjangkau,berkualitas,terpercaya</h6>
    </div>
	
    <div class="login-container">
	<div class="form-login">
		<ul class="login-nav" id="tes">
			<li class="login-nav__item active">
				<a href="#" onclick="login()">Login</a>
			</li>
			<li class="login-nav__item">
				<a href="#" onclick="register()">Daftar</a>
			</li>
		</ul>

	<section class="login">
		<form method="POST" action="{{ route('login') }}">
			@csrf
		<label for="login-input-user" class="login__label">
			Email
		</label>
		<input id="email" type="email" class="login__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required/>
		@error('email')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror

		<label for="login-input-password" class="login__label">
			Password
		</label>
		<input id="password" type="password" class="login__input @error('password') is-invalid @enderror" name="password" required/>
		@error('password')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror

		<label for="login-sign-up" class="login__label--checkbox">
			<input name="remember" id="remember" type="checkbox" class="login__input--checkbox" {{ old('remember') ? 'checked' : '' }}/>
			Tetap masuk
		</label>

		<button class="login__submit">Login</button>
		</form>
		<a href="{{ url('auth/facebook') }}">
		<button class="login__facebook"><i class="fab fa-facebook-f fb"></i>Login dengan facebook</button>
		</a>
		<a href="{{ url('auth/google') }}">
		<button class="login__submit" id="btn-google"><i class="fab fa-google google"></i>Login dengan Google</button>
		</a>

		@if (Route::has('password.request'))
			<a href="{{ route('password.request') }}" class="login__forgot">Lupa Password?</a>
		@endif
	 </section>


	<section class="register">
	
		<form method="POST" action="{{ route('register') }}">
			@csrf
			
		<label for="login-input-user" class="login__label required">
			Nama
		</label>
		<input id="name" type="text" class="login__input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required/>
		@error('name')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror

		<label for="login-input-user" class="login__label">
			Email
		</label>
		<input id="email" type="email" class="login__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required/>
		@error('email')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
		
		<label for="login-input-password" class="login__label">
			Password
		</label>
		<input id="password" type="password" class="login__input @error('password') is-invalid @enderror" name="password" required>
		@error('password')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror

		<label for="login-input-password" class="login__label">
			Confirm Password
		</label>
		<input id="password-confirm" type="password" class="login__input" name="password_confirmation" required> 

		<label for="login-sign-up" class="login__label--checkbox">
			<input id="login-sign-up" type="checkbox" class="login__input--checkbox" required />
			Anda Telah Menyetujui Syarat dan Ketentuan Bibit Bunga Murah.
		</label>
	
		<button type="submit" class="login__submit" >Daftar</button>
		</form>
		<a href="{{ url('auth/facebook') }}">
		<button class="login__facebook"><i class="fab fa-facebook-f fb"></i>Daftar dengan facebook</button>
		</a>
		<a href="{{ url('auth/google') }}">
		<button class="login__submit" id="btn-google"><i class="fab fa-google google"></i>Daftar dengan Google</button>
		</a>
	</section>	
	</div>
</div>
  </body>
  <script type="text/javascript" src="/bibit/js/login.js"></script>
</html>