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
                    <form method="POST" action="{{route('peminjaman.tambah')}}" class="row justify-content-center">@csrf
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5>Form Peminjaman Buku</h5>
                                            <span>Lengkapi data sebelum meminjam buku</span>
                                        </div>
                                        <div>
                                            <a href="{{route('pengguna.index')}}" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i> Kembali</a>
                                            <button class="btn btn-danger btn-sm" type="reset"><i class="fa fa-trash"></i> Reset</button>
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block table-border-style">
                                    <div class="form-group mb-3">                                         
                                        <label>Tanggal Peminjaman</label>
                                        <input type="date" name="tanggal_pinjam" class="form-control" value="{{old('tanggal_pinjam') ?? (date('Y-m-d') ?? '')}}">
                                    </div>
                                    <div class="form-group mb-3">                                         
                                        <label>Tanggal Kembalikan</label>
                                        <input onchange="$('#data_anggota').removeClass('d-none'); $('#nomor_identitas').focus()" type="date" name="tanggal_kembali" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 d-none d-none" id="data_anggota">
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
                                                <input type="text" name="nomor_identitas" id="nomor_identitas" class="form-control" autofocus>
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
                                                    url: "{{ route('peminjaman.anggota') }}",
                                                    data: {
                                                        '_token': '{{ csrf_token() }}',
                                                        'nomor_identitas': nomorIdentitas
                                                    },
                                                    dataType: 'json',
                                                    success: function(response) {
                                                        if (response.message) {
                                                            if ($('#message').hasClass('text-danger')) {
                                                                $('#message').text(response.message);
                                                            } else {
                                                                $('#message').removeClass('text-success').addClass('text-danger').text(response.message);
                                                            }
                                                        } else {
                                                            if ($('#message').hasClass('text-success')) {
                                                                $('#message').text("Data Anggota Ditemukan");
                                                            } else {
                                                                $('#message').removeClass('text-danger').addClass('text-success').text("Data Anggota Ditemukan");
                                                            }
                                                            $('#data_buku').removeClass('d-none');
                                                            $('input[name="buku_id[]"]').first().focus()
                                                            $('#nama').val(response.nama);
                                                            $('#jabatan').val(response.jabatan);
                                                            $('#jenis_kelamin').val(response.jenis_kelamin);
                                                            $('#foto').attr('src', "{{asset('storage/')}}/" + response.foto);
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
                                    <span>Data buku yang di pinjam dari perpustakaan</span>
                                </div>
                                <div class="card-block table-border-style">
                                    <div class="form-group mb-3">
                                        <div class="d-flex justify-content-between">                                            
                                            <label>ID Buku</label>
                                            <div>
                                                <button type="button" class="btn btn-primary btn-mini add-btn">Tambah</button>
                                            </div>
                                        </div>
                                        <input type="text" name="buku_id[]" class="form-control" autofocus>
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            // Fungsi untuk menambahkan form-group baru saat tombol "Tambah" ditekan
                                            $(document).on('click', '.add-btn', function() {
                                                let template = `
                                                    <div class="form-group mb-3">
                                                        <div class="d-flex justify-content-between">                                            
                                                            <label>ID Buku</label>
                                                            <div>
                                                                <button type="button" class="btn btn-danger btn-mini delete-btn">Hapus</button>
                                                                <button type="button" class="btn btn-primary btn-mini add-btn">Tambah</button>
                                                            </div>
                                                        </div>
                                                        <input type="text" name="buku_id[]" class="form-control" autofocus>
                                                    </div>
                                                `;

                                                $(this).closest('.form-group').after(template);
                                            });
                                    
                                            // Fungsi untuk menghapus form-group saat tombol "Hapus" ditekan
                                            $(document).on('click', '.delete-btn', function() {
                                                $(this).closest('.form-group').remove(); // Hapus form-group yang terdekat
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