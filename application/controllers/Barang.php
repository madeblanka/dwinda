<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    function __construct() {
        parent::__construct(); 
        $this->load->model('Barang_model');
        $this->load->model('Kategori_model'); 
		$this->load->library('form_validation');
	}
    private $_table = "tb_barang";

    public $idbarang;
    public $nama;
    public $satuan;
    public $stok;
    public $deskripsi;

	public function index()
	{
        $data['barang'] = $this->Barang_model->getAll();
		$this->load->view('barang/index',$data);
    }
    public function add()
    {
        if($this->Barang_model->save())
        {
            echo "<script>
            alert('Simpan Berhasil !');
            window.location.href='index';
            </script>";
        }else{
            echo "<script>
            alert('Simpan Gagal !');
            window.location.href='add';
            </script>";
        }
        
    }
    public function tambah()
    {
        $data['kategori'] = $this->Kategori_model->getaktif();
        $this->load->view('barang/tambah',$data);
    }
    public function edit($idbarang = null)
    {
        $barang = $this->Barang_model;
        $data["barang"] = $barang->getByidbarang($idbarang);
        $this->load->view("barang/edit", $data);
    }

    public function delete($idbarang  = null)
    {
        if (!isset($idbarang)) show_404();
        if ($this->Barang_model->delete($idbarang)) {
            redirect(site_url('barang/index'));
        }
    }
    public function update(){
        $idbarang = $this->input->post('idbarang',TRUE);
        $idkategori = $this->input->post('idkategori',TRUE);
		$nama = $this->input->post('nama',TRUE);
        $harga = $this->input->post('harga',TRUE);
        $hargabeli = $this->input->post('hargabeli',TRUE);
		$this->Barang_model->update($idbarang,$idkategori,$nama,$harga,$hargabeli);
        redirect(site_url('barang/index'));
    }
}
