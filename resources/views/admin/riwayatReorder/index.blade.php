@extends('layouts.admin.assets')

@section('content')
    @include('layouts.admin.header')

    @include('layouts.admin.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="pagetitle">
            <div class="container">
                @if (\Session::has('success'))
                    <div class="p-3 mb-2 bg-success text-white rounded-3">{!! \Session::get('success') !!}</div>
                @elseif(\Session::has('error'))
                    <div class="p-3 mb-2 bg-danger text-white rounded-3">{!! \Session::get('error') !!}</div>
                @endif
                <a class="btn btn-primary mb-3" href="{{ url('/admin-dashboard/riwayat-reorder/create') }}">Create</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Koperasi ID</th>
                            <th scope="col">Tanggal Order</th>
                            <th scope="col">Order ID</th>
                            <th scope="col">Status Order</th>
                            <th scope="col">Tanggal Mulai Langganan</th>
                            <th scope="col">Tanggal Berakhir Langganan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayat as $r)
                            <tr>
                                <th scope="row">{{ $r->id }}</th>
                                <td>{{ $r->id }}</td>
                                <td>{{ $r->koperasi_id }}</td>
                                <td>{{ $r->tgl_order }}</td>
                                <td>{{ $r->order_id }}</td>
                                <td>{{ $r->status_order }}</td>
                                <td>{{ $r->tgl_mulai_langganan }}</td>
                                <td>{{ $r->tgl_berakhir_langganan }}</td>
                                <td><a class="btn btn-warning"
                                        href="{{ url('/admin-dashboard/riwayat-reorder/edit/' . $r->id) }}">Edit</a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ url('/admin-dashboard/riwayat-reorder/delete/' . $r->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </main><!-- End #main -->

    @include('layouts.admin.footer')
@endsection
<!-- Vendor JS Files -->
