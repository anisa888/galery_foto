<?php
include 'koneksi.php';
session_start();

if(!isset($_SESSION['UserID'])){
echo'<script>alert("login terlebih dahulu") document.location="login.php";</script>';
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
  <title>TAMBAH DAFTAR</title>
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
          <a class="navbar-brand" href="index.html">
            <span>WEB GALERI FOTO </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ml-auto">
              <li class="nav-item ">
                <a class="nav-link" href="dashboard_admin.php">DASHBOARD<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="album.php">ALBUM </a>
			  </li>
			  <li class="nav-item">
                <a class="nav-link" href="foto.php">FOTO</a>
			  </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">LOGOUT</a>
              </li>
              
            </ul>
            
          </div>
        </nav>
      </div>
    </header>
  </div>

  <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
        TAMBAH ALBUM
        </h2>
      </div>
      <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
          <div class="form_container">
			<form action="simpan_album.php" method="post" enctype="multipart/form-data">
			  <div class="form-group has-feedback">
				<label>Nama Album:</label>
				<input type="text" name="NamaAlbum" class="form-control" placeholder="NamaAlbum" required>
				<span class="glyphicon glyphicon-lock from-control-feedbck"></span>
			  </div>
				<label>Deskripsi :</label>
				<input type="text" name="Deskripsi" class="form-control" placeholder="Deskripsi" required>
				<span class="glyphicon glyphicon-lock from-control-feedbck"></span>
			  </div>
			   <div class="form-group has-feedback">
				<label>Tanggal Dibuat :</label>
				<input type="date" name="TanggalDibuat" class="form-control" placeholder="TanggalDibuat" required>
				<span class="glyphicon glyphicon-lock from-control-feedbck"></span>
			  </div>
			  <div class="form-group has-feedback">
				<label>User ID :</label>
				<?php
					include 'koneksi.php';
					$UserID=$_SESSION['UserID'];
					$sql=mysqli_query($koneksi, "select * from user where UserID='$UserID'");
					while($data=mysqli_fetch_array($sql)){
				?> 
				<input type="text" name="UserID" class="form-control" placeholder="UserID" value="<?=$data['UserID']?>">
				<?php
				}
				?>
				<span class="glyphicon glyphicon-lock from-control-feedbck"></span>
			  </div>
			  <div class="form-group has-feedback">
				<div class="col-xs-12">
				<button type="submit" name="register" class="btn btn-primary btn-block btn-flat">Tambah</button>
				<button type="reset" name="hapus" class="btn btn-primary btn-block btn-flat">Hapus</button>
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
        <a href="https://html.design/">Anisa</a>
      </p>
    </div>
  </footer>

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/custom.js"></script>

</body>
</html>