<?php
       session_start();
       if (!isset($_SESSION['login_Un51k4'])) {
            header("Location: login.php?message=" . urlencode("Mengakses fitur harus login dulu bro."));
           exit;
       }
   ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sistem Informasi</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
    <!-- partial:partials/_navbar.php -->
    <?php
        include 'partials/_navbar.php';
    ?>
    <!-- gabungan body -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_setting-panel.php -->
      <?php
        include 'partials/_setting-panel.php';
      ?>
      <!-- partial:partials/_sidebar.php -->
      <?php
        include 'partials/_sidebar.php';
      ?>
      <!-- main-panel -->
      <div class="main-panel">
        <!-- content -->
        <div class="content-wrapper">
          <?php
            include 'pages/content/tabel-buku.php';
          ?>
        </div>
        <!-- partial:partials/_footer.php -->
        <?php
            include 'partials/_footer.php';
        ?>
      </div>
    </div>
    <!-- page-body-wrapper ends -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <!-- endinject -->
</body>

</html>

