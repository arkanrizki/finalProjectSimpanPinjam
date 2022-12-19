@extends('layouts.admin.assets')

@section('content')
    @include('layouts.admin.header')

    @include('layouts.admin.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Tambahkan Data Nasabah</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin-dashboard/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('admin-dashboard/nasabah') }}">Nasabah</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="container">
            <form action="{{ url('admin-dashboard/nasabah/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Nama</label>
                    <input type="text" class="form-control" name="nama">
                    <label for="title">Nomor Telepon</label>
                    <input type="text" class="form-control" name="no_telp">
                    <label for="title">Alamat</label>
                    <input type="text" class="form-control" name="alamat">
                    <label for="title">Kecamatan</label>
                    <br>
                    <select name="kecamatan_id" id="">
                        @foreach($kecamatan as $d)
                        <option value="{{ $d->id }}">{{ $d->nama }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label for="title">Pekerjaan</label>
                    <br>
                    <select name="pekerjaan_id" id="">
                        @foreach($pekerjaan as $d)
                        <option value="{{ $d->id }}">{{ $d->nama }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label for="title">Koperasi</label>
                    <br>
                    <select name="koperasi_id" id="">
                        @foreach($koperasi as $d)
                        <option value="{{ $d->id }}">{{ $d->nama }}</option>
                        @endforeach
                    </select>
                    <br>
                    <br><br>
                    <div class="row">
                        <div class="col-1">
                            <button type="submit" class="btn btn-primary px-2">Submit</button>
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
