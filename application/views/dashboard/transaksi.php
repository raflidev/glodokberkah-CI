

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $heading ?></h1>
        <?php
          if($this->session->flashdata('lunas')){?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          Barang <strong>
            <?= $this->session->flashdata('lunas') ?>
          </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php }
          if($this->session->flashdata('bukti_null')){?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Barang <strong>
            <?= $this->session->flashdata('bukti_null') ?>
          </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php }
          ?>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>
      <div class="row">
      <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Kode Transaksi</th>
      <th scope="col">Kode Metode</th>
      <th scope="col">Tanggal pesan</th>
      <th scope="col">Total biaya</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>

  <?php
  if($query->num_rows() > 0 ){
  $no =1;
  foreach ($tampil as $row) {?>
    <tr>
      <th scope="row"><?= $no++ ?></th>
      <td><?= $row['kode_transaksi'] ?></td>
      <td><?= $row['kode_metode'] ?></td>
      <td><?= $row['tgl'] ?></td>
      <td><?= number_format($row['total_biaya']+$row['ongkir']+$row['kode_unik']) ?></td>
      <td>
    
      <a class='badge badge-success' href="<?= base_url() ?>dashboard/Transaksi/detail/<?= $row['kode_transaksi'] ?>">Detail</a>
      <a class='badge badge-warning' href="<?= base_url() ?>dashboard/Transaksi/bukti/<?= $row['kode_transaksi'] ?>">Bukti pembayaran</a>
      <!-- <a class='badge badge-warning'  onclick="return confirm('yakin sudah lunas?');" href="<?= base_url() ?>dashboard/Transaksi/lunas/<?= $row['kode_transaksi'] ?>">Lunas</a> -->
      
      </td>
    </tr>
  <?php } }else{ ?>
    <tr>
    <td colspan='5' class='text-center'><b>Transaksi kosong!</b></td>
    </tr>
    <?php }?>
  </tbody>
</table>
        </div>
      </div>
    </main>
  </div>
</div>


<!-- End Content -->
