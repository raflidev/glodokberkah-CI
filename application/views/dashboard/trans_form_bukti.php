
<?php
 if($this->session->userdata("LEVEL") == "2")
 {   
     $this->session->set_flashdata('akses','tidak memiliki akses' );
     redirect('produk');
 }
?>
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $heading ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
        <img src="<?= base_url() ?>assets/img/pembayaran/<?= $tampil['bukti'] ?>" width='500' alt="" srcset="">
        </div>
        <br>
        </div>
      </div>
      <div class="mt-3">
        <a class='btn btn-primary' target="_blank" href="<?= base_url() ?>assets/img/pembayaran/<?= $tampil['bukti'] ?>">Lihat lebih jelas</a>
        <a class='btn btn-warning' onclick="return confirm('yakin sudah lunas?');" href="<?= base_url() ?>dashboard/Transaksi/lunas/<?= $tampilkode['kode_transaksi'] ?>">Lunas?</a>
      </div>
    </main>
  </div>
</div>


<!-- End Content -->
