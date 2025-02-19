<?php
	function registrasi($data){
		global $koneksi;
		$Username 		= strtolower(stripcslashes($data["Username"]));
		$Password 		= MD5(strtolower(stripcslashes($data["Password"])));
		$Email			= ($data["Email"]);
		$NamaLengkap	= ($data["NamaLengkap"]);
		$Alamat			= ($data["Alamat"]);
		//cek Username sudah ada apa belum
		$result = mysqli_query($koneksi, "SELECT Username FROM user WHERE username = '$Username'");
		if (mysqli_fetch_assoc($result)){
			echo "<script>
				alert('Username sudah digunakan');
				</script>";
			return false;
		}
		
		//tambahkan Username ke database
		$sql = mysqli_query($koneksi, "INSERT INTO user VALUES('', '$Username', '$Password', '$Email', '$NamaLengkap', '$Alamat', 'pengguna', '1')")or die(mysqli_error($koneksi));
		if($sql)
		{
			echo '<script>alert("Berhasil menambahkan username."); document.location="login.php";</script>';
		}
			else
		{
			echo '<script>alert("Gagal melakukan proses tambah username"); document.location="registrasi.php";</script>';
		}
	}
?>