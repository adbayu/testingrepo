<!-- content -->
<h1>Selamat Datang
<?php
if (isset($_SESSION['username'])) {
	echo $_SESSION['username'];
}
?>

</h1>
<p>Hari ini: <?= date("l, d M Y")?></p>