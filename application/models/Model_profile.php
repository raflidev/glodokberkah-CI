<?php
class Model_profile extends CI_Model{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function checkInfo()
    {
        $this->db->select('*');
        $this->db->from('infouser');
        $this->db->where('id_user',$this->session->userdata('ID'));

        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }else{
            echo "Sebelum berbelanja, sebaiknya anda mengisi alamat anda";
        }
    }
}