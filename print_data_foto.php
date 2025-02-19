<?php
	include 'koneksi.php';
	session_start();
	if(!isset($_SESSION['UserID'])){
		echo'<script>alert("Login terlebih dahulu");
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

  <title>DATA FOTO</title>
<script>
window.print();
</script>

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
	 <div class="row">
	  <div class="col-md-12">
			<form method="GET" action="data_foto.php" style="text-align: center;">
			<h4>
		DATA FOTO
	    </h4>
			</form>
			<br>
	<table id="examplel" class="table table-bordered table-striped" border=1 align="center" width="60%">
	 <thead align="center">
		<tr>
			  <th>FotoID </th>
			  <th>JudulFoto</th>
			  <th>DeskripsiFoto</th>
			  <th>TanggalUnggah</th>
			  <th>LokasiFile </th>
			  <th>AlbumID </th>
			  <th>UserID </th>
			  <th>Status</th>
			  
		</tr>
	</thead>
	<tbody align="center">
		<?php
		include('koneksi.php');
		if(isset($_GET['kata_cari'])) {
		$kata_cari = $_GET['kata_cari'];
		$query = "SELECT * FROM foto WHERE JudulFoto like '%".$kata_cari."%' ORDER BY FotoID ASC";
		} else {
		$query = "SELECT * FROM foto ORDER BY FotoID ASC";
		}
			
		$result = mysqli_query($koneksi, $query);
			
		if(!$result) {
		die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
		}
		while ($data = mysqli_fetch_assoc($result)) {
		?>
		<tr>
			<td><?php echo $data['FotoID']; ?></td>
				<td><?php echo $data['JudulFoto']; ?></td>
				<td><?php echo $data['DeskripsiFoto']; ?></td>
				<td><?php echo $data['TanggalUnggah']; ?></td>
				<td><img src="images/<?php echo $data['LokasiFile'];?>" width="100px"></img></td>
				<td><?php echo $data['AlbumID']; ?></td>
				<td><?php echo $data['UserID']; ?></td>
				<td>
				<?php
				if ($data['Konfirmasi'] == 1) { ?>
					<span class="badge bg-warning">Belum di Konfirmasi</span>
				<?php } else { ?>
					<span class="badge bg-success">Sudah di Konfirmasi</span>
				<?php } ?>
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
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/custom.js"></script>


</body>

</html>