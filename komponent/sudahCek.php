<div class="container mt-4">
  <h5 class="display-4">Status Laundry Anda</h5>
  <table class="table text-center my-4">
    <tr>
      <td>Nama</td>
      <td>:</td>
      <td><?= $result['nama'];?></td>
    </tr>
    <tr>  
      <td>Tanggal</td>
      <td>:</td>
      <td><?= $result['tanggal'];?></td>
    </tr>
    <tr>
      <td>Jenis</td>
      <td>:</td>
      <td><?= $result['jenis'];?></td>
    </tr>
    <tr>
      <td>Berat</td>
      <td>:</td>
      <td><?= $result['berat'];?> Kg</td>
    </tr>
    <tr>
      <td>Status</td>
      <td>:</td>
      <td><mark class="<?= $bgstat;?>"><?= $result['status'];?></mark></td>
    </tr>
    <tr>
      <td>Harga</td>
      <td>:</td>
      <td>Rp. <?= $result['harga'];?></td>
    </tr>
  </table>
</div>