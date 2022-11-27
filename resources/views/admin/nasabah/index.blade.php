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
                <a class="btn btn-primary mb-3" href="{{ url('/admin-dashboard/nasabah/create') }}">Create</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Nomor Telepon</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nasabah as $n)
                            <tr>
                                <th scope="row">{{ $n->id }}</th>
                                <td>{{ $n->nama }}</td>
                                <td>{{ $n->alamat }}</td>
                                <td>{{ $n->no_telp }}</td>
                                <td>{{ $n->user_id->id }}</td>
                                <td><a class="btn btn-warning"
                                        href="{{ url('/admin-dashboard/nasabah/edit/' . $n->id) }}">Edit</a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ url('/admin-dashboard/nasabah/delete/' . $n->id) }}" method="POST">
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
