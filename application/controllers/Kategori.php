<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    function __construct() {
        parent::__construct(); 
        $this->load->model('Kategori_model');
        $this->load->model('Detail_model');
        $this->load->model('Transaksi_model');
		$this->load->library('form_validation');
	}
    private $_table = "tb_kategori";

    public $idkategori;
    public $kategori;
 

	public function index()
	{
        $data['kategori'] = $this->Kategori_model->getAll();
		$this->load->view('kategori/index',$data);
    }
    public function add()
    {
        $kategori = $this->Kategori_model;
            $kategori->save();
            redirect(site_url('kategori/index'));
    }
    public function tambah()
    {
        $this->load->view('kategori/tambah');
    }
    public function edit($idkategori = null)
    {
        $kategori = $this->Kategori_model;
        $data["kategori"] = $kategori->getByidkategori($idkategori);
        $this->load->view("kategori/edit", $data);
    }
    public function penjualan()
	{
        $data['kategori'] = $this->Kategori_model->getAll();
		$this->load->view('penjualan/index',$data);
    }
    public function hasilpenjualan()
    {
        $idkategori = $_POST["idkategori"];
        $tanggal = $_POST["tanggal"];
        
        $data["kategori"] = $this->Kategori_model->getByidkategori($idkategori);
        $data['detail'] = $this->Detail_model->penjualan($idkategori,$tanggal);
		$this->load->view('penjualan/hasil',$data);
    }
    public function delete($idkategori  = null)
    {
        if (!isset($idkategori)) show_404();
        if ($this->Kategori_model->delete($idkategori)) {
            redirect(site_url('kategori/index'));
        }
    }
    public function update(){
		$idkategori = $this->input->post('idkategori',TRUE);
		$kategori = $this->input->post('kategori',TRUE);
		$this->Kategori_model->update($idkategori,$kategori);
        redirect(site_url('kategori/index'));
    }
}
