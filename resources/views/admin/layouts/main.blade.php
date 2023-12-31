<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard | {{ config('app.name') }}</title>
    
    <link 
        rel="shortcut icon" 
        type="image/png" 
        href="{{ asset('adminAssets/images/logos/favicon.png') }}" 
    />
    <link rel="stylesheet" href="{{ asset('adminAssets/css/styles.min.css') }}" />
</head>
<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper show-sidebar" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
      data-sidebar-position="fixed" data-header-position="fixed">
      <!-- Sidebar Start -->
      <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
          <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img">
              <img src="{{ asset('adminAssets/images/logos/dark-logo.svg') }}" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
              <i class="ti ti-x fs-8"></i>
            </div>
          </div>
          @include('admin/layouts/navbar')
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!--  Sidebar End -->
      <!--  Main wrapper -->
      <div class="body-wrapper">
        <!--  Header Start -->
        <header class="app-header">
          <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
              <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                  <i class="ti ti-menu-2"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                  <i class="ti ti-bell-ringing"></i>
                  <div class="notification bg-primary rounded-circle"></div>
                </a>
              </li>
            </ul>
            <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
              <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <li class="nav-item dropdown">
                  <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img src="{{ asset('adminAssets/images/profile/user-1.jpg') }}" alt="" width="35" height="35" class="rounded-circle">
                  </a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                    <div class="message-body">
                      <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                        <i class="ti ti-settings fs-6"></i>
                        <p class="mb-0 fs-3">Settings</p>
                      </a>
                      <a 
                        href="{{ route('adminLogout') }}" 
                        class="btn btn-outline-primary mx-3 mt-2 d-block"
                      >
                        Logout
                      </a>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
        </header>
        <!--  Header End -->
        @section('content')

        @show
        <div class="py-6 px-6 text-center">
            <p class="mb-0 fs-4">
                <a 
                    href="https://www.kelvinkamara.com" 
                    target="_blank" 
                    class="pe-1 text-primary text-decoration-underline"
                >
                    www.kelvinkamara.com
                </a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ asset('adminAssets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('adminAssets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminAssets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('adminAssets/js/app.min.js') }}"></script>
    <script src="{{ asset('adminAssets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('adminAssets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('adminAssets/js/dashboard.js') }}"></script>
  </body>
</html>