<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct() {
        parent::__construct(); 
        $this->load->model('User_model');
	}
    private $_table = "tb_user";

    public $iduser;
    public $username;
    public $password;
    public $nama;
    public $jabatan;

	public function index()
    {
        // jika form login disubmit
        if($this->input->post()){
            if($this->User_model->doLogin()) redirect(base_url('transaksi'));
        }
        // tampilkan halaman login
        $this->load->view("login");
    }

    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }

}
