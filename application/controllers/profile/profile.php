<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Model_produk');
        $info = $this->load->model('Model_profile');
    }
    
    public function index()
    {
        redirect('profile/Data');
       
    }
    

    public function data()
    {
        $heading = "Data";
        $menu = $this->Model_produk->menuProfile();
        $cekalamat = $this->Model_profile->checkAlamat();
        if($cekalamat == true){
            $id = $this->Model_profile->lihatData();
        }else{
            $id = $this->Model_profile->kodeAlamat();
        }
        $ca = $this->Model_profile->checkAlamat();
       

        $this->load->view('templates/head');
        $this->load->view('templates/topbar');
        $this->load->view('templates/profile/sidebar', compact('heading','menu'));
        $this->load->view('profile/data',compact('id','ca'));
        $this->load->view('templates/footer');
    }



    public function checkdata()
    {
        
        // alamat
        $id = $this->input->post('id');
        $provinsi = $this->input->post('provinsi');
        $kota = $this->input->post('kota');
        $kecamatan = $this->input->post('kecamatan');
        $deskel = $this->input->post('deskel');
        $pos = $this->input->post('pos');

        // infouser
        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $tgllahir = $this->input->post('tgllahir');
        $email = $this->input->post('email');
        $hp = $this->input->post('hp');
        $gender = $this->input->post('gender');
        
        // verifikasi
        $password = $this->input->post('password');

        $resultinfo = $this->Model_profile->insertData($kode,$nama,$tgllahir,$email,$hp,$gender,$password,$id,$provinsi,$kota,$kecamatan,$deskel,$pos);
        
    }
}