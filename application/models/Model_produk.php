<?php
class Model_produk extends CI_Model{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function menu()
    {
       $menu = array(
            'Etalase' => 'grid',
            'Sedang Populer' => 'trending-up',
            'Diskon' => 'dollar-sign'
    );
    return $menu;
    }

    function kategori()
    {
        $kategori = array(
            'Pakaian' => 'package',
            'Elektronik' => 'monitor',
            'Gadget' => 'smartphone'
    );
    return $kategori;
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

    function tampilProduk()
    {
        $this->db->select('*');
        $this->db->from('detailbarang');
        $this->db->join('barang','barang.kode_barang=detailbarang.kode_barang');
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
                        redirect('profile','refresh');   
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
        redirect('produk');
    }
}
?>