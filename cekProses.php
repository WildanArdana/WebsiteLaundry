<?php include "my.php"; ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- logo ikon -->
<link rel="icon" type="image/png" href="img/ikon.png">

    <title>Cek Status</title>
  </head>
  <body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow gra4">
      <div class="container">
      <img src="img/ff.png" style="width: 120px;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Beranda <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Cek Proses</a>
            </li>
            <li class="nav-item">
              <!-- Button trigger modal -->
              <a href="" class="nav-link" data-toggle="modal" data-target=".bd-example-modal-lg">Team Project</a>
            </li>
          </ul>
          <form class="form-inline  my-lg-0" method="post" action="">
            <input class="form-control mr-sm-2" type="text" name="keyword" placeholder="Masukan Nama Pesanan" aria-label="Search" autocomplete="off">
            <button class="btn btn-outline-light my-2 my-sm-0" name="cari" type="submit">Cek</button>
          </form>
        </div>
      </div>
    </nav>
    <!-- navbar -->
<?php

// cari nama
if(isset($_POST['cari'])) {

  $nama = $_POST['keyword'];
  $query = "SELECT * FROM konsumen WHERE nama = '$nama'";
  $result = mysqli_fetch_array(mysqli_query($kon, $query));


// mendefinisikan warna status
  ($result['status'] == "SELESAI" ? $bgstat = "bg-success text-white" : $bgstat = "bg-warning");

  // cek apakah tidak di temukan
  if(!mysqli_affected_rows($kon)) {
    echo '<script>
    alert("Tidak Di Temukan!");
    </script>';
  }
  
}
?>

<!--menampilkan pilihan tampilan bila sudah di cek -->
<?php (!isset($result) ? include "komponent/belumCek.php" : include "komponent/sudahCek.php"); ?>


<!-- modal menu team -->
<?php include "komponent/slider-team.php"; ?>
<!-- modal menu team -->

<!-- footer web -->
<?php include "komponent/footer.php"; ?>
<!-- footer web -->

    <!--JavaScript -->
    <script src="jquery/jquery-3.4.1.slim.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>