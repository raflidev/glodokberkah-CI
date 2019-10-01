
 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <div class="card-body">
      <?php
           if($this->session->flashdata()){?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('profile') ?>
            <?= $this->session->flashdata('password') ?>
            <?= $this->session->flashdata('alamat') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php }

          ?>
                        <h3>Profile data</h3>
<form action='<?= site_url('profile/data/checkdata') ?>' method='post'>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label >ID</label>
                        <input type="text" name='kode' value="<?= $this->session->userdata('ID'); ?>" class="form-control mb-3" placeholder="Username" required readonly>
                        </div>
                        
                    </div>
                        <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="nama" name='nama'  value="<?= $id['nama'] ?>"class="form-control mb-3" placeholder="Nama Lengkap" required> 
                        </div>
                        <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name='tgllahir' value="<?= $id['tgl_lahir'] ?>" class="form-control mb-3" placeholder="Tanggal Lahir" required>
                        </div>
                        <div class="form-group">
                        <label>E-mail Address</label>
                        <input type="email" name='email' value="<?= $id['email'] ?>" class="form-control mb-3" placeholder="E-mail Address" required>
                        </div>

                        <div class="form-group">
                        <label>No Handphone</label>
                        <input type="number" value="<?= $id['no_hp'] ?>" name='hp' class="form-control mb-3" placeholder="No Handphone" required>
                        </div>

                    <div class="form-group">
                        <label >Gender :</label>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender"  value="Laki-Laki" required>
                        <label class="form-check-label">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="Perempuan">
                        <label class="form-check-label" >Female</label>
                        </div>
                    </div>
                    <h3>Alamat</h3>
                    <div class="form-row">
                <div class="form-group col-md-3">
                <label >Kode</label>
                <input type="text" name='id' value="<?php if($ca == "true"){ echo $id['kode_alamat']; }else{ echo $this->Model_profile->kodeAlamat(); } ?>" class="form-control mb-3" placeholder="Username" required readonly>
                </div>

                <div class="form-group col-md-9">
                <label>Provinsi</label>
                <input type="text" value="<?php
        if($ca == true){ echo $id['provinsi']; }?>" name='provinsi' class="form-control mb-3" placeholder="Provinsi" required> 
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6">
                <label>Kota</label>
                <input type="text" value="<?php
        if($ca == true){ echo $id['kota']; }?>"   name='kota' class="form-control mb-3" placeholder="Kota" required>
                </div>

                <div class="form-group col-6">
                <label>Kecamatan</label>
                <input type="text" value="<?php
        if($ca == true){ echo $id['kecamatan']; }?>"   name='kecamatan' class="form-control mb-3" placeholder="Kecamatan" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-8">
                <label>Desa/Kelurahan</label>
                <input type="text" value="<?php
        if($ca == true){ echo $id['deskel']; }?>"  name='deskel' class="form-control mb-3" placeholder="Desa/Kelurahan" required>
                </div>

                <div class="form-group col-4">
                <label>Kode pos</label>
                <input type="number" value="<?php
        if($ca == true){ echo $id['kode_pos']; }?>"   name='pos' class="form-control mb-3" placeholder="Kode pos" required>
                </div>
            </div>
                    <div class="form-group">
                        <label>Silakan konfirmasi password sebelum menyimpan data!</label>
                        <input type="password" name='password' class="form-control mb-3" placeholder="Konfirmasi Password" required>
                        </div>
                    <input type="submit" class='btn btn-primary form-control mt-2' name='submit' value="Save Changes">
                </form>
</div></div>
</div>
        </div>
</main>