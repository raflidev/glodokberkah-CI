<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

    public function index()
    {
        if(! $this->session->userdata('login_status'))
        {
            redirect('login');
        }
        $heading = 'Dashboard';
        $this->load->view('produk/dashboard',
        compact('heading'));
    }
}
?>