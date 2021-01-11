<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    private $_table = "tb_transaksi";

    public $idtransaksi;
    public $tanggal;
    public $jumlah;
    
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    public function caritanggal($tanggal)
    {
        $a = date('Y-m', strtotime($tanggal));
        $this->db->select('idtransaksi');
        $this->db->like('tanggal',$a,'after');
        return $this->db->get('tb_transaksi')->result_array();
    }
    public function hitungtotaltransaksi()
    {
        return $this->db->count_all('tb_transaksi');   
    }
    public function totalkategori()
    {
        return $this->db->count_all('tb_kategori');   
    }
    public function totaluser()
    {
        return $this->db->count_all('tb_user');   
    }
    public function totallaba()
    {
        return $this->db->select_sum('laba')->get('tb_transaksi')->result();
    }
    public function carigrafik($where)
    {
        $this->db->like('tanggal',$where,'after');
        return $this->db->get('tb_transaksi')->num_rows();
    }
    public function carigrafik2()
    {
        $this->db->select('*');
        $this->db->order_by('tanggal','ASC');
        return $this->db->get('tb_transaksi')->result();
    }
    public function totaltransaksi()
    {
        return $this->db->get($this->_table)->num_rows();
    }
    public function getidtransaksibaru()
    {
        $this->db->select('idtransaksi');
        $this->db->from('tb_transaksi');
        $this->db->order_by('idtransaksi DESC');
        $this->db->limit(1);
        return $this->db->get()->result();
    }
    public function getidtransaksi($idtransaksi)
    {
        $this->db->select('*');
        $this->db->where('idtransaksi',$idtransaksi);
        return $this->db->get('tb_transaksi')->result();
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