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
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>DATA KOMENTAR</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

<div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <span>WEB GALERI FOTO </span>
          </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ml-auto">
              <li class="nav-item ">
            <a class="nav-link" href="dashboard_admin.php">Dashboard Admin</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="data_user.php">Data User</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link" href="data_album.php">Data Album</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="data_foto.php">Data Foto</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link" href="data_like.php">Data Like</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="data_komentar.php">Data Komentar</a>
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
        <h2>DATA KOMENTAR</h2>
      </div>
	   <div class="row">
        <div class="col-md-12">
		  <form method="GET" action="" style="text-align: center;">
			<label>Kata Pencarian : </label>
			<input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>" placeholder="FotoID" />
			<button type="submit">Cari</button>
		  </form>
		  <br>
		  <table id="example1" class="table table-bordered table-striped" border=1 align="center" width="60%">
		  <thead align="center">
			<tr>
			  <th>KomentarID</th>
			  <th>FotoID</th>
			  <th>UserID</th>
			  <th>IsiKomentar</th>
			  <th>TanggalKomentar</th>
			  <th>Aksi</th>
			</tr>
			<a href = "print_data_komentar.php" class="btn btn-sm btn-primary">print_data_komentar</a>
		  </thead>
		  <tbody  align="center">
			<?php
			include('koneksi.php');
				if(isset($_GET['kata_cari'])) {
					$kata_cari = $_GET['kata_cari'];
					$query = "SELECT * FROM komentarfoto WHERE FotoID like '%".$kata_cari."%'  ORDER BY KomentarID ASC";
				} else {
					$query = "SELECT * FROM komentarfoto ORDER BY KomentarID ASC";
				}
					
				$result = mysqli_query($koneksi, $query);

				if(!$result) {
					die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
				}
				while ($data = mysqli_fetch_assoc($result)) {
			?>
			<tr>
				<td><?php echo $data['KomentarID']; ?></td>
				<td><?php echo $data['FotoID']; ?></td>
				<td><?php echo $data['UserID']; ?></td>
				<td><?php echo $data['IsiKomentar']; ?></td>
				<td><?php echo $data['TanggalKomentar']; ?></td>
				<td>		  
				<?php echo '
				  <a href="delete_data_komentar.php?KomentarID='.$data['KomentarID'].'" class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
				  ';?>
				</td>
			</tr>
			<?php
			  }
			?>
		  </tbody>
		  </table>		  
		</div>
	  </div>
    </div>
  </section>

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Ninda</a>
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