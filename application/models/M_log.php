<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_log extends CI_Model {
 
    public function save_log($param)
    {
        $sql        = $this->db->insert_string('tabel_log',$param);
        $ex         = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }

    public function get_log(){
        return $this->db->get('tabel_log')->result();
    }
}