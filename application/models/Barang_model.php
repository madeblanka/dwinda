<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    private $_table = "tb_barang";

    public $idbarang;
    public $nama;
    public $harga;

    public function rules()
    {
        return [
            ['field' => 'idbarang',
            'label' => 'idbarang',
            'rules' => 'required'],

            ['field' => 'nama',
            'label' => 'nama',
            'rules' => 'required'],
            
            ['field' => 'harga',
            'label' => 'harga',
            'rules' => 'number'],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getByidbarang($idbarang)
    {
        return $this->db->get_where($this->_table, ["idbarang" => $idbarang])->result();
    }
    public function getidbarangrow($idbarang)
    {
        return $this->db->get_where($this->_table, ["idbarang" => $idbarang])->row();
    }
    public function getByidbarangaja()
    {
        return $this->db->query("SELECT idbarang FROM tb_barang");
    }

    public function save()
    {
        $post = $this->input->post();
        $this->idbarang = $post["idbarang"];
        $this->idkategori = $post["idkategori"];
        $this->nama = $post["nama"];
        $this->harga = $post["harga"];
        $this->hargabeli =$post["hargabeli"];
        return $this->db->insert($this->_table, $this);
    }

    public function update($idbarang,$idkategori,$nama,$harga,$hargabeli)
    {
        $post = $this->input->post();
        $this->idbarang = $post["idbarang"];
        $this->idkategori = $post["idkategori"];
        $this->nama = $post["nama"];
        $this->harga = $post["harga"];
        $this->hargabeli =$post["hargabeli"];
        return $this->db->update($this->_table, $this, array('idbarang' => $post['idbarang']));
    }

    public function delete($idbarang)
    {
        return $this->db->delete($this->_table, array("idbarang" => $idbarang));
    }
}