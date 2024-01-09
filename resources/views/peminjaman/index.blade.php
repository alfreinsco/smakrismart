@extends('layouts.app')
@section('content')
<!-- Page-header start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Data Peminjaman Buku</h5>
                    <p class="m-b-0">Data peminjaman buku pada aplikasi <span class="text-warning">SMAKRISMART</span></p>
                    <a href="{{route('peminjaman.tambah')}}" class="btn btn-primary btn-sm mt-3 border"><i class="fa fa-plus-square"></i> Pinjam Buku</a>
                    <a href="{{route('peminjaman.kurang')}}" class="btn btn-primary btn-sm mt-3 border"><i class="fa fa-minus-square"></i> Kembalikan Buku</a>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('/')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('peminjaman.index')}}">Data Peminjaman Buku</a>
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
                                <h5>Filter Data Peminjaman</h5>
                                <span>Filter seluruh data peminjaman buku</span>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                        <li><i class="fa @if(!$request) fa-plus @else fa-minus @endif minimize-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block table-border-style" @if(!$request) style="display: none" @endif>
                                <form class="my-3" method="POST" action="{{route('peminjaman.index')}}">@csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="status">Status</label>
                                            <select id="status" class="form-control" name="status">
                                                <option value="">Pilih Status</option>
                                                <option value="Di Pinjam" @selected(@$request['status'] ==  'Di Pinjam')>Di Pinjam</option>
                                                <option value="Di Kembalikan" @selected(@$request['status'] ==  'Di Pinjam')>Di Kembalikan</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="judul">Judul Buku</label>
                                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Buku" value="{{ @$request['judul'] }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="nama">Nama Peminjam</label>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Peminjam" value="{{ @$request['nama'] }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ @$request['tanggal_pinjam'] }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="tanggal_kembali">Tanggal Kembali</label>
                                            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="{{ @$request['tanggal_kembali'] }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                                            <!-- Tambahkan tombol reset jika diperlukan -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5>Data Peminjaman</h5>
                                <span>Seluruh data peminjaman buku</span>
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
                                                <th>Status</th>
                                                <th>Buku</th>
                                                <th>Nama Peminjam</th>
                                                <th>Tanggal Peminjaman</th>
                                                <th>Tanggal Pengembalian</th>
                                                <th>Keterangan</th>
                                                <th>Estimasi Peminjaman</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($peminjaman as $k => $v)
                                            <tr>
                                                <td>{{++$k}}</td>
                                                <td>
                                                    @if ($v->status == 'Di Pinjam')
                                                    <button class="btn btn-warning btn-skew btn-mini" style="cursor: default">{{$v->status}}</button>
                                                    @elseif ($v->status == 'Di Kembalikan')
                                                    <button class="btn btn-success btn-skew btn-mini" style="cursor: default">{{$v->status}}</button>
                                                    @else
                                                    <button class="btn btn-danger btn-skew btn-mini" style="cursor: default">{{$v->status}}</button>
                                                    @endif
                                                </td>
                                                <td>{{@$v->buku->judul}}</td>
                                                <td>{{@$v->anggota->nama}}</td>
                                                <td>{{$v->tanggal_pinjam}}</td>
                                                <td>{{$v->tanggal_kembali}}</td>
                                                <td>
                                                    @if ($v->status == 'Di Pinjam')
                                                    @if (strtotime($v->tanggal_kembali) == strtotime(date('Y-m-d')))
                                                    <span class="text-warning">Batas pengembalian hari ini</span>
                                                    @elseif(strtotime($v->tanggal_kembali) > strtotime(date('Y-m-d')))
                                                    <span class="text-warning">Sisa Waktu @selisihTanggal("2024-01-20")</span>
                                                    @else
                                                    <span class="text-danger">Terlambat @selisihTanggal($v->tanggal_kembali)</span>
                                                    @endif
                                                    @else
                                                    @if (strtotime($v->tanggal_kembali) >= strtotime($v->tanggal_terima))
                                                    <span class="text-success">Tepat Waktu</span>
                                                    @else
                                                    <span class="text-danger">Terlambat @selisihTanggal($v->tanggal_kembali)</span>
                                                    @endif

                                                    @endif
                                                </td>
                                                <td class="text-info">Maksimal Peminjaman 3 Hari</td>
                                                <td>
                                                    <div class="dropdown-primary dropdown open">
                                                        <button class="btn btn-primary btn-mini dropdown-toggle waves-light" type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                            <button onclick="$('#id').val('{{$v->id}}');@if($v->status == 'Di Pinjam') $('#status1').click() @else $('#status2').click() @endif" class="dropdown-item waves-light text-warning cursor-pointer" data-toggle="modal" data-target="#modalEdit"><i class="fa fa-edit"></i> Ubah</button>
                                                            <a onclick="return confirm('hapus?')" class="dropdown-item waves-light text-danger" href="{{route('peminjaman.hapus', $v->id)}}"><i class="fa fa-trash"></i> Hapus</a>
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
            <!-- Modal -->
            <div class="modal fade" id="modalEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title" id="staticBackdropLabel">Status</h5>
                            <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="text-center pt-3" action="{{route('peminjaman.status')}}" method="POST">@csrf
                                <input type="hidden" name="id" id="id">
                                <div class="form-group m-0 bg-warning d-inline p-2 mr-3">
                                    <input class="bg-danger mr-3" type="radio" name="status" value="Di Pinjam" id="status1">
                                    <label for="status1">Di Pinjam</label>
                                </div>
                                <div class="form-group m-0 bg-success d-inline p-2">
                                    <input class="mr-3" type="radio" name="status" value="Di Kembalikan" id="status2">
                                    <label for="status2">Di Kembalikan</label>
                                </div>
                                <div class="form-group text-right m-0 mt-3">
                                    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal" aria-label="Close">Kembali</button>
                                    <button onclick="return confirm('Apakah anda yakin?')" class="btn btn-primary btn-sm">Simpan</button>
                                </div>
                            </form>
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