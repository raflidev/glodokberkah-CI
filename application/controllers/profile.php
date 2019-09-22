<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Model_produk');
        $info = $this->load->model('Model_profile');
    }
    
    public function index()
    {
        $heading = "Profiles";
        $this->load->view('profile/index',compact('heading'));
    }

    public function data()
    {
        $this->load->view('profile/data');
    }
}