@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: white; border-radius: 10px;">
        <div class="row "> <!--justify-content-center-->
            <div class="col-12">
                <h1 class="mt-3">Ubah Data Koperasi</h1>
                <hr>
                <form method="POST" action="/koperasi">
                    @csrf
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-group my-3">
                        <label for="nama">Nama Koperasi</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="masukkan nama koperasi" value="{{old('nama')}}">
                        @error('nama') <div class="invalid-feedback"> {{$message}} </div> @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="masukkan alamat" value="{{old('alamat')}}">
                        @error('alamat') <div class="invalid-feedback"> {{$message}} </div> @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="NPWP">NPWP</label>
                        <input type="text" class="form-control @error('NPWP') is-invalid @enderror" id="NPWP" name="NPWP" placeholder="masukkan NPWP" value="{{old('NPWP')}}">
                        @error('NPWP') <div class="invalid-feedback"> {{$message}} </div> @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="nama_pimpinan">Nama Pimpinan</label>
                        <input type="text" class="form-control @error('nama_pimpinan') is-invalid @enderror" id="nama_pimpinan" name="nama_pimpinan" placeholder="masukkan nama pimpinan" value="{{old('nama_pimpinan')}}">
                        @error('nama_pimpinan') <div class="invalid-feedback"> {{$message}} </div> @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="nama_bendahara">Nama Bendahara</label>
                        <input type="text" class="form-control @error('nama_bendahara') is-invalid @enderror" id="nama_bendahara" name="nama_bendahara" placeholder="masukkan masukkan nama bendahara" value="{{old('nama_bendahara')}}">
                        @error('nama_bendahara') <div class="invalid-feedback"> {{$message}} </div> @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="no_telpon">Nomor Telepon</label>
                        <input type="tel" class="form-control @error('no_telpon') is-invalid @enderror" id="no_telpon" name="no_telpon" placeholder="masukkan no telepon" value="{{old('no_telpon')}}">
                        @error('no_telpon') <div class="invalid-feedback"> {{$message}} </div> @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="masukkan email" value="{{old('email')}}">
                        @error('email') <div class="invalid-feedback"> {{$message}} </div> @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="id_koperasi">Nomor Koperasi</label>
                        <select class="form-control @error('id_koperasi') is-invalid @enderror" name="id_koperasi" id="id_koperasi">
                            @foreach($dataKoperasi as $dataKoperasi)
                                <option value="{{$dataKoperasi->id}}">{{$dataKoperasi->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn bg-primary my-3" style="color: white">ubah Data</button>
                </form>
            </div>
        </div>
    </div>
@endsection
