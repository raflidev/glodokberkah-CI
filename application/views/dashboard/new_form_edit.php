

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
    <?= form_open_multipart('dashboard/Produk/checkedit') ?>

        <div class="row">

                <div class="col-3">
                    <label>Kode Barang</label>
                    <input type="text" name='kode' value="<?= $kode ?>" class="form-control" required readonly>
                </div>
                <div class="col-9">
                <label>Nama Barang</label>
                <input type="text" name='nama' value="<?= $row['nama_barang'] ?>" class="form-control" placeholder="Nama Barang" required >
            </div>

            <div class="col-6">
                <label>Merk</label>
                <input type="text" name='merk' value="<?= $row['merk'] ?>"class="form-control" placeholder="Merk" required >
            </div>
            <div class="col-6">
                <label>Kategori</label>
                <input type="text" name='kategori' value="<?= $row['kategori'] ?>" class="form-control" placeholder="Kategori"required >
            </div>
            <div class="col-6">
                <label>Harga Beli</label>
                <input type="text" name='harga_beli' value="<?= $row['harga_beli'] ?>" class="form-control" placeholder="Harga Beli"required >
            </div>
            <div class="col-6">
                <label>Harga Jual</label>
                <input type="text" name='harga_jual' value="<?= $row['harga_jual'] ?>" class="form-control" placeholder="Harga Jual"required >
            </div>
            <div class="col-6">
                <label>stok</label>
                <input type="number" name='stok' value="<?= $row['stok'] ?>" class="form-control" placeholder="stok"required >
            </div>
            
            <div class="col-6">
                <label>Tanggal Produksi</label>
                <input type="date" name='tgl' value="<?= $row['tgl_produksi'] ?>" class="form-control" placeholder="Tanggal Produksi"required >
            </div>
            <div class="col-2">
                <label>Gambar</label>
                <img class='img-thumbnail' src="<?= base_url()?>assets/img/<?= $row['gambar'] ?>" alt="" srcset="">
            </div>
            <div class="col-10">
                <label></label>
                <input type="file" name='gambar' id='gambar' class="form-control" placeholder="gambar"  >
            </div>
            <div class="col-12">
                <label>Deskripsi</label>
                <textarea name='deskripsi' class="form-control" id="" cols="20" rows="10" require><?= $row['deskripsi'] ?></textarea>
            </div>
        </div>
        <button type="submit" class='btn btn-primary mt-2'>Simpan Perubahan</button>
            <?= form_close() ?>
        </div>
    </div>
    </main>
</div>
</div>


<!-- End Content -->
