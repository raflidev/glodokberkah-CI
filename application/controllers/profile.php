<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Model_produk');
    }
    
    public function index()
    {
        
    }
}