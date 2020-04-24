<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penjual extends CI_Model {

    public function get_data(){
        return $this->db->get('user')->result();
    }

}

/* End of file M_penjual.php */
