<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>WEB GALARI FOTO</title>
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
          <span>WEB GALERI FOTO </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>

        <?php
        session_start();
        if(!isset($_SESSION['Level'])){
        ?>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
            <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="registrasi.php">Registrasi</a>
            </li>
          </ul>
        </div>
        
        <?php
        }elseif ($_SESSION['Level'] == 'admin'){
        ?>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
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

        <?php
        }else{
        ?>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
            <a class="nav-link" href="dashboard_pengguna.php">Dashboard</a>
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

        <?php
        }
        ?>
      </nav>
    </div>
    </header>
    </div>

    <section class="contact_section layout_padding">
      <div class="container">
        <div class="heading_container heading_center">
        <h2>WEB GALERI FOTO</h2>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form method="GET" action="index.php" style="text-align: center;">
            <label>Kata Pencarian : </label>
            <input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>" placeholder="Judul Foto" />
            <button type="submit">Cari</button>
          </form>
          <br>
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr align="center">
                <th>FotoID</th>
                <th>JudulFoto</th>
                <th>DeskripsiFoto</th>
                <th>TanggalUnggah</th>
                <th>Lokasi</th>
                <th>AlbumID</th>
                <th>UserID</th>
                <th>Aksi</th>
                <th>Jumlah Like</th>
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
				<?php
                    if ($data['Konfirmasi'] == 1) { ?>
					<!-- Foto yang belum dikonfirmasi tidak ditampilkan	-->
                    &nbsp;
					<?php } else { ?>
                <td><?php echo $data['FotoID']; ?></td>
                <td><?php echo $data['JudulFoto']; ?></td>
                <td><?php echo $data['DeskripsiFoto']; ?></td>
                <td><?php echo $data['TanggalUnggah']; ?></td>
                <td><img src="images/<?php echo $data['LokasiFile'];?>" width="200px"></img></td>
                <td><?php echo $data['AlbumID']; ?></td>
                <td><?php echo $data['UserID']; ?></td>
                <td>
                  <a href="like_foto.php?FotoID=<?=$data['FotoID']?>" type="button" class="badge badge-danger">Like</a>
                  <a href="komentar_foto.php?FotoID=<?=$data['FotoID']?>" type="button" class="badge badge-primary">Komentar</a>
                </td>
                <td>
                  <?php
                    $FotoID=$data['FotoID'];
                    $sql2=mysqli_query($koneksi,"select * from likefoto where FotoID='$FotoID'");
                    echo mysqli_num_rows($sql2);
                  ?>
                Likes
                </td>
                    <?php } ?>
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

    <footer class="footer_section">
      <div class="container">
        <p>&copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">anisa</a>
        </p>
      </div>
    </footer>

	<script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
	<script src="js/custom.js"></script>
  </body>
</html>