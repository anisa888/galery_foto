<?php 
include 'koneksi.php';
$JudulFoto 		= $_POST['JudulFoto'];
$DeskripsiFoto 	= $_POST['DeskripsiFoto'];
$TanggalUnggah 	= $_POST['TanggalUnggah'];
$AlbumID 		= $_POST['AlbumID'];
$UserID 		= $_POST['UserID'];
$Konfirmasi		= 1;

$rand = rand();
$ekstensi = array('png','jpg','jpeg','gif');
$filename = $_FILES['LokasiFile']['name'];
$ukuran = $_FILES['LokasiFile']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
if(!in_array($ext,$ekstensi) ) {
	header("location:tambah_foto.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1000000){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['LokasiFile']['tmp_name'], 'images/'.$rand.'_'.$filename);
		mysqli_query($koneksi, "INSERT INTO foto VALUES(NULL,'$JudulFoto', '$DeskripsiFoto', '$TanggalUnggah', '$xx', '$AlbumID', '$UserID', '1' )");
		echo '<script>alert("Berhasil kirim pesan!"); 
		document.location="foto.php";</script>';
	}else{
		header("location:tambah_foto.php?alert=gagal_ukuran");
	}
}