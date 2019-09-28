<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Model_produk');
        $info = $this->load->model('Model_profile');
    }
    public function index()
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
}