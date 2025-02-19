<?php
	include('koneksi.php');
	$FotoID			=	$_POST['FotoID'];
	$JudulFoto		=	$_POST['JudulFoto'];
	$DeskripsiFoto	=	$_POST['DeskripsiFoto'];
	$TanggalUnggah	=	date ('Y-m-d');
	$AlbumID		=	$_POST['AlbumID'];
	
	$sql = mysqli_query($koneksi, "UPDATE foto SET FotoID='$FotoID', JudulFoto='$JudulFoto', DeskripsiFoto='$DeskripsiFoto', TanggalUnggah='$TanggalUnggah',  AlbumID='$AlbumID' WHERE FotoID='$FotoID'") or die(mysqli_error($koneksi));
			
			if($sql)
			{
				echo '<script>alert("Berhasil memperbaharui data."); 
				document.location="foto.php";</script>';
			}
			else
			{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
?>
