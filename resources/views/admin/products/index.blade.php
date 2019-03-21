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
					<a href="{{ url('/admin/products/create') }}" class="btn btn-primary btn-round">Nuevo Producto</a>
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
									<td>{{ $product->description }}</td>
									<td>{{ $product->category ? $product->category->name : 'General' }}</td>
									<td  class="text-right">&euro; {{ $product->price }}</td>
									<td  class="text-right">
									<form action="{{ url('/admin/products/'.$product->id) }}" method="post">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
										<a href="#" rel="tooltip" title="ver" class="btn btn-info btn-link  btn-sm">
											<i class="fa fa-info"></i>
										</a>
										<a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar" class="btn btn-success btn-link btn-sm">
											<i class="fa fa-pencil-square-o"></i>
										</a>
											<button type="submit" rel="tooltip" title="eliminar" class="btn btn-danger btn-link btn-sm">
												<i class="fa fa-times"></i>
											</button>
										</form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{{ $products->links() }}
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
