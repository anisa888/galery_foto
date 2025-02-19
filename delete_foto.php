<?php
	include('koneksi.php');
	$FotoID = $_GET['FotoID'];
	$cek = mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID='$FotoID'") or die(mysqli_error($koneksi));	
	if(mysqli_num_rows($cek) > 0)
	{
		$del = mysqli_query($koneksi, "DELETE FROM foto WHERE FotoID='$FotoID'") or die(mysqli_error($koneksi));
		if($del)
		{
			echo '<script>alert("Berhasil menghapus data."); document.location="foto.php";</script>';
		} else {
			echo '<script>alert("Gagal menghapus data."); document.location="foto.php";</script>';
		}
	} else {
		echo '<script>alert("FotoID tidak ditemukan di database."); document.location="foto.php";</script>';
	}
?>