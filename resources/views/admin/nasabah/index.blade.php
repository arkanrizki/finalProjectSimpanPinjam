@extends('layouts.admin.assets')

@section('content')
    @include('layouts.admin.header')

    @include('layouts.admin.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <div class="container">

                <h1>Nasabah</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin-dashboard/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Nasabah</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <div class="pagetitle">
            <div class="container">
                @if (\Session::has('success'))
                    <div class="p-3 mb-2 bg-success text-white rounded-3">{!! \Session::get('success') !!}</div>
                @elseif(\Session::has('error'))
                    <div class="p-3 mb-2 bg-danger text-white rounded-3">{!! \Session::get('error') !!}</div>
                @endif
                {{-- <a class="btn btn-primary mb-3" href="{{ url('/admin-dashboard/rumah-sakit/create') }}">Create</a> --}}
                {{-- <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NPSN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">ID Kabupaten</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Nama Kepsek</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nomor Telepon Kepsek</th>
                            <th scope="col">ID Jenis Sekolah</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sekolah as $v)
                            <tr>
                                <th scope="row">{{ $v->id }}</th>
                                <td>{{ $v->npsn }}</td>
                                <td>{{ $v->nama }}</td>
                                <td>{{ $v->regency_id }}</td>
                                <td>{{ $v->alamat }}</td>
                                <td>{{ $v->nama_kepsek }}</td>
                                <td>{{ $v->nip }}</td>
                                <td>{{ $v->no_telp_kepsek }}</td>
                                <td>{{ $v->id_jenis_sekolah }}</td>
                                <td>{{ $v->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> --}}
    </main><!-- End #main -->

    @include('layouts.admin.footer')
@endsection
<!-- Vendor JS Files -->
