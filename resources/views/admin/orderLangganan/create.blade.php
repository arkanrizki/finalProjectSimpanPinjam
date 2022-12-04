@extends('layouts.admin.assets')

@section('content')
    @include('layouts.admin.header')

    @include('layouts.admin.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Tambahkan Data Order Langganan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin-dashboard/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('admin-dashboard/order-langganan') }}">order langganan</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="container">
            <form action="{{ url('admin-dashboard/order-langganan/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Nama Koperasi</label><br>
                    <select name="nama_koperasi" id="">
                        @foreach($nama_koperasi as $k)
                            <option value="{{ $k->nama }}">{{ $k->nama }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label for="title">Status Approval</label><br>
                    <select name="status_approval" id="">
                            <option>Diterima</option>
                            <option>Ditolak</option>
                    </select>
                    <br><br>
                    
                    <div class="row">
                        <div class="col-1">
                            <button type="submit" class="btn btn-primary px-2">Submit</button>
                        </div>
                        <div class="col-1">
                            <a href="{{ url('admin-dashboard/order-langganan') }}" class="btn btn-warning px-3">Back</a>
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
