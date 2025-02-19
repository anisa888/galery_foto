<?php
	include('koneksi.php');
	$UserID = $_GET['UserID'];
	$cek = mysqli_query($koneksi, "SELECT * FROM foto WHERE UserID='$UserID'") or die(mysqli_error($koneksi));	
	if(mysqli_num_rows($cek) > 0)
	{
		$del = mysqli_query($koneksi, "DELETE FROM foto WHERE UserID='$UserID'") or die(mysqli_error($koneksi));
		if($del)
		{
			echo '<script>alert("Berhasil menghapus data."); document.location="data_foto.php";</script>';
		} else {
			echo '<script>alert("Gagal menghapus data."); document.location="data_foto.php";</script>';
		}
	} else {
		echo '<script>alert("UserID tidak ditemukan di database."); document.location="data_foto.php";</script>';
	}
?>