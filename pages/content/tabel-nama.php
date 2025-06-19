<?php
require '../../config/koneksi.php';
?>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Data Buku</h4>
        <div class="table-responsive">
            <table class="table table-striped">
            <thead>
                <tr>
                    <th>pbud</th>
             
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
                        echo '<td>' . $data['nama_pengarang'] . '</td>';
                        echo '<td>' . $data['status'] . '</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
            </table>
        </div>
    </div>
</div>