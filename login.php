<?php
if(isset($_GET['pesan'])){
	if($_GET['pesan'] == "gagal"){
		echo "Login gagal! username atau password salah!";
	}else if($_GET['pesan'] == "logout"){
		echo "Anda telah berhasil logout";
	}else if($_GET['pesan'] == "belum_login"){
		echo "Anda harus login untuk mengakses halaman admin";
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

  <title>Login</title>


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
          SILAKAN LOGIN
        </h2>
      </div>
      <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
          <div class="form_container">
          <form action="login_cek.php" method="post">
			<div class="input-group mb-3">
				<input type="text" class="form-control" placeholder="Username" name="Username" required>
				<div class="input-group-append">
				</div>
			</div>
			<div class="input-group mb-3">
				<input type="password" class="from-control" placeholder="Password" name="Password" required>
				<div class="input-group mb-3">
				</div>
			</div>
			<div class="input-group mb-3">
			<button type="submit" class="btn btn-block btn-primary">
				<i class=""></i>Login
			</button>
			</div>
		   </form>
		   <div class="card-footer text-center py-3">
              <div class="small"><a href="registrasi.php">Belum Punya Akun? Registrasi!</a></div>
                  </div>
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