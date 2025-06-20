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
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Data Peminjaman</title>
  <!-- CSS -->
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

<!-- partial:partials/_navbar.php -->
<?php include __DIR__ . '/../partials/_navbar.php'; ?>

<div class="container-fluid page-body-wrapper">
  <!-- partial:partials/_setting-panel.php -->
  <?php include __DIR__ . '/../partials/_setting-panel.php'; ?>
  <!-- partial:partials/_sidebar.php -->
  <?php include __DIR__ . '/../partials/_sidebar.php'; ?>

  <!-- main-panel -->
  <div class="main-panel">
    <div class="content-wrapper">
      <!-- Form Tambah -->
      <div class="card mb-4">
        <div class="card-body">
          <h4 class="card-title">Form Tambah Peminjaman</h4>
          <form method="POST" action="">
            <div class="form-group">
              <label>Judul Buku</label>
              <select name="judul_buku" class="form-control" required>
                <option value="">-- Pilih Buku --</option>
                <?php
                $buku = $koneksi->query("SELECT judul_buku FROM buku ORDER BY judul_buku ASC");
                while ($row = $buku->fetch_assoc()) {
                  echo "<option value=\"" . htmlspecialchars($row['judul_buku']) . "\">" . htmlspecialchars($row['judul_buku']) . "</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Nama Peminjam</label>
              <input type="text" name="peminjam" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Tanggal Pinjam</label>
              <input type="date" name="tgl_pinjam" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Tanggal Kembali</label>
              <input type="date" name="tgl_kembali" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Lama Pinjam (hari)</label>
              <input type="number" name="lama_pinjam" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" name="keterangan" class="form-control">
            </div>
            <button type="submit" name="tambah" class="btn btn-success mt-2">Simpan Peminjaman</button>
          </form>

          <!-- Proses Tambah -->
          <?php
          if (isset($_POST['tambah'])) {
            $judul_buku = $_POST['judul_buku'];
            $peminjam = $_POST['peminjam'];
            $tgl_pinjam = $_POST['tgl_pinjam'];
            $tgl_kembali = $_POST['tgl_kembali'];
            $lama_pinjam = $_POST['lama_pinjam'];
            $keterangan = $_POST['keterangan'];

            $simpan = $koneksi->query("INSERT INTO peminjaman (judul_buku, peminjam, tgl_pinjam, tgl_kembali, lama_pinjam, keterangan) 
              VALUES ('$judul_buku', '$peminjam', '$tgl_pinjam', '$tgl_kembali', $lama_pinjam, '$keterangan')");

            if ($simpan) {
              echo "<div class='alert alert-success mt-3'>Data berhasil ditambahkan!</div>";
              echo "<meta http-equiv='refresh' content='1; url=tabel-peminjaman.php'>";
            } else {
              echo "<div class='alert alert-danger mt-3'>Gagal menambahkan data.</div>";
            }
          }
          ?>
        </div>
      </div>

      <!-- Daftar Tabel -->
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Daftar Peminjaman</h4>
          <div class="table-responsive">
            <table class="table table-strip">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Judul Buku</th>
                  <th>Peminjam</th>
                  <th>Tgl Pinjam</th>
                  <th>Tgl Kembali</th>
                  <th>Lama</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $result = $koneksi->query("SELECT * FROM peminjaman ORDER BY id DESC");
                while ($row = $result->fetch_assoc()):
                ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= htmlspecialchars($row['judul_buku']) ?></td>
                  <td><?= htmlspecialchars($row['peminjam']) ?></td>
                  <td><?= $row['tgl_pinjam'] ?></td>
                  <td><?= $row['tgl_kembali'] ?></td>
                  <td><?= $row['lama_pinjam'] ?> hari</td>
                  <td><?= htmlspecialchars($row['keterangan']) ?></td>
                  <td>
                    <a href="detail-peminjaman.php?id=<?= $row['id'] ?>" title="Lihat"><span class="mdi mdi-eye mdi-24px"></span></a>
                    <a href="edit-peminjaman.php?id=<?= $row['id'] ?>" title="Edit"><span class="mdi mdi-pencil mdi-24px"></span></a>
                    <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus data ini?')" title="Hapus"><span class="mdi mdi-delete mdi-24px text-danger"></span></a>
                  </td>
                </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>

          <!-- Proses Hapus -->
          <?php
          if (isset($_GET['hapus'])) {
            $id = $_GET['hapus'];
            $hapus = $koneksi->query("DELETE FROM peminjaman WHERE id = '$id'");
            if ($hapus) {
              echo "<script>alert('Data berhasil dihapus');window.location='tabel-peminjaman.php';</script>";
            } else {
              echo "<div class='alert alert-danger mt-3'>Gagal menghapus data.</div>";
            }
          }
          ?>
        </div>
      </div>
    </div>

    <!-- partial:partials/_footer.php -->
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
