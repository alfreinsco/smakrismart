@extends('layouts.app')
@section('content')
<!-- Page-header start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Ubah Kategori Buku</h5>
                    <p class="m-b-0">Ubah kategori buku perpustakaan pada aplikasi <span class="text-warning">SMAKRISMART</span></p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('/')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('kategori.index')}}">Kategori Buku</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('kategori.tambah')}}">Ubah</a>
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
                        <!-- Basic Form Inputs card start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Ubah Kategori Buku Perpustakaan</h5>
                                <span>Inputan dengan tanda <code>*</code> Wajib diisi!</span>
                            </div>
                            <div class="card-block">
                                <form class="form-material" action="{{route('kategori.ubah', $kategori->id)}}" method="POST" enctype="multipart/form-data">@csrf
                                    <div class="form-group form-default">
                                        <input type="text" name="nama" class="form-control @error('deskripsi') is-invalid @enderror" value="{{old('nama') ?? ($kategori->nama ?? '')}}">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Nama Kategori <span class="text-danger">*</span></label>
                                        @error('nama')
                                        <div class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group form-default">
                                        <input name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" value="{{old('deskripsi') ?? ($kategori->deskripsi ?? '')}}">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Deskripsi <span class="text-danger">*</span></label>
                                        @error('deskripsi')
                                        <div class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group form-default text-right">
                                        <a href="{{route('kategori.index')}}" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i> Kembali</a>
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