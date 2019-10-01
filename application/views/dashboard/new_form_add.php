
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
    <?= form_open_multipart('dashboard/Produk/check') ?>

        <div class="row">

                <div class="col-2">
                    <label>Kode Barang</label>
                    <input type="text" name='kode' value="<?= $kodebarang ?>" class="form-control" required readonly>
                </div>
                <div class="col-7">
                <label>Nama Barang</label>
                <input type="text" name='nama' class="form-control" placeholder="Nama Barang" required >
            </div>

            <div class="col-3">
                <label>Merk</label>
                <input type="text" name='merk' class="form-control" placeholder="Merk" required >
            </div>
            <div class="col-6">
                <label>Kategori Utama</label>
                <select name='kategori_utama' class="form-control">
                    <option selected>Pilih salah satu...</option>
                    <option>Elektronik</option>
                    <option>Pakaian</option>
                    <option>Gadget</option>
                    <option>Aksesoris</option>
                </select>
            </div>
            <div class="col-6">
                <label>Kategori</label>
                <input type="text" name='kategori' class="form-control" placeholder="Kategori"required >
            </div>
            <div class="col-6">
                <label>Harga Beli</label>
                <input type="text" name='harga_beli' class="form-control" placeholder="Harga Beli"required >
            </div>
            <div class="col-6">
                <label>Harga Jual</label>
                <input type="text" name='harga_jual' class="form-control" placeholder="Harga Jual"required >
            </div>
            <div class="col-6">
                <label>Stok</label>
                <input type="number" name='stok' class="form-control" placeholder="Stok"required >
            </div>
            <div class="col-6">
                <label for="">Kondisi</label>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="kondisi" id="exampleRadios1" value="Baru" checked>
            <label class="form-check-label" for="exampleRadios1">
                Baru
            </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="kondisi" id="exampleRadios2" value="Bekas">
                <label class="form-check-label" for="exampleRadios2">
                    Bekas
                </label>
            </div>
            </div>
            
            <div class="col-12">
                <label>Tanggal Produksi</label>
                <input type="date" name='tgl' class="form-control" placeholder="Tanggal Produksi"required >
            </div>
            <div class="col-12">
                <label>Gambar</label>
                <input type="file" name='gambar' id='gambar' class="form-control" placeholder="gambar"  required >
            </div>
            <div class="col-12">
                <label>Deskripsi</label>
                <textarea name='deskripsi' class="form-control"  id="" cols="20" rows="10" require></textarea>
            </div>
        </div>
        <button type="submit" class='btn btn-primary mt-2'>Submit</button>
            <?= form_close() ?>
        </div>
    </div>
    </main>
</div>
</div>


<!-- End Content -->
