

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
        </div>

        </div>
      </div>
      <div class="row">
      <div class="col-12">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
            <div class="row">
            <div class="col-3">
                <img class='img-thumbnail m-2' src="<?= base_url() ?>assets/img/<?=  $konten['gambar'] ?>" alt="">
            </div>
            <div class="col-9">
                <h1 class="display-4"><?= $konten['nama_barang'] ?></h1>
                <p class='lead'> <?= $konten['merk'] ?></p>
                <p class="lead text-danger ">
                IDR <?= number_format($konten['harga_jual']) ?></p> 
            </div>
            </div>
            </div>
            <div class="col-12">
                <a href="<?= base_url() ?>produk/add/<?= $konten['kode_barang'] ?>" class="btn btn-block  btn-primary">Buy Now! 
                
                  <span data-feather="shopping-cart"></span></a>
            <textarea class="form-control" rows="10" disabled>
            <?= $konten['deskripsi'] ?>
            </textarea>
            </div>
        </div>
      </div>
        
   
        </div>
      </div>
    </main>
  </div>
</div>


<!-- End Content -->
