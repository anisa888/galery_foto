<?php
	include 'koneksi.php';
	session_start();
	if(!isset($_SESSION['UserID'])){
		echo'<script>alert("Login terlebih dahulu!");
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
  <title>KOMENTAR</title>
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
            <span><img src="images/gambar08.png"width="50px"></img></span>
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
        <h2>TAMBAH KOMENTAR</h2>
      </div>
	   <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
          <div class="form_container">
		  <?php
			include('koneksi.php');
			$FotoID = $_GET['FotoID'];
			$select = mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID='$FotoID'" ) or die(mysqli_error($koneksi));
			$data = mysqli_fetch_assoc($select);
		  ?>
			<form action="simpan_komentar.php" method="post">
			  <div class="form-group has-feedbck" hidden>
				<label>FotoID :</label>
				<input type="text" name="FotoID" class="form-control" placeholder="FotoID" value="<?php echo $data['FotoID']?>" readonly>
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			  </div>
			  <div class="form-group has-feedback">
				<label>JudulFoto :</label>
				<input type="text" name="JudulFoto" class="form-control" placeholder="JudulFoto" value="<?php echo $data['JudulFoto']?>" required readonly>
				<span class="glyphicon glyphicon-lock from-control-feedbck"></span>
			  </div>	
			  <div class="form-group has-feedback">
				<label>LokasiFile :</label>
				<br><img src="images/<?php echo $data['LokasiFile'];?>" width="200px"></img>
				<span class="glyphicon glyphicon-lock from-control-feedbck"></span>
			  </div>
			  <div class="form-group has-feedback" hidden>
				<label>User ID :</label>
				<?php
					include 'koneksi.php';
					$UserID=$_SESSION['UserID'];
					$sql=mysqli_query($koneksi, "select * from user where UserID='$UserID'");
					while($data=mysqli_fetch_array($sql)){
				?> 
				<input type="text" name="UserID" class="form-control" placeholder="UserID" value="<?=$data['UserID']?>" readonly>
				<?php
				}
				?>
				<span class="glyphicon glyphicon-lock from-control-feedbck"></span>
			  </div>
			  <div class="form-group has-feedback">
				<label>Isi Komentar :</label>
				<input type="text" name="IsiKomentar" class="form-control" placeholder="IsiKomentar"  required>
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