
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?= base_url() ?>">Glodokberkah</a>
  <input class="ml-2 p-3 form-control form-control-dark" type="text" placeholder="Search" aria-label="Search">
  
  <!-- <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      
      <a class="nav-link" href="#">Sign out</a>
    </li>
  </ul> -->
  <?php if($this->session->userdata('LEVEL') != '1'){?>
  <div class="btn-group mx-2">
            <a  href="<?=base_url()?>checkout" class="btn btn-sm btn-outline-secondary"><i data-feather="shopping-cart"></i></a>
            <button type="button" class="btn btn-sm btn-outline-secondary" disabled> <span class="badge badge-danger">
              <?php
              $cart = 0;
              if($this->session->userdata('barang')){

                foreach ($this->session->userdata('barang') as $key => $value) {
                  $cart+=$value;
                }
                echo $cart; 
              }else{
                echo 0;
              }
                ?>
            
            </span></button>
          </div>
<?php
  }
if($this->session->userdata('LEVEL') == '1'){?>
<div class="btn-group mx-2">
          <a href='<?= base_url() ?>dashboard' class="btn btn-sm btn-outline-secondary">Dashboard</a>
          <a href='<?= base_url() ?>login/logout' class="btn btn-sm btn-outline-secondary">Logout</a>
        </div>
<?php
} else if($this->session->userdata('LEVEL') == '2'){?>
  <div class="btn-group mx-2">
            <a href='<?= base_url() ?>profile' class="btn btn-sm btn-outline-secondary">Profile</a>
            <a href='<?= base_url() ?>login/logout' class="btn btn-sm btn-outline-secondary">Logout</a>
          </div>
  <?php

} else {?>
<div class="btn-group mx-2">
          <a href='<?= base_url() ?>login' class="btn btn-sm btn-outline-secondary">Login</a>
          <a href='<?= base_url() ?>register' class="btn btn-sm btn-outline-secondary">Register</a>
        </div>
<?php
}
?>
</nav>