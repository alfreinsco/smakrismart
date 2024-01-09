@extends('layouts.app')
@section('content')
<!-- Page-header start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Tambah Data Buku</h5>
                    <p class="m-b-0">Tambah data buku perpustakaan pada aplikasi <span class="text-warning">SMAKRISMART</span></p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('/')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('buku.index')}}">Data Buku</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('buku.tambah')}}">Tambah</a>
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
                                <h5>Tambah Data Buku Perpustakaan</h5>
                                <span>Inputan dengan tanda <code>*</code> Wajib diisi!</span>
                            </div>
                            <div class="card-block">
                                <form class="form-material" action="{{route('buku.tambah')}}" method="POST" enctype="multipart/form-data">@csrf
                                    <div class="form-group form-default">
                                        <input type="text" name="kode" id="kodeInput" class="form-control @error('kode') is-invalid @enderror"  maxlength="8" value="{{ old('kode') }}" required>
                                        <span class="form-bar"></span>
                                        <label class="float-label">Kode Buku <span class="text-danger">*</span></label>
                                        @error('kode')
                                        <div class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>                                    
                                    <script>
                                        document.getElementById('kodeInput').addEventListener('input', function (e) {
                                            let inputValue = e.target.value.replace(/\D/g, '');
                                            if (inputValue.length > 3) {
                                                inputValue = inputValue.slice(0, 3) + '-' + inputValue.slice(3);
                                            }
                                            if (inputValue.length > 8) {
                                                inputValue = inputValue.slice(0, 8);
                                            }
                                            e.target.value = inputValue;
                                        });
                                    </script>
                                    
                                    <div class="form-group form-default">
                                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{old('judul')}}" required>
                                        <span class="form-bar"></span>
                                        <label class="float-label">Judul Buku <span class="text-danger">*</span></label>
                                        @error('judul')
                                        <div class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group form-default">
                                        <input type="text" name="penerbit" class="form-control @error('penerbit') is-invalid @enderror" value="{{old('penerbit')}}" required>
                                        <span class="form-bar"></span>
                                        <label class="float-label">Nama Penerbit <span class="text-danger">*</span></label>
                                        @error('penerbit')
                                        <div class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group form-default">
                                        <input type="text" name="kota" class="form-control @error('kota') is-invalid @enderror" value="{{old('kota')}}" required>
                                        <span class="form-bar"></span>
                                        <label class="float-label">Kota <span class="text-danger">*</span></label>
                                        @error('kota')
                                        <div class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group form-default">
                                        <input type="text" name="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{old('tahun')}}" required>
                                        <span class="form-bar"></span>
                                        <label class="float-label">Tahun Terbit <span class="text-danger">*</span></label>
                                        @error('tahun')
                                        <div class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group form-default">
                                        <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="{{old('status')}}" required>
                                        <span class="form-bar"></span>
                                        <label class="float-label">Status Buku <span class="text-danger">*</span></label>
                                        @error('status')
                                        <div class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group form-default">
                                        <input name="pengarang" class="form-control @error('pengarang') is-invalid @enderror" value="{{old('pengarang')}}" required>
                                        <span class="form-bar"></span>
                                        <label class="float-label">Pengarang <span class="text-danger">*</span></label>
                                        @error('pengarang')
                                        <div class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group form-default">
                                        <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" required>
                                            <option value=""></option>
                                            @foreach($kategori as $v)
                                                <option @selected(old('kategori_id') == $v->id) value="{{ $v->id }}">{{ $v->nama }}</option>
                                            @endforeach
                                        </select>
                                        <span class="form-bar"></span>
                                        <label class="float-label">Kategori <span class="text-danger">*</span></label>
                                        @error('kategori_id')
                                        <div class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group form-default text-right">
                                        <a href="{{route('buku.index')}}" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i> Kembali</a>
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