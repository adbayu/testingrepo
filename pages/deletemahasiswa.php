<?php
include "../configdb.php";
$nim = $_GET['nim'];
$sqlStatement = "DELETE FROM mahasiswa WHERE nim='$nim'";
mysqli_query($conn, $sqlStatement);

if (mysqli_affected_rows($conn) != 0) {
    header("location:../index.php?page=mahasiswa&succes_msg=Data mahasiswa berhasil dihapus");
} else {
    header("location:../index.php?page=mahasiswa&error_msg=Pengahapusan data mahasiswa gagal!");
}
mysqli_close($conn);
?>