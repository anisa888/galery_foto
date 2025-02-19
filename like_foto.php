<?php
include 'koneksi.php';
session_start();
if(!isset($_SESSION['UserID'])){
	//untuk like harus login dulu
	echo '<script>alert("login terlebih dahulu"); document.location="login.php";</script>';
}else{
	$FotoID=$_GET['FotoID'];
	$UserID=$_SESSION['UserID'];
	//cek apakah user sudah like foto 
	
	$sql=mysqli_query($koneksi, "select * from likefoto where FotoID='$FotoID' and UserID='$UserID'");
	
	if(mysqli_num_rows($sql)==1){
		//user sudah pernah like foto ini
		echo '<script>alert("Anda sudah menyukai foto ini"); document.location="index.php";</script>';
	}else{
			$tanggal_like=date('Y-m-d');
			mysqli_query($koneksi, "insert into likefoto values('', '$FotoID', '$UserID', '$tanggal_like')");
			echo '<script>alert("Anda menyukai foto ini!); document.location="index.php";</script>';
		}
	}
	?>