<?php
	include 'koneksi.php';
	session_start();
	
	if(!isset($_SESSION['UserID'])){
		echo '<script>alert("Login terlebih dahulu");
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
  <title>EDIT FOTO</title>
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

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ml-auto">
			<li class="nav-item">
                <a class="nav-link" href="dashboard_pengguna.php">DASHBOARD</a>
             </li>
			 <li class="nav-item">
                <a class="nav-link" href="album.php">ALBUM</a>
             </li>
			 <li class="nav-item">
                <a class="nav-link" href="foto.php">FOTO</a>
             </li>
			 <li class="nav-item active">
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
          EDIT FOTO
        </h2>
      </div>
      <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
          <div class="form_container">
		  <?php
			include('koneksi.php');
			$FotoID = $_GET['FotoID'];
			$select = mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID='$FotoID'" ) or die(mysqli_error($koneksi)); //GANTI
			$data = mysqli_fetch_assoc($select);
		  ?>
		  
			<form action="update_foto.php" method="post">
			  <div class="form-group has-feedbck">
				<label>FotoID :</label>
				<input type="text" name="FotoID" class="form-control" placeholder="FotoID" value="<?php echo $data['FotoID']?>" readonly>
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			  </div>
			  <div class="form-group has-feedback">
				<label>JudulFoto :</label>
				<input type="text" name="JudulFoto" class="form-control" placeholder="JudulFoto" value="<?php echo $data['JudulFoto']?>">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<label>DeskripsiFoto :</label>
				<input type="text" name="DeskripsiFoto" class="form-control" placeholder="DeskripsiFoto" value="<?php echo $data['DeskripsiFoto']?>">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			  <div class="form-group has-feedback" hidden>
				<label>TanggalUnggah :</label>
				<input type="date" name="TanggalUnggah" class="form-control" placeholder="TanggalUnggah" value="<?php echo $data['TanggalUnggah']?>" readonly>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div> 
			<div class="form-group has-feedback">
				<label>LokasiFile :</label>
				<input type="file" name="LokasiFile" class="form-control" placeholder="LokasiFile" value="<?php echo $data['LokasiFile']?>" readonly>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div> 
			<div class="form-group has-feedback">
				<label>AlbumID :</label>
				<select class="form-control select2" name="AlbumID" style="width: 100%;">
				<?php
				include 'koneksi.php';
				$UserID=$_SESSION['UserID'];
				$sql=mysqli_query($koneksi, "select * from album where UserID='$UserID'");
				while($data=mysqli_fetch_array($sql)){
					?>
					<option value="<?=$data['AlbumID']?>"><?=$data['NamaAlbum']?></option>
					<?php
				}
				?>
				</select>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			  </div>
			  <div class="form-group has-feedback" hidden>
				<label>UserID :</label>
				<?php
					include 'koneksi.php';
					$UserID=$_SESSION['UserID'];
					$sql=mysqli_query($koneksi, "select * from foto where UserID='$UserID'");
					while($data=mysqli_fetch_array($sql)){
				?> 
				<input type="text" name="UserID" class="form-control" placeholder="UserID" value="<?=$data['UserID']?>" >
				<?php
				}
				?>
				<span class="glyphicon glyphicon-lock from-control-feedbck"></span>
			</div>
			  <div class="form-group has-feedback">
				<div class="col-xs-12">
				<button type="submit" name="edit" class="btn btn-primary btn-block btn-flat">Simpan Perubahan</button>
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