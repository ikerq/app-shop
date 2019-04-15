@extends('layouts.app')

@section('title','Bienvenido a App Shop')

@section('body-class','landing-page sidebar-collapse')

@section('content')
	<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">

	</div>
	<div class="main main-raised">
		<div class="container">
			<div class="section">
				<h2 class="title text-center">Registrar Nuevo Producto</h2>
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
									<input type="text" class="form-control" name="name" value="{{ old('name') }}">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group bmd-form-group">
									<label class="bmd-label-floating">Precio del producto</label>
									<input type="number" class="form-control" name="price" value="{{ old('price') }}">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group bmd-form-group">
									<label class="control-label bmd-label-static">Descripción corta</label>
									<input type="text" class="form-control" name="description" value="{{ old('description') }}">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group bmd-form-group">
									<label class="control-label bmd-label-static">Categoría del producto</label>
									<select class="form-control selectpicker" data-style="btn btn-link"  name="category_id">
										<option value="0">General</option>
									@foreach($categories as $category)
										<option value="{{ $category->id }}">{{ $category->name }}</option>
									@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="form-group  bmd-form-group">
							<label class="bmd-label-floating">Descripción extensa del producto</label>
							<textarea class="form-control" id="long_description" rows="3" name="long_description"> {{ old('long_description') }}</textarea>
						</div>
						<button class="btn btn-primary ">Registrar Producto</button>
						<a href="{{ url('/admin/products') }}" class="btn btn-default">Cancelar</a>
					</form>
				</div>
			</div>
		</div>
	</div>
	
@include('includes.footer')
@endsection
