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
                @if (session('notification'))
                    <div class="alert alert-success" role="alert">
                        {{ session('notification') }}
                    </div>
                @endif

                <ul class="nav nav-pills nav-pills-icons" role="tablist">
                    <li class="nav-item">
                        <a class="active nav-link" href="#dashboard-1" role="tab" data-toggle="tab">
                            <i class="material-icons">dashboard</i>
                            Carrito de compras
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#schedule-1" role="tab" data-toggle="tab">
                            <i class="material-icons">list</i>
                            Pedidos realizados
                        </a>
                    </li>
                </ul>
                <hr>
                <p>Tu carrito de compras presenta {{auth()->user()->cart->details->count() }} productos.</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">Nombre</th>
                            <th scope="col" >Precio</th>
                            <th>Cantidad</th>
                            <th>SubTotal</th>
                            <th scope="col" class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach(auth()->user()->cart->details as $detail)
                        <tr scope="row">
                            <td  class="text-center">
                                <img width="50" src="{{ $detail->product->featured_image_url }}">
                            </td>
                            <td>
                                <a href="{{ url('/products/'.$detail->product->id) }}">{{ $detail->product->name }}</a>
                            </td>
                            <td>&euro; {{ $detail->product->price }}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>$ {{ $detail->quantity * $detail->product->price }}</td>
                            <td class="text-center">
                                <form action="{{ url('/cart') }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                                    <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank" rel="tooltip" title="Ver producto" class="btn btn-info btn-link  btn-sm">
                                        <i class="fa fa-info"></i>
                                    </a>
                                    <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <hr>
                <p>
                    <strong>Importe a pagar: </strong> {{ auth()->user()->cart->total }}
                </p>
                <div class="text-center">
                    <form action="{{ url('/order') }}" method="post">
                        {{ csrf_field() }}
                        <button class="btn btn-primary btn-round">
                            <i class="material-icons">done</i> Realizar Pedido
                        </button>
                    </form>
                </div>
			</div>
		</div>
	</div>
    
@include('includes.footer')
@endsection

