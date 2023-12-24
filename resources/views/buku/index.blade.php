@extends('layouts.app')
@section('content')
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Data Buku</h5>
                        <p class="m-b-0">Data buku perpustakaan pada aplikasi <span class="text-warning">SMAKRISMART</span></p>
                        <a href="{{route('buku.tambah')}}" class="btn btn-primary btn-sm mt-3 border"><i class="fa fa-plus-square"></i> Tambah Buku</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{url('/')}}"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('buku.index')}}">Data Buku Perpustakaan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Data Buku Perpustakaan</h5>
                                    <span>Seluruh data buku perpustakaan</span>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                            <li><i class="fa fa-window-maximize full-card"></i></li>
                                            <li><i class="fa fa-minus minimize-card"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                        <table class="table" id="example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Judul Buku</th>
                                                    <th>Pengarang</th>
                                                    <th>Kategori</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($buku as $K => $v)
                                                    <tr>
                                                        <td>{{ $K + 1 }}</td>
                                                        <td>{{ $v->judul }}</td>
                                                        <td>{{ $v->pengarang }}</td>
                                                        <td>{{ @$v->kategori->nama }}</td>
                                                        <td>
                                                            <div class="dropdown-primary dropdown open">
                                                                <button class="btn btn-primary btn-mini dropdown-toggle waves-light" type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                    <a class="dropdown-item waves-light text-warning" href="{{route('buku.ubah', $v->id)}}"><i class="fa fa-edit"></i> Ubah</a>
                                                                    <a onclick="return confirm('hapus?')" class="dropdown-item waves-light text-danger" href="{{route('buku.hapus', $v->id)}}"><i class="fa fa-trash"></i> Hapus</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-body end -->
            </div>
            <div id="styleSelector"> </div>
        </div>
    </div>
@endsection