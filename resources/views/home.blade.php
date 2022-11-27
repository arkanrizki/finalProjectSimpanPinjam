@extends('layouts.admin.app')

@section('content')
<div class="container">
    @if (session('status')) 
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                            {{ session('status') }}
            </div>
        </div>
        @endif

        <div class="row g-4">
        {{-- HEAD TITLENYA ADMIN --}}
            @hasrole('admin')
                <div class="col-12" style="margin: 40px 0px 80px 0px">
                    <div style="font-family: Arial, Helvetica, sans-serif; text-shadow: 0 0 0.5px white">
                        <h3 style="color: yellow">Halo, {{Auth::User()->name}}</h3>
                        <h1 style="color: yellow; font-weight: bold; font-size: 60px; margin-bottom: 20px;">Selamat Datang Kembali<br><span style="background-color: black; border-radius: 120px 90px 60px 30px/30px 60px 90px 120px">&nbsp;Admin&nbsp;</span></h1>
                    </div>
                </div>
            @endhasrole
        
        </div>
    </div>
</div>
@endsection
