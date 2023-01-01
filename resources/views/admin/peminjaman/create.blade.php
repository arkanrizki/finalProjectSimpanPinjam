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
            <form action="{{ url('admin-dashboard/peminjaman/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Rekening ID</label><br>
                    <input type="hidden" name="rekening_id" value="{{ $rekening[0]->id }}">
                    <select name="rekeningOld_id" id="">
                        @foreach($rekening as $n)
                            <option value="{{ $n->id }}">{{ $n->id }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label for="title">Jumlah Pinjam</label><br>
                    <select name="jml_pinjam" id="">
                            <option>Rp 1.000.000</option>
                            <option>Rp 2.000.000</option>
                            <option>Rp 3.000.000</option>
                    </select>
                    <br>
                    <label for="title">Debit</label><br>
                    <select name="debet" id="">
                            <option>Rp 1.000.000</option>
                            <option>Rp 2.000.000</option>
                            <option>Rp 3.000.000</option>
                    </select>
                    <br>
                    <label for="title">Kredit</label><br>
                    <select name="kredit" id="">
                            <option>Rp 1.000.000</option>
                            <option>Rp 2.000.000</option>
                            <option>Rp 3.000.000</option>
                    </select>
                    
                    <br><br>
                    
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
