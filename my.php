<?php
  $kon = mysqli_connect("localhost","root","","penjualan");


//   insert data
function tambahUser($x) {

  global $kon;

  // deklarasi variabel
  $nama = $x['nama'];
  // ambil tanggal dan waktu otomatis di php
  $tanggal = date("H:i d-m-Y");
  $berat = $x['berat'];
  $jenis = $x['jenis'];
  $harga = ($berat*$jenis);
  // mencari jenis paket dari harga
  $jenis = mysqli_fetch_array(mysqli_query($kon, "SELECT paket FROM harga WHERE harga = '$jenis'"));
  // memasukan jenis paket ke variabel
  $jenis = $jenis['paket'];


// bentuk query dulu bos
  $query = "INSERT INTO `konsumen` (`id`, `nama`, `tanggal`, `jenis`, `berat`,`harga`) VALUES (NULL, '$nama', '$tanggal', '$jenis', '$berat', '$harga')";
// jalanin query
  mysqli_query($kon, $query);
  return mysqli_affected_rows($kon);

}

function hapusUser($id) {

  global $kon;
  mysqli_query($kon,"DELETE FROM `konsumen` WHERE `konsumen`.`id` = $id");
  // mysqli_query($kon,"DELETE FROM konsumen WHERE id = $id");
  return mysqli_affected_rows($kon);
}

function selesai($id) {

  global $kon;
  mysqli_query($kon,"UPDATE `konsumen` SET `status` = 'SELESAI' WHERE `konsumen`.`id` = $id;");
  // mysqli_query($kon,"DELETE FROM konsumen WHERE id = $id");
  return mysqli_affected_rows($kon);
}

function cariUbah($keyword) {
  $query = "SELECT * FROM konsumen WHERE id LIKE '%$keyword'";

  return $query;
}

function ubah($dataid,$datapos){
     
  global $kon;

  $nama = $datapos['namaU'];
  $berat = $datapos['beratU'];
  $status = $datapos['statusU'];

  $jenis = $datapos['jenisU'];
  $harga = ($berat*$jenis);
  // mencari jenis paket dari harga
  $jenis = mysqli_fetch_array(mysqli_query($kon, "SELECT paket FROM harga WHERE harga = '$jenis'"));
  // memasukan jenis paket ke variabel
  $jenis = $jenis['paket'];

  $query = "UPDATE `konsumen` SET `nama` = '$nama',`jenis` = '$jenis',`berat` = '$berat',`status` = '$status',`harga` = '$harga' WHERE `konsumen`.`id` = $dataid;";

  mysqli_query($kon, $query);

  return mysqli_affected_rows($kon);
}

// fungsi cek user jika ada yg sama
function cekUser($x) {
  global $kon;

  $cekUser = "SELECT nama FROM konsumen WHERE nama = '$x'";
  $hasil = mysqli_query($kon, $cekUser);

  return mysqli_affected_rows($kon);
  // return mysqli_num_rows($hasil);
}

function ubahHarga($x) {
  global $kon;
  $a = $_POST['5'];
  $b = $_POST['6'];
  $c = $_POST['7'];
  $d = $_POST['8'];

$query = "UPDATE `harga` SET `harga` = '$a' WHERE `harga`.`id` = 5";
$hasil = mysqli_query($kon, $query);
$query = "UPDATE `harga` SET `harga` = '$b' WHERE `harga`.`id` = 6";
$hasil = mysqli_query($kon, $query);
$query = "UPDATE `harga` SET `harga` = '$c' WHERE `harga`.`id` = 7";
$hasil = mysqli_query($kon, $query);
$query = "UPDATE `harga` SET `harga` = '$d' WHERE `harga`.`id` = 8";
$hasil = mysqli_query($kon, $query);

  return mysqli_affected_rows($kon);
}

function pengumuman($x) {
global $kon;

$query = "UPDATE `pengumuman` SET `pesan` = '$x';";
$hasil = mysqli_query($kon, $query);

  return mysqli_affected_rows($kon);
}

function kabar() {
global $kon;
$nama = $_POST['nama'];
$perihal = $_POST['perihal'];
$tanggal = date("Y-m-d H:i:s");

if(cekUser($nama) > 0) {

  $query = "INSERT INTO `komplain` (`nama`, `tanggal`, `pesan`) VALUES ('$nama', '$tanggal', '$perihal')";

  mysqli_query($kon, $query);

  return mysqli_affected_rows($kon);

}

return mysqli_affected_rows($kon);

}

function hapuskabar($id) {

  global $kon;
  mysqli_query($kon,"DELETE FROM `komplain` WHERE `komplain`.`id` = $id");
  // mysqli_query($kon,"DELETE FROM konsumen WHERE id = $id");
  return mysqli_affected_rows($kon);
}

?>