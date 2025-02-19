<?php
include 'koneksi.php';

$UserID		=$_POST['UserID'];
$Konfirmasi	=$_POST['Konfirmasi'];

//update data ke tabel user
mysqli_query($koneksi,"update user set UserID='$UserID', Konfirmasi='$Konfirmasi' where UserID='$UserID'");

//mengalihkan ke halaman index setelah berhasil mengupdate 
header("location:data_user.php");
?>