<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Mi Aplicación')</title>
    @vite(['resources/css/app.css'])
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}"  />
  </head>

  <body>
    <div class="container-scroller">
        <!-- Start header-->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row bg-dark" data-bs-theme="dark">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start bg-dark" data-bs-theme="dark">
                <a class="navbar-brand brand-logo" href="{{ route('welcome') }}"><img class="img-fluid m-2" src="{{ asset('assets/images/logo_uvp.png') }}" alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini" href="{{ route('welcome') }}"><img src="{{ asset('assets/images/logoUvp-mini.png') }}" alt="logo" /></a>            
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
              <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
              </button>
              <div class="search-field d-none d-md-block">
                <form class="d-flex align-items-center h-100" action="#">
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <i class="input-group-text border-0 mdi mdi-magnify"></i>
                    </div>
                    <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
                  </div>
                </form>
              </div>
              <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="nav-profile-img">
                      <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="image">
                      <span class="availability-status online"></span>
                    </div>
                    <div class="nav-profile-text">
                      <p class="mb-1 text-white">David Greymaax</p>
                    </div>
                  </a>
                  <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="#">
                      <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                      <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
                  </div>
                </li>
                <li class="nav-item d-none d-lg-block full-screen-link">
                  <a class="nav-link" href="{{ route('welcome') }}">
                    <i class="fa-solid fa-house" id="fullscreen-button"></i>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-envelope"></i>
                    <span class="count-symbol bg-warning"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                    <h6 class="p-3 mb-0">Messages</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        {{-- <img src="assets/images/faces/face4.jpg" alt="image" class="profile-pic"> --}}
                      </div>
                      <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                        <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                        <p class="text-gray mb-0"> 1 Minutes ago </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        {{-- <img src="assets/images/faces/face2.jpg" alt="image" class="profile-pic"> --}}
                      </div>
                      <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                        <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                        <p class="text-gray mb-0"> 15 Minutes ago </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        {{-- <img src="assets/images/faces/face3.jpg" alt="image" class="profile-pic"> --}}
                      </div>
                      <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                        <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                        <p class="text-gray mb-0"> 18 Minutes ago </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <h6 class="p-3 mb-0 text-center">4 new messages</h6>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                    <i class="fa-solid fa-bell"></i>
                    <span class="count-symbol bg-danger"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                    <h6 class="p-3 mb-0">Notifications</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-success">
                          <i class="mdi mdi-calendar"></i>
                        </div>
                      </div>
                      <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                        <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                        <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-warning">
                          <i class="fa-solid fa-gear"></i>
                        </div>
                      </div>
                      <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                        <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                        <p class="text-gray ellipsis mb-0"> Update dashboard </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-info">
                          <i class="mdi mdi-link-variant"></i>
                        </div>
                      </div>
                      <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                        <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                        <p class="text-gray ellipsis mb-0"> New admin wow! </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <h6 class="p-3 mb-0 text-center">See all notifications</h6>
                  </div>
                </li>
                <li class="nav-item nav-logout d-none d-lg-block">
                  <a class="nav-link" href="#">
                    <i class="fa-solid fa-power-off"></i>
                  </a>
                </li>
                <li class="nav-item nav-settings d-none d-lg-block">
                  <a class="nav-link" href="#">
                    <i class="mdi mdi-format-line-spacing"></i>
                  </a>
                </li>
              </ul>
              <button class="btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
                <span class="fa-solid fa-bars"></span>
              </button>
            </div>
        </nav>
        <!-- End header-->
        <!-- Start Main-->
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- Start Sidebar-->
            <!-- Sidebar visible en pantallas grandes -->
            <nav class="sidebar sidebar-offcanvas d-none d-lg-block" id="sidebar">
              <ul class="nav">
                  <li class="nav-item nav-profile">
                      <a href="#" class="nav-link">
                          <div class="nav-profile-image">
                              <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="profile" />
                              <span class="login-status online"></span>
                              <!--change to offline or busy as needed-->
                          </div>
                          <div class="nav-profile-text d-flex flex-column">
                              <span class="font-weight-bold mb-2">David Grey. H</span>
                              <span class="text-secondary text-small">Project Manager</span>
                          </div>
                          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('welcome') }}">
                          <span class="menu-title"><i class="fa-solid fa-house"></i> Inicio</span>
                      </a>
                  </li>
                  <!-- Enlaces a los módulos generados -->
                  @if(session('moduleNumbers'))
                    @foreach(session('moduleNumbers') as $moduleNumber)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('module/' . $moduleNumber) }}">
                                <span class="menu-title"><i class="fa-solid fa-street-view"></i> Módulo {{ $moduleNumber }}</span>
                            </a>
                        </li>
                    @endforeach
                  @endif
                  <!-- Más elementos del menú -->
              </ul>
            </nav>
            
            <!-- Sidebar como offcanvas en pantallas pequeñas -->
            <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="offcanvasSidebar">
              <div class="offcanvas-header">
                  <h5 class="offcanvas-title">Menu</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                  <nav class="sidebar">
                      <ul class="nav">
                          <li class="nav-item nav-profile">
                              <a href="#" class="nav-link">
                                  <div class="nav-profile-image">
                                      <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="profile" />
                                      <span class="login-status online"></span>
                                      <!--change to offline or busy as needed-->
                                  </div>
                                  <div class="nav-profile-text d-flex flex-column">
                                      <span class="font-weight-bold mb-2">David Grey. H</span>
                                      <span class="text-secondary text-small">Project Manager</span>
                                  </div>
                                  <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('welcome') }}">
                                  <span class="menu-title"><i class="fa-solid fa-house"></i> Inicio</span>
                              </a>
                          </li>
                          @if(session('moduleNumbers'))
                            @foreach(session('moduleNumbers') as $moduleNumber)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('module/' . $moduleNumber) }}">
                                        <span class="menu-title"><i class="fa-solid fa-street-view"></i> Módulo {{ $moduleNumber }}</span>
                                    </a>
                                </li>
                            @endforeach
                          @endif  
                          <!-- Más elementos del menú -->
                      </ul>
                  </nav>
              </div>
            </div>
            <!-- End Sidebar-->
            <!-- Start Main Panel-->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header d-flex justify-content-between flex-wrap">
                        <h3 class="page-title me-2">
                          <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="fa-brands fa-shirtsinbulk"></i>
                           </span> Gestion de turnos
                        </h3>
                        <div class="d-flex align-items-center">
                          <span>Overview <i class="fa-solid fa-circle-info"> </i></span>      
                        </div>
                      </div>
                    <div class="row">
                      <!-- Start Nuevo Dia -->
                      <div class="col-md-4 stretch-card grid-margin">
                        <a href="{{ route('nuevo-dia.create') }}" class="card bg-gradient-danger card-img-holder text-white text-decoration-none">
                          <div class="card-body d-flex align-items-center justify-content-center">
                            <div class="text-center">
                              <i class="fa-solid fa-square-plus fa-4x mb-2 mt-2"></i>
                              <h2 class="">Nuevo día</h2>
                            </div>
                          </div>
                        </a>
                      </div>
                      <!-- End Nuevo Dia -->
                      <!-- Start Generar QR -->
                      <div class="col-md-4 stretch-card grid-margin">
                        <a href="{{ route('generar-qr') }}" class="card bg-gradient-info card-img-holder text-white text-decoration-none">
                          <div class="card-body d-flex align-items-center justify-content-center">
                            <div class="text-center">
                              <i class="fa-solid fa-qrcode fa-4x mb-2 mt-2"></i>
                              <h2 class="">Generar QR</h2>
                            </div>
                          </div>
                        </a>
                      </div>
                      <!-- End Generar QR -->
                      <!-- Start Pantalla de visualización -->
                      <div class="col-md-4 stretch-card grid-margin">
                        <a href="{{ route('pantalla.visualizacion') }}" class="card bg-gradient-success card-img-holder text-white text-decoration-none">
                          <div class="card-body d-flex align-items-center justify-content-center">
                            <div class="text-center">
                              <i class="fa-solid fa-display fa-4x mb-2 mt-2"></i>
                              <h2 class="">Pantalla de visualización</h2>
                            </div>
                          </div>
                        </a>
                      </div>
                      <!-- End Pantalla de visualización -->

                      @yield('content')


                      <!-- Start Footer -->
                        <footer class="footer">
                          <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 <a href="https://uvp.mx/" target="_blank">UVP</a>. All rights reserved.</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Sistema de Turnos UVP <i class="mdi mdi-heart text-danger"></i></span>
                          </div>
                        </footer>
                      <!-- End Footer -->
                    </div>
                </div>
            </div>
            <!-- End Main Panel-->

        </div>
      <!-- End Main-->

    </div>
    @vite(['resources/js/app.js'])
  </body>
</html>