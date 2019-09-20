
<!-- START Sidebar -->
<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          
          <?php
          foreach ($menu as $m => $icon) { ?>
          <li class="nav-item">
            <?php if($heading == $m){ 
             echo '<a class="nav-link active" href="#">';
             } else { 
           echo '<a class="nav-link " href="#">';
            } ?>
              <span data-feather="<?= $icon ?>"></span>
              <?= $m ?> <span class="sr-only">(current)</span>
            </a>
          </li>
        <?php } ?>
          <!-- <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="file"></span>
              Orders
            </a>
          </li> -->
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Kategori</span>
          <a class="d-flex align-items-center text-muted" href="#" disabled>
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <?php
          foreach ($kategori as $k => $icon) { ?>
          <li class="nav-item">
            <a class="nav-link " href="#">
              <span data-feather="<?= $icon ?>"></span>
              <?= $k ?> <span class="sr-only">(current)</span>
            </a>
          </li>
        <?php } ?>
        </ul>
      </div>
    </nav>
  </div>
