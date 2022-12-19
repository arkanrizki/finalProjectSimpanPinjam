@extends('layouts.admin.assets')

@section('content')
    @include('layouts.admin.header')

    @include('layouts.admin.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <div class="container">

                <h1>Order Langganan</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin-dashboard/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Order Langganan</li>
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
                <a class="btn btn-primary mb-3" href="{{ url('/admin-dashboard/order-langganan/create') }}">Create</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Nama Koperasi</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">NPWP</th>
                            <th scope="col">Nama Pimpinan</th>
                            <th scope="col">Nama Bendahara</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status Approval</th>
                            {{-- <th scope="col">Updated At</th> --}}
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $o)
                            <tr>
                                <th scope="row">{{ $o->id }}</th>
                                <td>{{ $o->user_id }}</td>
                                <td>{{ $o->nama_koperasi }}</td>
                                <td>{{ $o->alamat }}</td>
                                <td>{{ $o->npwp }}</td>
                                <td>{{ $o->nama_pimpinan }}</td>
                                <td>{{ $o->nama_bendahara }}</td>
                                <td>+62{{ $o->no_telp }}</td>
                                <td>{{ $o->email }}</td>
                                <td>{{ $o->status_approval }}</td>
                                {{-- <td>{{ $o->updated_at }}</td> --}}
                                <td><a class="btn btn-warning"
                                        href="{{ url('/admin-dashboard/order-langganan/edit/' . $o->id) }}">Edit</a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ url('/admin-dashboard/order-langganan/delete/' . $o->id) }}"
                                        method="POST">
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
