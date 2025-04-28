<?php
include "configdb.php";
	if (isset($_POST['btnLogin'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$sqlStatment = "SELECT * FROM user WHERE username='$username'";
		
		$query = mysqli_query($conn, $sqlStatment);
		$dataUser = mysqli_fetch_assoc($query);
		
		if(isset($dataUser)){
			if (md5($password) == $dataUser['password']) {
				session_start();
				$_SESSION['username'] = $dataUser['username'];
				$_SESSION['role'] = $dataUser['role'];
				
				header("location:index.php");
			}else{	
				echo "password salah";
			}
		} else {
			echo "Username tidak dikenali";
		}
		
		mysqli_close($conn);
	}
?>

<h1>Login</h1>
<form method="POST">
	<table border="0">
		<tr>
			<td>Username</td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="Login" name="btnLogin">
				<input type="reset" value="Ulangi" >
			</td>
		</tr>
	</table>
</form>