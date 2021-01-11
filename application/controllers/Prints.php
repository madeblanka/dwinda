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
    $data['barang'] = $this->Barang_model->getAll();
		$this->load->view('print/barang',$data);
    }
    public function printuser()
	{
        $data['user'] = $this->User_model->getAll();
		$this->load->view('print/user',$data);
    }
}
