@extends('layout.primary')

@section('page_body')

<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('dashboard')}}">
      <div class="sidebar-brand-icon">
        <img class="img-profile " src="{{asset ('template/img/tw_1.png')}}">
      </div>
      <div class="sidebar-brand-text mx-3"> TwitSoft</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if($main_manu == 'Dashboard') active @endif">
      <a class="nav-link" href="{{url('dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Interface
    </div>


    <li class="nav-item  @if($main_manu == 'Users') active @endif ">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <i class="fas fa-fw fa-users"></i>
        <span>Users</span>
      </a>
      <div id="collapseOne" class="collapse  @if($main_manu == 'Users') show @endif" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item @if($sub_manu == 'Groups') active @endif" href="{{ url('groups') }}">Groups</a>
          <a class="collapse-item @if($sub_manu == 'Users') active @endif" href="{{ url('users') }}">Users</a>
        </div>
      </div>
    </li>


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @if($main_manu == 'Products') active @endif">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
        <i class="fas fa-fw fa-bars"></i>
        <span>Products</span>
      </a>
      <div id="collapsethree" class="collapse @if($main_manu == 'Products') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item @if($sub_manu == 'Categories') active @endif" href="{{ route('categories.index')}}">Categories</a>
          <a class="collapse-item @if($sub_manu == 'Products') active @endif" href="{{ url('products')}}">Products</a>
          <a class="collapse-item @if($sub_manu == 'Stocks') active @endif" href="{{ route('stocks')}}">Stocks</a>
        </div>
      </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @if($main_manu == 'Reports') active @endif">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport" aria-expanded="true" aria-controls="collapseReport">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Reports</span>
      </a>
      <div id="collapseReport" class="collapse  @if($main_manu == 'Reports') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item @if($sub_manu == 'Days') active @endif" href="{{ route('reports.days') }}">Day Reports</a>
          <a class="collapse-item @if($sub_manu == 'Sales') active @endif" href="{{ route('reports.sales') }}">Sales</a>
          <a class="collapse-item @if($sub_manu == 'Purchases') active @endif" href="{{ route('reports.purchases') }}">Purchases</a>
          <a class="collapse-item @if($sub_manu == 'Payments') active @endif" href="{{ route('reports.payments') }}">Payments</a>
          <a class="collapse-item @if($sub_manu == 'Receipts') active @endif" href="{{ route('reports.receipts') }}">Receipts</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item  @if($main_manu == 'setting') active @endif">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOneSETING" aria-expanded="true" aria-controls="collapseOne">
        <i class="fas fa-gear fa-sm fa-fw mr-2 text-gray-400"></i>
        <span>Settings</span>
      </a>
      <div id="collapseOneSETING" class="collapse  @if($main_manu == 'setting') show @endif" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item @if($sub_manu == 'profile') active @endif" href="{{  route('profile.show') }}">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
          </a>
          <a class="collapse-item @if($sub_manu == 'password') active @endif" href="{{ url('change-password') }}">
            <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
            Password
          </a>

        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>

        <ul class="navbar-nav ml-auto">

          <!-- Nav Item - Search Dropdown (Visible Only XS) -->
          <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
              <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>

          <!-- Nav Item - Alerts -->
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bell fa-fw"></i>
              <!-- Counter - Alerts -->
              <span class="badge badge-danger badge-counter">3+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">
                Alerts Center
              </h6>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">October 12, 2022</div>
                  <span class="font-weight-bold">A new monthly report is ready to download!</span>
                </div>
              </a>
              <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
            </div>
          </li>

          <!-- Nav Item - Messages -->
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-envelope fa-fw"></i>
              <!-- Counter - Messages -->
              <span class="badge badge-danger badge-counter">7</span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
              <h6 class="dropdown-header">
                Message Center
              </h6>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                  <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                  <div class="status-indicator bg-success"></div>
                </div>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
            </div>
          </li>

          <div class="topbar-divider d-none d-sm-block"></div>

          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
              <img class="img-profile rounded-circle" src="{{ Storage::url(Auth::user()->image) }}">

            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="{{  route('profile.show') }}">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
              </a>
              <a class="dropdown-item" href="{{ url('change-password') }}">
                <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                Password
              </a>
              <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Activity Log
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>

        </ul>

      </nav>
      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">

        @if (session('message') )
        <div class="alert alert-success" role="alert">
          {{ session('message') }}
        </div>
        @endif

        @yield('main_content')


      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Copyright &copy; TwitSoft 2022</span>
        </div>
      </div>
    </footer>
    <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Loggin Out</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Are you sure you want to logout?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
        <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
      </div>
    </div>
  </div>
</div>

@stop