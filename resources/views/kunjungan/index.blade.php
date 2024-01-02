@extends('layouts.app')
@section('content')
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Kunjungan Perpustakaan</h5>
                        <p class="m-b-0">Data kunjungan perpustakaan <span class="text-warning">SMAKRISMART</span></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{url('/')}}"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('kunjungan.index')}}">Data Kunjungan Perpustakaan</a>
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
                                    <h5>Tambah Data Kunjungan Perpustakaan</h5>
                                    <span>Tambah data kunjungan perpustakaan</span>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                            <li><i class="fa fa-window-maximize full-card"></i></li>
                                            <li><i class="fa fa-minus minimize-card"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block table-border-style">
                                    <form id="berkunjung" action="{{route('kunjungan.store')}}" method="POST">@csrf
                                        <div class="form-group">
                                            <label for="nomor_identitas">Nomor Identitas <span class="text-success">Scan di bawah ini <i class="fa fa-search"></i></span></label>
                                            <input type="text" name="nomor_identitas" id="nomor_indentitas" class="form-control @error('nomor_identitas') is-invalid @enderror" onkeyup="$('#berkunjung').submit()">
                                            @error('nomor_identitas')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5>Data Kunjungan Perpustakaan</h5>
                                    <span>Seluruh data kunjungan perpustakaan</span>
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
                                                    <th>Foto</th>
                                                    <th>Nama</th>
                                                    <th>Jabatan</th>
                                                    <th>Nomor Identitas</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($kunjungan as $K => $v)
                                                    <tr>
                                                        <td>{{ $K + 1 }}</td>
                                                        <td>
                                                            @if ($v->anggota->foto)
                                                                <img width="30" height="30" src="{{asset('storage/' . $v->anggota->foto)}}">
                                                            @else
                                                                <img width="30" height="30" src="{{asset('assets/images/kuser.png')}}">
                                                            @endif
                                                        </td>
                                                        <td>{{ $v->anggota->nama }}</td>
                                                        <td>{{ $v->anggota->jabatan }}</td>
                                                        <td>{{ $v->anggota->nomor_identitas }}</td>
                                                        <td>{{ $v->anggota->jenis_kelamin }}</td>
                                                        <td>
                                                            <div class="dropdown-primary dropdown open">
                                                                <button class="btn btn-primary btn-mini dropdown-toggle waves-light" type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                    <a onclick="return confirm('hapus?')" class="dropdown-item waves-light text-danger" href="{{route('kunjungan.hapus', $v->id)}}"><i class="fa fa-trash"></i> Hapus</a>
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