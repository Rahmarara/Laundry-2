<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_paket extends CI_Model {

    public function get_paket_select($id_user){
        $this->db->select('paket.jenis, paket.harga, paket.id_paket')
                 ->from('user')
                 ->join('paket', 'paket.id_outlet = user.id_outlet')
                 ->where('user.id_user', $id_user);
        return $this->db->get()->result_array();
    }

    public function get(){
        $this->db->select('paket.*, outlet.nama_outlet as outlet')
                 ->from('paket')
                 ->join('outlet', 'outlet.id_outlet = paket.id_outlet');
        return $this->db->get()->result();
    }

    public function get_per_kasir($id_outlet){
        $this->db->select('paket.*, outlet.nama_outlet')
                 ->from('paket')
                 ->join('outlet', 'outlet.id_outlet = paket.id_outlet')
                 ->where('paket.id_outlet', $id_outlet);
        return $this->db->get()->result();
    }

    public function tambah_paket($data){
        return $this->db->insert('paket', $data);
    }

    public function hapus($data){
        return $this->db->delete('paket', $data);
    }

    public function edit_paket($data, $where){
        return $this->db->update('paket', $data, $where);
    }

}

/* End of file M_paket.php */
