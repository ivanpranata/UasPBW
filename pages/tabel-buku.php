<?php
require __DIR__ . '/../config/koneksi.php';
?>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Data Buku</h4>
        <div class="table-responsive">
            <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul Buku</th>
                    <th>Nama Pengarang</th>
                    <th>Tahun Terbit</th>
                    <th>Loker Buku</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM buku";
                    $query = mysqli_query($koneksi, $sql);
                    $no = 1;
                    while ($data = mysqli_fetch_array($query)) {
                        echo '<tr>';
                        echo '<td>' . $no++ . '</td>';
                        echo '<td>' . $data['judul_buku'] . '</td>';
                        echo '<td>' . $data['nama_pengarang'] . '</td>';
                        echo '<td>' . $data['tahun_terbit'] . '</td>';
                        echo '<td>' . $data['loker_buku'] . '</td>';
                        echo '<td>' . $data['status'] . '</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
            </table>
        </div>
    </div>
</div>