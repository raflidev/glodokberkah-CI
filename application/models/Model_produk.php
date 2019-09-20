<?php
class Model_produk extends CI_Model{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
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
        $this->db->from('admin');
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $this->db->limit(1);

        $query = $this->db->get();
        if($query->num_rows() == 1){
            return $query->result();
        }else{
            return false;
        }
    }

    function register($kode,$user,$pass,$pass2)
    {
        if($pass == $pass2){
            
            $data= array(
                'id_user' => $kode,
                'username' => $user,
                'password' => $pass2,
                'status_user' => '2'
            );
            
            $this->db->insert('user', $data);

        }else{
            echo 'tidak';
        }
    }
}
?>