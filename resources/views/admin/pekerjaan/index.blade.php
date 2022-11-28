@extends('layouts.admin.assets')

@section('content')
    @include('layouts.admin.header')

    @include('layouts.admin.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <div class="container">

                <h1>Pekerjaan</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin-dashboard/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Pekerjaan</li>
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
                <a class="btn btn-primary mb-3" href="{{ url('/admin-dashboard/pekerjaan/create') }}">Create</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id Pekerjaan</th>
                            <th scope="col">Nama Pekerjaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pekerjaan as $p)
                            <tr>
                                <th scope="row">{{ $p->id }}</th>
                                <td>{{ $p->nama }}</td>
                                <td><a class="btn btn-warning"
                                        href="{{ url('/admin-dashboard/pekerjaan/edit/' . $p->id) }}">Edit</a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin?');"
                                        action="{{ url('/admin-dashboard/pekerjaan/delete/' . $p->id) }}" method="POST">
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
