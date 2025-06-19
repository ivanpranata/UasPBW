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

if (isset($_POST['update'])) {
  $judul_buku = $_POST['judul_buku'];
  $peminjam = $_POST['peminjam'];
  $tgl_pinjam = $_POST['tgl_pinjam'];
  $tgl_kembali = $_POST['tgl_kembali'];
  $lama_pinjam = $_POST['lama_pinjam'];
  $keterangan = $_POST['keterangan'];

  $update = $koneksi->query("UPDATE peminjaman SET 
    judul_buku = '$judul_buku',
    peminjam = '$peminjam',
    tgl_pinjam = '$tgl_pinjam',
    tgl_kembali = '$tgl_kembali',
    lama_pinjam = $lama_pinjam,
    keterangan = '$keterangan'
    WHERE id = '$id'
  ");

  if ($update) {
    echo "<script>alert('Data berhasil diupdate');location.href='tabel-peminjaman.php';</script>";
  } else {
    echo "<div class='alert alert-danger'>Gagal update data: " . $koneksi->error . "</div>";
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Peminjaman</title>
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
          <h4 class="card-title">Edit Peminjaman</h4>
          <form method="POST">
            <div class="form-group">
              <label>Judul Buku</label>
              <input type="text" name="judul_buku" value="<?= htmlspecialchars($data['judul_buku']) ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Nama Peminjam</label>
              <input type="text" name="peminjam" value="<?= htmlspecialchars($data['peminjam']) ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Tanggal Pinjam</label>
              <input type="date" name="tgl_pinjam" value="<?= $data['tgl_pinjam'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Tanggal Kembali</label>
              <input type="date" name="tgl_kembali" value="<?= $data['tgl_kembali'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Lama Pinjam (hari)</label>
              <input type="number" name="lama_pinjam" value="<?= $data['lama_pinjam'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" name="keterangan" value="<?= htmlspecialchars($data['keterangan']) ?>" class="form-control">
            </div>
            <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
            <a href="tabel-peminjaman.php" class="btn btn-secondary">Batal</a>
          </form>
        </div>
      </div>
    </div>
    <?php include __DIR__ . '/../partials/_footer.php'; ?>
  </div>
</div>
</body>
</html>
