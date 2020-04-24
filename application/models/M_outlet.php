<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_outlet extends CI_Model {

    public function get_outlet(){
        return $this->db->get('outlet')->result();
    }

    public function tambah_outlet($data){
        return $this->db->insert('outlet', $data);
    }

    public function edit_outlet($data, $where){
        return $this->db->update('outlet', $data, $where);
    }

    public function hapus($data){
        return $this->db->delete('outlet', $data);
    }

}

/* End of file M_outlet.php */
