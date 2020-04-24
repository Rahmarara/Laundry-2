<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

    public function login($data) {
		$username = $data['username'];
		$password = $data['password'];
		$cek = array(
			'username' => $username,
			'password' => md5($password),
		);

		return $check_username = $this->db->get_where('user', $cek)->first_row();

		// if($check_username){
		// 	// $password_db = $check_username->password;
		// 	// if(password_verify($password_input,$password_db)){
		// 		return true;
		// 	// } else {
		// 	// 	return false;
		// 	// }
		// } else {
		// 	return false;
		// }
	}


}

/* End of file ModelName.php */
