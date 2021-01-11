<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Transaksi_model');
    	$this->load->model('Barang_model');
		$this->load->model('Sementara_model');
		$this->load->model('Detail_model');
		$this->load->library('form_validation');
	}
	private $_table = "tb_transaksi";

    public $idtransaksi;
    public $tanggal;
	public $jumlah;
	public $laba;

	public function index()
	{
		$data['transaksi'] = $this->Transaksi_model->getAll();
		$this->load->view('dashboard',$data);
	}
	public function eksekutif()
	{
		$data['transaksi'] = $this->Transaksi_model->getAll();
		$data['grafiktransaksi'] = $this->Transaksi_model->carigrafik2();
        $data['totaltransaksi'] = $this->Transaksi_model->totaltransaksi();
		$data['totallaba'] = $this->Transaksi_model->totallaba();
		$data['totalkategori'] = $this->Transaksi_model->totalkategori();
		$data['totaluser'] = $this->Transaksi_model->totaluser();
		$data['hitungtotaltransaksi'] = $this->Transaksi_model->hitungtotaltransaksi();
		$this->load->view('dashboardeksekutif',$data);
	}
	public function print($idtransaksi)
	{
		$data['detail'] = $this->Detail_model->getByidtransaksi($idtransaksi);
		$data['alltransaksi'] = $this->Transaksi_model->getidtransaksi($idtransaksi);
		$data['transaksi'] = $this->Transaksi_model->getidtransaksi($idtransaksi);
		$this->load->view('print/transaksi',$data);
	}
	public function grafiktransaksi()
	{
		$this->load->view('grafik/transaksi');
	}
	public function grafiklaba()
	{
		$data['laba'] = $this->Transaksi_model->carigrafik2();
		$this->load->view('grafik/laba',$data);
	}
	public function tambah()
	{
		$data['barang'] = $this->Barang_model->getAll();
		$data['sementara'] = $this->Sementara_model->getAll();
		$data['transaksi'] = $this->Transaksi_model->getidtransaksibaru();
		return $this->load->view('tambahtransaksi',$data);
	}
	public function isibarang(){
        $id=$this->input->post('idbarang');
        $data=$this->Barang_model->getidbarangrow($id);
        echo json_encode($data);
	}
	public function addsementara()
	{
		$sementara = $this->Sementara_model;
		$sementara->save();
		$this->session->set_flashdata('success', 'Berhasil disimpan');
		redirect('transaksi/tambah');
	}
	public function edit($idtransaksi = null)
	{
		if (!isset($idtransaksi)) redirect('dashboard');
		$detailtransaksi = $this->Detail_model;
		$transaksi = $this->Transaksi_model;
		$data["transaksi"] = $transaksi->getByidtransaksi($idtransaksi);
		$data["detail"] = $detailtransaksi->getByidtransaksi($idtransaksi);
		if (!$data["detail"]) show_404();
	
		$this->load->view("edittransaksi",$data);
	}
	public function deletesementara($idsementara)
    {
        if (!isset($idsementara)) show_404();

        if ($this->Sementara_model->delete($idsementara)) {
            redirect('transaksi/tambah');
        }
	}
	public function delete($idtransaksi=null)
    {
        if (!isset($idtransaksi)) show_404();
        
        if ($this->Transaksi_model->delete($idtransaksi) && $this->Detail_model->delete($idtransaksi)) {
            redirect(site_url('transaksi/index'));
        }
    }
    public function create(){
        $idtransaksi = $this->input->post('idtransaksi',TRUE);
		$idbarang = $this->input->post('idbarang',TRUE);
		$nama = $this->input->post('nama',TRUE);
		$jumlah = $this->input->post('jumlah',TRUE);
		$satuan = $this->input->post('satuan',TRUE);
		$total = $this->input->post('total',TRUE);
		$hargabeli = $this->input->post('hargabeli',TRUE);
		$totalbeli = $this->input->post('totalbeli',TRUE);

		$jumlahakhir = array_sum($total);
		$totalbeliakhir = array_sum($totalbeli);

		$laba = $jumlahakhir - $totalbeliakhir ;
		$this->Detail_model->create_transaksi($idtransaksi,$idbarang,$nama,$jumlah,$satuan,$total,$hargabeli,$totalbeli);
		$this->Transaksi_model->save($jumlahakhir,$laba);
		$this->Sementara_model->deletesemua();
        redirect('transaksi/index');
	}
	public function update(){
		$idtransaksi = $this->input->post('idtransaksi',TRUE);
		$idbarang = $this->input->post('idbarang',TRUE);
		$nama = $this->input->post('nama',TRUE);
		$jumlah = $this->input->post('jumlah',TRUE);
		$satuan = $this->input->post('satuan',TRUE);
		$total = $this->input->post('total',TRUE);
		$hargabeli = $this->input->post('hargabeli',TRUE);
		$totalbeli = $this->input->post('totalbeli',TRUE);
		$jumlahakhir = array_sum($total);
		$totalbeliakhir = array_sum($totalbeli);
		$laba = $jumlahakhir - $totalbeliakhir ;
		$this->Detail_model->update($idtransaksi,$idbarang,$nama,$jumlah,$satuan,$total,$hargabeli,$totalbeli);
		$this->Transaksi_model->update($jumlahakhir,$laba);
        redirect('transaksi/index');
    }
}
