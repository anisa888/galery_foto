<?php
	include('koneksi.php');
	$KomentarID = $_GET['KomentarID'];
	$cek = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE KomentarID='$KomentarID'") or die(mysqli_error($koneksi));	
	if(mysqli_num_rows($cek) > 0)
	{
		$del = mysqli_query($koneksi, "DELETE FROM komentarfoto WHERE KomentarID='$KomentarID'") or die(mysqli_error($koneksi));
		if($del)
		{
			echo '<script>alert("Berhasil menghapus data."); document.location="data_komentar.php";</script>';
		} else {
			echo '<script>alert("Gagal menghapus data."); document.location="data_komentar.php";</script>';
		}
	} else {
		echo '<script>alert("KomentarID tidak ditemukan di database."); document.location="data_komentar.php";</script>';
	}
?>