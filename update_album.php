<?php
	include('koneksi.php');
	$AlbumID			=	$_POST['AlbumID'];
	$NamaAlbum			=	$_POST['NamaAlbum'];
	$Deskripsi			=	$_POST['Deskripsi'];
	$TanggalDibuat		=	$_POST['TanggalDibuat'];
	$UserID				=	$_POST['UserID'];
	$Konfirmasi			=	$_POST['Konfirmasi'];
	
	$sql = mysqli_query($koneksi, "UPDATE album SET AlbumID='$AlbumID', NamaAlbum='$NamaAlbum', Deskripsi='$Deskripsi', TanggalDibuat='$TanggalDibuat', UserID='$UserID', Konfirmasi='$Konfirmasi' WHERE AlbumID='$AlbumID'") or die(mysqli_error($koneksi));
			
			if($sql)
			{
				echo '<script>alert("Berhasil memperbaharui data."); document.location="album.php";</script>';
			}
			else
			{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
?>