<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function __construct()
    {
    parent::__construct();
    $this->load->model('Model_produk');
    }
    
    public function index()
    {
        $this->load->model('Model_produk');
        $heading = 'Transaksi';
        $menu = $this->Model_produk->menuDashboard();
        $this->db->select('*');
        $this->db->from('detailtransaksi');
        $this->db->where('dibayar', 'N');
        $query = $this->db->get();
        $tampil = $query->result_array();

        $this->load->view('templates/head');
        $this->load->view('templates/dashboard/topbar');
        $this->load->view('dashboard/transaksi',compact('heading','tampil'));
        $this->load->view('templates/dashboard/sidebar',compact('menu'));
        $this->load->view('templates/footer');
    }
    
    public function detail($kode)
    {
        $heading = "Transaksi";
        $menu = $this->Model_produk->menuDashboard();

        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detailbarang', 'detailbarang.kode_barang=transaksi.kode_barang');
        $this->db->join('barang', 'barang.kode_barang=detailbarang.kode_barang');
        $this->db->where('transaksi.kode_transaksi', $kode);
        $query = $this->db->get();
        $tampil = $query->result_array();

        $this->load->view('templates/head');
        $this->load->view('templates/dashboard/topbar');
        $this->load->view('dashboard/trans_form_detail', compact('heading','tampil'));
        $this->load->view('templates/dashboard/sidebar',compact('menu'));
        $this->load->view('templates/footer');
    }

    public function bukti($kode)
    {
        $heading = 'Transaksi'; 
        $menu = $this->Model_produk->menuDashboard();

        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detailbarang', 'detailbarang.kode_barang=transaksi.kode_barang');
        $this->db->join('barang', 'barang.kode_barang=detailbarang.kode_barang');
        $this->db->where('transaksi.kode_transaksi', $kode);
        $query = $this->db->get();
        $tampilkode = $query->row_array();

        $this->db->select('bukti');
        $this->db->from('detailtransaksi');
        $this->db->where('kode_transaksi', $kode);
        $query = $this->db->get();
        $tampil = $query->row_array();

        if($tampil['bukti'] == NULL){
            $this->session->set_flashdata('bukti_null', 'belum lunas');
            redirect('dashboard/Transaksi');
        }
        $this->load->view('templates/head');
        $this->load->view('templates/dashboard/topbar');
        $this->load->view('dashboard/trans_form_bukti', compact('heading','tampil','tampilkode'));
        $this->load->view('templates/dashboard/sidebar',compact('menu'));
        $this->load->view('templates/footer');
    }

    public function lunas($kode)
    {
        $DT = array(
            'dibayar' => "Y"
        );
        $this->db->update('detailtransaksi',$DT);
        $this->db->where('kode_transaksi', $kode);

        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('barang', 'barang.kode_barang=transaksi.kode_barang');
        $this->db->where('kode_transaksi', $kode);
        $query = $this->db->get();
        $row =$query->result_array();
        foreach ($row as $r) {
            $b = array(
                'terjual' => $r['terjual']+$r['jumlah'],
                'stok' => $r['stok']-$r['jumlah']
            );
            $this->db->where('kode_barang', $r['kode_barang']);
            $query = $this->db->update('barang', $b);
        }
        $this->session->set_flashdata('lunas','sudah lunas!');
        redirect('transaksi');

        
    }
}