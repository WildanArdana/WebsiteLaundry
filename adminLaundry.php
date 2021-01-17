<?php
    session_start();

    include "my.php";

    // cek sudah login belum bro
    if(!isset($_SESSION["admin"])) {
        echo '<script>
        alert("Silahkan Login Terlebih Dahulu!");
        document.location.href="login.php";
        </script>';
    }
    // untuk logout
    if(isset($_POST["logout"])) {
        $_SESSION["login"] = [];
        session_unset();
        session_destroy();
        echo '<script>
        alert("Anda Logout");
        document.location.href="login.php";
        </script>';

    }

    // manggil fungsi tambahuser dan cek user
    if(isset($_POST["tambah"])) {

        // cek user apakah ada yg sama / gak di isi
        if (!cekUser($_POST['nama']) > 0) {

            // cek apakah select gak dipilih
            if($_POST['jenis'] != "Pilih Jenis...") {
                // tambahUser($_POST);
                if(tambahUser($_POST) > 0) {
                echo '<script>
                alert("Data berhasil di tambah");
                </script>';

                // menghapus variabel post nama
                unset($_POST['nama']);

                } else {
                echo '<script>
                alert("Data gagal di tambah");
                </script>';
                }

            } else {
                $selectKosong = "is-invalid";
            }

        } else {
            $ada = "Nama sudah ada!";
        }
}
    // memanggil fungsi hapus

    if(isset($_GET["hapus"])) {
            $id = $_GET["hapus"];

        if(hapusUser($id) > 0) {
            echo '<script>
            document.location.href="adminLaundry.php";
            </script>';
        } else {
            echo '<script>
            alert("Data gagal di hapus");
            </script>';
        }
    }

    // memanggil fungsi selesai
    if(isset($_GET["selesai"])) {
        $id = $_GET["selesai"];

    if(selesai($id) > 0) {
        echo '<script>
        document.location.href="adminLaundry.php";
        </script>';
    } else {
        echo '<script>
        alert("Data gagal di hapus");
        </script>';
    }
}

if(isset($_POST['ubahUser'])) {
    if(ubah($_GET['ubah'],$_POST) > 0) {
        echo '<script>
        document.location.href="adminLaundry.php";
        </script>';
    } else {
        echo '<script>
        alert("Data tidak di ubah");
        </script>';
    }
}

if(isset($_POST['ubahHarga'])) {

    $user = $_SESSION['admin'];
    $pass = $_POST['pass'];

    // mengambil password dari database
    $password = mysqli_fetch_array(mysqli_query($kon, "SELECT password FROM admin WHERE username = '$user'"));

    if(password_verify($pass,$password['password'])) {

    ubahHarga($_POST);

        echo '<script>
        alert("Harga di ubah");
        </script>';

    } else {
        $salah = true;
    }
}

if(isset($_POST['kirimkabar'])) {
    if(pengumuman($_POST['kabar'])>0) {
        echo '<script>
        alert("terkirim");
        </script>';
    } else {
        echo '<script>
        alert("gagal");
        </script>';
    }
}


// hapus komplain chat

    if(isset($_GET["x-kabar"])) {
        $id = $_GET["x-kabar"];

    if(hapuskabar($id) > 0) {
        echo '<script>
        document.location.href="adminLaundry.php";
        </script>';
    } else {
        echo '<script>
        alert("Data gagal di hapus");
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- logo ikon -->
<link rel="icon" type="image/png" href="img/ikon.png">

    <title>Admin Laundry</title>
  </head>
  <body>

    <div class="container">
        <form action="" method="post">
            <button type="btn" name="logout" class="btn btn-danger float-right mt-3">LOGOUT</button>
        </form>
        <h1 class="display-4">Selamat Datang Bos <?= $_SESSION["admin"]?></h1>
    </div>

    <div class="container-fluid bg-white shadow mt-5">
        <div class="row m-3 pb-3 py-4">
            <div class="col border-right">
                <h3 class="shadow-sm bg-primary text-white text-center p-1">Tambah User</h3>
                <form action="" method="post">
                    <div class="form-group">
                        <label>Nama</label>
                        <!-- menampilkan pesan kelahan -->
                        <?php if(isset($ada)) {
                            echo '<br><small class="font-italic text-danger">' . $ada . '</small>';
                            $ada = "is-invalid"; } ?>
                        <input type="text" name="nama" class="form-control <?= $ada; ?>" placeholder="Masukan Nama" autocomplete="off" value="<?php if(isset($_POST['nama'])) {echo $_POST['nama'];}?>">
                    </div>

                    <div class="form-group">
                        <label>Jenis Paket</label>
                        <?php if(isset($selectKosong)) {
                            echo '<br><small class="font-italic text-danger">Silahkan pilih salah satu paket</small>';} ?>
                        <select class="form-control <?= $selectKosong ?>" name="jenis">
                        <!-- menampilkan pesan belum pilih select -->
                            <option class="">Pilih Jenis...</option>
                            <?php
                            $query = mysqli_query($kon,"SELECT * FROM harga");
                            while ($data = mysqli_fetch_array($query)) { ?>
                            <option value="<?=$data['harga']?>"><?=$data['paket']?> / <?=$data['harga']?></option>
                              <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Berat</label>
                        <input type="number" step="any" name="berat" class="form-control" placeholder="Minimal 1kg & untuk koma menggunakan titik">
                    </div>
                    <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                </form>
            </div>
            <div class="col">
            <h3 class="shadow-sm bg-warning text-center p-1">Ubah User</h3>
                <?php
                if(isset($_GET['ubah'])){
                $query = cariUbah($_GET['ubah']);
                $result = mysqli_query($kon,$query);
                while ($valuedata = mysqli_fetch_array($result)) { ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="namaU" class="form-control" placeholder="Masukan Nama" value="<?= $valuedata['nama'];?>">
                    </div>
                    <div class="form-group">
                        <label>Jenis Paket</label>
                        <select class="form-control" name="jenisU" onchange="<?= $valuedata['jenis'];?>">
                            <?php
                            $query = mysqli_query($kon,"SELECT * FROM harga");
                            while ($data = mysqli_fetch_array($query)) { 
                                // menentukan last selected
                                if($data['paket'] == $valuedata['jenis']) { ?>
                            <option selected value="<?=$data['harga']?>"><?=$data['paket']?> / <?=$data['harga']?></option>
                                <?php } else {?>
                            <option value="<?=$data['harga']?>"><?=$data['paket']?> / <?=$data['harga']?></option>
                              <?php } }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Berat</label>
                        <input type="number" step="any" name="beratU" class="form-control" placeholder="Minimal 1kg & untuk koma menggunakan titik" value="<?= $valuedata['berat'];?>">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" name="statusU" class="form-control" value="<?= $valuedata['status'];?>">
                    </div>
                    <button type="submit" name="ubahUser" class="btn btn-warning">UBAH</button>
                    <a href="adminLaundry.php" class="btn btn-danger">Batal</a>
                </form>
                <?php
                    }
                } ?>
            </div>
        </div>

        <div class="row border-top ">
            <div class="col my-3 ml-3">
                <h3 class="shadow-sm bg-success text-white text-center p-1 mb-3">Harga Paket</h3>
                <form action="" method="post">
                    <table>
                            <tr>
                                <?php 
                                $query = mysqli_query($kon,"SELECT * FROM harga");
                                while ($data = mysqli_fetch_array($query)) { ?>
                                <div class="form-group">
                                <td><label class="float-left mr-3"><?= $data['paket'];?> </label></td>
                                <td>Rp. </td>
                                <td><input type="number" class="form-control" style="width: 200px;" name="<?= $data['id'];?>" value="<?=$data['harga'];?>"></td>
                                </div>
                            <tr>
                                <?php }
                                if(isset($salah)) {
                                    echo '<small class="font-italic text-danger">Password salah!</small><br>';
                                    $inputred = "is-invalid";
                                }
                                ?>
                            <tr>
                               <td colspan="3" class="pt-3"><input type="password" name="pass" class="form-control <?= $inputred ?> float-left mr-3 " style="width: 200px;" placeholder="password"></<input>
                               <button type="submit" name="ubahHarga" class="btn btn-success">UBAH</button></td>
                            </tr>
                    </table>
                </form>
            </div>
            <div class="col my-3 border-left border-right">
                <h3 class="shadow-sm bg-secondary text-white text-center p-1">Pengumuman</h3>
                <form action="" method="post">
                    <div class="form-group">
                        <textarea type="text" class="form-control" name="kabar" rows="5" placeholder="Enter your Message"> </textarea>
                        <button type="submit" name="kirimkabar" class="btn btn-secondary mt-3">Kirim</button>
                    </div>
                </form>
            </div>
            <div class="col my-3">
                <h3 class="shadow-sm bg-danger text-white text-center p-1">Pesan User</h3>
                <div class="overflow-auto w-100 h-75">
                    <?php
                    $query = mysqli_query($kon, "SELECT * FROM komplain");
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <div class="shadow-sm">
                            <a href="adminLaundry.php?x-kabar=<?=$data['id']?>" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                            <h5 class="text-danger"><?=$data['nama']?></h5>
                            <small class="font-italic"><?=$data['tanggal']?></small>
                            <p><?=$data['pesan']?></p>
                        </div>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5">
        <h2 class="display-4">Daftar User</h2>
    <table class="table table-hover">
        <thead class="bg-primary text-white">
            <tr class="text-center">
                <th scope="col">NO</th>
                <th scope="col">NAMA</th>
                <th scope="col">JAM TANGGAL</th>
                <th scope="col">JENIS PAKET</th>
                <th scope="col">BERAT</th>
                <th scope="col">STATUS</th>
                <th scope="col">TOTAL</th>
                <th scope="col" class="text-center">OPSI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //   n untuk nomor dan auto increment
            $n = 1;
            $query = mysqli_query($kon, "SELECT * FROM konsumen");
            while ($data = mysqli_fetch_array($query)) { 
                // ternary mendifiniskan warna bg status ijo atau kuning
                ($data['status'] == "SELESAI" ? $bgstat = "bg-success text-white" : $bgstat = "bg-warning");
                ?>
            <tr class="text-center">
                <th scope="row"><?= $n ?></th>
                <td><?= $data['nama'];?></td>
                <td><?= $data['tanggal'];?></td>
                <td><?= $data['jenis'];?></td>
                <td><?= $data['berat'];?> Kg</td>

                <td><mark class="<?=$bgstat?>"><?= $data['status'];?></mark></td>

                <td>Rp.<?= $data['harga'];?></td>
                <td>
                    <!-- <button type="button" class="btn btn-success">Selesai</button> -->
                    <?php if($data['status'] != "SELESAI") { ?>
                    <a href="adminLaundry.php?selesai=<?= $data["id"]; ?>" class="btn btn-success" onclick="return confirm('Klik Ok untuk menyelesaikan ?');">Selesai</a>
                    <?php } ?>
                    <a href="adminLaundry.php?ubah=<?= $data["id"]; ?>" class="btn btn-warning"">Ubah</a>
                    <a href="adminLaundry.php?hapus=<?= $data["id"]; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus ?');">Hapus</a>
                    <!-- <button type="btn" name="hapus" class="btn btn-danger" value="">Hapus</button> -->
                </td>
            </tr>
            <?php $n++;
            } ?>
        </tbody>
    </table>
    </div>

     <!--JavaScript -->
    <script src="jquery/jquery-3.4.1.slim.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>