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
                    <script>
                        $(document).ready(function() {
                            $('#btnPeminjaman').on('click', function(event) {
                            var tanggalPinjam = $('input[name="tanggal_pinjam"]').val();
                            var tanggalKembali = $('input[name="tanggal_kembali"]').val();
                            var nomorIdentitas = $('input[name="nomor_identitas"]').val();
                            var bukuId = $('input[name="buku_id"]').val();

                            if (!tanggalPinjam || !tanggalKembali || !nomorIdentitas || !bukuId || bukuId === '[]') {
                                event.preventDefault(); // Mencegah submit jika formulir tidak valid
                                alert('Tolong isi semua kolom!');
                            } else {
                                $('#postPeminjaman').submit();
                            }
                        });

                        });
                    </script>
                    <form id="postPeminjaman" method="POST" action="{{route('peminjaman.tambah')}}" class="row justify-content-center">@csrf
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
                                            <button id="btnPeminjaman" class="btn btn-primary btn-sm" type="button"><i class="fa fa-save"></i> Simpan</button>
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
                                                            if(response.foto){
                                                                $('#foto').attr('src', "{{asset('storage/')}}/" + response.foto);
                                                            }else{
                                                                $('#foto').attr('src', "{{ asset('assets/images/kuser.png') }}");
                                                            }
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
                                        <label>ID Buku</label>
                                        <input type="text" id="buku_id" class="form-control" autofocus>
                                        <input type="hidden" name="buku_id" id="id_buku" class="form-control">
                                    </div>
                                    <div class="w-100 table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Judul Buku</th>
                                                    <th>Pengarang</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tabel_buku">

                                            </tbody>
                                        </table>
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            // Fungsi untuk memeriksa apakah ID sudah ada dalam tabel atau belum
                                            function isIdExist(id) {
                                                var existingIds = []; // Simpan ID yang sudah ada dalam array

                                                // Loop untuk mendapatkan semua ID yang sudah ada dalam tabel
                                                $('#tabel_buku tr').each(function() {
                                                    existingIds.push(parseInt($(this).find('td:first').text())); // Ambil ID dan simpan dalam array
                                                });

                                                // Periksa apakah ID sudah ada dalam array existingIds
                                                return existingIds.includes(id);
                                            }

                                            function ambilIdTabel(){
                                                var bukuIds = []; // Array untuk menyimpan semua ID buku

                                                // Ambil semua ID dari tabel dan simpan ke dalam array
                                                $("#tabel_buku tr").each(function() {
                                                    var id = $(this).find("td:first").text(); // Mengambil ID dari kolom pertama
                                                    bukuIds.push(id); // Menambahkan ID ke dalam array
                                                });
                                                
                                                return bukuIds;
                                            }

                                            $(document).on('click', '.hapusThisTR', function() {
                                                $(this).closest('tr').remove();
                                                $("#id_buku").val(JSON.stringify(ambilIdTabel()));
                                                $('#buku_id').focus();
                                            });
                                            $('#buku_id').on('keyup', function() {
                                                var buku_id = $(this).val();
                                                
                                                // Kirim permintaan AJAX
                                                $.ajax({
                                                    type: 'POST',
                                                    url: "{{ route('peminjaman.buku') }}",
                                                    data: {
                                                        '_token': '{{ csrf_token() }}',
                                                        'buku_id': buku_id
                                                    },
                                                    dataType: 'json',
                                                    success: function(response) {
                                                        // Jika ID belum ada dalam tabel, tambahkan baris baru
                                                        if(typeof response === 'object' && Object.keys(response).length > 0){
                                                            if (!isIdExist(response.id)) {
                                                                var newRow = 
                                                                "<tr>" +
                                                                    "<td>" + response.id + "</td>" +
                                                                    "<td>" + response.judul + "</td>" +
                                                                    "<td>" + response.pengarang + "</td>" +
                                                                    "<td><button class='btn btn-danger btn-mini hapusThisTR' type='button'><i class='fa fa-trash'></i></button></td>" +
                                                                "</tr>";
                                                                    
                                                                // Tambahkan baris baru ke dalam tabel
                                                                $("#tabel_buku").append(newRow);
                                                                
                                                                $("#id_buku").val(JSON.stringify(ambilIdTabel()));
                                                                $('#buku_id').val('');
                                                                $('#buku_id').focus();
                                                            }
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