@extends('layouts.admin.assets')

@section('content')
    @include('layouts.admin.header')

    @include('layouts.admin.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Tambahkan Data Riwayat Reorder</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin-dashboard/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('admin-dashboard/riwayat-reorder') }}">Riwayat Reorder</a>
                    </li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="container">
            <form action="{{ url('admin-dashboard/riwayat-reorder/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Order ID</label><br>
                    <select name="order_id" id="">
                        @foreach ($order_id as $o)
                            <option value="{{ $o->id }}">{{ $o->id }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label for="title">Status Order</label><br>
                    <select name="status_order" id="">
                        <option>Order</option>
                        <option>Bayar</option>
                        <option>Batal</option>
                    </select>
                    <br><br>
                    <div class="col-1">
                        <button id="pay-button" type="button">Pay!</button>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-1">
                            <button id="submit-button" type="submit" class="btn btn-primary px-2" disabled>Submit</button>
                            <script type="text/javascript">
                                // For example trigger on button clicked, or any time you need
                                var payButton = document.getElementById('pay-button');
                                console.log('{{ $snap_token }}');
                                payButton.addEventListener('click', function() {
                                    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                                    window.snap.pay('{{ $snap_token }}',
                                        // {
                                        //     onSuccess: function() {
                                        //         /* You may add your own implementation here */
                                        //         window.location.href =
                                        //             'http://localhost:8000/admin-dashboard/riwayat-reorder/create';
                                        //     },
                                        //     onpending: function() {
                                        //         /* You may add your own implementation here */
                                        //         return redirect() - > route('admin-dashboard/riwayat-reorder/create');
                                        //     },
                                        //     onClose: function() {
                                        //         /* You may add your own implementation here */
                                        //         window.location.href =
                                        //             'http://localhost:8000/admin-dashboard/riwayat-reorder/create';
                                        //     },
                                        //     // customer will be redirected after completing payment pop-up
                                        // }
                                    );
                                });
                                document.getElementById('pay-button').addEventListener('click', function() {
                                    document.getElementById('submit-button').disabled = false;
                                });
                            </script>
                        </div>
                        <div class="col-1">
                            <a href="{{ url('admin-dashboard/riwayat-reorder') }}" class="btn btn-warning px-3">Back</a>
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
