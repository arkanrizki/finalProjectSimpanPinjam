@extends('layouts.admin.assets')

@section('content')
    @include('layouts.admin.header')

    @include('layouts.admin.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Tambahkan Data Pekerjaan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin-dashboard/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('admin-dashboard/pekerjaan') }}">Pekerjaan</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="container">
            <form action="{{ url('admin-dashboard/pekerjaan/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Nama Pekerjaan</label>
                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                        name="nama" value="{{ old('nama') }}" required autocomplete="name" autofocus>

                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <div class="row">
                        <div class="col-1">
                            <button type="submit" class="btn btn-primary px-2">Sumbit</button>
                        </div>
                        <div class="col-1">
                            <a href="{{ url('admin-dashboard/pekerjaan') }}" class="btn btn-warning px-3">Back</a>
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
