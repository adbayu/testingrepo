<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Modular</title>
</head>
<body>
    <!-- header-->
    <header>
        <center>
        <h2>Website saya</h2>
        <nav>
            <a href="index.php">Home</a> | <a href="index.php?page=about">Tentang Kami</a> | <a href="index.php?page=mahasiswa">Daftar Mahasiswa</a> |
			<?php
			if (isset($_SESSION['username'])){
				echo "<a href=\"pages/logout.php\">Logout</a>";
			} else {
				echo "<a href=\"index.php?page=login\">LogIn</a>";
			}
			?>
        </nav>
        </center>
    </header>