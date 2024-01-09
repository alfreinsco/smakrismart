@extends('layouts.frontend')

@section('content')
<!-- Start header -->
<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('/')}}">
                {{-- <img src="{{asset('frontend/images/logo.png')}}" alt="" /> --}}
                <div class="text-light font-weight-bold">{{ config('app.name') }}</div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-host">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('/buku')}}">Data Buku</a></li>
                </ul>
                @auth
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="hover-btn-new log orange" href="{{route('dashboard')}}"><span>Dashboard</span></a></li>
                    </ul>
                @else
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="hover-btn-new log orange" href="#" data-toggle="modal" data-target="#login"><span>Login Admin</span></a></li>
                    </ul>
                @endauth
            </div>
        </div>
    </nav>
</header>
<!-- End header -->

<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleControls" data-slide-to="1"></li>
        <li data-target="#carouselExampleControls" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <div id="home" class="first-section" style="background-image:url('{{asset('frontend/images/slider-01.jpg')}}');">
                <div class="dtab">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 text-right">
                                <div class="big-tagline">
                                    <h2><strong style="font-family:'Times New Roman'; ">SMA KRISTEN </strong> <span style="font-family: monospace0; font-size: 200px ">SMART</span></h2>
                                    <form action="{{url('/buku')}}" method="POST">@csrf
                                        <div class="w-100 d-flex justify-content-end">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <select name="key" id="key" class="btn btn-warning">
                                                        <option value="judul">Judul</option>
                                                        <option value="kategori">Kategori Buku</option>
                                                    </select>
                                                    <input type="text" name="value" class="form-control-lg" placeholder="Cari Buku">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="reset" class="hover-btn-new rounded" ><span>Reset</span></button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="submit" class="hover-btn-new"><span>Cari</span></button>
                                    </form>
                                </div>
                            </div>
                        </div><!-- end row -->            
                    </div><!-- end container -->
                </div>
            </div><!-- end section -->
        </div>
        <div class="carousel-item">
            <div id="home" class="first-section" style="background-image:url('{{asset('frontend/images/slider-02.jpg')}}');">
                <div class="dtab">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 text-right">
                                <div class="big-tagline">
                                    <h2><strong style="font-family:'Times New Roman'; ">SMA KRISTEN </strong> <span style="font-family: monospace0; font-size: 200px ">SMART</span></h2>
                                    <form action="{{url('/buku')}}" method="POST">@csrf
                                        <div class="w-100 d-flex justify-content-end">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <select name="key" id="key" class="btn btn-warning">
                                                        <option value="judul">Judul</option>
                                                        <option value="kategori">Kategori Buku</option>
                                                    </select>
                                                    <input type="text" name="value" class="form-control-lg" placeholder="Cari Buku">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="reset" class="hover-btn-new rounded" ><span>Reset</span></button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="submit" class="hover-btn-new"><span>Cari</span></button>
                                    </form>
                                </div>
                            </div>
                        </div><!-- end row -->            
                    </div><!-- end container -->
                </div>
            </div><!-- end section -->
        </div>
        <div class="carousel-item">
            <div id="home" class="first-section" style="background-image:url('{{asset('frontend/images/slider-03.jpg')}}');">
                <div class="dtab">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 text-right">
                                <div class="big-tagline">
                                    <h2><strong style="font-family:'Times New Roman'; ">SMA KRISTEN </strong> <span style="font-family: monospace0; font-size: 200px ">SMART</span></h2>
                                    <form action="{{url('/buku')}}" method="POST">@csrf
                                        <div class="w-100 d-flex justify-content-end">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <select name="key" id="key" class="btn btn-warning">
                                                        <option value="judul">Judul</option>
                                                        <option value="kategori">Kategori Buku</option>
                                                    </select>
                                                    <input type="text" name="value" class="form-control-lg" placeholder="Cari Buku">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="reset" class="hover-btn-new rounded" ><span>Reset</span></button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="submit" class="hover-btn-new"><span>Cari</span></button>
                                    </form>
                                </div>
                            </div>
                        </div><!-- end row -->            
                    </div><!-- end container -->
                </div>
            </div><!-- end section -->
        </div>
        <!-- Left Control -->
        <a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="fa fa-angle-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <!-- Right Control -->
        <a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="fa fa-angle-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
@endsection
