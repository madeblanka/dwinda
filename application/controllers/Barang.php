<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    function __construct() {
        parent::__construct(); 
        $this->load->model('Barang_model');
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
        $barang = $this->Barang_model;
            $barang->save();
            redirect(site_url('barang/index'));
    }
    public function tambah()
    {
        $this->load->view('barang/tambah');
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
		$nama = $this->input->post('nama',TRUE);
		$harga = $this->input->post('harga',TRUE);
		$this->Barang_model->update($idbarang,$nama,$harga);
        redirect(site_url('barang/index'));
    }
}
