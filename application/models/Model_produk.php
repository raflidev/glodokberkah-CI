<?php
class Model_produk extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }


    function idUser()
    {
        $this->db->select_max('id_user');
        $this->db->from('user');
        $kode = $this->db->get();
        $kode->result_array();

        $noUrut = (int) substr($kode, 1, 4);

        $noUrut++;

        $char = "U";
        $idUser = $char . sprintf("%04s", $noUrut);
 
        return $idUser;
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
        $this->load->database();
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
}
?>