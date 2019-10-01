<?php
$this->load->model('Model_produk');
$cekalamat = $this->Model_profile->checkAlamat();
if($cekalamat == "true"){
}else{
  $this->session->set_flashdata('alamat', 'tolong lengkapi alamat anda');
  redirect('profile');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Checkout</title>

    <!-- Bootstrap core CSS -->

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
<body class="bg-light">
    <div class="container">
  <div class="py-5 text-center">
    <h2>Checkout form</h2>
    <p class="lead">Silakan isi data diri anda dan pilih metode pembayaran</p>
  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
    <?php
          if($this->session->flashdata('delete_produk')){?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('delete_produk') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php }
          if($this->session->flashdata('password')){?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('password') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php }
          ?>
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
       
        <span class="badge badge-secondary badge-pill">
        <?php
              $cart = 0;
              if($this->session->userdata('barang')):
              foreach ($this->session->userdata('barang') as $key => $value) {
                $cart+=$value;
              }
            endif;
            echo $cart; 
            ?>
        </span>
      </h4>
      <ul class="list-group mb-3">
          <?php 
          $total=0;
          if($this->session->userdata('barang')){
          foreach ($this->session->userdata('barang') as $key => $value):
            $query = $this->db->query("select * from barang inner join detailbarang on detailbarang.kode_barang = barang.kode_barang where barang.kode_barang = '$key' ");
            foreach($query->result_array() as $row):
              $subharga = $row['harga_jual']*$value;
            ?>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0"><?= $row['nama_barang'] ?></h6>
            <small class="text-muted"><?= $value ?> pcs</small>
          </div>
          <span class="text-muted">Rp.<?= number_format($subharga) ?></span>
          <small class="text-muted float-right pl-2"><a href="<?= base_url()?>/produk/delete/<?= $key ?>">x</a></small>
        </li>

          <?php 
        $total+=$subharga;
            endforeach;
          endforeach;
        }else{ ?>
       <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Keranjang kosong</h6>
          </div>
        <?php } ?>
    
        </li>
      <form action='<?= site_url('produk/checkout') ?>' method='post'>
      <li class="list-group-item d-flex justify-content-between">
        <span>Total (IDR)</span>
        <strong >Rp.<?= number_format($total) ?></strong>
        <input type="hidden" value="<?= $total ?>" name="total">
      </li>
      </ul>
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <!-- <form class="needs-validation" novalidate> -->
        <div class="row">
          <div class="col-md-6">
            <label for="firstName">Nama lengkap</label>
            <input type="text" value="<?php
        if($ca == true){ echo $id['nama']; }?>" class="form-control" id="firstName" placeholder="" value="" required readonly>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>

        <input type="hidden" value="<?php
    if($ca == true){ echo $id['kode_alamat']; }?>" name='id' class="form-control" id="firstName" placeholder="" value="" required readonly>
          
          <div class="col-md-6 mb-3">
              <label for="username">Username</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text">@</span>
                    </div>
                    <input type="text" value="<?php
        if($ca == true){ echo $this->session->userdata('USER'); }?>" class="form-control" name="username" placeholder="Username" required readonly>
                    <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
            </div>
        </div>
    </div>
</div>
    
        <div class="mb-3">
          <label for="email">Email </label>
          <input type="email"  value="<?php
        if($ca == true){ echo $id['email']; }?>"class="form-control" name="email" placeholder="you@example.com" readonly>
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="row">

            <div class="col-md-6">
                <label>Provinsi</label>
                <input type="text" value="<?php
        if($ca == true){ echo $id['provinsi']; }?>" name='provinsi' class="form-control mb-3" placeholder="Provinsi" required> 
                </div>
                
                <div class="col-md-6">
                    <label>Kota</label>
                    <input type="text" value="<?php
        if($ca == true){ echo $id['kota']; }?>"   name='kota' class="form-control mb-3" placeholder="Kota" required>
                </div>
            </div>
            <div class="row">

                <div class="col-md-4">
                    <label>Kecamatan</label>
                    <input type="text" value="<?php
        if($ca == true){ echo $id['kecamatan']; }?>"   name='kecamatan' class="form-control mb-3" placeholder="Kecamatan" required>
                </div>
                
                
                <div class="col-md-4">
                    <label>Desa/Kelurahan</label>
                    <input type="text" value="<?php
        if($ca == true){ echo $id['deskel']; }?>"  name='deskel' class="form-control mb-3" placeholder="Desa/Kelurahan" required>
            </div>
                
                
                <div class="col-md-4">
                    <label>Kode pos</label>
                    <input type="number" value="<?php
        if($ca == true){ echo $id['kode_pos']; }?>"   name='pos' class="form-control mb-3" placeholder="Kode pos" required>
                </div>

                <div class="col-md-12">
                        <label>Silakan konfirmasi password sebelum menyimpan data!</label>
                        <input type="password" name='password' class="form-control mb-3" placeholder="Konfirmasi Password" required>
                </div>
       
        </div>
        
        <hr class="mb-4">

        <h4 class="mb-3">Payment</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input  id='mandiri' value="MDR" name="paymentMethod" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="mandiri" >Transfer
            <br>
            <img src="<?=base_url()?>/assets/img/mandiri.png" width='200'>
            </label>
          </div>
          <div class="custom-control custom-radio">
            <input   id='gopay' name="paymentMethod" value="GPY" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="gopay">Gopay
            <br>
            <img src="<?=base_url()?>/assets/img/gopay.png" width='200'>
            </label>
          </div>
          <div class="custom-control custom-radio">
            <input id='ovo' value="OVO"
            name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="ovo">Ovo
            <br>
            <img src="<?=base_url()?>/assets/img/ovo.png" width='200'>
            </label>
          </div>
        </div>
   
        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
      </form>
    </div>
  </div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2019 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>
</html>
