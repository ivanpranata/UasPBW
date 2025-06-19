<!-- Sidebar -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <!-- Master Data -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-masdata" aria-expanded="false" aria-controls="ui-masdata">
              <i class="menu-icon mdi mdi-library"></i>
              <span class="menu-title">Master Data</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="ui-masdata">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/content/tabel-nama.php">Daftar Buku</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/">Peminjaman</a></li>
              </ul>
            </div>
          </li>
          <!-- Laporan -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-laporan" aria-expanded="false" aria-controls="ui-laporan">
              <i class="menu-icon mdi mdi-calendar-check-outline"></i>
                <span class="menu-title">Laporan</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="ui-laporan">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/">Laporan Daftar Buku</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/">Laporan Peminjaman</a></li>
              </ul>
            </div>
          </li>
          <!-- User -->
          <li class="nav-item">
              <a class="nav-link" href="">
                <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <span class="menu-title">User</span>
            </a>
          </li>
          <!-- About -->
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="mdi mdi-help-circle-outline menu-icon"></i>
              <span class="menu-title">About</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="mdi mdi-phone menu-icon"></i>
              <span class="menu-title">Contact</span>
            </a>
          </li>
          <!-- Logout -->
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="mdi mdi-power menu-icon"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
        </ul>
      </nav>