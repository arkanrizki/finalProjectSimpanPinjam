@extends('layouts.admin.assets')

@section('content')
    @include('layouts.admin.header')

    @include('layouts.admin.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <div class="container">

                <h1>Rekening</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin-dashboard/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Rekening</li>
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
                <a class="btn btn-primary mb-3" href="{{ url('/admin-dashboard/rekening/create') }}">Create</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Id Nasabah</th>
                            <th scope="col">No Rekening</th>
                            <th scope="col">created at</th>
                            <th scope="col">updated at</th>
                            <th scope="col">created By</th>
                            <th scope="col">updated By</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rekening as $r)
                            <tr>
                                <th scope="row">{{ $r->id }}</th>
                                <td>{{ $r->nasabah_id }}</td>
                                <td>{{ $r->no_rekening }}</td>
                                <td>{{ $r->created_at }}</td>
                                <td>{{ $r->updated_at }}</td>
                                <td>{{ $r->created_by }}</td>
                                <td>{{ $r->updated_by }}</td>
                                <td><a class="btn btn-warning"
                                        href="{{ url('/admin-dashboard/rekening/edit/' . $r->id) }}">Edit</a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ url('/admin-dashboard/rekening/delete/' . $r->id) }}" method="POST">
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
