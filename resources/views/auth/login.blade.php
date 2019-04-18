@extends('layouts.app')

@section('body-class','login-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" style="background-image: url('{{ asset('img/bg7.jpg') }}'); background-size: cover; background-position: top center;">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 ml-auto mr-auto">
				<div class="card card-login">
					<form class="form" method="POST" action="{{ route('login') }}">
						@csrf
						<div class="card-header card-header-primary text-center">
							<h4 class="card-title">Inicio de sesión</h4>
						</div>
						<p class="description text-center">Ingresa tus datos</p>
						<div class="card-body">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="material-icons">fingerprint</i>
									</span>
								</div>
            					<input id="username" type="text" placeholder="Username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus >
							</div>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="material-icons">lock_outline</i>
									</span>
								</div>
								<input id="password" type="password" placeholder="Contraseña" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
									Recordar sesión
								</label>
							</div>
							<!--@if (Route::has('password.request'))
								<a class="btn btn-link" href="{{ route('password.request') }}">
									{{ __('Forgot Your Password?') }}
								</a>
							@endif-->
						</div>
						<div class="footer text-center">
							<button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Ingresar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	@include('includes.footer')
</div>
@endsection
