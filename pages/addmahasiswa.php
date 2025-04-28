<?php
include "configdb.php";

$sqlStatement = "SELECT * FROM programstudi ORDER BY namaprodi";
$query = mysqli_query($conn, $sqlStatement);
$dataProdi = mysqli_fetch_all($query, MYSQLI_ASSOC);
//var_dump($dataProdi);

if (isset($_POST['btnSubmit'])) {
    $nim = $_POST['nim'];
    $namalengkap = $_POST['namalengkap'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $programstudi = $_POST['programstudi'];
    $alamat = $_POST['alamat'];
    
    $sqlStatement = "INSERT INTO mahasiswa VALUES('$nim','$namalengkap','$jeniskelamin','$programstudi','$alamat')";
    //echo $sqlStatement;
    
    $query = mysqli_query($conn, $sqlStatement);
    
    if (mysqli_affected_rows($conn) != 0) {
        header("location:index.php?page=mahasiswa&succes_msg=Data mahasiswa berhasil ditambahkan.");
    } else {
        echo "<p>Penambahan data mahasiswa gagal!</p>";
    }
    
}
mysqli_close($conn);
?>
<h4>Menambahkan Data Mahasiswa</h4>
<form method="post">
<table border="0">
    <tr>
        <td>NIM</td>
        <td>:</td>
        <td><input name="nim" maxlength="11" size="20"></td>
    </tr>
    <tr>
        <td>Nama Lengkap</td>
        <td>:</td>
        <td><input name="namalengkap" maxlength="45" size="50"></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>
            <input type="radio" name="jeniskelamin" value="L">Laki-Laki
            <input type="radio" name="jeniskelamin" value="P">Perempuan
        </td>
    </tr>
    <tr>
        <td>Program Studi</td>
        <td>:</td>
        <td>
            <select name="programstudi">
                <?php
                foreach ($dataProdi as $prodi) {
                ?>
                <option value="<?= $prodi['kodeprodi']?>"><?= $prodi['namaprodi']?></option>
                <?php
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td valign="top">Alamat Lengkap</td>
        <td valign="top">:</td>
        <td><textarea name="alamat" rows="3" cols="60"></textarea></td>
    </tr>
    <tr>
        <td colspan="3">
            <input type="submit" value="Simpan" name="btnSubmit">
            <input type="reset" value="Ulangi">
        </td>
    </tr>
</table>
</form>