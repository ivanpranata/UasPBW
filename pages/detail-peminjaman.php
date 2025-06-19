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
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
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
</body>
</html>
