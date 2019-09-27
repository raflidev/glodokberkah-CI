<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $info = $this->load->model('Model_profile');
    }
    
    public function data()
    {
        $cekalamat = $this->Model_profile->checkAlamat();
        if($cekalamat == true){
            $id = $this->Model_profile->isiAlamat();
        }else{
            $id = $this->Model_profile->kodeAlamat();
        }
        $ca = $this->Model_profile->checkAlamat();
        $this->load->view('profile/data',compact('id','ca'));
    }

    public function check()
    {
        
    }

}
