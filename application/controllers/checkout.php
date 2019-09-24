<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class checkout extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Model_produk');
        $info = $this->load->model('Model_profile');
    }

    public function index()
    {
        if($this->session->userdata('ID')){
        }else{
            $this->session->set_flashdata('login_dulu', 'Silakan login terlebih dahulu');
            redirect('login');
        }
        $cekalamat = $this->Model_profile->checkAlamat();
        if($cekalamat == true){
            $id = $this->Model_profile->lihatData();
        }else{
            $id = $this->Model_profile->kodeAlamat();
        }
        $ca = $this->Model_profile->checkAlamat();
        $this->load->view('checkout/index',compact('ca','id'));
    }
}