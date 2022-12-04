 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

     <div class="d-flex align-items-center justify-content-between">
         <a class="navbar-brand" href="{{ url('/') }}"
             style="color:#8EDFFF ;font-size: 28px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
             Koperasi <span style="color: #B2FFFF">Simpan Pinjam</span>
         </a>
         <i class="bi bi-list toggle-sidebar-btn"></i>
     </div><!-- End Logo -->

     <nav class="header-nav ms-auto">
         <ul class="d-flex align-items-center">

             <li class="nav-item dropdown pe-3">

                 <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                     data-bs-toggle="dropdown">
                     <img src="<?= asset('admin/assets/img/profile-img.jpg') ?>" alt="Profile" class="rounded-circle">
                     <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                 </a><!-- End Profile Iamge Icon -->

                 <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                     <li class="dropdown-header">
                         <h6>Kevin Anderson</h6>
                         <span>Web Designer</span>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li>
                         <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                             <i class="bi bi-person"></i>
                             <span>My Profile</span>
                         </a>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li>
                         <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                             <i class="bi bi-gear"></i>
                             <span>Account Settings</span>
                         </a>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li>
                         <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                             <i class="bi bi-question-circle"></i>
                             <span>Need Help?</span>
                         </a>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li>
                         <a class="dropdown-item d-flex align-items-center" href="#">
                             <i class="bi bi-box-arrow-right"></i>
                             <form action="{{ url('logout') }}" method="post">
                                 @csrf
                                 <button>
                                     Logout
                                 </button>
                             </form>
                         </a>
                     </li>

                 </ul><!-- End Profile Dropdown Items -->
             </li><!-- End Profile Nav -->
         </ul>
     </nav><!-- End Icons Navigation -->
 </header><!-- End Header -->
