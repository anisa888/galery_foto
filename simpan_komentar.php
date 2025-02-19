<?php
	include('koneksi.php');
	$FotoID				=	$_POST['FotoID'];
	$UserID				=	$_POST['UserID'];
	$IsiKomentar		=	$_POST['IsiKomentar'];
	$TanggalKomentar	=	date('Y-m-d');
	
	$sql = mysqli_query ($koneksi, "INSERT INTO komentarfoto VALUES ('', '$FotoID', '$UserID', '$IsiKomentar', '$TanggalKomentar')") or die(mysqli_error($koneksi)); //GANTI
	
		if($sql) //jika data berhasil ditambahkan
			{
			echo '<script>alert("Berhasil menambahkan komentar."); document.location="index.php";</script>';
			}
			else //jika tidak berhasil ditambahkan ke database
			{
			echo '<script>alert("Gagal melakukan komentar"); document.location="index.php";</script>';
			}
?>	