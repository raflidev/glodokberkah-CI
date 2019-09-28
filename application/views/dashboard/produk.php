

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $heading ?></h1>
        <?php
           if($this->session->flashdata()){?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          Barang sudah <strong>
            <?= $this->session->flashdata('check_yes') ?>
            <?= $this->session->flashdata('hapus') ?>
            <?= $this->session->flashdata('update') ?>
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
      <a class='btn btn-primary mb-2' href="<?= base_url() ?>dashboard/Produk/add/">Tambah produk</a>
     
      <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Merk</th>
      <th scope="col">Kategori</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>

  <?php
  
  $no =1;
  foreach ($tampil as $row) {?>
    <tr>
      <th scope="row"><?= $no++ ?></th>
      <?php if($row['stok'] > 0 ){?>
      <td><?= $row['nama_barang'] ?></td>
      <?php }else{ ?>
      <td><b ><?= $row['nama_barang'] ?> <i class='text-danger'>(stok barang habis)</i></b></td>
        <?php } ?>
      <td><?= $row['merk'] ?></td>
      <td><?= $row['kategori'] ?></td>
      <td>
      
      <a class='badge badge-success' href="<?= base_url() ?>dashboard/Produk/edit/<?= $row['kode_barang'] ?>">Edit</a>
      <a class='badge badge-danger'  onclick="return confirm('yakin akan dihapus?');" href="<?= base_url() ?>dashboard/Produk/hapus/<?= $row['kode_barang'] ?>">Hapus</a>
      
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
