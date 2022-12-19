@extends('layouts.admin.assets')

@section('content')
    @include('layouts.admin.header')

    @include('layouts.admin.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit Data Nasabah</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin-dashboard/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('admin-dashboard/nasabah') }}">Nasabah</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="container">
            <form action="{{ url('admin-dashboard/nasabah/update/' . $nasabah->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ old('nama', $nasabah->nama) }}">
                    <label for="title">Nomor Telepon</label>
                    <input type="text" class="form-control" name="no_telp"
                        value="{{ old('no_telp', $nasabah->no_telp) }}">
                    <label for="title">Alamat</label>
                    <input type="text" class="form-control" name="alamat"
                        value="{{ old('alamat', $nasabah->alamat) }}">
                    <label for="title">Kecamatan</label>
                    <br>
                    <select name="kecamatan_id" id="">
                        <option value="{{ old('kecamatan_id', $nasabah->kecamatan_id) }}">{{ old('kecamatan_id', $nasabah->kecamatan_id) }}</option>
                    </select>
                    <br>
                    <label for="title">Pekerjaan</label>
                    <br>
                    <select name="pekerjaan_id" id="">
                        <option value="{{ old('pekerjaan_id', $nasabah->pekerjaan_id) }}">{{ old('pekerjaan_id', $nasabah->pekerjaan_id) }}</option>
                    </select>
                    <br>
                    <label for="title">Koperasi</label>
                    <br>
                    <select name="koperasi_id" id="">
                        <option value="{{ old('koperasi_id', $nasabah->koperasi_id) }}">{{ old('koperasi_id', $nasabah->koperasi_id) }}</option>
                    </select>
                    <br>
                    <div class="row">
                        <div class="col-1">
                            <button type="submit" class="btn btn-primary px-2">Edit</button>
                        </div>
                        <div class="col-1">
                            <a href="{{ url('admin-dashboard/nasabah') }}" class="btn btn-warning px-3">Back</a>
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
