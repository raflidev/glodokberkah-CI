<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.min.css">
    <title>Pembayaran</title>
</head>
<body class='bg-light'>
    <div class="container">
        <?php
        // SELECT * FROM `metode` JOIN `detailtransaksi` ON 
        // `detailtransaksi`.`kode_metode`=`metode`.`kode_metode` 
        // WHERE `metode`.`kode_metode` = 'MDR'
       
        
        foreach ($query->result_array() as $row):
            ?>
        <h2 class='text-center mt-5'>Pembayaran pada kode <?= $row['kode_transaksi'] ?></h2>
            <?php 
            $this->db->select('*');
            $this->db->from('metode');
            $this->db->join('detailtransaksi', 'detailtransaksi.kode_metode=metode.kode_metode');
            $this->db->where('metode.kode_metode', $row['kode_metode']);
            $this->db->where('detailtransaksi.kode_transaksi', $row['kode_transaksi']);
            
            $ambil = $this->db->get();
            foreach ($ambil->result_array() as $r):
        ?>
        <div class="mx-5 bg-white shadow-sm rounded border border-light">
                <div class="mt-4 px-5 py-3">
                <h5 class='m-0 pb-0'>Pembayaran via <?= $r['nama'] ?></h5>
                </div>
            <div class="py-5 text-center">
                <img src="<?=base_url()?>assets/img/<?= $r['gambar'] ?>" width="200"><br>
                Jumlah tagihan:
                <h3 >Rp.<?= number_format($r['kode_unik']+$row['total_biaya']) ?></h3>
                Nomor Tagihan:
                <h3 class='text-danger'><?= $r['rekening'] ?></h3>
            </div>
        </div>
        <div class="mx-5 mt-2">
            <a href="<?=base_url()?>" class="btn btn-secondary">< Kembali ke halaman utama</a>
            <a href="<?=base_url()?>profile" class="btn btn-secondary">< Kembali ke profil</a>
        </div>
        <?php endforeach; endforeach;?>
        
    </div>
</body>
</html>