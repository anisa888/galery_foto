<?php
	include 'koneksi.php';
	require 'simpan_registrasi.php';
	
	if(isset($_POST["register"])){
	if(registrasi ($_POST) > 0 ){
		echo "<script>
		alern ('User Baru Berhasil Ditambahkan!');
		</script>";
	}	else {
			echo mysqli_error($koneksi);
	}
	}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>REGISTRASI</title>


  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <span>WEB GALERI FOTO</span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

        </nav>
      </div>
    </header>
  </div>

  <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
		SILAKAN REGISTRASI
		</h2>
		<hr>
	  </diV>
	  <div class="row">
		<div class="col-md-8 col-lg-6 mx-auto">
			<div class="form_container">
			<form action=""method="post">
			<div class="form-group has-feedback">
				<label>Username :</label>
				<input type="text" name="Username" class="form-control" placeholder="Username">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div> 
			<div class="form-group has-feedback">
				<label>Password :</label>
				<input type="password" name="Password" class="form-control" placeholder="Password">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<label>Email :</label>
				<input type="text" name="Email" class="form-control" placeholder="Email">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<label>Nama Lengkap :</label>
				<input type="text" name="NamaLengkap" class="form-control" placeholder="NamaLengkap">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div> 
			<div class="form-group has-feedback">
				<label>Alamat :</label>
				<input type="text" name="Alamat" class="form-control" placeholder="Alamat">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<div class="col-xs-12" >
				<button type="submit" name="register" class="btn btn-primary btn-block btn-flat">Simpan</button>
				<button type="reset" name="hapus" class="btn btn-primary btn-block btn-flat">Hapus</button>
				</div>
				<div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Sudah Punya Akun? Login!</a></div>
                                    </div>
			</div>
			</form>
			</div>
        </div>
      </div>
    </div>
  </section>
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">anisa</a>
      </p>
    </div>
  </footer>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/custom.js"></script>


</body>

</html>