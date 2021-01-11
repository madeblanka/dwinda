<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_model extends CI_Model
{
    private $_table = "tb_detail";

    public $idtransaksi;
    public $idbarang;
    public $nama;
    public $jumlah;
    public $satuan;
    public $total;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getByidtransaksi($idtransaksi)
    {
        return $this->db->get_where($this->_table, ["idtransaksi" => $idtransaksi])->result();
    }
    public function penjualan($idbarang,$tanggal)
    {
        $a = $this->Transaksi_model->caritanggal($tanggal);
        
        $this->db->where_in('idtransaksi',$a[0]);
        $this->db->where('idbarang', $idbarang);
        $s = $this->db->get('tb_detail')->num_rows();
        return $s;
        // $b = $this->db->query('select * from tb_detail where idtransaksi = '.$a.' and idbarang = '.$idbarang);
        // return $b->num_rows();
    }
    public function save()
    {
        $post = $this->input->post();
        $this->idtransaksi = $post["idtransaksi"];
        $this->idbarang = $post["idbarang"];
        $this->nama = $post["nama"];
        $this->jumlah = $post["jumlah"];
        $this->satuan = $post["satuan"];
        $this->total = $post["total"];
        $this->hargabeli = $post["hargabeli"];
        $this->totalbeli = $post["totalbeli"];
        return $this->db->insert_batch($this->_table, $this);
    }

    public function save_batch($data){
        return $this->db->insert_batch('tb_detail', $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->idtransaksi = $post["idtransaksi"];
        $this->idbarang = $post["idbarang"];
        $this->nama = $post["nama"];
        $this->jumlah = $post["jumlah"];
        $this->satuan = $post["satuan"];
        $this->total = $post["jumlah"] * $post["satuan"];
        $this->hargabeli = $post["hargabeli"];
        $this->totalbeli = $post["hargabeli"] * $post["jumlah"];
        return $this->db->update($this->_table, $this, array('idtransaksi' => $post['idtransaksi']));
    }

    public function delete($iddetail)
    {
        return $this->db->delete($this->_table, array("iddetail" => $iddetail));
    }

    function create_transaksi($idtransaksi,$idbarang,$nama,$jumlah,$satuan,$total,$hargabeli,$totalbeli){
        $this->db->trans_start();
            //INSERT TO PACKAGE
            $data  = array(
            'idtransaksi'=>$idtransaksi,
			'idbarang'=>$idbarang,
			'nama'=>$nama,  // Ambil dan set data nama sesuai index array dari $index
			'jumlah'=>$jumlah, 
			'satuan'=>$satuan, // Ambil dan set data telepon sesuai index array dari $index
            'total'=>$total,
            'hargabeli'=>$hargabeli,
            'totalbeli'=>$totalbeli,
            );

            $array = [];
            for ($i = 0; $i < count($data['idbarang']); $i++) {
              $array[] = array(
                'idtransaksi' => $data['idtransaksi'],
                'idbarang' => $data['idbarang'][$i],
                'nama' => $data['nama'][$i],
                'jumlah' => $data['jumlah'][$i],
                'satuan' => $data['satuan'][$i],
                'total' => $data['total'][$i],
                'hargabeli' => $data['hargabeli'][$i],
                'totalbeli' => $data['totalbeli'][$i]
              );
            }
            //MULTIPLE INSERT TO DETAIL TABLE
            $this->db->insert_batch('tb_detail', $array);
        $this->db->trans_complete();
    }
 
}