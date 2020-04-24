<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('m_login');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function aksi(){
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($this->form_validation->run() == TRUE){
			$data = array(
				'username' => $username,
				'password' => $password,
			);
	
			$cek_login = $this->m_login->login($data);
	
			if($cek_login){
				$this->session->set_userdata('cek_login', $cek_login);
				$ambil = $this->session->userdata('cek_login');
				// simpan log
				helper_log("login", 'Sedang Login', $ambil->nama_user);
				redirect('admin');
			}else{
				$this->session->set_flashdata('cek_login', 'gagal');
				redirect('login'); 
				// echo 'masok';
			}
		}else{
			$this->session->set_flashdata('cek_login', 'gagal');
			redirect('login');
		}
	}

	public function logout(){
		$ambil = $this->session->userdata('cek_login');
		helper_log("logout", 'Sedang Logout', $ambil->nama_user);
		$this->session->sess_destroy();
		$data = array('pesan_keluar' => 'telah logout');
		
		redirect('login',$data);
		
	}
}
