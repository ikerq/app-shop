@extends('layouts.app')

@section('title','Bienvenido a App Shop')

@section('body-class','landing-page sidebar-collapse')

@section('content')
	<div class="page-header header-filter" data-parallax="true" style="background-image: url('img/profile_city.jpg')">

	</div>
	<div class="main main-raised">
		<div class="container">
			<div class="section">
				<h2 class="title text-center">Editar Producto Seleccionado</h2>
				<div class="team">
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
						</ul>
					</div>
				@endif
					<form action="{{ url('/admin/products') }}" method="post">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group bmd-form-group">
									<label class="bmd-label-floating">Nombre del producto</label>
									<input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group bmd-form-group">
									<label class="bmd-label-floating">Precio del producto</label>
									<input type="number" step="0.01" class="form-control" name="price" value="{{ old('price',$product->price) }}">
								</div>
							</div>
						</div>
						<div class="form-group bmd-form-group">
							<label class="bmd-label-floating">Descripción corta</label>
							<input type="text" class="form-control" name="description" value="{{ old('description',$product->description) }}">
						</div>
						<div class="form-group  bmd-form-group">
							<label class="bmd-label-floating">Descripción extensa del producto</label>
							<textarea class="form-control" id="long_description" rows="3" name="long_description">{{ old('long_description',$product->long_description) }}</textarea>
						</div>
						<button class="btn btn-primary ">Guardar Cambios</button>
						<a href="{{ url('/admin/products') }}" class="btn">Cancelar</a>
					</form>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer footer-default">
		<div class="container">
			<nav class="float-left">
				<ul>
					<li>
						<a href="https://www.creative-tim.com">
							Creative Tim
						</a>
					</li>
					<li>
						<a href="https://creative-tim.com/presentation">
							About Us
						</a>
					</li>
					<li>
						<a href="http://blog.creative-tim.com">
							Blog
						</a>
					</li>
					<li>
						<a href="https://www.creative-tim.com/license">
							Licenses
						</a>
					</li>
				</ul>
			</nav>
			<div class="copyright float-right">
				&copy;
				<script>
					document.write(new Date().getFullYear())
				</script>, made with <i class="material-icons">favorite</i> by
				<a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
			</div>
		</div>
	</footer>
@endsection
