<?php

$koneksi= new mysqli("localhost","root","","dbperpus") or die("Tidak bisa terhubungan ke database");
   if ($koneksi->connect_error) {
    
       die("Connection failed: " . $koneksi->connect_error);}


?>