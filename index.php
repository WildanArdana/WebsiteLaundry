<?php
  include "my.php";


// tambah komplain
  if(isset($_POST['kirim'])) {
 
    if(kabar($_POST) > 0) {
      echo '<script>
      alert("Terkirim Thanks :)");
      </script>';
    } else {
      echo '<script>
      alert("Ups nama pesanan anda tidak teraftar :(");
      </script>';
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- font google -->
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

<!-- logo ikon -->
<link rel="icon" type="image/png" href="img/ikon.png">

    <title>Home</title>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark shadow">
      <div class="container">
      <img src="img/ff.png" style="width: 120px;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Beranda <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cekProses.php">Cek Proses</a>
            </li>
            <li class="nav-item">
              <!-- Button modal -->
              <a href="" class="nav-link" data-toggle="modal" data-target=".bd-example-modal-lg">Team Project</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0" method="post" action="cekProses.php">
            <input class="form-control mr-sm-2" name="keyword" type="search" placeholder="Masukan Nama Pesanan" aria-label="Search" autocomplete="off">
            <button class="btn btn-outline-light my-2 my-sm-0" name="cari" type="submit">Cek</button>
          </form>
        </div>
      </div>
    </nav>
    <!-- navbar -->

    <!-- sambutan -->
    <div class="background-sampul">
      <div class="rgba-gradient plus">
        <div class="container mt-5 text-light">
          <h1 class="display-3">Laundry</h1>
          <p class="display-4">Selamat Datang Di Website Laundry</p>
          <form action="cekProses.php">
          <button type="button" class="btn btn-primary btn-lg">Cek Sekarang</button>
          </form>
        </div>
      </div>
    </div>
    <!-- sambutan -->

<!-- kenpa kami -->
    <div class="container-fluid py-5 mb-4 atas shadow text-center bg-light" style="width:90%">
      <p class="font-weight-light" style="font-family: 'Titillium Web', sans-serif; font-size: 3em">Bersih, Rapi, dan Nyaman keutamaan kami</p>
        <div class="row mt-5 mx-3">
          <div class="col">
            <div class="card h-100">
              <img src="img/reload.png" class="card-img-top mx-auto mt-3 ikon1" alt="...">
              <div class="card-body">
                <h4>Pantau Laundry Anda</h4>
                <p class="card-text">Anda dapat pantau status laundry anda di web ini tanpa harus ambil sendal di depan rumah</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="img/mail.png" class="card-img-top mx-auto mt-3 ikon1" alt="...">
              <div class="card-body">
              <h4>Layanan Online</h4>
                <p class="card-text">Mau nyampein kabar atau info pakaian anda? online in aja brow</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="img/like.png" class="card-img-top mx-auto mt-3 ikon1" alt="...">
              <div class="card-body">
              <h4>Jamin Bersih, Wangi</h4>
                <p class="card-text">Jamin bersih wangi cuy, anti kusut kusut club</p>
              </div>
            </div>
          </div>
        </div>
    </div>
<!-- kenap kami -->
<!-- pengumuman -->
<?php
  $pengumuman = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM pengumuman"));
  $pengumuman = $pengumuman['pesan'];
?>
  <div class="container">
    <div class="row">
    <div class="alert alert-warning alert-dismissible w-100" role="alert">
    <button type="button" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    <strong><i class="fa fa-warning"></i> Pengumuman</strong> <marquee><p style="font-size: 18pt" class="font-weight-bold"><?=$pengumuman?></p></marquee>
  </div>
    </div>
  </div>
<!-- pengumuman -->

    <!-- testimoni -->
   <div class="container rounded pt-5 pb-3 text-white parallax overflow-hidden">
    <!-- <div class="rgba-gradient plus2"> -->
      <div id="carouselExampleControls1" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner text-center">
          <h2>Apa kata mereka ?</h2>
          <div class="carousel-item active justify-content-center">
            <img src="img/spiderman.png" class="rounded-circle mt-4" width="150">
            <blockquote class="blockquote text-center mt-4">
              <p class="mb-0">saya sangat puas!!!, pelayanan yang bagus membuat saya merasa nyaman loundry disini.</p>
              <footer class="blockquote-footer text-light">
              <cite title="Source Title">spiderman</cite>
              </footer>
            </blockquote>
          </div>
          <div class="carousel-item justify-content-center">
            <img src="img/michael.jpg" class="rounded-circle mt-4" width="150">
            <blockquote class="blockquote text-center mt-4">
              <p class="mb-0">Loundry di sini memang benar-benar bersih dan rapi, memang itu yang harus diutamakan.</p>
              <footer class="blockquote-footer text-light">
                <cite title="Source Title">Michael B</cite>
              </footer>
            </blockquote>
          </div>
          <div class="carousel-item justify-content-center">
            <img src="img/pubg.jpg" class="rounded-circle mt-4" width="150">
            <blockquote class="blockquote text-center mt-4">
              <p class="mb-0">sangat puas!! karena pelayanan yang ramah dan pencucian yang bersih dan rapi.</p>
              <footer class="blockquote-footer text-light">
                <cite title="Source Title">no name</cite>
              </footer>
            </blockquote>
          </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  <!-- </div> -->
</div>
    <!-- testimoni -->

    <!-- alamat -->
      <div class="container-fluid mt-5">
        <div class="row mb-5">
          <div class="col shadow mx-2">
          <h2 class="display-4">Alamat</h2>
            <div class="row">
              <div class="col">
                <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63245.98363573067!2d110.33982522910746!3d-7.803163972536027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5787bd5b6bc5%3A0x21723fd4d3684f71!2sYogyakarta%2C+Kota+Yogyakarta%2C+Daerah+Istimewa+Yogyakarta!5e0!3m2!1sid!2sid!4v1561935208934!5m2!1sid!2sid" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
              <div class="col">
                <address>
                  <b>Laundry</b><br>
                  <p class="font-weight-light">
                    Jalan sirotulmustakim <br>
                    ambil kanan surga<br>
                    ambil kiri nearaka<br>
                    DI.akhirat
                  </p>
                  <b>Telepon</b><br>
                  <p>08123456789</p>
                </address>
              </div>
            </div>
          </div>
          <div class="col bg-primary text-white p-3 mx-3">
            <h3>LAYANAN ONLINE</h3>
            <form action="" method="post">
              <div class="form-group">
                <label>Nama Pesanan :</label>
                <input type="text" name="nama" class="form-control" placeholder="masukan nama sesuai pesanan kamu" autocomplete="off">
              </div>
              <div class="form-group">
                <label>Sampaian :</label>
                <input type="text" name="perihal" class="form-control" autocomplete="off" placeholder="misal kurang bersih, atau lama">
              </div>
              <button type="submit" name="kirim" class="btn btn-light">KIRIM</button>
            </form>
          </div>
        </div>
      </div>
    <!-- alamat -->


<!-- footer web -->
<?php include "komponent/footer.php"; ?>
<!-- footer web -->

<!-- modal slider team -->
<?php include "komponent/slider-team.php"; ?>


    <!--JavaScript -->
    <script src="jquery/jquery-3.4.1.slim.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- untuk mengganti warna saat scroll -->
    <script>
        $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if(scroll >= 100){
            $('.fixed-top').addClass('rgba-gradient2');
        } else{
            $('.fixed-top').removeClass('rgba-gradient2');
        }
    });
    </script>
  </body>
</html>