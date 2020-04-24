<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelanggan extends CI_Model {

    public function get_data(){
        return $this->db->get('pelanggan')->result();
    }

    public function get(){
        $this->db->select('pelanggan.*, outlet.nama_outlet as outlet, outlet.id_outlet')
                 ->from('pelanggan')
                 ->join('outlet', 'outlet.id_outlet = pelanggan.id_outlet');
        return $this->db->get()->result();
    }

    public function get_per_kasir($id_outlet){
        $this->db->select('pelanggan.*, outlet.nama_outlet as outlet, outlet.id_outlet')
                 ->from('pelanggan')
                 ->join('outlet', 'outlet.id_outlet = pelanggan.id_outlet')
                 ->where('pelanggan.id_outlet', $id_outlet);
        return $this->db->get()->result();
    }

    public function tambah_pelanggan($data){
        return $this->db->insert('pelanggan', $data);
    }

    public function edit_pelanggan($data, $where){
        return $this->db->update('pelanggan', $data, $where);
    }

    public function hapus($data){
        return $this->db->delete('pelanggan', $data);
    }

}

/* End of file M_pelanggan.php */
