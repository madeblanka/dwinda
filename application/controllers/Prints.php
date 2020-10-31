<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prints extends CI_Controller {

    function __construct() {
        parent::__construct(); 
        $this->load->model('Barang_model');
        $this->load->model('User_model');
	}

	public function printbarang()
	{
        if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
            $this->load->view('login');
          }else{
            echo "Anda tidak berhak mengakses halaman ini";
          }
        $data['barang'] = $this->Barang_model->getAll();
		$this->load->view('print/barang',$data);
    }
    public function printuser()
	{
        
        $data['user'] = $this->User_model->getAll();
		$this->load->view('print/user',$data);
    }
}
