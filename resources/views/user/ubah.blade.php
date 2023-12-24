@extends('layouts.app')
@section('content')
<!-- Page-header start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Ubah Data Pengguna</h5>
                    <p class="m-b-0">Ubah data pengguna pada aplikasi <span class="text-warning">SMAKRISMART</span></p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('/')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('pengguna.index')}}">Data Pengguna</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('pengguna.ubah', $pengguna->id)}}">Ubah</a>
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
                    <div class="col-sm-12">
                        <!-- Basic Form Inputs card start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Tambah Data Pengguna</h5>
                                <span>Inputan dengan tanda <code>*</code> Wajib diisi!</span>
                            </div>
                            <div class="card-block">
                                <form action="{{route('pengguna.ubah', $pengguna->id)}}" method="POST">@csrf
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input required type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama') ?? ($pengguna->nama ?? '')}}">
                                            @error('nama')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="username" class="col-sm-2 col-form-label">Nama Pengguna <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{old('username') ?? ($pengguna->username ?? '')}}">
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label">Kata Sandi Baru</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group text-right">
                                        <a href="{{route('pengguna.index')}}" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i> Kembali</a>
                                        <button class="btn btn-danger btn-sm" type="reset"><i class="fa fa-trash"></i> Reset</button>
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
                                    </div>
                                </form>
                            </div>
                            <!-- Main-body end -->
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