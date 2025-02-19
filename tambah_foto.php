<?php
	include 'koneksi.php';
	session_start();

	if(!isset($_SESSION['UserID'])){
		echo '<script>alert("Login terlebih dahulu!"); 
		document.location="login.php";</script>';
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
  <title>TAMBAH FOTO</title>
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
            <span>WEB GALLERY FOTO</span>
          </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
            <a class="nav-link" href="dashboard_pengguna.php">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="album.php">Album</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link" href="foto.php">Foto</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
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
		TAMBAH FOTO
		</h2>
      </div>
	   <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
          <div class="form_container">
			<form action="simpan_foto.php" method="post" enctype="multipart/form-data">
			  <div class="form-group has-feedback">
				<label>Judul Foto :</label>
				<input type="text" name="JudulFoto" class="form-control" placeholder="JudulFoto" required>
				<span class="glyphicon glyphicon-lock from-control-feedbck"></span>
			  </div>
			  <div class="form-group has-feedback">
				<label>Deskripsi Foto :</label>
				<input type="text" name="DeskripsiFoto" class="form-control" placeholder="DeskripsiFoto" required>
				<span class="glyphicon glyphicon-lock from-control-feedbck"></span>
			  </div>
			  <div class="form-group has-feedback">
				<label>Tanggal Unggah :</label>
				<input type="date" name="TanggalUnggah" class="form-control" placeholder="TanggalUnggah">
				<span class="glyphicon glyphicon-lock from-control-feedbck"></span>
			  </div>	
			  <div class="form-group has-feedback">
				<label>Lokasi File :</label>
				<input type="file" name="LokasiFile" class="form-control" placeholder="LokasiFile">
				<span class="glyphicon glyphicon-lock from-control-feedbck"></span>
			  </div>		  
			  <div class="form-group has-feedback">
				<label>Album ID :</label>
				<select class="form-control select2" name="AlbumID">
					<?php
					include 'koneksi.php';
					$UserID=$_SESSION['UserID'];
					$sql=mysqli_query($koneksi, "select * from album where UserID='$UserID'");
					while($data=mysqli_fetch_array($sql)){
				  ?>
						<?php
							if ($data['Konfirmasi'] == 1) { ?>
							<!-- Album yang belum dikonfirmasi tidak ditampilkan	-->
							&nbsp;
							<?php } else { ?>
							<option value="<?=$data['AlbumID']?>"><?=$data['NamaAlbum']?></option>
						<?php } ?>
				  <?php
					}
				  ?>
				</select>
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
				<button type="submit" name="tambah" class="btn btn-primary btn-block btn-flat">Tambah</button>
				<button type="reset" name="hapus" class="btn btn-primary btn-block btn-flat">Hapus</button>
				</div>
			  </div>
			</form> 
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Anisa</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>


</body>

</html>