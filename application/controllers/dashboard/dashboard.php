<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

    // url dashboard/dashboard
    // tapi sudah di route ke dashboard. :D

    public function __construct()
    {
    parent::__construct();
    $this->load->model('Model_produk');
    }

    public function index()
    {
        if(! $this->session->userdata('login_status'))
        {
            redirect('login');
        }
        $heading = 'Dashboard';
        $menu = $this->Model_produk->menuDashboard();
        $this->load->view('templates/head');
        $this->load->view('templates/dashboard/topbar');
        $this->load->view('dashboard/Produk',compact('heading'));
        $this->load->view('templates/dashboard/sidebar',compact('menu'));
        $this->load->view('templates/footer');
    }
   

}
?>