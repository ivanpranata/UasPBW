<?php
       session_start();
       if (!isset($_SESSION['login_Un51k4'])) {
            header("Location: login.php?message=" . urlencode("harus login sebagai admin dulu."));
           exit;
       }
   ?>


<?php
require __DIR__ . '/../config/koneksi.php';

// Proses tambah data
if (isset($_POST['tambah'])) {
  $judul = $_POST['judul_buku'];
  $pengarang = $_POST['nama_pengarang'];
  $tahun = $_POST['tahun_terbit'];
  $loker = $_POST['loker_buku'];
  $status = $_POST['status'];
  $keterangan = $_POST['keterangan'];

  $simpan = $koneksi->query("INSERT INTO buku (judul_buku, nama_pengarang, tahun_terbit, loker_buku, status, keterangan)
    VALUES ('$judul', '$pengarang', '$tahun', '$loker', '$status', '$keterangan')");

  if ($simpan) {
    echo "<script>alert('Data berhasil ditambahkan');location.href='tabel-buku.php';</script>";
  } else {
    echo "<div class='alert alert-danger mt-3'>Gagal menambahkan data.</div>";
  }
}

// Proses hapus
if (isset($_GET['hapus'])) {
  $id = $_GET['hapus'];
  $hapus = $koneksi->query("DELETE FROM buku WHERE id = $id");
  if ($hapus) {
    echo "<script>alert('Data berhasil dihapus');location.href='tabel-buku.php';</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Data Buku</title>
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

      <!-- Form tambah buku -->
      <div class="card mb-4">
        <div class="card-body">
          <h4 class="card-title">Form Tambah Buku</h4>
          <form method="POST">
            <div class="form-group">
              <label>Judul Buku</label>
              <input type="text" name="judul_buku" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Nama Pengarang</label>
              <input type="text" name="nama_pengarang" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Tahun Terbit</label>
              <input type="date" name="tahun_terbit" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Loker Buku</label>
              <input type="text" name="loker_buku" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Status</label>
              <select name="status" class="form-control" required>
                <option value="Ada">Ada</option>
                <option value="Dipinjam">Dipinjam</option>
              </select>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" name="keterangan" class="form-control">
            </div>
            <button type="submit" name="tambah" class="btn btn-success">Simpan Buku</button>
          </form>
        </div>
      </div>

      <!-- Tabel daftar buku -->
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Daftar Buku</h4>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Judul</th>
                  <th>Pengarang</th>
                  <th>Tahun</th>
                  <th>Loker</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $data = $koneksi->query("SELECT * FROM buku ORDER BY id DESC");
                while ($row = $data->fetch_assoc()):
                ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= htmlspecialchars($row['judul_buku']) ?></td>
                  <td><?= htmlspecialchars($row['nama_pengarang']) ?></td>
                  <td><?= $row['tahun_terbit'] ?></td>
                  <td><?= htmlspecialchars($row['loker_buku']) ?></td>
                  <td><?= $row['status'] ?></td>
                  <td>
                    <a href="detail-buku.php?id=<?= $row['id'] ?>" title="Lihat"><span class="mdi mdi-eye mdi-24px"></span></a>
                    <a href="edit-buku.php?id=<?= $row['id'] ?>" title="Edit"><span class="mdi mdi-pencil mdi-24px"></span></a>
                    <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Hapus buku ini?')" title="Hapus"><span class="mdi mdi-delete mdi-24px text-danger"></span></a>
                  </td>
                </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
    <?php include __DIR__ . '/../partials/_footer.php'; ?>
  </div>
</div>

<!-- JS -->
<script src="../vendors/js/vendor.bundle.base.js"></script>
<script src="../js/off-canvas.js"></script>
<script src="../js/hoverable-collapse.js"></script>
<script src="../js/template.js"></script>
<script src="../js/settings.js"></script>
</body>
</html>
