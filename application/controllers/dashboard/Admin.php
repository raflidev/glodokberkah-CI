<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
    parent::__construct();
    $this->load->model('Model_produk');
    }
    public function index()
    {
        $heading = 'Admin';
        $menu = $this->Model_produk->menuDashboard();
        $this->load->view('templates/head');
        $this->load->view('templates/dashboard/topbar');
        $this->load->view('dashboard/admin',compact('heading'));
        $this->load->view('templates/dashboard/sidebar',compact('menu'));
        $this->load->view('templates/footer');
    }
}