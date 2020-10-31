<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sementara_model extends CI_Model
{
    private $_table = "tb_sementara";

    public $idbarang;
    public $nama;
    public $jumlah;
    public $satuan;
    public $total;

    public function rules()
    {
        return [
            ['field' => 'idbarang',
            'label' => 'idbarang',
            'rules' => 'required'],

            ['field' => 'nama',
            'label' => 'nama',
            'rules' => 'required'],
            
            ['field' => 'jumlah',
            'label' => 'jumlah',
            'rules' => 'number'],
            
            ['field' => 'satuan',
            'label' => 'satuan',
            'rules' => 'number'],

            ['field' => 'total',
            'label' => 'total',
            'rules' => 'number']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getByidbarang($idbarang)
    {
        return $this->db->get_where($this->_table, ["idbarang" => $idbarang])->row();
    }
    public function getByidtransaksi($b)
    {
        return $this->db->get_where($this->_table, ["idtransaksi" => $b])->row();
    }
    public function save()
    {
        $post = $this->input->post();
        $this->idbarang = $post["idbarang"];
        $this->nama = $post["nama"];
        $this->jumlah = $post["jumlah"];
        $this->satuan = $post["satuan"];
        $this->total = $post["jumlah"] * $post["satuan"];
        $this->hargabeli = $post["hargabeli"];
        $this->totalbeli = $post["jumlah"] * $post["hargabeli"] ;
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->idbarang = $post["idbarang"];
        $this->nama = $post["nama"];
        $this->jumlah = $post["jumlah"];
        $this->satuan = $post["satuan"];
        $this->total = $post["total"];
        $this->hargabeli = $post["hargabeli"];
        $this->totalbeli = $post["totalbeli"];
        return $this->db->update($this->_table, $this, array('idbarang' => $post['idbarang']));
    }

    public function delete($idsementara)
    {
        return $this->db->delete($this->_table, array("idsementara" => $idsementara));
    }
    public function deletesemua()
    {
        return $this->db->empty_table($this->_table);
    }
}