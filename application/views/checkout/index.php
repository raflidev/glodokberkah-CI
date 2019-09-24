
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Checkout example · Bootstrap</title>

    <!-- Bootstrap core CSS -->

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">

    </head>
<body class="bg-light">
    <div class="container">
  <div class="py-5 text-center">
    <h2>Checkout form</h2>
    <p class="lead">Silakan isi data diri anda dan pilih metode pembayaran</p>
  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill">
        <?php
              $cart = 0;
              foreach ($this->session->userdata('barang') as $key => $value) {
                $cart+=$value;
              }
              echo $cart; ?>
        </span>
      </h4>
      <ul class="list-group mb-3">
          <?php 
          $total=0;
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
        </li>

          <?php 
        $total+=$subharga;
        endforeach;
      endforeach; 
      ?>
      <li class="list-group-item d-flex justify-content-between">
        <span>Total (IDR)</span>
        <strong>Rp.<?= number_format($total) ?></strong>
      </li>
        
      </ul>

      <form class="card p-2">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Promo code">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <form class="needs-validation" novalidate>
        <div class="row">
          <div class="col-md-6">
            <label for="firstName">First name</label>
            <input type="text" value="<?php
        if($ca == true){ echo $id['nama']; }?>" class="form-control" id="firstName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          
          <div class="col-md-6 mb-3">
              <label for="username">Username</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text">@</span>
                    </div>
                    <input type="text" value="<?php
        if($ca == true){ echo $this->session->userdata('USER'); }?>" class="form-control" id="username" placeholder="Username" required>
                    <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
            </div>
        </div>
    </div>
</div>
    
        <div class="mb-3">
          <label for="email">Email </label>
          <input type="email"  value="<?php
        if($ca == true){ echo $id['email']; }?>"class="form-control" id="email" placeholder="you@example.com">
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
       
        </div>
        
        <hr class="mb-4">

        <h4 class="mb-3">Payment</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="credit">Alfamart</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="debit">Gopay</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="paypal">Ovo</label>
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
