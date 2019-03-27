@extends('layouts.app')

@section('title','App Shop | Dashboard')

@section('body-class','landing-page sidebar-collapse')

@section('content')
	<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
	</div>
	<div class="main main-raised">
		<div class="container">
			<div class="section">
				<h2 class="title text-center">Dashboard</h2>
                
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="nav nav-pills nav-pills-icons" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" href="#dashboard-1" role="tab" data-toggle="tab">
                                <i class="material-icons">dashboard</i>
                                Carrito de compras
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#schedule-1" role="tab" data-toggle="tab">
                                <i class="material-icons">list</i>
                                Pedidos realizados
                            </a>
                        </li>
                    </ul>
			</div>
		</div>
	</div>
    
@include('includes.footer')
@endsection

