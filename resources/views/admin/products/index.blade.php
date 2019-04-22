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
										<th scope="col" class="text-center">Stock</th>
										<th scope="col" class="text-right">Opciones</th>
									</tr>
								</thead>
								<tbody>
								@foreach($products as $product)
									<tr scope="row">
										<td  class="text-center productId">{{ $product->id }}</td>
										<td>{{ $product->name }}</td>
										<td>{{ $product->description }}</td>
										<td>{{ $product->category_name}}</td>
										<td class="text-right">&euro; {{ number_format($product->price, 2) }}</td>
										<td class="stock">{{ $product->stock }}</td>
										<td class="text-right">
											<form action="{{ url('/admin/products/'.$product->id) }}" method="post">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}
												<a href="{{ url('/products/'.$product->id) }}" rel="tooltip" title="Ver producto" class="btn btn-info btn-link  btn-sm" target="_blank">
													<i class="fa fa-info"></i>
												</a>
												<a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar" class="btn btn-success btn-link btn-sm">
													<i class="fa fa-pencil-square-o"></i>
												</a>
												<a href="{{ url('/admin/products/'.$product->id.'/images') }}" rel="tooltip" title="Imágenes del producto" class="btn btn-warning btn-link btn-sm">
													<i class="fa fa-image"></i>
												</a>
												<button type="button" rel="tooltip" title="Editar stock" class="btn btn-primary btn-link btn-sm btn-stock">
													<i class="fa fa-sort-numeric-desc"></i>
												</button>
												<button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm">
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
	<!-- Modal -->
	<div class="modal fade" id="modalEditStock" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Editar la cantidad del stock del producto</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="{{ url('admin/products/stock') }}" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="product_id" id="product_id" value="">
					<div class="modal-body">
						<input type="number" name="stock" id="stock" value="" class="form-control">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary">Editar stock</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@include('includes.footer')
@endsection
@section('scripts')
<script>
$(function(){
	$('.btn-stock').on('click', function(){
		
		var productId = $(this).closest('tr').find('.productId')[0].innerHTML;
		var stock = $(this).closest('tr').find('.stock')[0].innerHTML;

		$('#modalEditStock #product_id').val(productId);
		$('#modalEditStock #stock').val(stock);
		$('#modalEditStock').modal('show');
	});
});
</script>
@endsection
