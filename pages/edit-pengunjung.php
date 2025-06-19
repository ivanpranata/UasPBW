<?php
require __DIR__ . '/../config/koneksi.php';
$id = $_GET['id'] ?? null;
$data = $koneksi->query("SELECT * FROM pengunjung WHERE id = '$id'")->fetch_assoc();
if (!$data) exit("Data tidak ditemukan.");

if (isset($_POST['update'])) {
  $nama = $_POST['nama'];
  $nim = $_POST['nim'];
  $usia = $_POST['usia'];
  $update = $koneksi->query("UPDATE pengunjung SET nama='$nama', nim='$nim', usia=$usia WHERE id='$id'");
  if ($update) {
    echo "<script>alert('Data berhasil diupdate!');location.href='tabel-pengunjung.php';</script>";
  } else {
    echo "<div class='alert alert-danger'>Gagal update data: " . $koneksi->error . "</div>";
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Edit Pengunjung</title><link rel="stylesheet" href="../css/vertical-layout-light/style.css"></head>
<body>
<?php include __DIR__ . '/../partials/_navbar.php'; ?>
<div class="container-fluid page-body-wrapper">
  <?php include __DIR__ . '/../partials/_setting-panel.php'; ?>
  <?php include __DIR__ . '/../partials/_sidebar.php'; ?>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit Pengunjung</h4>
          <form method="POST">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>NIM</label>
              <input type="text" name="nim" value="<?= htmlspecialchars($data['nim']) ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Usia</label>
              <input type="number" name="usia" value="<?= $data['usia'] ?>" class="form-control" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
            <a href="tabel-pengunjung.php" class="btn btn-secondary">Batal</a>
          </form>
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
