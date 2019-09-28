

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $heading ?></h1>
        <?php
           if($this->session->flashdata()){?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('logout') ?>
            <?= $this->session->flashdata('add_produk') ?>
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

        
        <?php
      foreach ($konten as $row ) {
        

          ?>
        <div class="col-md-4 mb-2">
          
          <div class="card" style="width: 18rem;">
              <img src="<?=base_url()?>assets/img/<?= $row['gambar']?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?= $row['nama_barang'] ?></h5>
                <button type="button" class="float-right btn btn-secondary btn-sm mb-1 p-1" disabled><?= $row['kategori'] ?></button>
                <p class='text-danger'>IDR <?= number_format($row['harga_jual']) ?></p>
                <?php if($row['stok'] > 0){ ?>
                <a href="<?= base_url() ?>produk/add/<?= $row['kode_barang'] ?>" class="btn btn-block  btn-primary">Buy Now! 
                  <span data-feather="shopping-cart"></span></a>
                  <?php }else{ ?>
                    <input href="<?= base_url() ?>produk/add/<?= $row['kode_barang'] ?>" class="btn btn-block  btn-secondary" value='Stok Habis!' disabled>
                    <?php } ?>
                </div>
              </div>
            </div>
            
          <?php } ?>
          
        </div>
      </div>
    </main>
  </div>
</div>


<!-- End Content -->
