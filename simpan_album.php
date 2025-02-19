<?php
  include('koneksi.php');
  $NamaAlbum		=	$_POST['NamaAlbum'];
  $Deskripsi		=	$_POST['Deskripsi'];
  $TanggalDibuat	=	$_POST['TanggalDibuat'];
  $UserID			=	$_POST['UserID'];
  $sql = mysqli_query ($koneksi, "INSERT INTO album (NamaAlbum, Deskripsi, TanggalDibuat, UserID,Konfirmasi) VALUES('$NamaAlbum', '$Deskripsi', '$TanggalDibuat', '$UserID','1')") or die (mysqli_error($koneksi)); //GANTI
if($sql) //jika data berhasil di tambahkan
{
	echo '<script>alert("Berhasil menambahkan data.");
	document.location="album.php";</script>';
}
else //jika tidak berhasil ditambahkan ke databse
{
	echo '<script>.alert("Gagal melakukan proses tambah data")
	document.location="tambah_album.php";</script>';
}
?>