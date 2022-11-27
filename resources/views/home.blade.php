@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status')) 
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                            {{ session('status') }}
            </div>
        </div>
        @endif

        <div class="row g-4">
        @hasrole('asesi')
            <div class="col-12" style="margin: 40px 0px 80px 0px">
                <div style="font-family: Arial, Helvetica, sans-serif; text-shadow: 0 0 0.5px black">
                    <h3 style="color: white">Halo, {{Auth::User()->name}}</h3>
                    <h3 style="color: white">Silahkan pilih layanan</h3>
                    <h1 style="color: white; font-weight: bold; font-size: 60px; margin-bottom: 20px;">Anda Sebagai<span style="background-color: black; border-radius: 120px 90px 60px 30px/30px 60px 90px 120px">&nbsp;Asesi&nbsp;</span></h1>
                    <div>
                        <a href="{{ url('/index/p') }}" class="btn btn-outline-light btn-lg rounded-pill" style="margin: 5px 0px">Daftar Sertifikasi</a>
                        &NonBreakingSpace;
                        &NonBreakingSpace;
                        <a href="/dataasesi/{{$idasesi}}/edit" class="btn btn-outline-light btn-lg rounded-pill" style="margin: 5px 0px">Edit Informasi Asesi</a>
                        &NonBreakingSpace;
                        &NonBreakingSpace;
                        <a href="/dataasesi/{{$idasesi}}/info" class="btn btn-outline-light btn-lg rounded-pill" style="margin: 5px 0px">Informasi Asesi</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="border-radius: 0;background-color: rgb(122,252,255)">
                <div class="card-body">
                    <h5 class="card-title" style="border-bottom: solid 1px black">Isi Self Asesmen</h5>
                    <p class="card-text">Isi self asesmen Anda agar Asesor tau seberapa bagusnya diri Anda</p>
                    <a href="{{ url('/index/pi') }}" class="btn btn-outline-dark my-1">Isi Self asesmen</a>
                    <a href="{{ url('/asesmen') }}" class="btn btn-outline-dark my-1">Self asesmen</a>
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="border-radius: 0;background-color: rgb(254,255,156)">
                <div class="card-body">
                    <h5 class="card-title" style="border-bottom: solid 1px black">Mengisi Kuesioner Kepuasan</h5>
                    <p class="card-text">Ingin memberi kritik, saran, atau nilai kepuasan yang berkaitan dengan layanan sertifikasi kami? Isi kuesionernya disini</p>
                    <a href="{{ url('/index/pk') }}" class="btn btn-outline-dark my-1">Isi Kuesioner</a>
                    <a href="{{ url('/index/datarku') }}" class="btn btn-outline-dark my-1">List Kuesioner</a>
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="border-radius: 0;background-color: rgb(254,255,156)">
                <div class="card-body">
                    <h5 class="card-title" style="border-bottom: solid 1px black">Lihat hasil sertifikasi</h5>
                    <p class="card-text">Hasil dari ujian sertifikasi yang telah Anda ikuti</p>
                    <a href="{{ url('/hasil') }}" class="btn btn-outline-dark my-1">Hasil Sertifikasi</a>
                </div>
                </div>
            </div>
        @endhasrole
        @hasrole('pendaftar')
            <div class="col-md-4">
                <div class="card" style="border-radius: 0;background-color: rgb(255,126,185)">
                <div class="card-body">
                    <h5 class="card-title" style="border-bottom: solid 1px black">Isi berkas Syarat</h5>
                    <p class="card-text">Isi berkas-berkas syarat yang diperlukan untuk sertifikasi yang Anda daftar.</p>
                    <a href="{{ url('/index/psy') }}" class="btn btn-outline-dark my-1">Isi berkas</a>
                    <a href="{{ url('/syaratanda') }}" class="btn btn-outline-dark my-1">List berkas anda</a>
                    <a href="{{ url('/syarat') }}" class="btn btn-outline-dark my-1">List Syarat</a>
                </div>
                </div>
            </div>
        @endhasrole
        @hasanyrole('asesor|asesi|admin')
        @else
            <div class="col-12" style="margin: 40px 0px 80px 0px">
                <div style="font-family: Arial, Helvetica, sans-serif; text-shadow: 0 0 0.5px black">
                    <h3 style="color: white;">Belum memiliki role?</h3>
                    <h1 style="color: white; font-weight: bold; font-size: 60px">Daftarkan Diri<br><span style="background-color: black; border-radius: 120px 90px 60px 30px/30px 60px 90px 120px">&nbsp;Anda&nbsp;</span></h1>
                    <div>
                        <a href="{{ url('/index/asesi') }}" class="btn btn-outline-light btn-lg rounded-pill" style="margin: 5px 0px">Daftar sebagai Asesi</a>
                        &NonBreakingSpace;
                        &NonBreakingSpace;
                        <a href="{{ url('/index/asesor') }}" class="btn btn-outline-light btn-lg rounded-pill" style="margin: 5px 0px">Daftar sebagai Asesor</a>
                    </div>
                </div>
            </div>
        @endhasrole
        @hasrole('asesor')
            <div class="col-12" style="margin: 40px 0px 80px 0px">
                <div style="font-family: Arial, Helvetica, sans-serif; text-shadow: 0 0 0.5px black">
                    <h3 style="color: white">Halo, {{Auth::User()->name}}</h3>
                    <h1 style="color: white; font-weight: bold; font-size: 60px">Anda Masuk Sebagai <span style="background-color: black; border-radius: 120px 90px 60px 30px/30px 60px 90px 120px">&nbspAsesor&nbsp</span></h1>
                    <h3 style="color: white; margin-bottom: 20px">Klik tombol dibawah untuk verifikasi berkas Asesi</h3>
                    <div>
                        <a href="{{ url('/index/datapsy') }}" class="btn btn-outline-light btn-lg rounded-pill" style="margin: 5px 0px">Buka List Asesi</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="border-radius: 0;background-color: rgb(255,126,185)">
                <div class="card-body">
                    <h5 class="card-title" style="border-bottom: solid 1px black">Verifikasi Instrumen</h5>
                    <p class="card-text">Berikan keterangan verifikasi instrumen yang sudah terdaftar</p>
                    <a href="{{ url('/index/datapi') }}" class="btn btn-outline-dark my-1">List instrumen</a>
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="border-radius: 0;background-color: rgb(122,252,255)">
                <div class="card-body">
                    <h5 class="card-title" style="border-bottom: solid 1px black">Menilai Hasil Ujian</h5>
                    <p class="card-text">Berikan nilai hasil ujian untuk para Asesi yang telah mengikuti ujian</p>
                    <a href="{{ url('/index/ap') }}" class="btn btn-outline-dark my-1">Beri Nilai</a>
                    <a href="{{ url('/index/dataap') }}" class="btn btn-outline-dark my-1">Tabel Penilaian</a>
                    <a href="{{ url('/index/dataajs') }}" class="btn btn-outline-dark my-1">Asesor Sertifikasi</a>
                    <a href="{{ url('/index/datap') }}" class="btn btn-outline-dark my-1">Pendaftar</a>
                </div>
                </div>
            </div>
        @endhasrole
        
        {{-- HEAD TITLENYA ADMIN --}}
        @hasrole('admin')
            <div class="col-12" style="margin: 40px 0px 80px 0px">
                <div style="font-family: Arial, Helvetica, sans-serif; text-shadow: 0 0 0.5px black">
                    <h3 style="color: white">Halo, {{Auth::User()->name}}</h3>
                    <h1 style="color: white; font-weight: bold; font-size: 60px; margin-bottom: 20px;">Selamat Datang Kembali<br><span style="background-color: black; border-radius: 120px 90px 60px 30px/30px 60px 90px 120px">&nbsp;Admin&nbsp;</span></h1>
                </div>
            </div>
        @endhasrole
        {{-- END OF HEAD TITLE --}}

            <div class="col-md-4">
                <div class="card" style="border-radius: 0;background-color: rgb(255,247,64)">
                <div class="card-body">
                    <h5 class="card-title" style="border-bottom: solid 1px black">Jadwal Kegiatan</h5>
                    <p class="card-text">Lihat jadwal dan keterangan kegiatan dari sertifikasi yang tersedia.</p>
                    <a href="{{ url('/jadwalrk') }}" class="btn btn-outline-dark my-1">List Kegiatan</a>
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="border-radius: 0;background-color: rgb(122,252,255)">
                <div class="card-body">
                    <h5 class="card-title" style="border-bottom: solid 1px black">Penawaran</h5>
                    <p class="card-text">Penawaran Sertifikasi</p>
                    <a href="{{ url('/penawaran') }}" class="btn btn-outline-dark my-1">List Penawaran</a>
                </div>
                </div>
            </div>
        @hasrole('admin')
            <div class="col-md-4">
                <div class="card" style="border-radius: 0;background-color: rgb(255,126,185)">
                <div class="card-body">
                    <h5 class="card-title" style="border-bottom: solid 1px black">Manajemen Asesor</h5>
                    <p class="card-text">Manage data-data dari Asesor yang terdaftar</p>
                    <a href="{{ url('/index/dataasesor') }}" class="btn btn-outline-dark my-1">Lihat Data Asesor yang terdaftar</a>
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="border-radius: 0;background-color: rgb(122,252,255)">
                <div class="card-body">
                    <h5 class="card-title" style="border-bottom: solid 1px black">Manajemen jenis Bidang Sertifikasi Asesor</h5>
                    <p class="card-text">Manage data-data jenis bidang sertifikasi asesor yang sedang aktif</p>
                    <a href="{{ url('/index/dataajs') }}" class="btn btn-outline-dark my-1">Lihat bidang sertifikasi asesor</a>
                    <a href="{{ url('/index/ajs') }}" class="btn btn-outline-dark my-1">Tambah Bidang sertifikasi asesor</a>
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="border-radius: 0;background-color: rgb(254,255,156)">
                <div class="card-body">
                    <h5 class="card-title" style="border-bottom: solid 1px black">Penawaran Sertifikasi</h5>
                    <p class="card-text">Membuka penawaran sertifikasi serta manage penawaran sertifikasi yang sedang aktif</p>
                    <a href="{{ url('/index/dataps') }}" class="btn btn-outline-dark my-1">List Penawaran</a>
                    <a href="{{ url('/index/ps') }}" class="btn btn-outline-dark my-1">Buka Penawaran Baru</a>
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="border-radius: 0;background-color: rgb(255,247,64)">
                <div class="card-body">
                    <h5 class="card-title" style="border-bottom: solid 1px black">Jadwal Kegiatan</h5>
                    <p class="card-text">Buat jadwal kegiatan dan manage jadwal kegiatan</p>
                    <a href="{{ url('/index/datark') }}" class="btn btn-outline-dark my-1">List Kegiatan</a>
                    <a href="{{ url('/index/datajadwal') }}" class="btn btn-outline-dark my-1">List Jadwal</a>
                    <a href="{{ url('/index/rk') }}" class="btn btn-outline-dark my-1">Tambah Kegiatan</a>
                    <a href="{{ url('/index/jadwal') }}" class="btn btn-outline-dark my-1">Tambah Jadwal</a>
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="border-radius: 0;background-color: rgb(255,101,163)">
                <div class="card-body">
                    <h5 class="card-title" style="border-bottom: solid 1px black">Manajemen Unit Kompetensi Sertifikasi</h5>
                    <p class="card-text">Manage data unit kompetensi sertifikasi</p>
                    <a href="{{ url('/index/datauksertif') }}" class="btn btn-outline-dark my-1">List Unit Kompetensi</a>
                    <a href="{{ url('/index/uksertif') }}" class="btn btn-outline-dark my-1">Tambah Unit</a>
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="border-radius: 0;background-color: rgb(255,126,185)">
                <div class="card-body">
                    <h5 class="card-title" style="border-bottom: solid 1px black">Manajemen Referensi Unit</h5>
                    <p class="card-text">Manage data referensi unit</p>
                    <a href="{{ url('/index/dataruk') }}" class="btn btn-outline-dark my-1">List referensi unit</a>
                    <a href="{{ url('/index/ruk') }}" class="btn btn-outline-dark my-1">Tambah Referensi Unit</a>
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="border-radius: 0;background-color: rgb(122,252,255)">
                <div class="card-body">
                    <h5 class="card-title" style="border-bottom: solid 1px black">Manajemen Syarat Sertifikasi</h5>
                    <p class="card-text">Manage data terkait syarat sertifikasi</p>
                    <a href="{{ url('/index/datass') }}" class="btn btn-outline-dark my-1">List Syarat Sertifikasi</a>
                    <a href="{{ url('/index/ss') }}" class="btn btn-outline-dark my-1">Tambah Syarat Sertifikasi</a>
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="border-radius: 0;background-color: rgb(254,255,156)">
                <div class="card-body">
                    <h5 class="card-title" style="border-bottom: solid 1px black">Manajemen Instrumen Asesmen</h5>
                    <p class="card-text">Manage Instrumen asesmen</p>
                    <a href="{{ url('/index/dataiak') }}" class="btn btn-outline-dark my-1">List Instrumen asesmen</a>
                    <a href="{{ url('/index/iak') }}" class="btn btn-outline-dark my-1">Tambah Instrumen asesmen</a>
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="border-radius: 0;background-color: rgb(255,247,64)">
                <div class="card-body">
                    <h5 class="card-title" style="border-bottom: solid 1px black">Plotting Pendaftar dan Asesor</h5>
                    <p class="card-text">Generate Asesor Pendaftar</p>
                    <a href="{{ url('/index/dataap') }}" class="btn btn-outline-dark my-1">List Asesor Pendaftar</a>
                    <a href="{{ url('/index/ap') }}" class="btn btn-outline-dark my-1">Tambah Asesor Pendaftar</a>
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="border-radius: 0;background-color: rgb(255,101,163)">
                <div class="card-body">
                    <h5 class="card-title" style="border-bottom: solid 1px black">Lihat Tabel</h5>
                    <p class="card-text">Data seluruh tabel</p>
                    <a href="{{ url('/index') }}" class="btn btn-outline-dark my-1">Halaman Tabel</a>
                </div>
                </div>
            </div>
        @endhasrole
        </div>
    </div>
</div>
@endsection
