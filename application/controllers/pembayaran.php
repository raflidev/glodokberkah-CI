<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pembayaran extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Model_produk');
        $info = $this->load->model('Model_profile');
    }

    public function index()
    {
        $query = $this->Model_produk->ambilinfomasiTransaksi();
        $this->load->view('produk/pembayaran',compact('query'));

    }
}