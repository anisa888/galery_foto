<?php  
include 'koneksi.php';

$FotoID 	= $_POST['FotoID'];
$Konfirmasi	= $_POST['Konfirmasi'];

//update data ke tabel foto
mysqli_query($koneksi, "update foto set FotoID='$FotoID', Konfirmasi='$Konfirmasi' where FotoID='$FotoID'");

//mengalihkan ke halaman index setelah berhasil mengupdate
header("location:data_foto.php");
?>
