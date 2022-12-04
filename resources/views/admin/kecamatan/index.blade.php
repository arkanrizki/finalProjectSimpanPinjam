@extends('layouts.admin.assets')

@section('content')
    @include('layouts.admin.header')

    @include('layouts.admin.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <div class="container">

                <h1>Daftar Kecamatan</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin-dashboard/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Kecamatan</li>
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
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id Kecamatan</th>
                            <th scope="col">Id Kabupaten/Kota</th>
                            <th scope="col">Nama Kecamatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kecamatan as $k)
                            <tr>
                                <th scope="row">{{ $k->id }}</th>
                                <td>{{ $k->regency_id }}</td>
                                <td>{{ $k->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main><!-- End #main -->
    @include('layouts.admin.footer')
@endsection
