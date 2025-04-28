<?php
include "configdb.php";

//02. Mengirimkan query ke MySQL
$sqlStatement = "SELECT * FROM mahasiswa";
$query = mysqli_query($conn, $sqlStatement);
    
//03. Mengambil data/record hasil query
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);
//var_dump($data);

//04. Menutup koneksi ke MySQL
mysqli_close($conn);
?>
<h1>Daftar Mahasiswa</h1>
<?php
if (isset($_GET['succes_msg'])) {
    echo "<p style=\"color: blue\">".$_GET['succes_msg']."</p>";
}
if (isset($_GET['error_msg'])) {
    echo "<p style=\"color: red\">".$_GET['error_msg']."</p>";
}
?>
<a href="index.php?page=addmahasiswa">[Tambah Data Mahasiswa]</a>
<?php
if (count($data) == 0) {
    echo "<p>Belum ada mahasiswa yang terdaftar!</p>";
} else {
?>
<table border="1" cellpadding="0" cellspacing="0">
    <thead>
        <th>No.</th>
        <th>NIM</th>
        <th>Nama Lengkap</th>
        <th>Jenis Kelamin</th>
        <th>Prodi</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php
        foreach ($data as $key => $mhs) {
        ?>
        <tr>
            <td><?= ++$key?></td>
            <td><?= $mhs['nim']?></td>
            <td><?= $mhs['namalengkap']?></td>
            <td><?= $mhs['jeniskelamin']?></td>
            <td><?= $mhs['programstudi']?></td>
            <td><?= $mhs['alamat']?></td>
            <td>
                <a href="index.php?page=editmahasiswa&nim=<?= $mhs['nim']?>">Edit</a> |
                <a href="pages/deletemahasiswa.php?nim=<?= $mhs['nim']?>" onclick="return confirm('Yakin hapus data mahasiswa?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php } ?>