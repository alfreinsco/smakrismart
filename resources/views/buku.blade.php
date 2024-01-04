@extends('layouts.frontend')

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
                    <li class="nav-item"><a class="nav-link" href="{{url('/')}}">Home</a></li>
                    <li class="nav-item active"><a class="nav-link" href="{{url('/buku')}}">Data Buku</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="hover-btn-new log orange" href="#" data-toggle="modal" data-target="#login"><span>Login Admin</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- End header -->

@section('content')
<div class="all-title-box">
    <div class="container text-center">
        <h1>DATA BUKU<span class="m_1">Dibawah ini anda dapat mencari semua data buku yang ada pada perpustakaan.</span></h1>
    </div>
</div>

<div id="contact" class="section wb">
    <div class="container">
        <div class="section-title text-center ">
            <form action="{{ url('/buku') }}" method="POST" class="row">@csrf
                <div class="form-group col-md-6">
                    <label for="judul">Judul Buku:</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Buku" value="{{@$request['judul']}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="kategori">Kategori:</label>
                    <select class="form-control" id="kategori" name="kategori">
                        <option value="">Pilih Kategori</option>
                        @foreach($kategori as $k)
                            <option @selected(@$request['kategori'] == $k->id) value="{{ $k->id }}">{{ $k->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-12 text-center">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>            
        </div><!-- end title -->

        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Buku</th>
                                <th>Judul Buku</th>
                                <th>Pengarang</th>
                                <th>Kategori</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($buku as $K => $v)
                                <tr>
                                    <td>{{ $K + 1 }}</td>
                                    <td>{{$v->kode}}</td>
                                    <td>{{ $v->judul }}</td>
                                    <td>{{ $v->pengarang }}</td>
                                    <td>{{ @$v->kategori->nama }}</td>
                                    <td>
                                        @if ($v->status == 'Tersedia')
                                            <span class="text-light bg-success p-1 rounded">{{ @$v->status }}</span>
                                        @else
                                            <span class="text-light bg-danger p-1 rounded">{{ @$v->status }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->
@endsection
