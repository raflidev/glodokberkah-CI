<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

    public function __construct()
    {
    parent::__construct();
    $this->load->model('Model_produk');
    $this->load->library('session');
    }

    public function index()
    {
        if($this->session->userdata("LEVEL") == "2")
    {   
        $this->session->set_flashdata('akses','tidak memiliki akses' );
        redirect('produk');
    }
        if(! $this->session->userdata('login_status'))
        {
            redirect('login');
        }
        $heading = 'Dashboard';
        $menu = $this->Model_produk->menuDashboard();
        $this->load->view('templates/head');
        $this->load->view('templates/dashboard/topbar');
        $this->load->view('produk/dashboard',compact('heading'));
        $this->load->view('templates/dashboard/sidebar',compact('menu'));
        $this->load->view('templates/footer');
    }
    public function produk()
    {
        if($this->session->userdata("LEVEL") == "2")
        {   
            $this->session->set_flashdata('akses','tidak memiliki akses' );
            redirect('produk');
        }
        $heading = 'Produk';
        $menu = $this->Model_produk->menuDashboard();
        $tampil = $this->Model_produk->tampilProduk();
        $this->load->view('templates/head');
        $this->load->view('templates/dashboard/topbar');
        $this->load->view('produk/dashboard',compact('heading','tampil'));
        $this->load->view('templates/dashboard/sidebar',compact('menu'));
        $this->load->view('templates/footer');
    }
    public function admin()
    {
        if($this->session->userdata("LEVEL") == "2")
        {   
            $this->session->set_flashdata('akses','tidak memiliki akses' );
            redirect('produk');
        }
        $heading = 'Admin';
        $menu = $this->Model_produk->menuDashboard();
        $this->load->view('templates/head');
        $this->load->view('templates/dashboard/topbar');
        $this->load->view('produk/dashboard',compact('heading'));
        $this->load->view('templates/dashboard/sidebar',compact('menu'));
        $this->load->view('templates/footer');
    }
    public function transaksi()
    {
        if($this->session->userdata("LEVEL") == "2")
        {   
            $this->session->set_flashdata('akses','tidak memiliki akses' );
            redirect('produk');
        }
        $this->load->model('Model_produk');
        $heading = 'Transaksi';
        $menu = $this->Model_produk->menuDashboard();
        $this->load->view('templates/head');
        $this->load->view('templates/dashboard/topbar');
        $this->load->view('produk/dashboard',compact('heading'));
        $this->load->view('templates/dashboard/sidebar',compact('menu'));
        $this->load->view('templates/footer');
    }
}
?>