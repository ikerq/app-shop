@extends('layouts.app')

@section('title','Listado de Categorías')

@section('body-class','product-page')

@section('content')
	<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">

	</div>
	<div class="main main-raised">
		<div class="container">
			<div class="section text-center">
				<h2 class="title">Listado de Categorías</h2>
				<div class="team">
					<a href="{{ url('/admin/categories/create') }}" class="btn btn-primary btn-round">Nueva Categoría</a>
					<div class="row">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th scope="col" class="text-center">Nombre</th>
										<th scope="col" class="w-25 text-center">Descripción</th>
										<th scope="col" class="text-right">Opciones</th>
									</tr>
								</thead>
								<tbody>
								@foreach($categories as $key => $category)
									<tr scope="row">
										<td>{{ $category->name }}</td>
										<td>{{ $category->description }}</td>
										<td  class="text-right">
											<form action="{{ url('/admin/categories/'.$category->id) }}" method="post">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}
												<a href="#" rel="tooltip" title="Ver categoría" class="btn btn-info btn-link  btn-sm">
													<i class="fa fa-info"></i>
												</a>
												<a href="{{ url('/admin/categories/'.$category->id.'/edit') }}" rel="tooltip" title="Editar categoría" class="btn btn-success btn-link btn-sm">
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
							{{ $categories->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@include('includes.footer')
@endsection
