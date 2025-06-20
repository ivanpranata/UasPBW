<?php
session_start();
session_destroy();
header("Location: /UasPBW/index.php"); // arahkan ke halaman login setelah logout
exit();
?>