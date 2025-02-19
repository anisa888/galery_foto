<?php
  include('koneksi.php');
  $FotoID		=	$_POST['FotoID'];
  $UserID		=	$_POST['UserID'];
  $TanggalLike	=	date('Y-m-d');
  
  $sql = mysqli_query ($koneksi, "INSERT INTO likefoto (id, FotoID,UserID,TanggalLike) VALUES('', '$FotoID', '$UserID', '$TanggalLike')") or die (mysqli_error($koneksi)); //GANTI
  
if($sql) //jika data berhasil di tambahkan
{
	echo '<script>alert("Berhasil menambahkan like.");
	document.location="foto.php";</script>';
}
else //jika tidak berhasil ditambahkan ke databse
{
	echo '<script>.alert("Gagal melakukan proses tambah data")
	document.location="like_foto.php";</script>';
}
?>