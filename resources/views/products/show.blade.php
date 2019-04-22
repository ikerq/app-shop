@extends('layouts.app')

@section('title','App Shop | Dashboard')

@section('body-class','profile-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/city-profile.jpg') }}');"></div>
<div class="main main-raised">
	<div class="profile-content">
		<div class="container">
			<div class="row">
				<div class="col-md-6 ml-auto mr-auto">
					<div class="profile">
						<div class="avatar">
							<img src="{{ $product->featured_image_url }}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
						</div>
					@if (session('notification'))
						<div class="alert alert-success" role="alert">
							{{ session('notification') }}
						</div>
					@endif
					@if (session('error'))
						<div class="alert alert-danger" role="alert">
							{{ session('error') }}
						</div>
					@endif
						<div class="name">
							<h3 class="title">{{ $product->name }}</h3>
							<h6>{{ isset($product->category->name) ? $product->category->name : '' }}</h6>
						</div>
					</div>
				</div>
			</div>
			<div class="description text-center">
				<p> {{ $product->long_description }}</p>
			</div>
			<div class="text-center">
			@if($product->product_exists)
				<a href="{{ url('/home') }}" class="btn btn-primary btn-round">
					<i class="material-icons">shopping_cart</i> Ver en el carrito de compras
				</a>
			@elseif($product->unavailable)
				<button class="btn btn-primary btn-round" disabled>
					<i class="material-icons">domain_disabled</i> Agotado
				</button>
			@elseif(auth()->check())
				<button class="btn btn-primary btn-round" data-toggle="modal" data-target="#modalAddToCart">
					<i class="material-icons">add</i> Añadir al carrito de compras
				</button>
			@else
				<a href="{{ url('/login?redirect_to='.url()->current()) }}" class="btn btn-primary btn-round">
					<i class="material-icons">add</i> Añadir al carrito de compras
				</a>
			@endif
			</div>
			<div class="tab-content tab-space">
				<div class="tab-pane active text-center gallery" id="studio">
					<div class="row">
						<div class="col-md-3 ml-auto">
							@foreach ($imagesLeft as $image)
							<img src="{{ $image->url }}" class="rounded">
							@endforeach
						</div>
						<div class="col-md-3 mr-auto">
							@foreach ($imagesRight as $image)
							<img src="{{ $image->url }}" class="rounded">
							@endforeach
						</div>
					</div>
				</div>
				<div class="tab-pane text-center gallery" id="works">
					<div class="row">
						<div class="col-md-3 ml-auto">
							<img src="{{ asset('img/examples/olu-eletu.jpg')}}" class="rounded">
							<img src="{{ asset('img/examples/clem-onojeghuo.jpg')}}" class="rounded">
							<img src="{{ asset('img/examples/cynthia-del-rio.jpg')}}" class="rounded">
						</div>
						<div class="col-md-3 mr-auto">
							<img src="{{ asset('img/examples/mariya-georgieva.jpg')}}" class="rounded">
							<img src="{{ asset('img/examples/clem-onojegaw.jpg')}}" class="rounded">
						</div>
					</div>
				</div>
				<div class="tab-pane text-center gallery" id="favorite">
					<div class="row">
						<div class="col-md-3 ml-auto">
							<img src="{{ asset('img/examples/mariya-georgieva.jpg')}}" class="rounded">
							<img src="{{ asset('img/examples/studio-3.jpg')}}'" class="rounded">
						</div>
						<div class="col-md-3 mr-auto">
							<img src="{{ asset('img/examples/clem-onojeghuo.jpg')}}" class="rounded">
							<img src="{{ asset('img/examples/olu-eletu.jpg')}}" class="rounded">
							<img src="{{ asset('img/examples/studio-1.jpg')}}" class="rounded">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Seleccion la cantidad que desea agregar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('/cart') }}" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="product_id" value="{{ $product->id }}">
				<input type="hidden" name="product_price" value="{{ $product->price }}">
				<div class="modal-body">
					<input type="number" name="quantity" value="1" class="form-control">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Añadir al carrito</button>
				</div>
			</form>
		</div>
	</div>
</div>
@include('includes.footer')
@endsection

