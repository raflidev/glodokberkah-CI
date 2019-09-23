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
            echo "Data <a href='profile/data'>Disini</a>";
        }else{
            echo "Sebelum berbelanja, sebaiknya anda mengisi alamat anda <a href='profile/data'>Disini</a>";
            
        }
    }


    function kodeAlamat()
    {
        $this->db->select('right(alamat.kode_alamat,2) as kode_alamat', FALSE);
        $this->db->order_by('kode_alamat','DESC');
        $this->db->limit(1);
        $this->db->from('alamat');
        $queryuser = $this->db->get();
        
        if($queryuser->num_rows() <> 0)
        {
            //cek code
            $data = $queryuser->row();
            $kode = intval($data->kode_alamat) + 1;    
        }
        else
        {
            $kode =1;
        }
        $batas = str_pad($kode,4,"0", STR_PAD_LEFT);
        $kodetampil = "A".$batas;
        return $kodetampil;
    }

    

    function checkAlamat()
    {
        $this->db->select('kode_alamat');
        $this->db->from('infouser');
        $this->db->where('id_user',$this->session->userdata('ID'));
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }

    }

    function lihatData()
    {
        $this->db->select('*');
        $this->db->from('infouser');
        $this->db->join('alamat', 'alamat.kode_alamat = infouser.kode_alamat');
        $this->db->where('id_user',$this->session->userdata('ID'));
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->row_array();
        }else{
            return false;
        }
    }


    function insertData($kode,$nama,$tgllahir,$email,$hp,$gender,$password,$id,$provinsi,$kota,$kecamatan,$deskel,$pos)
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
                    $this->db->set('alamat.provinsi',$provinsi);
                    $this->db->set('alamat.kota',$kota);
                    $this->db->set('alamat.kecamatan',$kecamatan);
                    $this->db->set('alamat.deskel',$deskel);
                    $this->db->set('alamat.kode_pos',$pos);
                    $this->db->where('alamat.kode_alamat',$id);
                    $this->db->update('alamat');

                    $this->db->set('infouser.nama',$nama);
                    $this->db->set('infouser.tgl_lahir',$tgllahir);
                    $this->db->set('infouser.jk',$gender);
                    $this->db->set('infouser.no_hp',$hp);
                    $this->db->set('infouser.email',$email);
                    $this->db->where('infouser.kode_alamat',$id);
                    $this->db->update('infouser');
                    
                }
                else
                {
                    $dataAlamat = array(
                        'kode_alamat' => $id,
                        'provinsi' => $provinsi,
                        'kota' => $kota,
                        'kecamatan' => $kecamatan,
                        'deskel' => $deskel,
                        'kode_pos' => $pos
                    );

                    $dataProfil= array(
                        'id_user' => $kode,
                        'nama' => $nama,
                        'kode_alamat' => $id,
                        'tgl_lahir' => $tgllahir,
                        'email' => $email,
                        'no_hp' => $hp,
                        'jk' => $gender
                );
                $this->db->insert('alamat',$dataAlamat);
                $this->db->insert('infouser',$dataProfil);
                }
            }
        }
      
    }
}