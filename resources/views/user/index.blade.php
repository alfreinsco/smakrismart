@extends('layouts.app')
@section('content')
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Data Pengguna</h5>
                        <p class="m-b-0">Data pengguna pada aplikasi <span class="text-warning">SMAKRISMART</span></p>
                        <a href="{{route('pengguna.tambah')}}" class="btn btn-primary btn-sm mt-3 border"><i class="fa fa-user-plus"></i> Tambah Pengguna</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{url('/')}}"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('pengguna.index')}}">Data Pengguna</a>
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
                                    <h5>Data Pengguna</h5>
                                    <span>Seluruh data pengguna ini akan digunakan untuk <code>login</code> aplikasi</span>
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
                                                    <th>#</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Nama Pengguna</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pengguna as $k => $v)                                                    
                                                <tr>
                                                    <th scope="row">{{++$k}}</th>
                                                    <td>{{$v->nama}}</td>
                                                    <td>{{$v->username}}</td>
                                                    <td>
                                                        <div class="dropdown-primary dropdown open">
                                                            <button class="btn btn-primary btn-mini dropdown-toggle waves-light" type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <a class="dropdown-item waves-light text-warning" href="{{route('pengguna.ubah', $v->id)}}"><i class="fa fa-edit"></i> Ubah</a>
                                                                <a onclick="return confirm('hapus?')" class="dropdown-item waves-light text-danger" href="{{route('pengguna.hapus', $v->id)}}"><i class="fa fa-trash"></i> Hapus</a>
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