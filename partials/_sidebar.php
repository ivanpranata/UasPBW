<!-- Sidebar -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/UasPBW/index.php">
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
                <li class="nav-item"> <a class="nav-link" href="/UasPBW/pages/tabel-buku.php">Daftar Buku</a></li>
                <li class="nav-item"> <a class="nav-link" href="/UasPBW/pages/tabel-pengunjung.php">Daftar Pengunjung</a></li>
                <li class="nav-item"> <a class="nav-link" href="/UasPBW/pages/tabel-peminjaman.php">Peminjaman</a></li>
              </ul>
            </div>
          </li>
     
          <!-- Logout -->
          <li class="nav-item">
            <a class="nav-link" href="/UasPBW/logout.php">
              <i class="mdi mdi-power menu-icon"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
        </ul>
      </nav>