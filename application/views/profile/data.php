<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap.min.css">
    <title>Data</title>
</head>
<body class='bg-white'>
<main role="main" class="px-4 mt-4 ">
        <div class="card mx-auto" style="width: 40rem;">
        
                <div class="card-body">
                        <h3>Profile data</h3>
<form action='<?= site_url('profile/checkdata') ?>' method='post'>
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
                <input type="text" name='id' value="<?= $id['kode_alamat'] ?>" class="form-control mb-3" placeholder="Username" required readonly>
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
</body>
</html>