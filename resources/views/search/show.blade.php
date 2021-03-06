@extends('layouts.app')

@section('title','Resultados de la búsqueda')

@section('body-class','profile-page')

@section('styles')
	<style>
	/* Aqui pueden ir los estilos asociados a la vista actual */
	</style>
@endsection

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/city-profile.jpg') }}');"></div>
<div class="main main-raised">
	<div class="profile-content">
		<div class="container">
			<div class="row">
				<div class="col-md-6 ml-auto mr-auto">
					<div class="profile">
						<div class="avatar">
							<img src="{{ asset('img/lupa.png') }}" alt="Mostrando resultados" class="img-raised rounded-circle img-fluid">
						</div>
					@if (session('notification'))
						<div class="alert alert-success" role="alert">
							{{ session('notification') }}
						</div>
					@endif
						<div class="name">
							<h3 class="title">Resultados de la búsqueda</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="description text-center">
				<p> Se encontraron {{ $products->count() }} resultados  para el termino {{ $query }}.</p>
			</div>
			<div class="team text-center">
					<div class="row">
						@foreach ($products as $product)
						<div class="col-md-4">
							<div class="team-player">
								<div class="card card-plain">
									<div class="col-md-6 ml-auto mr-auto">
										<img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
									</div>
									<h4 class="card-title">
										<a href="{{ url('/products/'.$product->id) }}">{{ $product->name }}</a>
										<br>
									</h4>
									<div class="card-body">
										<p class="card-description">{{ $product->description }}</p>
									</div>
									<div class="card-footer justify-content-center">
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<div class="text-center">
						{{ $products->links() }}
					</div>
				</div>
		</div>
	</div>
</div>
@include('includes.footer')
@endsection

