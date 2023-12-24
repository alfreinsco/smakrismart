@extends('layouts.app')
@section('content')
<!-- Page-header start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Tambah Data Anggota</h5>
                    <p class="m-b-0">Tambah Data anggota perpustakaan pada aplikasi <span class="text-warning">SMAKRISMART</span></p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('/')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('anggota.index')}}">Data Anggota Perpustakaan</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('anggota.tambah')}}">Tambah</a>
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
                    <div class="col-sm-6">
                        <!-- Basic Form Inputs card start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Tambah Data Anggota Perpustakaan</h5>
                                <span>Inputan dengan tanda <code>*</code> Wajib diisi!</span>
                            </div>
                            <div class="card-block">
                                <form class="form-material" action="{{route('anggota.tambah')}}" method="POST" enctype="multipart/form-data">@csrf
                                    <div class="form-group form-default">
                                        <input required onkeyup="$('#vnama').text($(this).val())"  type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama')}}">
                                        <span class="form-bar"></span>
                                        <label for="nama" class="float-label text-dark">Nama Lengkap <span class="text-danger">*</span></label>
                                        @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group form-default">
                                        <input required onkeyup="$('#vnomor_identitas').text($(this).val())"  type="number" class="form-control @error('nomor_identitas') is-invalid @enderror" name="nomor_identitas" id="nomor_identitas" value="{{old('nomor_identitas')}}">
                                        <span class="form-bar"></span>
                                        <label for="nomor_identitas" class="float-label text-dark">Nomor Identitas KTP/NIS/NIP <span class="text-danger">*</span></label>
                                        @error('nomor_identitas')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>                                    
                                    <script>
                                        $(document).ready(function(){
                                            $('#nomor_identitas').on('input', function(){
                                                var settings = {
                                                    barWidth: 1,
                                                    barHeight: 50,
                                                    moduleSize: 1,
                                                    showHRI: false,
                                                    addQuietZone: true,
                                                    marginHRI: 5,
                                                    bgColor: "#FFFFFF",
                                                    color: "#000000",
                                                    fontSize: 10,
                                                    output: "css",
                                                    posX: 0,
                                                    posY: 0
                                                };
                                                // barcode generate
                                                var nomorIdentitas = $(this).val();
                                                $("#kodeBatangContainer").html("").show().barcode(nomorIdentitas, "code128", settings);
                                            });
                                        });
                                    </script>
                                    <div class="form-group form-default">
                                        <input required  type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" name="nomor_telepon" id="nomor_telepon" value="{{old('nomor_telepon')}}">
                                        <span class="form-bar"></span>
                                        <label for="nomor_telepon" class="float-label text-dark">Nomor Telepon <span class="text-danger">*</span></label>
                                        @error('nomor_telepon')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group form-default">
                                        <select required class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan">
                                            <option value=""></option>
                                            <option @selected(old('jabatan') == 'Siswa') value="Siswa">Siswa</option>
                                            <option @selected(old('jabatan') == 'Guru') value="Guru">Guru</option>
                                        </select>
                                        <span class="form-bar"></span>
                                        <label for="jabatan" class="float-label text-dark">Jabatan <span class="text-danger">*</span></label>
                                        @error('jabatan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="form-group form-default col-6">
                                            <input @checked(old('jenis_kelamin') == 'Laki-laki')  onchange="$('#vjenis_kelamin').text('Laki-Laki')"  type="radio" class="@error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelaminl" value="Laki-Laki">
                                            <label for="jenis_kelaminl">Laki-Laki</label>
                                            <input @checked(old('jenis_kelamin') == 'Perempuan')  onchange="$('#vjenis_kelamin').text('Perempuan')"  type="radio" class="ml-2 @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelaminp" value="Perempuan">
                                            <label for="jenis_kelaminp">Perempuan</label>
                                            @error('jenis_kelamin')
                                            <span class="d-block" style="color: #dc3545; line-height: 0;" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-6 text-right">
                                            <label for="status" class="form-check-label text-dark">Status <span class="text-danger">*</span></label>
                                            <div class="w-100 text-right">
                                                <button type="button" class="btn btn-primary btn-sm tombol_status">Aktif</button>
                                                <input  type="hidden" class="@error('status') is-invalid @enderror" role="switch" name="status" id="status" value="{{old('status', 'Aktif')}}">
                                                @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <script>
                                            // JavaScript untuk toggle button
                                            $(document).ready(function() {
                                                $('.tombol_status').click(function() {
                                                    var $btn = $(this);
                                                    var text = $btn.text().trim();
                                                    
                                                    if ($btn.hasClass('btn-primary') && text === 'Aktif') {
                                                        $btn.removeClass('btn-primary').addClass('btn-danger').text('Tidak Aktif');
                                                        $('#status').val('Tidak Aktif');
                                                    } else if ($btn.hasClass('btn-danger') && text === 'Tidak Aktif') {
                                                        $btn.removeClass('btn-danger').addClass('btn-primary').text('Aktif');
                                                        $('#status').val('Aktif');
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="form-group form-default">
                                        <input required onkeyup="$('#valamat').text($(this).val())"  type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" value="{{old('alamat')}}">
                                        <span class="form-bar"></span>
                                        <label for="alamat" class="float-label text-dark">Alamat <span class="text-danger">*</span></label>
                                        @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group form-default">
                                        <input  type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="foto" onchange="previewImage(event)">
                                        <span class="form-bar"></span>
                                        @error('foto')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <script>
                                        function previewImage(event) {
                                            var input = event.target;
                                            var reader = new FileReader();
                                            reader.onload = function(){
                                                var preview = document.getElementById('preview');
                                                preview.src = reader.result;
                                                preview.style.display = "block";
                                            };
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    </script>
                                    <div class="form-group form-default text-right">
                                        <a href="{{route('pengguna.index')}}" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i> Kembali</a>
                                        <button class="btn btn-danger btn-sm" type="reset"><i class="fa fa-trash"></i> Reset</button>
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
                                    </div>
                                </form>
                            </div>
                            <!-- Main-body end -->
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Desain Kartu Anggota</h5>
                            </div>
                            <div class="card-block"> 
                                {{-- <button onclick="downloadDivAsImage()">Download</button> --}}
                                
                                <div class="d-flex justify-content-center align-items-center">                                         
                                    <div class="border border-secondary" style="border-radius: 0; width: 340px; height: 207px; background-image: url({{asset('assets/images/bg_depan.jpg')}})">
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <div class="text-right mr-3" style="position: relative;">
                                                    <h5 class="font-weight-bold" style="font-size: 13px">Kartu Anggota Perpustakaan</h5>
                                                    <p style="font-size: 13px">SMA KRISTEN YPKPM AMBON</p>
                                                    <img style="position: absolute; top: -4px; left: 10px;" width="40" src="{{asset('/assets/images/logo.png')}}" alt="Logo">
                                                </div>
                                            </div>
                                            <div class="col-12" style="margin-top: -12px">
                                                <hr class="m-0">
                                            </div>
                                            <div class="col-3 text-right px-0" style="position: relative">
                                                <img id="preview" style="margin-left: 30px;" class="border" width="60px" height="60px" style="border-radius: 10px" src="{{asset('assets/images/kuser.png')}}" alt="Foto">
                                                <div id="kodeBatangContainer" style="position: absolute; margin: 10px 0 0 30px; height: 20px;"></div>
                                            </div>
                                            <div class="col-8">
                                                <table class="w-100" style="font-size: 10px">
                                                    <tr>
                                                        <th>Nama</th>
                                                        <td>: <span id="vnama"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <th>NIS/NIP</th>
                                                        <td>: <span id="vnomor_identitas"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Jenis Kelamin</th>
                                                        <td>: <span id="vjenis_kelamin"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Alamat</th>
                                                        <td>: <span id="valamat"></span></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-6"></div>
                                            <div class="col-6 text-center mt-3" style="">
                                                <p class="font-weight-bold" style="line-height: 0; font-size: 10px;">Ambon, 12-12-2023</p>
                                                <p class="font-weight-bold" style="line-height: 0; margin-top: -5px; font-size: 10px;">Kepala Perpustakaan</p>
                                                <img style="margin-top: -9px; margin-bottom: 5px" width="30" src="{{asset('/assets/images/qrcode.jpg')}}" alt="TTD">
                                                <p class="text-light" style="line-height: 0; margin-top: 4px; font-size: 10px;">Marthin Alfreinsco Salakory</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="d-flex justify-content-center mt-5 align-items-center">                                         
                                    <div class="border border-secondary" style="border-radius: 0; width: 340px; height: 207px; background-image: url({{asset('assets/images/bg_belakang.jpg')}});">
                                        <div class="row mt-2">
                                            <div class="col-12" style="position: relative;">
                                                <img style="position: absolute; top: 90px; left: 50%; transform: translate(-50%, -50%); opacity: 0.5;" width="90" src="{{asset('/assets/images/logo.png')}}" alt="Logo">
                                                <div style="position: absolute; top: 100px; left: 50%; transform: translate(-50%, -50%); font-size: 10px; width: 90%">
                                                    <h6 class="font-weight-bold text-center">CATATAN :</h6>
                                                    <ol>
                                                        <li>Kartu Anggota ini harus dibawa setiap kunjungan, pinjaman, pengembalian keperpustakaan.</li>
                                                        <li>Tanpa kartu anggota, kunjungan, pinjaman, pengembalian tidak dilayani.</li>
                                                        <li>Pengembalian lewat dari batas waktunya akan dikenakan denda.</li>
                                                        <li>Waktu pinjaman lamanya 7 hari dan dapat diperpanjang 7 hari lagi bila tidak ada yang memesannya.</li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <script>
                                    function downloadDivAsImage() {
                                        // Mengambil referensi elemen div yang ingin diunduh
                                        const divToDownload = document.getElementById('divUntukDiunduh');

                                        // Menggunakan html2canvas untuk mengonversi elemen div menjadi gambar
                                        html2canvas(divToDownload).then(function(canvas) {
                                            // Mengonversi canvas menjadi data URL gambar PNG
                                            const imgData = canvas.toDataURL('image/png');

                                            // Membuat link unduhan
                                            const link = document.createElement('a');
                                            link.download = 'kap.png'; // Nama file yang akan diunduh
                                            link.href = imgData;
                                            
                                            // Menambahkan link ke dalam dokumen dan mengkliknya secara otomatis untuk memicu unduhan
                                            document.body.appendChild(link);
                                            link.click();
                                            document.body.removeChild(link);
                                        });
                                    }
                                </script> --}}
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