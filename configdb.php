<?php
//01. Melakukan koneksi ke MySQl dan memilih database
$host = "localhost";
$user = "root";
$password = "";
    
$dbname = "siakad_01";
    
$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    die("Koneksi ke MySQL gagal");
}
?>