<link rel="stylesheet" href="Assets/css/dropdown.css">
<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="?page=utama">Sistem Informasi Perpustakaan Fasilkom</a>
        </div>
        
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>

                <?php if(isset($_SESSION['level']) && $_SESSION['level']==1) { ?>
                <!-- Master Data Drag -->
                <li class="dropdown">
                    <a href="#">Master Data <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?page=buku&actions=tampil">Daftar Buku</a></li>
                        <li><a href="?page=peminjaman&actions=tampil">Peminjaman</a></li>
                    </ul>
                </li>
                <!-- Reports Drag -->
                <li class="dropdown">
                    <a href="#">Reports <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?page=buku&actions=report">Laporan Daftar Buku</a></li>
						<li><a href="?page=peminjaman&actions=report">Laporan Pinjaman</a></li>
                    </ul>
                </li>
                <li><a href="?page=user&actions=tampil">User</a></li>


                <?php } ?>


                <li><a href="?page=about&actions=tampil">About</a></li>
                <li><a href="?page=kontak&actions=tampil">Contact</a></li>

                    <?php if (isset($_SESSION['username'])) { ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php } ?>

            </ul>
        </div>
    </div>
</nav>
