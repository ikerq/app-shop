@extends('layouts.app')

@section('title','Imágenes de Productos')

@section('body-class','product-page')

@section('content')
	<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">

	</div>
	<div class="main main-raised">
		<div class="container">
			<div class="section text-center">
				<h2 class="title">Imágenes del producto "{{ $product->name }}"</h2>
				<div class="team">
					<form action="" method="post" enctype="multipart/form-data"> <!-- Se deja el action vacio para que tome el valor de la url actual en el navegador -->
						{{ csrf_field() }}
						<input type="file" name="photo" id="photo" required>
						<button type="submit" class="btn btn-primary btn-round">Subir nueva imagen</button>
						<a href="{{ url('/admin/products') }}" class="btn btn-default btn-round">Volver al listado de productos</a>
					</form>
					<hr>
					<div class="row">
					@foreach($images as $image)
						<div class="col-md-4">
							<div class="card">
								<div class="card-body">
									<img src="{{ $image->url }}" width="250">
									<form action="" method="post">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<input type="hidden" name="image_id" value="{{ $image->id }}">
										<button type="submit" class="btn btn-sm btn-danger btn-round">Eliminar imagen</button>
										@if ($image->featured)
										<button type="button"  class="btn btn-sm btn-info btn-fab btn-fab-mini btn-round" rel="tooltip" title="Imagen destacada actualmente">
											<i class="fa fa-heart"></i>
										</button>
										@else
										<a href="{{ url('/admin/products/'.$product->id.'/images/select/'.$image->id) }}" class="btn btn-sm btn-primary btn-fab btn-fab-mini btn-round">
											<i class="fa fa-heart"></i>
										</a>
										@endif
									</form>
								</div>
							</div>
						</div>
					@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
@include('includes.footer')
@endsection
