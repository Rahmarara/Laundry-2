<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengguna extends CI_Model {

    public function get(){
        $this->db->select('user.*, outlet.nama_outlet as outlet, outlet.id_outlet')
                 ->from('user')
                 ->join('outlet', 'outlet.id_outlet = user.id_outlet');
        return $this->db->get()->result();
    }

    public function tambah_pengguna($data){
        return $this->db->insert('user', $data);
    }

    public function edit_pengguna($data, $where){
        return $this->db->update('user', $data, $where);
    }

    public function hapus($data){
        return $this->db->delete('user', $data);
    }

}

/* End of file M_pengguna.php */
