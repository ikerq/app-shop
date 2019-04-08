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
            <!-- <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="profile-tabs">
                        <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
                                    <i class="material-icons">camera</i> Studio
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#works" role="tab" data-toggle="tab">
                                    <i class="material-icons">palette</i> Work
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#favorite" role="tab" data-toggle="tab">
                                    <i class="material-icons">favorite</i> Favorite
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->
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
@include('includes.footer')
@endsection

