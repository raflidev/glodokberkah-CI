

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
        <?php
           if($this->session->flashdata()){?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('bayar') ?>
            <?= $this->session->flashdata('fatal_error') ?>
          
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php }
          ?>
      <div class="row">
      <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Kode Transaksi</th>
      <th scope="col">Rekening</th>
      <th scope="col">Metode Pembayaran</th>
      <th scope="col">Total</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>

  <?php
  
  $no =1;
  foreach ($tampil as $row) {?>
    <tr>
      <th scope="row"><?= $no++ ?></th>
      <td><?= $row['kode_transaksi'] ?></td>
      <td><?= $row['rekening'] ?></td>
      <td><?= $row['nama'] ?></td>
      <td>Rp.<?= number_format($row['total_biaya']+$row['kode_unik']+$row['ongkir']) ?></td>
      <td>
      
      <a class='badge badge-warning'  href="<?= base_url() ?>profile/pembelian/bayar/<?= $row['kode_transaksi'] ?>">Bayar</a>
      
      </td>
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
