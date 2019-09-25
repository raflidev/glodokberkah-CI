<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class produk extends CI_Controller {
        public function __construct()
        {
        parent::__construct();
        $this->load->database();
        $this->load->model('Model_produk');
        }
        
	public function index()
	{
        $heading = "Etalase";
        $konten = $this->Model_produk->tampilProduk();
        $menu = $this->Model_produk->menu();
        $kategori = $this->Model_produk->kategori();
        

        
        $this->load->view('templates/head');
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar', compact('menu','kategori','heading'));
        $this->load->view('produk/index',
        compact('heading','konten'));
        $this->load->view('templates/footer');
        }
        
        public function add($kodebarang)
        {
        $this->Model_produk->tambahBarang($kodebarang);
        
        redirect('produk');
        }
        
        public function delete($kodebarang)
        {
        $this->Model_produk->hapusBarang($kodebarang);
        
        redirect('checkout');
        }
        
        public function checkout()
        {
        // alamat
        $id = $this->input->post('id');
        $provinsi = $this->input->post('provinsi');
        $kota = $this->input->post('kota');
        $kecamatan = $this->input->post('kecamatan');
        $deskel = $this->input->post('deskel');
        $pos = $this->input->post('pos');
        $total = $this->input->post('total');
        $paymentMethod = $this->input->post('paymentMethod');
        
        // verifikasi
        $password = $this->input->post('password');

        $resultinfo = $this->Model_produk->updateData($id,$provinsi,$kota,$kecamatan,$deskel,$pos,$password,$paymentMethod,$total);

        if($resultinfo == "true"){
                redirect('pembayaran');
        }

        }
}
