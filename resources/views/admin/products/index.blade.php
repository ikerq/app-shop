@extends('layouts.app')

@section('title','Listado de Productos')

@section('body-class','product-page')

@section('content')
	<div class="page-header header-filter" data-parallax="true" style="background-image: url('132img/profile_city.jpg')">

	</div>
	<div class="main main-raised">
		<div class="container">
			<div class="section text-center">
				<h2 class="title">Listado de Productos</h2>
				<div class="team">
					<div class="row">
						<table class="table">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th>Nombre</th>
									<th class="col-md-4">Descripción</th>
									<th>Categoría</th>
									<th class="text-right">Precio</th>
									<th class="text-right">Opciones</th>
								</tr>
							</thead>
							<tbody>
							@foreach($products as $product)
								<tr>
									<td  class="text-center">{{ $product->id }}</td>
									<td>{{ $product->name }}</td>
									<td>{{ $product->description }}desc prueba</td>
									<td>{{ $product->category->name }}cat prueba</td>
									<td  class="text-right">&euro; {{ $product->price }}</td>
									<td  class="text-right">
										<button type="button" rel="tooltip" title="ver" class="btn btn-info btn-link  btn-sm">
											<i class="fa fa-info"></i>
										</button>
										<button type="button" rel="tooltip" title="ver" class="btn btn-success btn-link btn-sm">
											<i class="fa fa-pencil-square-o"></i>
										</button>
										<button type="button" rel="tooltip" title="ver" class="btn btn-danger btn-link btn-sm">
											<i class="fa fa-times"></i>
										</button>
									</td>
								</tr>
								@endforeach
							</tbody>
						</div>
					</div>
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
