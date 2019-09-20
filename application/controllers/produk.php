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
        $nav = 'STORE MARKET SHOP';
        $heading = 'Etalase';
        $konten = $this->Model_produk->tampilProduk();


        $menu = array(
                'Etalase' => 'grid',
                'Sedang Populer' => 'trending-up',
                'Diskon' => 'dollar-sign'
        );
        $kategori = array(
                'Pakaian' => 'package',
                'Elektronik' => 'monitor',
                'Gadget' => 'smartphone'
        );

        
        
        $this->load->view('templates/head');
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar', compact('menu','kategori','heading'));
        $this->load->view('produk/index',
        compact('heading','konten'));
        $this->load->view('templates/footer');
        }
}
