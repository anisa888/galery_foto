<?php
include 'koneksi.php';

$AlbumID		=$_POST['AlbumID'];
$Konfirmasi		=$_POST['Konfirmasi'];

//update data ke tabel album
mysqli_query($koneksi, "update album set AlbumID='$AlbumID',Konfirmasi='$Konfirmasi'Where AlbumID='$AlbumID'");

//mengalihkan ke halaman index setelah berhasil mengupdate
header("location:data_album.php");
?>