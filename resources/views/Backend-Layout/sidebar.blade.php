<?php
  $profiles = Auth::user()->profile;
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      {{-- arahkan ke AdminLTE --}}
      <img src="{{ asset('img/'.$profiles->gambar) }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{$profiles->title}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item has-treeview menu-open">
                <a id="dashboard" href="/" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Dashboard
                </p>
                </a>
            </li>

            {{-- <li id="xcomppany" class="nav-header"></li> --}}
            <li id="tprofile" class="nav-item">
              <a id="profile" href="/master/profile" class="nav-link">
                <i class="fas fa-circle nav-icon"></i>
                <p>Profile</p>
              </a>
            </li>

            <li id="tuser" class="nav-item">
                <a id="user" href="/master/user" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
            </li>

            <li id="trental" class="nav-item">
                <a id="rental" href="/master/rental" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Rental</p>
                </a>
            </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
