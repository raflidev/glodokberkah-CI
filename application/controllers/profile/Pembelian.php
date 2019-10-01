<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Model_produk');
        $info = $this->load->model('Model_profile');
    }
    public function index()
    {
        $heading = "Pembelian";
        $menu = $this->Model_produk->menuProfile();

        $this->db->distinct('detailtransaksi.kode_transaksi');
        $this->db->select('detailtransaksi.kode_transaksi,metode.rekening,metode.nama,detailtransaksi.total_biaya,detailtransaksi.ongkir,detailtransaksi.kode_unik');
        $this->db->from('transaksi');
        $this->db->join('detailtransaksi', 'detailtransaksi.kode_transaksi = transaksi.kode_transaksi');
        $this->db->join('metode', 'metode.kode_metode = detailtransaksi.kode_metode');
        $this->db->where('detailtransaksi.dibayar', "N");
        $this->db->where('transaksi.id_user', $this->session->userdata('ID'));
        $this->db->order_by('detailtransaksi.kode_transaksi', "ASC");
        $query = $this->db->get();
        $tampil = $query->result_array();
        
        $this->load->view('templates/head');
        $this->load->view('templates/topbar');
        $this->load->view('templates/profile/sidebar', compact('heading','menu'));
        $this->load->view('profile/pembelian',compact('heading','tampil'));
        $this->load->view('templates/footer');
    }

    public function bayar($kode)
    {
        $heading = "Pembelian";
        $menu = $this->Model_produk->menuProfile();
        $this->load->helper('form');
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detailbarang', 'detailbarang.kode_barang=transaksi.kode_barang');
        $this->db->join('barang', 'barang.kode_barang=detailbarang.kode_barang');
        $this->db->join('detailtransaksi', 'detailtransaksi.kode_transaksi = transaksi.kode_transaksi');
        $this->db->where('transaksi.kode_transaksi', $kode);
        $query = $this->db->get();
        $row = $query->row_array();
        $tampil = $query->result_array();

        $this->load->view('templates/head');
        $this->load->view('templates/dashboard/topbar');
        $this->load->view('profile/form_detail', compact('heading','tampil','kode','row'));
        $this->load->view('templates/profile/sidebar',compact('menu'));
        $this->load->view('templates/footer');
    }

    public function check()
    {
        $kode = $this->input->post('kode');
        $upload_gambar = $_FILES['gambar']['name'];
        if($upload_gambar){
            $this->load->helper('file'); 
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 1024;
            $config['upload_path'] = 'assets/img/pembayaran';
            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if($this->upload->do_upload('gambar')){
                $gambar = $this->upload->data('file_name');
                $datagam = array(
                    'bukti' => $gambar
                );
                $this->db->where('kode_transaksi',$kode);
                $this->db->update('detailtransaksi',$datagam);
                $this->session->set_flashdata('bayar','bukti sudah diserahkan, mohon tunggu respon admin');
                redirect('profile/Pembelian');
            }else{
                echo $this->upload->display_errors();
            }
        }else{
            $this->session->set_flashdata('fatal_error','ada kesalahan teknis, mohon coba lagi');
            redirect('profile/Pembelian');
        }
    }

}