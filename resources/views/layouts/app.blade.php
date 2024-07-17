<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Mi Aplicación')</title>
    @vite(['resources/css/app.css'])
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>

  <body>
    <div class="container-scroller">
        <!-- Start header-->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row bg-dark" data-bs-theme="dark">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start bg-dark" data-bs-theme="dark">
                <a class="" href="{{ route('welcome') }}"><img class="img-fluid m-2" src="{{ asset('assets/images/logo_uvp.png') }}" alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo" /></a>            
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
                      <img src="assets/images/faces/face1.jpg" alt="image">
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
                    <i class="mdi mdi-email-outline"></i>
                    <span class="count-symbol bg-warning"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                    <h6 class="p-3 mb-0">Messages</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <img src="assets/images/faces/face4.jpg" alt="image" class="profile-pic">
                      </div>
                      <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                        <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                        <p class="text-gray mb-0"> 1 Minutes ago </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <img src="assets/images/faces/face2.jpg" alt="image" class="profile-pic">
                      </div>
                      <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                        <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                        <p class="text-gray mb-0"> 15 Minutes ago </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <img src="assets/images/faces/face3.jpg" alt="image" class="profile-pic">
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
                    <i class="mdi mdi-bell-outline"></i>
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
                          <i class="mdi mdi-cog"></i>
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
                    <i class="mdi mdi-power"></i>
                  </a>
                </li>
                <li class="nav-item nav-settings d-none d-lg-block">
                  <a class="nav-link" href="#">
                    <i class="mdi mdi-format-line-spacing"></i>
                  </a>
                </li>
              </ul>
              <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
              </button>
            </div>
        </nav>
        <!-- End header-->
        <!-- Start Main-->
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- Start Sidebar-->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                  <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                      <div class="nav-profile-image">
                        <img src="assets/images/faces/face1.jpg" alt="profile" />
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
                    <a class="nav-link" href="index.html">
                      <span class="menu-title">Dashboard</span>
                      <i class="mdi mdi-home menu-icon"></i>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                      <span class="menu-title">Basic UI Elements</span>
                      <i class="menu-arrow"></i>
                      <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                          <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                      <span class="menu-title">Icons</span>
                      <i class="mdi mdi-contacts menu-icon"></i>
                    </a>
                    <div class="collapse" id="icons">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                          <a class="nav-link" href="pages/icons/font-awesome.html">Font Awesome</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#forms" aria-expanded="false" aria-controls="forms">
                      <span class="menu-title">Forms</span>
                      <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                    </a>
                    <div class="collapse" id="forms">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                          <a class="nav-link" href="pages/forms/basic_elements.html">Form Elements</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                      <span class="menu-title">Charts</span>
                      <i class="mdi mdi-chart-bar menu-icon"></i>
                    </a>
                    <div class="collapse" id="charts">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                          <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                      <span class="menu-title">Tables</span>
                      <i class="mdi mdi-table-large menu-icon"></i>
                    </a>
                    <div class="collapse" id="tables">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                          <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                      <span class="menu-title">User Pages</span>
                      <i class="menu-arrow"></i>
                      <i class="mdi mdi-lock menu-icon"></i>
                    </a>
                    <div class="collapse" id="auth">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                          <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="pages/samples/login.html"> Login </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="pages/samples/register.html"> Register </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="docs/documentation.html" target="_blank">
                      <span class="menu-title">Documentation</span>
                      <i class="mdi mdi-file-document-box menu-icon"></i>
                    </a>
                  </li>
                </ul>
            </nav>
            <!-- End Sidebar-->
            <!-- Start Main Panel-->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                          <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="fa-brands fa-shirtsinbulk"></i>
                           </span> Gestion de turnos
                        </h3>
                        <nav aria-label="breadcrumb">
                          <ul class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                              <span></span>Overview <i class="fa-solid fa-circle-info"></i>
                            </li>
                          </ul>
                        </nav>
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
                        <a href="#" class="card bg-gradient-success card-img-holder text-white text-decoration-none">
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
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 <a href="https://uvp.mx/" target="_blank">Sistema de turnos UVP</a>. All rights reserved.</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
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