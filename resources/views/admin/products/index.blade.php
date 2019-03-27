@extends('layouts.app')

@section('title','Listado de Productos')

@section('body-class','product-page')

@section('content')
	<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">

	</div>
	<div class="main main-raised">
		<div class="container">
			<div class="section text-center">
				<h2 class="title">Listado de Productos</h2>
				<div class="team">
					<a href="{{ url('/admin/products/create') }}" class="btn btn-primary btn-round">Nuevo Producto</a>
					<div class="row">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th scope="col" class="text-center">#</th>
										<th scope="col" class="text-center">Nombre</th>
										<th scope="col" class="w-25 text-center">Descripción</th>
										<th scope="col" class="text-center">Categoría</th>
										<th scope="col" class="text-right">Precio</th>
										<th scope="col" class="text-right">Opciones</th>
									</tr>
								</thead>
								<tbody>
								@foreach($products as $product)
									<tr scope="row">
										<td  class="text-center">{{ $product->id }}</td>
										<td>{{ $product->name }}</td>
										<td>{{ $product->description }}</td>
										<td>{{ $product->category ? $product->category->name : 'General' }}</td>
										<td  class="text-right">&euro; {{ $product->price }}</td>
										<td  class="text-right">
											<form action="{{ url('/admin/products/'.$product->id) }}" method="post">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}
												<a href="#" rel="tooltip" title="Ver producto" class="btn btn-info btn-link  btn-sm">
													<i class="fa fa-info"></i>
												</a>
												<a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar" class="btn btn-success btn-link btn-sm">
													<i class="fa fa-pencil-square-o"></i>
												</a>
												<a href="{{ url('/admin/products/'.$product->id.'/images') }}" rel="tooltip" title="Imágenes del producto" class="btn btn-warning btn-link btn-sm">
													<i class="fa fa-image"></i>
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
	</div>
@include('includes.footer')
@endsection
