<?php
       session_start();
       if (!isset($_SESSION['login_Un51k4'])) {
            header("Location: login.php?message=" . urlencode("harus login sebagai admin dulu."));
           exit;
       }
   ?>


<?php
require __DIR__ . '/../config/koneksi.php';
$id = $_GET['id'] ?? null;

if (!$id) {
  echo "ID tidak ditemukan.";
  exit;
}

$data = $koneksi->query("SELECT * FROM peminjaman WHERE id = '$id'")->fetch_assoc();

if (!$data) {
  echo "Data tidak ditemukan.";
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Detail Peminjaman</title>
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../js/select.dataTables.min.css">
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="../images/gambar.png" />
</head>
<body>
<?php include __DIR__ . '/../partials/_navbar.php'; ?>
<div class="container-fluid page-body-wrapper">
  <?php include __DIR__ . '/../partials/_setting-panel.php'; ?>
  <?php include __DIR__ . '/../partials/_sidebar.php'; ?>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Detail Peminjaman</h4>
          <p><strong>Judul Buku:</strong> <?= htmlspecialchars($data['judul_buku']) ?></p>
          <p><strong>Nama Peminjam:</strong> <?= htmlspecialchars($data['peminjam']) ?></p>
          <p><strong>Tanggal Pinjam:</strong> <?= $data['tgl_pinjam'] ?></p>
          <p><strong>Tanggal Kembali:</strong> <?= $data['tgl_kembali'] ?></p>
          <p><strong>Lama Pinjam:</strong> <?= $data['lama_pinjam'] ?> hari</p>
          <p><strong>Keterangan:</strong> <?= htmlspecialchars($data['keterangan']) ?></p>
          <a href="tabel-peminjaman.php" class="btn btn-secondary mt-3">Kembali</a>
        </div>
      </div>
    </div>
    <?php include __DIR__ . '/../partials/_footer.php'; ?>
  </div>
</div>

<script src="../vendors/js/vendor.bundle.base.js"></script>
<script src="../js/off-canvas.js"></script>
<script src="../js/hoverable-collapse.js"></script>
<script src="../js/template.js"></script>
<script src="../js/settings.js"></script>
</body>
</html>
