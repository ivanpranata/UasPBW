<?php
session_start();
include 'config/koneksi.php'; // koneksi menggunakan MySQLi OOP


// Proses jika form dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $username = $_POST['username'];
   $password = $_POST['paswd'];


   // Cek user di database
   $stmt = $koneksi->prepare("SELECT username, paswd FROM user WHERE username = ? AND paswd = ?");
   $stmt->bind_param("ss", $username,$password);
   $stmt->execute();


   $result = $stmt->get_result();


   // Validasi hasil
   if ($result->num_rows === 1) {
      
       $user = $result->fetch_assoc();
      
       $_SESSION['username'] = $user['username'];
       $_SESSION['login_Un51k4'] = true;
       header("Location: index.php");
       exit;
      
   } else {


     header("Location: login.php?message=" . urlencode("password salah broo..."));
   }


   $stmt->close();
}
?>
