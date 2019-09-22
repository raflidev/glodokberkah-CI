
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Glodokberkah</a>
  <input class="ml-2 p-3 form-control form-control-dark" type="text" placeholder="Search" aria-label="Search">
  
  <!-- <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      
      <a class="nav-link" href="#">Sign out</a>
    </li>
  </ul> -->
  
  <div class="btn-group mx-2">
            <button type="button" class="btn btn-sm btn-outline-secondary"><i data-feather="shopping-cart"> </i></button>
            <button type="button" class="btn btn-sm btn-outline-secondary" disabled> <span class="badge badge-danger">4</span></button>
          </div>
<?php

if($this->session->userdata('LEVEL') == '1'){?>
<div class="btn-group mx-2">
          <a href='dashboard' class="btn btn-sm btn-outline-secondary">Dashboard</a>
          <a href='login/logout' class="btn btn-sm btn-outline-secondary">Logout</a>
        </div>
<?php

}

if($this->session->userdata('LEVEL') == '2'){?>
  <div class="btn-group mx-2">
            <a href='profile' class="btn btn-sm btn-outline-secondary">Profile</a>
            <a href='login/logout' class="btn btn-sm btn-outline-secondary">Logout</a>
          </div>
  <?php

} else {?>
<div class="btn-group mx-2">
          <a href='login' class="btn btn-sm btn-outline-secondary">Login</a>
          <a href='register' class="btn btn-sm btn-outline-secondary">Register</a>
        </div>
<?php
}
?>
</nav>