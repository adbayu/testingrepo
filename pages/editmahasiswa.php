<?php
include "configdb.php";

$sqlStatement = "SELECT * FROM programstudi ORDER BY namaprodi";
$query = mysqli_query($conn, $sqlStatement);
$dataProdi = mysqli_fetch_all($query, MYSQLI_ASSOC);
//var_dump($dataProdi);

/*
 * Query untuk mendapatkan data mahasiswa sesuai dengan NIM yang dikirimkan via URL
 */
$nim = $_GET['nim'];
$sqlStatement = "SELECT * FROM mahasiswa WHERE nim='$nim'";
$query = mysqli_query($conn, $sqlStatement);
$dataMahasiswa = mysqli_fetch_assoc($query);
//var_dump($dataMahasiswa);

if (isset($_POST['btnSubmit'])) {
    $nim = $_POST['nim'];
    $namalengkap = $_POST['namalengkap'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $programstudi = $_POST['programstudi'];
    $alamat = $_POST['alamat'];
    
    $sqlStatement = "UPDATE mahasiswa SET namalengkap='$namalengkap',jeniskelamin='$jeniskelamin',programstudi='$programstudi',alamat='$alamat' WHERE nim='$nim'";
    //echo $sqlStatement;
    
    $query = mysqli_query($conn, $sqlStatement);
    
    if (mysqli_affected_rows($conn) != 0) {
        header("location:index.php?page=mahasiswa&succes_msg=Data mahasiswa berhasil diubah.");
    } else {
        echo "<p>Pengubahan data mahasiswa gagal!</p>";
    }
    
}
mysqli_close($conn);
?>
<h4>Mengubah Data Mahasiswa</h4>
<form method="post">
<table border="0">
    <tr>
        <td>NIM</td>
        <td>:</td>
        <td><input name="nim" maxlength="11" size="20" value="<?= $dataMahasiswa['nim']?>" disabled></td>
    </tr>
    <tr>
        <td>Nama Lengkap</td>
        <td>:</td>
        <td><input name="namalengkap" maxlength="45" size="50" value="<?= $dataMahasiswa['namalengkap']?>"></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>
            <input type="radio" name="jeniskelamin" value="L" <?= $dataMahasiswa['jeniskelamin'] == "L" ? "checked" : ""?>>Laki-Laki
            <input type="radio" name="jeniskelamin" value="P" <?= $dataMahasiswa['jeniskelamin'] == "P" ? "checked" : ""?>>Perempuan
        </td>
    </tr>
    <tr>
        <td>Program Studi</td>
        <td>:</td>
        <td>
            <select name="programstudi">
                <?php
                foreach ($dataProdi as $prodi) {
                    if ($prodi['kodeprodi'] == $dataMahasiswa['programstudi']) {
                        $selProdi = "selected";
                    } else {
                        $selProdi = "";
                    }
                ?>
                <option value="<?= $prodi['kodeprodi']?>" <?= $selProdi?>><?= $prodi['namaprodi']?></option>
                <?php
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td valign="top">Alamat Lengkap</td>
        <td valign="top">:</td>
        <td><textarea name="alamat" rows="3" cols="60"><?= $dataMahasiswa['alamat']?></textarea></td>
    </tr>
    <tr>
        <td colspan="3">
            <input type="hidden" name="nim" value="<?= $dataMahasiswa['nim']?>">
            <input type="submit" value="Simpan" name="btnSubmit">
            <input type="reset" value="Ulangi">
        </td>
    </tr>
</table>
</form>