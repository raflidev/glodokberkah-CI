<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
    
    public function index()
    {
        $heading = 'Login page';
    if($this->session->userdata('login_status'))
    {
        redirect('dashboard');
    }

        $this->load->helper('form');
        $this->load->view('templates/head');
        $this->load->view('produk/login',
        compact('heading'));
        $this->load->view('templates/footer');
    }
    
    public function check()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        $this->load->model('Model_produk');
        $result = $this->Model_produk->login($user,$pass);
        if($result == false){
            $this->session->set_flashdata('notif','Maaf, username atau password anda salah');
        }
    }
    function logout()
    {
        $this->session->unset_userdata('ID');
        $this->session->unset_userdata('USER');
        $this->session->unset_userdata('NAME');
        $this->session->unset_userdata('LEVEL');
        $this->session->unset_userdata('login_status');
        $this->session->set_flashdata('notif','Anda diarahkan ke halaman Login');
        redirect('login');
    }
}