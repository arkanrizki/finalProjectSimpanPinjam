@extends('layouts.admin.assets')

@section('content')
    @include('layouts.admin.header')

    @include('layouts.admin.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit Data</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin-dashboard/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('admin-dashboard/koperasi') }}">Koperasi</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="container">
            <form action="{{ url('admin-dashboard/koperasi/update/' . $koperasi->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ old('nama', $koperasi->nama) }}">
                    <label for="title">Alamat</label>
                    <input type="text" class="form-control" name="alamat"
                        value="{{ old('alamat', $koperasi->alamat) }}">
                    <label for="title">NPWP</label>
                    <input type="text" class="form-control" name="npwp" value="{{ old('npwp', $koperasi->npwp) }}">
                    <label for="title">Nama Pimpinan</label>
                    <input type="text" class="form-control" name="nama_pimpinan" value="{{ old('nama_pimpinan', $koperasi->nama_pimpinan) }}">
                    <label for="title">Nama Bendahara</label>
                    <input type="text" class="form-control" name="nama_bendahara" value="{{ old('nama_bendahara', $koperasi->nama_bendahara) }}">
                    <label for="title">Nomor Telepon</label>
                    <input type="text" class="form-control" name="no_telp"
                        value="{{ old('no_telp', $koperasi->no_telp) }}">
                    <label for="title">Email</label>
                    <input type="email" class="form-control" name="email"
                        value="{{ old('email', $koperasi->email) }}">
                    <br>
                    <div class="row">
                        <div class="col-1">
                            <button type="submit" class="btn btn-primary px-2">Edit</button>
                        </div>
                        <div class="col-1">
                            <a href="{{ url('admin-dashboard/koperasi') }}" class="btn btn-warning px-3">Back</a>
                        </div>

                        {{-- <div class="col-1">
                        </div> --}}
                    </div>
                </div>
            </form>
        </div>

    </main><!-- End #main -->

    @include('layouts.admin.footer')
@endsection
<!-- Vendor JS Files -->
