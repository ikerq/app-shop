@extends('layouts.app')

@section('title','Bienvenido a App Shop')

@section('body-class','landing-page sidebar-collapse')

@section('content')
	<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
	</div>
	<div class="main main-raised">
		<div class="container">
			<div class="section">
				<h2 class="title text-center">Editar Categoría Seleccionada</h2>
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
					<form action="{{ url('/admin/categories/'.$category->id.'/edit') }}" method="post">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group bmd-form-group">
									<label class="bmd-label-floating">Nombre de de la categoría</label>
									<input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}">
								</div>
							</div>
						</div>
						<div class="form-group  bmd-form-group">
							<label class="bmd-label-floating">Descripción de la categoría</label>
							<textarea class="form-control" id="description" rows="3" name="description">{{ old('description',$category->description) }}</textarea>
						</div>
						<button class="btn btn-primary ">Guardar Cambios</button>
						<a href="{{ url('/admin/categories') }}" class="btn">Cancelar</a>
					</form>
				</div>
			</div>
		</div>
	</div>
@include('includes.footer')
@endsection
