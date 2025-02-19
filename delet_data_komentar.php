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

  <title>DATA KOMENTAR</title>
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
	 <div class="row">
	  <div class="col-md-12">
			<form method="GET" action="data_komentar.php" style="text-align: center;">
			<h4>
		DATA KOMENTAR
	    </h4>
			</form>
			<br>
	<table id="examplel" class="table table-bordered table-striped" border=1 align="center" width="60%">
	 <thead align="center">
		<tr>
			  <th>KomentarID </th>
			  <th>FotoID</th>
			  <th>UserID</th>
			  <th>IsiKomentar</th>
			  <th>TanggalKomentar</th>
		</tr>
	</thead>
	<tbody align="cente">
		<?php
		include('koneksi.php');
		if(isset($_GET['kata_cari'])) {
		$kata_cari = $_GET['kata_cari'];
		$query = "SELECT * FROM komentarfoto WHERE FotoID like '%".$kata_cari."%' ORDER BY KomentarID ASC";
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