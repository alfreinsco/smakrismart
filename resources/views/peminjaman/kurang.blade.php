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
                    <form id="postPeminjaman" method="POST" action="{{route('peminjaman.kurang')}}" class="row justify-content-center">@csrf
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5>Form Pengembalian Buku</h5>
                                            <span>Lengkapi data sebelum mengembalikan buku</span>
                                        </div>
                                        <div>
                                            <a href="{{route('pengguna.index')}}" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i> Kembali</a>
                                            <button class="btn btn-danger btn-sm" type="reset"><i class="fa fa-trash"></i> Reset</button>
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6" id="data_anggota">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Data Anggota</h5>
                                    <span>Data diri anggota peminjam buku perpustakaan</span>
                                </div>
                                <div class="card-block table-border-style">
                                    <div class="row">
                                        <div class="col-4">
                                            <img id="foto" class="img-fluid" src="{{asset('assets/images/kuser.png')}}" alt="">
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="nomor_identitas">Nomor Identitas</label>
                                                <input type="text" id="nomor_identitas" class="form-control" autofocus>
                                                <input type="hidden" name="anggota_id" id="id_anggota" class="form-control" autofocus>
                                                <div class="text-danger" id="message"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            $('#nomor_identitas').on('keyup', function() {
                                                var nomorIdentitas = $(this).val();
                                                
                                                // Kirim permintaan AJAX
                                                $.ajax({
                                                    type: 'POST',
                                                    url: "{{ route('peminjaman.anggotap') }}",
                                                    data: {
                                                        '_token': '{{ csrf_token() }}',
                                                        'nomor_identitas': nomorIdentitas
                                                    },
                                                    dataType: 'json',
                                                    success: function(response) {
                                                        if($('#message').hasClass('text-success')){
                                                            $('#message').removeClass('text-success');
                                                        }
                                                        if($('#message').hasClass('text-danger')){
                                                            $('#message').removeClass('text-danger');
                                                        }
                                                        if (response.message) {
                                                            $('#message').text("Data Anggota Tidak Ditemukan").addClass('text-danger');

                                                            $('#data_buku').addClass('d-none');
                                                            $('#id_anggota').val(" ");
                                                            $('#nama').val(" ");
                                                            $('#jabatan').val(" ");
                                                            $('#jenis_kelamin').val(" ");
                                                            $('#foto').attr('src', "{{ asset('assets/images/kuser.png') }}");
                                                        } else {
                                                            $('#message').text("Data Anggota Ditemukan").addClass('text-success');

                                                            $('#data_buku').removeClass('d-none');
                                                            $('#buku_id').focus();
                                                            $('#id_anggota').val(response[0].anggota.id);
                                                            $('#nama').val(response[0].anggota.nama);
                                                            $('#jabatan').val(response[0].anggota.jabatan);
                                                            $('#jenis_kelamin').val(response[0].anggota.jenis_kelamin);
                                                            if(response[0].foto){
                                                                $('#foto').attr('src', "{{asset('storage/')}}/" + response[0].foto);
                                                            }else{
                                                                $('#foto').attr('src', "{{ asset('assets/images/kuser.png') }}");
                                                            }
                                                            
                                                            var rows = ""; // Mendefinisikan variabel rows di luar loop

                                                            response.forEach(function(item) {
                                                            rows += '<tr>' +
                                                                '<td><input type="checkbox" class="buku_id" data-kode="' + item.buku.kode + '" name="buku_id[]" value="' + item.buku.id + '"></td>' +
                                                                '<td>' + item.buku.judul + '</td>' +
                                                                '<td>' + item.buku.pengarang + '</td>' +
                                                                '<td></td>' +
                                                                '</tr>';
                                                            });
                                                            
                                                            $('#tabel_buku').html(rows); // Menambahkan semua baris yang telah dibuat ke dalam tabel
                                                        }
                                                    },
                                                    error: function(error) {
                                                        // Tampilkan pesan error atau lakukan penanganan error
                                                        console.log('Terjadi kesalahan:', error);
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    <div class="form-group mt-3">
                                        <label for="nama">Nama</label>
                                        <input readonly type="text" id="nama" class="form-control bg-transparent">
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input readonly type="text" id="jabatan" class="form-control bg-transparent">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <input readonly type="text" id="jenis_kelamin" class="form-control bg-transparent">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 d-none" id="data_buku">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Data Buku</h5>
                                    <span>Centang atau scan buku apa saja yang akan di kembalikan</span>
                                </div>
                                <div class="card-block table-border-style">
                                    <div class="form-group mb-3">                  
                                        <label>Kode Buku</label>
                                        <input type="text" id="buku_id" class="form-control" autofocus>
                                    </div>
                                    <div class="w-100 table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Pilih</th>
                                                    <th>Judul Buku</th>
                                                    <th>Pengarang</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tabel_buku">

                                            </tbody>
                                        </table>
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            $('#buku_id').on('keyup', function() {
                                                var buku_id = $(this).val();
                                                $('input[type="checkbox"].buku_id[data-kode="'+buku_id+'"]').click();
                                                $(this).val('');
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Page-body end -->
            </div>
            <div id="styleSelector"> </div>
        </div>
    </div>
@endsection