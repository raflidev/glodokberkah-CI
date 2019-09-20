<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {
    public function __construct()
    {
    parent::__construct();
    $this->load->database();
    $this->load->model('Model_produk');
    }

    public function index()
    {
        $heading = 'Register page';

        $id = $this->Model_produk->idUser();

    if($this->session->userdata('login_status'))
    {
        redirect('dashboard');
    }

        $this->load->helper('form');
        
        $this->load->view('templates/head');
        $this->load->view('produk/register',
        compact('heading','id'));
        $this->load->view('templates/footer');
    }
    
    public function check()
    {
        $kode = $this->input->post('kode');
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        $pass2 = $this->input->post('password2');
        $result = $this->Model_produk->register($kode,$user,$pass,$pass2);
        
        return $result;
    }
}