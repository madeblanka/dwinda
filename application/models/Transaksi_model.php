<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    private $_table = "tb_transaksi";

    public $idtransaksi;
    public $tanggal;
    public $jumlah;

    public function rules()
    {
        return [
            ['field' => 'idtransaksi',
            'label' => 'idtransaksi',
            'rules' => 'required'],

            ['field' => 'tanggal',
            'label' => 'tanggal',
            'rules' => 'required'],
            
            ['field' => 'jumlah',
            'label' => 'jumlah',
            'rules' => 'number']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function carigrafik($where)
    {
        $this->db->like('tanggal',$where,'after');
        return $this->db->get('tb_transaksi')->num_rows();
    }
    public function carigrafik2($where)
    {
        $this->db->like('laba',$where,'after');
        return $this->db->get('tb_transaksi')->num_rows();
    }
    public function getidtransaksibaru()
    {
        $this->db->select('idtransaksi');
        $this->db->from('tb_transaksi');
        $this->db->order_by('idtransaksi DESC');
        $this->db->limit(1);
        return $this->db->get()->result();
    }
    
    public function getByidtransaksi($idtransaksi)
    {
        return $this->db->get_where($this->_table, ["idtransaksi" => $idtransaksi])->row();
      
    }

    public function save($jumlahakhir,$laba)
    {
        $post = $this->input->post();
        $this->idtransaksi = null;
        $this->tanggal = date('Y-m-d h:i:s');
        $this->jumlah = $jumlahakhir;
        $this->laba = $laba;
        return $this->db->insert($this->_table, $this);
    }
 
    public function update($jumlahakhir,$laba)
    {
        $post = $this->input->post();
        $this->idtransaksi = $post["idtransaksi"];
        $this->tanggal = $post["tanggal"];
        $this->jumlah = $jumlahakhir;
        $this->laba = $laba;
        return $this->db->update($this->_table, $this, array('idtransaksi' => $post['idtransaksi']));
    }

    public function delete($idtransaksi)
    {
        return $this->db->delete($this->_table, array("idtransaksi" => $idtransaksi));
    }
}