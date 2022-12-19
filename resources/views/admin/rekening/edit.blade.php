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
                    <li class="breadcrumb-item"><a href="{{ url('admin-dashboard/rekening') }}">Rekening</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="container">
            <form action="{{ url('admin-dashboard/rekening/update/' . $rekening->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Id Rekening</label>
                    <br>
                    <select name="id" id="">
                        <option value="{{ old('id', $rekening->id) }}">{{ old('id', $rekening->id) }}</option>
                    </select>
                    <br>
                    <label for="title">Id Nasabah</label>
                    <br>
                    <select name="nasabah_id" id="">
                        <option value="{{ old('nasabah_id', $rekening->nasabah_id) }}">{{ old('id', $rekening->nasabah_id) }}</option>
                    </select>
                    <br>
                    <label for="title">No Rekening</label>
                    <input type="text" class="form-control" name="no_rekening" value="{{ old('no_rekening', $rekening->no_rekening) }}">
                    <br>
                    <div class="row">
                        <div class="col-1">
                            <button type="submit" class="btn btn-primary px-2">Edit</button>
                        </div>
                        <div class="col-1">
                            <a href="{{ url('admin-dashboard/rekening') }}" class="btn btn-warning px-3">Back</a>
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
