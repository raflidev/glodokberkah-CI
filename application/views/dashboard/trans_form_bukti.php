

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
      <div class="row">
        <img src="<?= base_url() ?>assets/img<?= $tampil['bukti'] ?>" width='800' alt="" srcset="">
        <br>
        <a class='btn btn-warning' onclick="return confirm('yakin sudah lunas?');" href="<?= base_url() ?>dashboard/Transaksi/lunas/<?= $tampilkode['kode_transaksi'] ?>">Lunas?</a>
        </div>
      </div>
    </main>
  </div>
</div>


<!-- End Content -->
