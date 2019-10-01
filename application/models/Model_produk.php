<?php
class Model_produk extends CI_Model{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    //produk
    function menu()
    {
       $menu = array(
            'Etalase' => 'grid',
            'Populer' => 'trending-up'
    );
    return $menu;
    }

    function menuProfile()
    {
        $menu = array(
            'Data' => 'clipboard',
            'Pembelian' => 'shopping-bag',
            'Logout' => 'log-out'
    );
    return $menu;
    }


    function kategori()
    {
        $kategori = array(
            'Pakaian' => 'package',
            'Elektronik' => 'monitor',
            'Gadget' => 'smartphone',
            'Aksesoris' => 'watch'
    );
    return $kategori;
    }

    //dashboard
    function menuDashboard()
    {
        $menu = array(
            'Produk' => 'archive',
            'Admin' => 'user',
            'Transaksi' => 'dollar-sign'
    );
        return $menu;
    }
    function idUser()
    {
        $this->db->select('right(user.id_user,2) as id_user', FALSE);
        $this->db->order_by('id_user','DESC');
        $this->db->limit(1);
        $this->db->from('user');
        $queryuser = $this->db->get();
        
        if($queryuser->num_rows() <> 0)
        {
            //cek code
            $data = $queryuser->row();
            $kode = intval($data->id_user) + 1;    
        }
        else
        {
            $kode =1;
        }

        $batas = str_pad($kode,4,"0", STR_PAD_LEFT);
        $kodetampil = "U".$batas;
        return $kodetampil;
    }

    function tampilkodebarang()
    {
        $this->db->select('right(detailbarang.kode_barang,2) as kode_barang', FALSE);
        $this->db->order_by('kode_barang','DESC');
        $this->db->limit(1);
        $this->db->from('detailbarang');
        $queryuser = $this->db->get();
        
        if($queryuser->num_rows() <> 0)
        {
            //cek code
            $data = $queryuser->row();
            $kode = intval($data->kode_barang) + 1;    
        }
        else
        {
            $kode =1;
        }

        $batas = str_pad($kode,2,"0", STR_PAD_LEFT);
        $kodetampil = "K02B".$batas;
        return $kodetampil;
    }

    function tampilProduk()
    {
        $this->db->select('*');
        $this->db->from('detailbarang');
        $this->db->join('barang','barang.kode_barang=detailbarang.kode_barang');
        $query = $this->db->get();
        return $query->result_array();
    }
    function tampilProdukpakaian()
    {
        $this->db->select('*');
        $this->db->from('detailbarang');
        $this->db->join('barang','barang.kode_barang=detailbarang.kode_barang');
        $this->db->like('detailbarang.kategori_utama' , 'pakaian');
        $query = $this->db->get();
        return $query->result_array();
    }
    function tampilProdukgadget()
    {
        $this->db->select('*');
        $this->db->from('detailbarang');
        $this->db->join('barang','barang.kode_barang=detailbarang.kode_barang');
        $this->db->like('detailbarang.kategori_utama' , 'gadget');
        $query = $this->db->get();
        return $query->result_array();
    }
    function tampilProdukelektronik()
    {
        $this->db->select('*');
        $this->db->from('detailbarang');
        $this->db->join('barang','barang.kode_barang=detailbarang.kode_barang');
        $this->db->like('detailbarang.kategori_utama' , 'elektronik');
        $query = $this->db->get();
        return $query->result_array();
    }
    function tampilProdukaksesoris()
    {
        $this->db->select('*');
        $this->db->from('detailbarang');
        $this->db->join('barang','barang.kode_barang=detailbarang.kode_barang');
        $this->db->like('detailbarang.kategori_utama' , 'aksesoris');
        $query = $this->db->get();
        return $query->result_array();
    }
    function tampilProdukpopuler()
    {
        $this->db->select('*');
        $this->db->from('detailbarang');
        $this->db->join('barang','barang.kode_barang=detailbarang.kode_barang');
        $this->db->order_by('barang.terjual', "DESC");
        $query = $this->db->get();
        return $query->result_array();
    }

    function login($username, $password)
    { 
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username',$username);
        $query = $this->db->get();
        if ($query->num_rows() === 1)
         {
            $row = $query->row_array();
            if(password_verify($password,$row['password']))
            {
                $sess_array = array(
                    'ID' => $row['id_user'],
                    'USER' => $row['username'],
                    'LEVEL' => $row['status_user'],
                    'login_status' => 'true',
                );
                $this->session->set_userdata($sess_array);
                if($this->session->userdata('status_user') == '1')
                    {
                        redirect('dashboard','refresh');
                    }else{
                        redirect('produk','refresh');   
                    }
        }else{
            redirect('login?m=false','refresh');
        } 
    }else{
        redirect('login?m=false','refresh');
    } 
}

    function register($kode,$user,$pass,$pass2)
    {
        if($pass == $pass2){
            
            $data= array(
                'id_user' => $kode,
                'username' => $user,
                'password' => password_hash($pass2,PASSWORD_DEFAULT),
                'status_user' => '2'
            );
            
            $this->db->insert('user', $data);

        }else{
            echo 'tidak';
        }
    }

    function tambahBarang($kodebarang)
    {
        $jmlh=1;
        // $data = array(
        //     'barang' => array(
        //         $kodebarang => 0+$jmlh
        //     )
        // );
        $_SESSION['barang'][$kodebarang]+=$jmlh;
        // $this->session->set_userdata($data);
        $this->session->set_flashdata('add_produk', 'produk sudah ditambahkan');
    }


    function hapusBarang($kodebarang)
    {
        $jmlh=1;
        $_SESSION['barang'][$kodebarang]-=$jmlh;
        
        $this->session->set_flashdata("delete_produk", "produk $kodebarang sudah dihapus");
        if($_SESSION['barang'][$kodebarang] <= 0){
            unset($_SESSION['barang'][$kodebarang]);
        }
    }

    function updateData($id,$provinsi,$kota,$kecamatan,$deskel,$pos,$password,$paymentMethod,$total)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user',$this->session->userdata('ID'));
        $query = $this->db->get();
        if ($query->num_rows() === 1)
         {
            $row = $query->row_array();
            if(password_verify($password,$row['password']))
            {
                $this->db->select('id_user');
                $this->db->from('infouser');
                $this->db->where('kode_alamat', $id);
                $queryverify = $this->db->get();
                if ($queryverify->num_rows() === 1)
                {
                //alamat
                    $this->db->set('provinsi',$provinsi);
                    $this->db->set('kota',$kota);
                    $this->db->set('kecamatan',$kecamatan);
                    $this->db->set('deskel',$deskel);
                    $this->db->set('kode_pos',$pos);
                    $this->db->where('kode_alamat',$id);
                    $this->db->update('alamat');
                    
                // kode transaksi
                $this->db->select('right(transaksi.kode_transaksi,2) as kode_transaksi', FALSE);
                $this->db->order_by('kode_transaksi','DESC');
                $this->db->limit(1);
                $this->db->from('transaksi');
                $queryuser = $this->db->get();
                
                if($queryuser->num_rows() <> 0)
                {
                    //cek code
                    $data = $queryuser->row();
                    $kode = intval($data->kode_transaksi) + 1;    
                }
                else
                {
                    $kode =1;
                }
                $batas = str_pad($kode,4,"0", STR_PAD_LEFT);
                $kodetampil = "T".$batas;
                    

                // transaksi
                if($_SESSION['barang']){
                    $barang = $_SESSION['barang'];
                    }else{
                        $this->session->set_flashdata('barang_kosong','barang belum ada dikeranjang');
                        redirect('produk');
                    }
                    foreach ($barang as $b => $j) {
                        $data = array(
                            'kode_transaksi' => $kodetampil,
                            'kode_barang' => $b,
                            'jumlah' => $j,
                            'id_user' => $this->session->userdata('ID')
                        );
                        $query = $this->db->insert('transaksi', $data);
                    }
                //detail transaksi
                    $kodnik = rand(1111,3333);
                    $date = date('Y-m-d', strtotime("now"));
                    $datat = array(
                        'kode_transaksi' => $kodetampil,
                        'kode_metode' => $paymentMethod,
                        'kode_unik' => $kodnik,
                        'tgl' => $date,
                        'total_biaya' => $total,
                        'ongkir' => 25000,
                        'dibayar' => "N"
                    );
                    $queryt = $this->db->insert('detailtransaksi', $datat);
                    if($query AND $queryt)
                    {
                        $this->session->unset_userdata('barang');
                        redirect('pembayaran');
                    }
                    
                }           
        }else{
            $this->session->set_flashdata('password', 'Password anda salah, mohon ulangi');
            redirect('checkout');
        }
        }
    }

    function ambilinfomasiTransaksi()
    {
        // SELECT * FROM `transaksi` JOIN `detailtransaksi` ON 
        // `transaksi`.`kode_transaksi`=`detailtransaksi`.`kode_transaksi`
        //  WHERE `id_user` = 'U0003' 
        //  ORDER BY `transaksi`.`kode_transaksi` DESC LIMIT 1

        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detailtransaksi', 'transaksi.kode_transaksi=detailtransaksi.kode_transaksi');
        $this->db->limit(1);
        $this->db->order_by('transaksi.kode_transaksi', 'DESC');
        $this->db->where('id_user',$this->session->userdata('ID'));
        return $this->db->get();
    }

    function insertBarang($kode,$nama,$merk,$kategori,$deskripsi)
    {
            
            $data = array(
                'kode_barang' => $kode,
                'nama_barang' => $nama,
                'merk' => $merk,
                'kategori' => $kategori,
                'deskripsi' => $deskripsi
            );
            
            $this->db->insert('detailbarang', $data);
            
    }

}
?>