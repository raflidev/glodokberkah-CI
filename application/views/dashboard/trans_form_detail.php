

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $heading ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          
          </div>
        </div>
      </div>
      <div class="row">
      <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama barang</th>
      <th scope="col">Gambar</th>
      <th scope="col">Jumlah</th>
      <th scope="col">harga</th>
      <!-- <th scope="col">Aksi</th> -->
    </tr>
  </thead>
  <tbody>

  <?php
  
  $no =1;
  foreach ($tampil as $row) {?>
    <tr>
      <th scope="row"><?= $no++ ?></th>
      <td><?= $row['nama_barang'] ?></td>
      <td><img width='100' height='100' class='img-thumbnail' src="<?= base_url()?>assets/img/<?= $row['gambar'] ?>"></td>
      <td><?= $row['jumlah'] ?></td>
      <td>Rp.<?= number_format($row['harga_jual']*$row['jumlah']) ?></td>
      <!-- <td> -->
    
      <!-- <a class='badge badge-success' href="<?= base_url() ?>dashboard/Transaksi/lunas/<?= $row['kode_transaksi'] ?>">lunas</a> -->
      <!-- <a class='badge badge-warning'  onclick="return confirm('yakin sudah lunas?');" href="<?= base_url() ?>dashboard/Transaksi/lunas/<?= $row['kode_transaksi'] ?>">Lunas</a> -->
      
      <!-- </td> -->
    </tr>
  <?php } ?>
  </tbody>
</table>

        </div>
      </div>
    </main>
  </div>
</div>


<!-- End Content -->
