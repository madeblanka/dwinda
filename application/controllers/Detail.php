<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {
    
    function __construct() {
        parent::__construct(); 
        $this->load->model('Detail_model'); 
	}
    private $_table = "tb_detail";

    public $idtransaksi;
    public $idbarang;
    public $nama;
    public $jumlah;
    public $satuan;
    public $total;

	public function index($idtransaksi)
	{
        $data['detail'] = $this->Detail_model->getByidtransaksi($idtransaksi);
		$this->load->view('detailtransaksi',$data);
    }
    public function delete($iddetail=null)
    {
        if (!isset($iddetail)) show_404();
        
        if ($this->Detail_model->delete($iddetail)) {
            redirect(site_url('transaksi/index'));
        }
    }
}
