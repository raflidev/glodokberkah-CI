

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $heading ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>
        <?= form_open_multipart('profile/pembelian/check') ?>
                <label>Upload bukti pembayaran</label>
      <div class="row">
      <input type="hidden" name="kode" value="<?= $kode ?>">
            <div class="col-6 mb-2">
                <input type="file" name='gambar' id='gambar' class="form-control" placeholder="gambar"  required >
            </div>
            <div class="col-6 mb-2">
                <button type="submit" class='btn btn-primary'>Submit</button>
            </div>
        <?= form_close() ?>
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
    
      
      <!-- </td> -->
    </tr>
  <?php } ?>
  <tr>
  <th></th><th></th><th></th>
  <th>
  Total
  </th>
  <th>
  Rp.<?= number_format($row['total_biaya']+$row['kode_unik']+$row['ongkir']) ?>
  </th>
  </tr>
      <!-- <a class='badge badge-success' href="<?= base_url() ?>dashboard/Transaksi/lunas/<?= $row['kode_transaksi'] ?>">lunas</a> -->
      <!-- <a class='badge badge-warning'  onclick="return confirm('yakin sudah lunas?');" href="<?= base_url() ?>dashboard/Transaksi/lunas/<?= $row['kode_transaksi'] ?>">Lunas</a> -->
  </tbody>
</table>

        </div>
      </div>
    </main>
  </div>
</div>


<!-- End Content -->
