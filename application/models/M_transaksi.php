<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

    public function get_transaksi(){
        $this->db->select('p.nama AS pelanggan,
                           u.nama_user AS penjual,
                           o.nama_outlet AS outlet,
                           transaksi.*')
                  ->from('transaksi')
                  ->join('pelanggan p',' p.id_pelanggan = transaksi.id_pelanggan')
                  ->join('user u',' u.id_user = transaksi.id_user')
                  ->join('outlet o',' o.id_outlet = transaksi.id_outlet');
        return $this->db->get()->result_array();
    }

    public function tambah_transaksi($data_transaksi, $data_detail){
                $this->db->insert('transaksi', $data_transaksi);
       return $this->db->insert('detail_transaksi', $data_detail);
    }

}

/* End of file M_transaksi.php */
