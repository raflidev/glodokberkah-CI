
<!-- START Sidebar -->
<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">

            <?php
          foreach ($menu as $m => $icon) { ?>
            <li class="nav-item">
            <?php if($m == $heading){ ?>
            <a class="nav-link active" href="<?=base_url() ?>dashboard/<?= $m ?>">
            <?php } else { ?>
            <a class="nav-link"  href="<?=base_url() ?>dashboard/<?= $m ?>">
          <?php } ?>
              <span data-feather="<?= $icon ?>"></span><?= $m ?></a>
          </li>
          <?php } ?>
          <!-- <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="file"></span>
              Orders
            </a>
          </li> -->
        </ul>

      
      </div>
    </nav>
  </div>
