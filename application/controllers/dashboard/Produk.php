<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct()
    {
    parent::__construct();
    $this->load->model('Model_produk');
    }

    public function index()
    {
        $heading = 'Produk';
        $menu = $this->Model_produk->menuDashboard();
        $tampil = $this->Model_produk->tampilProduk();
        $this->load->view('templates/head');
        $this->load->view('templates/dashboard/topbar');
        $this->load->view('dashboard/produk',compact('heading','tampil'));
        $this->load->view('templates/dashboard/sidebar',compact('menu'));
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $this->load->helper('form');
        $heading = 'Produk';
        $menu = $this->Model_produk->menuDashboard();
        $tampil = $this->Model_produk->tampilProduk();
        $kodebarang = $this->Model_produk->tampilkodebarang();
        $this->load->view('templates/head');
        $this->load->view('templates/dashboard/topbar');
        $this->load->view('dashboard/new_form_add',compact('heading','tampil','kodebarang'));
        $this->load->view('templates/dashboard/sidebar',compact('menu'));
        $this->load->view('templates/footer');
    }

    public function check()
    //$route['dashboard/produk/check'] = 'dashboard/produk/add/check';
    {
        //detail
        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $merk = $this->input->post('merk');
        $kategori = $this->input->post('kategori');
        $upload_gambar = $_FILES['gambar']['name'];
        $deskripsi = $this->input->post('deskripsi');
        
        //barang
        $stok = $this->input->post('stok');
        $harga_beli = $this->input->post('harga_beli');
        $harga_jual = $this->input->post('harga_jual');
        $tgl = $this->input->post('tgl');
        $kondisi = $this->input->post('kondisi');
        
        // $ya = $this->Model_produk->insertBarang($kode,$nama,$merk,$kategori,$deskripsi);
            if($upload_gambar){
                $this->load->helper('file'); 
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 1024;
                $config['upload_path'] = 'assets/img/';
                
                $this->upload->initialize($config);
                $this->load->library('upload', $config);

                if($this->upload->do_upload('gambar')){
                    $gambar = $this->upload->data('file_name');
                }else{
                    echo $this->upload->display_errors();
                }
                $data = array(
                    'gambar' => $gambar,
                    'kode_barang' => $kode,
                    'nama_barang' => $nama,
                    'merk' => $merk,
                    'kategori' => $kategori,
                    'deskripsi' => $deskripsi
                );
                $query = $this->db->insert('detailbarang',$data);
                //success
                if($query){
                $data = array(
                    'kode_barang' => $kode,
                    'stok' => $stok,
                    'harga_beli' => $harga_beli,
                    'harga_jual' => $harga_jual,
                    'tgl_produksi' => $tgl,
                    'kondisi' => $kondisi,
                    'stok' => $stok
                );
                $this->db->insert('barang',$data);
                $this->session->set_flashdata('check_yes', 'ditambahkan');
                redirect('dashboard/produk');
            }
            }
    }

    public function edit($kode)
    {
        $this->load->helper('form');
        $heading = 'Produk';
        $menu = $this->Model_produk->menuDashboard();
        
        $this->db->select('*');
        $this->db->from('detailbarang');
        $this->db->join('barang','barang.kode_barang=detailbarang.kode_barang');
        $this->db->where('barang.kode_barang',$kode);
        $query = $this->db->get();

        if($query->num_rows() > 0){
            $row = $query->row_array();
        }else{
            redirect('dashboard/Produk');
        }

        $this->load->view('templates/head');
        $this->load->view('templates/dashboard/topbar');
        $this->load->view('dashboard/new_form_edit',compact('heading','kode','row'));
        $this->load->view('templates/dashboard/sidebar',compact('menu'));
        $this->load->view('templates/footer');
    }

    public function checkedit()
    {
        //detail
        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $merk = $this->input->post('merk');
        $kategori = $this->input->post('kategori');
        $upload_gambar = $_FILES['gambar']['name'];
        $deskripsi = $this->input->post('deskripsi');
        
        //barang
        $harga_beli = $this->input->post('harga_beli');
        $harga_jual = $this->input->post('harga_jual');
        $tgl = $this->input->post('tgl');
        
        // $ya = $this->Model_produk->insertBarang($kode,$nama,$merk,$kategori,$deskripsi);
            if($upload_gambar){
                $this->load->helper('file'); 
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 1024;
                $config['upload_path'] = 'assets/img/';
                
                $this->upload->initialize($config);
                $this->load->library('upload', $config);

                if($this->upload->do_upload('gambar')){
                    $gambar = $this->upload->data('file_name');
                    $datagam = array(
                        'gambar' => $gambar
                    );
                    $this->db->where('kode_barang',$kode);
                    $this->db->update('detailbarang',$datagam);
                }else{
                    echo $this->upload->display_errors();
                }
            }
                    $data = array(
                        'nama_barang' => $nama,
                        'merk' => $merk,
                        'kategori' => $kategori,
                        'deskripsi' => $deskripsi
                    );
                    $this->db->where('kode_barang',$kode);
                    $query = $this->db->update('detailbarang',$data);
    
                    if($query){
                        $data = array(
                            'stok' => $stok,
                            'harga_beli' => $harga_beli,
                            'harga_jual' => $harga_jual,
                            'tgl_produksi' => $tgl,
                            'kondisi' => $kondisi,
                            'stok' => $stok
                        );
                    $this->db->where('kode_barang',$kode);
                    $this->db->update('barang',$data);
                    }
                    $this->session->set_flashdata('update', 'diperbaharui');
                    redirect('dashboard/produk');

        }

        public function hapus($kode)
        {
            $this->db->where('kode_barang',$kode);
            $this->db->delete('detailbarang');
            $this->session->set_flashdata('hapus', 'dihapus');
            redirect('dashboard/produk');
        }
}