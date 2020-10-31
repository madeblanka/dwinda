<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
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
        $data['user'] = $this->User_model->getAll();
		$this->load->view('user/index',$data);
	}
	public function add()
    {
        $user = $this->User_model;
            $user->save();
            redirect(site_url('user/index'));
    }
    public function tambah()
    {
        $this->load->view('user/tambah');
    }
    public function edit($iduser = null)
    {
        $user = $this->User_model;
        $data["user"] = $user->getByiduser($iduser);
        $this->load->view("user/edit", $data);
	}
	public function update(){
		$iduser = $this->input->post('iduser',TRUE);
		$username = $this->input->post('username',TRUE);
		$password = $this->input->post('password',TRUE);
		$nama = $this->input->post('nama',TRUE);
		$jabatan = $this->input->post('jabatan',TRUE);
		$this->User_model->update($iduser,$username,$password,$nama,$jabatan);
        redirect(site_url('user/index'));
    }
}
