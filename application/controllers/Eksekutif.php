<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eksekutif extends CI_Controller {
    
    function __construct() {
        parent::__construct(); 
        $this->load->model('Transaksi_model'); 
    }
    private $_table = "tb_transaksi";

    public $idtransaksi;
    public $tanggal;
    public $jumlah;
	public function index()
	{
        $data['grafiktransaksi'] = $this->Transaksi_model->grafiktransaksi();
        $data['totaltransaksi'] = $this->Transaksi_model->totaltransaksi();
        $data['totallaba'] = $this->Transaksi_model->totallaba();
        $data['transaksi'] = $this->Transaksi_model->getAll();
		$this->load->view('detailtransaksi',$data);
	}
}
