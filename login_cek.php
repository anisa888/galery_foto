<?php
include('koneksi.php');
session_start();

$Username = $_POST["Username"];
$Password = MD5($_POST["Password"]);

$cek_akun = mysqli_query($koneksi, "SELECT * FROM user WHERE Username = '$Username' AND Password = '$Password'");
$jumlah_data = mysqli_num_rows($cek_akun);

if($jumlah_data > 0) {
    $data_akun = mysqli_fetch_array($cek_akun);
	
    if($data_akun['Konfirmasi'] == '1') {
        echo "<script>alert('Maaf, akun Anda belum di Konfirmasi oleh Admin!');</script>"; 
        echo "<script>document.location.href = 'login.php';</script>"; 
    } else {
		
		
		
	
			if($data_akun['Level']=="admin"){
				$_SESSION['Username'] = $Username;
				$_SESSION['Level'] = "admin";
				$_SESSION['UserID']=$data_akun['UserID'];
				header("location:dashboard_admin.php");
			}else if($data_akun['Level']=="pengguna"){
				$_SESSION['Username'] = $Username;
				$_SESSION['Level'] = "pengguna";
				$_SESSION['UserID']=$data_akun['UserID'];
				header("location:dashboard_pengguna.php");
			}else{
				header("location:login.php?pesan=gagal");
			}	
		
		
		
    }
} else {
    echo "<script>alert('Maaf, akun tidak terdaftar!');</script>"; // Munculkan pesan gagal.
    echo "<script>document.location.href = 'login.php';</script>";   // Redirect halaman menuju halaman form pendaftaran.
}
?>