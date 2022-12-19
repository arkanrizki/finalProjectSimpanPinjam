@extends('layouts.admin.assets')

@section('content')
    @include('layouts.admin.header')

    @include('layouts.admin.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Tambahkan Data Peminjaman</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin-dashboard/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('admin-dashboard/peminjaman') }}">Peminjaman</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="container">
            <form action="{{ url('admin-dashboard/peminjaman/update/' . $peminjaman->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Rekening ID</label><br>
                    <input type="hidden" name="rekening_id" value="{{ old('id', $rekening->rekening_id) }}">
                    <select name="id" id="">
                        <option value="{{ old('id', $rekening->id) }}">{{ old('id', $rekening->id) }}</option>
                    </select>
                    <br>
                    <label for="title">Nama Nasabah</label><br>
                    <input type="hidden" name="nama" value="{{ old('nama', $rekening->nama) }}">
                    <select name="nasabahOld_nama" id="">
                        @foreach($nasabah as $n)
                            <option value="{{ $n->nama }}">{{ $n->nama }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label for="title">No Rekening</label>
                    <input type="hidden" name="no_rekening" value="{{ $rekening[0]->no_rekening }}">
                    <select name="nasabahOld_no_rekening" id="">
                        @foreach($rekening as $n)
                            <option value="{{ old('no_rekening', $rekening->no_rekening) }}">{{ $n->no_rekening }}</option>
                        @endforeach
                    </select>
                    <br>
                    <input type="text" class="form-control" name="no_rekening">
                    <br>
                    
                    <div class="row">
                        <div class="col-1">
                            <button type="submit" class="btn btn-primary px-2">Submit</button>
                        </div>
                        <div class="col-1">
                            <a href="{{ url('admin-dashboard/peminjaman') }}" class="btn btn-warning px-3">Back</a>
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
