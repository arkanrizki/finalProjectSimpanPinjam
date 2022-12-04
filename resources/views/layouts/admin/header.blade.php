 <!-- ======= Header ======= -->
 {{-- <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a class="navbar-brand" href="{{ url('/') }}" style="color:#8EDFFF ;font-size: 28px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
            Koperasi <span style="color: #B2FFFF">Simpan Pinjam</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo --> --}}

    <nav class="navbar navbar-expand-sm navbar-dark bg-secondary flex-sm-nowrap flex-wrap">
        <div class="container-fluid">
            <button class="navbar-toggler flex-grow-sm-1 flex-grow-0 me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbar5">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{-- <span class="navbar-brand flex-grow-1">Navbar 5</span> --}}
            <a class="navbar-brand flex-grow-1" href="{{ url('/') }}" style="color:#8EDFFF ;font-size: 28px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                Koperasi <span style="color: #B2FFFF">Simpan Pinjam</span>
            </a>
            <div class="navbar-collapse collapse flex-grow-1 justify-content-center" id="navbar5">
                <ul class="navbar-nav mx-auto">
                    <form action="{{ url('login') }}" method="post">
                        @csrf
                        <button>
                            Login
                        </button>
                    </form>
                    <form action="{{ url('register') }}" method="post">
                        @csrf
                        <button>
                            Register
                        </button>
                    </form>
                    <form action="{{ url('logout') }}" method="post">
                        @csrf
                        <button>
                            Logout
                        </button>
                    </form>
            </div>
            <div class="flex-grow-1">
                <!--spacer-->
            </div>
        </div>
    </nav>

</header><!-- End Header -->
