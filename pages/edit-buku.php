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
$data = $koneksi->query("SELECT * FROM buku WHERE id = '$id'")->fetch_assoc();
if (!$data) {
  echo "<script>alert('Data tidak ditemukan');location.href='tabel-buku.php';</script>";
  exit;
}

if (isset($_POST['update'])) {
  $judul = $_POST['judul_buku'];
  $pengarang = $_POST['nama_pengarang'];
  $tahun = $_POST['tahun_terbit'];
  $loker = $_POST['loker_buku'];
  $status = $_POST['status'];
  $keterangan = $_POST['keterangan'];

  $update = $koneksi->query("UPDATE buku SET 
    judul_buku='$judul',
    nama_pengarang='$pengarang',
    tahun_terbit='$tahun',
    loker_buku='$loker',
    status='$status',
    keterangan='$keterangan'
    WHERE id='$id'");

  if ($update) {
    echo "<script>alert('Data berhasil diperbarui');location.href='tabel-buku.php';</script>";
  } else {
    echo "<div class='alert alert-danger'>Gagal update: {$koneksi->error}</div>";
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Buku</title>
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
          <h4 class="card-title">Edit Buku</h4>
          <form method="POST">
            <div class="form-group">
              <label>Judul Buku</label>
              <input type="text" name="judul_buku" class="form-control" value="<?= htmlspecialchars($data['judul_buku']) ?>" required>
            </div>
            <div class="form-group">
              <label>Nama Pengarang</label>
              <input type="text" name="nama_pengarang" class="form-control" value="<?= htmlspecialchars($data['nama_pengarang']) ?>" required>
            </div>
            <div class="form-group">
              <label>Tahun Terbit</label>
              <input type="date" name="tahun_terbit" class="form-control" value="<?= $data['tahun_terbit'] ?>" required>
            </div>
            <div class="form-group">
              <label>Loker Buku</label>
              <input type="text" name="loker_buku" class="form-control" value="<?= htmlspecialchars($data['loker_buku']) ?>" required>
            </div>
            <div class="form-group">
              <label>Status</label>
              <select name="status" class="form-control">
                <option value="Ada" <?= $data['status'] == 'Ada' ? 'selected' : '' ?>>Ada</option>
                <option value="Dipinjam" <?= $data['status'] == 'Dipinjam' ? 'selected' : '' ?>>Dipinjam</option>
              </select>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" name="keterangan" class="form-control" value="<?= htmlspecialchars($data['keterangan']) ?>">
            </div>
            <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
            <a href="tabel-buku.php" class="btn btn-secondary">Batal</a>
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
