@extends('layouts.admin.assets')

@section('content')
    @include('layouts.admin.header')

    @include('layouts.nasabah.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Tambahkan Data Rekening</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin-dashboard/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('admin-dashboard/rekening') }}">Rekening</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="container">
            <form action="{{ url('admin-dashboard/rekening/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Nasabah ID</label><br>
                    <input type="hidden" name="nasabah_id" value="{{ $nasabah[0]->id }}">
                    <select name="nasabahOld_id" id="">
                        @foreach($nasabah as $n)
                            <option value="{{ $n->id }}">{{ $n->id }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label for="title">Nama Nasabah</label><br>
                    <input type="hidden" name="nama" value="{{ $nasabah[0]->nama }}">
                    <select name="nasabahOld_nama" id="">
                        @foreach($nasabah as $n)
                            <option value="{{ $n->nama }}">{{ $n->nama }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label for="title">No Rekening</label>
                    <input type="text" class="form-control" name="no_rekening">
                    <br>
                    
                    <div class="row">
                        <div class="col-1">
                            <button type="submit" class="btn btn-primary px-2">Submit</button>
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
