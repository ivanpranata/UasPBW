<?php
       session_start();
       if (!isset($_SESSION['login_Un51k4'])) {
            header("Location: login.php?message=" . urlencode("harus login sebagai admin dulu."));
           exit;
       }
   ?>

<?php
require __DIR__ . '/../config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Daftar Pengunjung</title>
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

      <!-- Form -->
      <div class="card mb-4">
        <div class="card-body">
          <h4 class="card-title">Form Tambah Pengunjung</h4>
          <form method="POST">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
              <label>NIM</label>
              <input type="text" name="nim" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Usia</label>
              <input type="number" name="usia" class="form-control" required>
            </div>
            <button type="submit" name="tambah" class="btn btn-success mt-2">Simpan</button>
          </form>

          <?php
          if (isset($_POST['tambah'])) {
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $usia = $_POST['usia'];
            $simpan = $koneksi->query("INSERT INTO pengunjung (nama, nim, usia) VALUES ('$nama', '$nim', $usia)");
            if ($simpan) {
              echo "<script>alert('Data berhasil ditambahkan!');location.href='tabel-pengunjung.php';</script>";
            } else {
              echo "<div class='alert alert-danger mt-3'>Gagal menambahkan data.</div>";
            }
          }

          if (isset($_GET['hapus'])) {
            $id = $_GET['hapus'];
            $hapus = $koneksi->query("DELETE FROM pengunjung WHERE id = $id");
            if ($hapus) {
              echo "<script>alert('Data berhasil dihapus!');location.href='tabel-pengunjung.php';</script>";
            }
          }
          ?>
        </div>
      </div>

      <!-- Tabel -->
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Daftar Pengunjung</h4>
          <div class="table-responsive">
            <table class="table table-strip">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>NIM</th>
                  <th>Usia</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $query = $koneksi->query("SELECT * FROM pengunjung ORDER BY id DESC");
                while ($row = $query->fetch_assoc()):
                ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= htmlspecialchars($row['nama']) ?></td>
                  <td><?= htmlspecialchars($row['nim']) ?></td>
                  <td><?= $row['usia'] ?></td>
                  <td>
                    <a href="detail-pengunjung.php?id=<?= $row['id'] ?>" title="Lihat"><span class="mdi mdi-eye mdi-24px"></span></a>
                    <a href="edit-pengunjung.php?id=<?= $row['id'] ?>" title="Edit"><span class="mdi mdi-pencil mdi-24px"></span></a>
                    <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Hapus data ini?')" title="Hapus"><span class="mdi mdi-delete mdi-24px text-danger"></span></a>
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

<script src="../vendors/js/vendor.bundle.base.js"></script>
<script src="../js/off-canvas.js"></script>
<script src="../js/hoverable-collapse.js"></script>
<script src="../js/template.js"></script>
<script src="../js/settings.js"></script>
</body>
</html>
