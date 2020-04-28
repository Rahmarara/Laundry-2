<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('m_login');
		$this->load->model('m_transaksi');
		$this->load->model('m_pelanggan');
		$this->load->model('m_penjual');
		$this->load->model('m_paket');
		$this->load->model('m_outlet');
		$this->load->model('m_pengguna');
		$this->load->model('m_log');
	}

	public function index(){
		$userdata = $this->session->userdata('cek_login');
		if(!empty($userdata)){
			$data['transaksi'] = $this->m_transaksi->get_transaksi();
			$data['pelanggan'] = $this->m_pelanggan->get_data(); 
			$data['penjual']   = $this->m_penjual->get_data();
			$data['outlet']    = $this->m_outlet->get_outlet();
			
			$id_outlet = ($userdata->level != "admin") ? $userdata->id_outlet : null;
			$data['transaksi_hari_ini'] = $this->m_transaksi->transaksi_hari_ini($id_outlet);
			$data['penghasilan_seminggu'] = $this->m_transaksi->total_keuntungan_seminggu($id_outlet);
			$data['total_status_baru']  = $this->m_transaksi->total_status_baru($id_outlet);
			$data['total_status_proses']  = $this->m_transaksi->total_status_proses($id_outlet);
			$data['data_log']  = $this->m_log->get_log();

			// $this->load->view('admin/template/header');
			// $this->load->view('admin/index', $data);
			$this->load->view('admin/index2', $data);
			
		}else{
			redirect('login');
		}
	}

	public function log(){
		if(!empty($this->session->userdata('cek_login'))){
			$data['transaksi'] = $this->m_transaksi->get_transaksi();
			$data['pelanggan'] = $this->m_pelanggan->get_data(); 
			$data['penjual']   = $this->m_penjual->get_data();
			$data['outlet']    = $this->m_outlet->get_outlet();
			$data['transaksi_hari_ini'] = $this->m_transaksi->transaksi_hari_ini();
			$data['data_log']  = $this->m_log->get_log();

			// $this->load->view('admin/template/header');
			// $this->load->view('admin/index', $data);
			$this->load->view('admin/log', $data);
			
		}else{
			redirect('login');
		}
	}

	public function transaksi(){
		$userdata = $this->session->userdata('cek_login');
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');

		if(!empty($userdata)){
			$id_transaksi = ($userdata->level != "admin") ? $userdata->id_user : null;
			$data['transaksi'] = $this->m_transaksi->get_transaksi($id_transaksi);
			
			if($userdata->level == "admin"){
				$data['pelanggan'] = $this->m_pelanggan->get_data();
			}else{
				$data['paket']     = $this->m_paket->get_paket_select($userdata->id_user);
				$data['pelanggan'] = $this->m_pelanggan->get_per_kasir($userdata->id_outlet);
			} 

			$data['penjual']   = $this->m_penjual->get_data();
			$data['outlet']    = $this->m_outlet->get_outlet();
			$data['user_data'] = $userdata;

			// $this->load->view('admin/template/header');
			// $this->load->view('admin/index', $data);
			$this->load->view('admin/transaksi/index2', $data);
			
		}else{
			redirect('login');
		}
	}

	public function pengguna(){
		if(!empty($this->session->userdata('cek_login'))){
			$data['transaksi'] = $this->m_transaksi->get_transaksi();
			$data['pelanggan'] = $this->m_pelanggan->get_data(); 
			$data['penjual']   = $this->m_penjual->get_data();
			$data['outlet']    = $this->m_outlet->get_outlet();
			$data['pengguna']    = $this->m_pengguna->get();

			$this->load->view('admin/pengguna/index2', $data);
			
		}else{
			redirect('login');
		}
	}

	public function pelanggan(){
		if(!empty($this->session->userdata('cek_login'))){
			$data['transaksi'] = $this->m_transaksi->get_transaksi();
			$data['pelanggan'] = $this->m_pelanggan->get(); 
			$data['penjual']   = $this->m_penjual->get_data();
			$data['outlet']    = $this->m_outlet->get_outlet();
			$data['pengguna']    = $this->m_pengguna->get();
			$user_profile = $this->session->userdata('cek_login');
			$id_outlet = $user_profile->id_outlet;
			if($user_profile->level == "kasir"){
				$data['data_pelanggan'] = $this->m_pelanggan->get_per_kasir($id_outlet);
			}else if($user_profile->level == "admin"){
				$data['data_pelanggan'] = $this->m_pelanggan->get();
			}

			$this->load->view('admin/pelanggan/index2', $data);
			
		}else{
			redirect('login');
		}
	}

	public function paket(){
		if(!empty($this->session->userdata('cek_login'))){
			$data['transaksi'] = $this->m_transaksi->get_transaksi();
			$data['pelanggan'] = $this->m_pelanggan->get(); 
			$data['penjual']   = $this->m_penjual->get_data();
			$data['outlet']    = $this->m_outlet->get_outlet();
			$data['pengguna']    = $this->m_pengguna->get();
			$user_profile = $this->session->userdata('cek_login');
			$id_outlet = $user_profile->id_outlet;
			if($user_profile->level == "kasir"){
				$data['data_paket'] = $this->m_paket->get_per_kasir($id_outlet);
			}else if($user_profile->level == "admin"){
				$data['data_paket'] = $this->m_paket->get();
			}

			$this->load->view('admin/paket/index', $data);
			
		}else{
			redirect('login');
		}
	}

	public function outlet(){
		if(!empty($this->session->userdata('cek_login'))){
			$data['transaksi'] = $this->m_transaksi->get_transaksi();
			$data['pelanggan'] = $this->m_pelanggan->get(); 
			$data['penjual']   = $this->m_penjual->get_data();
			$data['outlet']    = $this->m_outlet->get_outlet();
			$data['pengguna']    = $this->m_pengguna->get();

			$this->load->view('admin/outlet/index2', $data);
			
		}else{
			redirect('login');
		}
	}

	public function data_transaksi(){
		 print_r(json_encode($this->m_transaksi->get_transaksi()));
	}

	public function data_outlet(){
		print_r(json_encode($this->m_outlet->get_outlet()));
	}

	public function data_paket(){
		print_r(json_encode($this->m_paket->get()));
	}

	public function data_pengguna(){
		print_r(json_encode($this->m_pengguna->get()));
	}

	public function data_pelanggan(){
		print_r(json_encode($this->m_pelanggan->get()));
	}

	public function data_pelanggan_kasir(){
		// $id_outlet = $this->input->get('id_outlet');
		$user_profile = $this->session->userdata('cek_login');
		$id_outlet = $user_profile->id_outlet;
		print_r(json_encode($this->m_pelanggan->get_per_kasir($id_outlet)));
	}

	public function tambah_transaksi(){

		// data insert ke transaksi
		$data['id_transaksi'] 	 = $this->generateRandomString('TRS09042021');
		$data['kode_invoice'] 	 = $this->generateRandomString('09042009'); 
		$data['id_pelanggan']    = $this->input->post('pelanggan');
		$data['id_user']      	 = $this->input->post('penjual');
		$data['tgl']         	 = date('Y-m-d');
		$data['batas_waktu']  	 = $this->input->post('batas_waktu');
		$data['biaya_tambahan']  = $this->input->post('biaya_tambahan');
		$data['diskon']  		 = $this->input->post('diskon');
		$data['pajak']			 = $this->input->post('pajak');
		$data['status']			 = 'baru';
		$data['dibayar']		 = $this->input->post('dibayar');
		$data['tgl_bayar'] 		 = '0000-00-00 00:00:00';

		if($data['dibayar'] == "dibayar"){
			$data['tgl_bayar'] = date('Y-m-d h:i:s');
		}

		$outlet = $this->db->query("select * from user where id_user = ".$data['id_user'])->result();
		$data['id_outlet'] 		 = $outlet[0]->id_outlet;

		// data insert ke detail transaksi
		$detail['id_transaksi']  = $data['id_transaksi'];
		$detail['keterangan']    = $this->input->post('keterangan');
		$detail['qty']           = $this->input->post('qty');
		$detail['id_paket']		 = $this->input->post('id_paket');

		$paket = $this->db->get_where('paket', array('id_paket' => $detail['id_paket']))->result();
		$data['total_harga']     = $paket[0]->harga * $detail['qty'];

		$this->m_transaksi->tambah_transaksi($data, $detail);
		// print_r($outlet);
	}

	public function edit_transaksi(){

		// data insert ke transaksi
		// $data['id_transaksi'] 	 = $this->generateRandomString('TRS09042021');
		// $data['kode_invoice'] 	 = $this->generateRandomString('09042009'); 
		$where['id_transaksi']   = $this->input->post('id_transaksi');
		$data['kode_invoice']    = $this->input->post('kode_invoice');
		$data['id_pelanggan']    = $this->input->post('pelanggan');
		$data['id_user']      	 = $this->input->post('penjual');
		$data['tgl']         	 = $this->input->post('tgl');
		$data['batas_waktu']  	 = $this->input->post('batas_waktu');
		$data['biaya_tambahan']  = $this->input->post('biaya_tambahan');
		$data['diskon']  		 = $this->input->post('diskon');
		$data['pajak']			 = $this->input->post('pajak');
		$data['status']			 = 'baru';
		$data['dibayar']		 = $this->input->post('dibayar');
		$data['tgl_bayar'] 		 = '0000-00-00 00:00:00';

		if($data['dibayar'] == "dibayar"){
			$data['tgl_bayar'] = date('Y-m-d h:i:s');
		}

		$outlet = $this->db->query("select * from user where id_user = ".$data['id_user'])->result();
		$data['id_outlet'] 		 = $outlet[0]->id_outlet;

		// data insert ke detail transaksi
		$detail['id_transaksi']  = $where['id_transaksi'];
		$detail['keterangan']    = $this->input->post('keterangan');
		$detail['qty']           = $this->input->post('qty');
		$detail['id_paket']		 = $this->input->post('id_paket');

		$paket = $this->db->get_where('paket', array('id_paket' => $detail['id_paket']))->result();
		$data['total_harga']     = $paket[0]->harga * $detail['qty'];

		$hasil = $this->m_transaksi->edit_transaksi($data, $detail, $where);

		if($hasil){
			$this->session->set_flashdata('cek_edit', 'berhasil');
			redirect('admin/transaksi');
		}else{
			$this->session->set_flashdata('cek_edit', 'gagal');
			redirect('admin/transaksi');
		}
		// print_r($data);
	}

	public function tambah_pengguna(){
		$data['id_outlet'] = $this->input->post('outlet');
		$data['nama_user'] = $this->input->post('nama_user');
		$data['username']  = $this->input->post('username');
		$data['password']  = md5($this->input->post('password'));
		$data['level'] 	   = $this->input->post('level');

		$this->m_pengguna->tambah_pengguna($data);
	}

	public function tambah_pelanggan(){
		$data['id_outlet'] = $this->input->post('outlet');
		$data['nama'] = $this->input->post('nama');
		$data['alamat']  = $this->input->post('alamat');
		$data['no_hp']  = $this->input->post('no_hp');
		$data['jk']  = $this->input->post('jk');

		$this->m_pelanggan->tambah_pelanggan($data);
	}

	public function tambah_paket(){
		$data['id_outlet'] = $this->input->post('id_outlet');
		$data['jenis'] 	= $this->input->post('jenis');
		$data['harga']  = $this->input->post('harga');
		$data['nama_paket']  = $this->input->post('nama_paket');
		
		// print_r($data);
		$hasil = $this->m_paket->tambah_paket($data);
			
		redirect('admin/paket');
	}

	public function tambah_outlet(){
		$data['nama_outlet']   = $this->input->post('nama_outlet');
		$data['alamat_outlet'] = $this->input->post('alamat_outlet');
		$data['tlp']  		   = $this->input->post('tlp');

		$this->m_outlet->tambah_outlet($data);
	}

	public function edit_outlet(){
		$where['id_outlet']  = $this->input->post('id_outlet');
		$data['nama_outlet']   = $this->input->post('nama_outlet');
		$data['alamat_outlet'] = $this->input->post('alamat_outlet');
		$data['tlp']  		   = $this->input->post('tlp');
		
		$hasil = $this->m_outlet->edit_outlet($data, $where);

		if($hasil){
			$this->session->set_flashdata('cek_edit', 'berhasil');
			redirect('admin/outlet');
		}else{
			$this->session->set_flashdata('cek_edit', 'gagal');
			redirect('admin/outlet');
		}
	}

	public function edit_paket(){
		$where['id_paket']  = $this->input->post('id_paket');
		$data['jenis']   	= $this->input->post('jenis');
		$data['nama_paket'] = $this->input->post('nama_paket');
		$data['harga']  	= $this->input->post('harga');
		
		$hasil = $this->m_paket->edit_paket($data, $where);

		if($hasil){
			$this->session->set_flashdata('cek_edit', 'berhasil');
			redirect('admin/paket');
		}else{
			$this->session->set_flashdata('cek_edit', 'gagal');
			redirect('admin/paket');
		}
	}

	public function edit_pengguna(){
		$where['id_user']  = $this->input->post('id_user');
		$data['nama_user'] = $this->input->post('nama_user');
		$data['username']  = $this->input->post('username');
		$password		   = $this->input->post('password');
		$password_lama     = md5($this->input->post('password_lama'));
		$data['password']  = md5($this->input->post('password_baru'));
		$data['level']     = $this->input->post('level');
		$data['id_outlet'] = $this->input->post('outlet');
		
		if($password == $password_lama){
			$hasil = $this->m_pengguna->edit_pengguna($data, $where);

			if($hasil){
				$this->session->set_flashdata('cek_edit', 'berhasil');
				redirect('admin/pengguna');
			}else{
				$this->session->set_flashdata('cek_edit', 'gagal');
				redirect('admin/pengguna');
			}
		}else{
			$this->session->set_flashdata('cek_edit', 'gagal');
			redirect('admin/pengguna');
		}
	}

	public function edit_pelanggan(){
		$where['id_pelanggan']  = $this->input->post('id_pelanggan');
		$data['nama'] 	   = $this->input->post('nama');
		$data['alamat']    = $this->input->post('alamat');
		$data['no_hp']     = $this->input->post('no_hp');
		$data['jk'] 	   = $this->input->post('jk');
		
		$hasil = $this->m_pelanggan->edit_pelanggan($data, $where);

		if($hasil){
			$this->session->set_flashdata('cek_edit', 'berhasil');
			redirect('admin/pelanggan');
		}else{
			$this->session->set_flashdata('cek_edit', 'gagal');
			redirect('admin/pelanggan');
		}
	}

	public function hapus_pengguna(){
		$data['id_user'] = $this->input->post('id_user');
		$hasil = $this->m_pengguna->hapus($data);

		if($hasil){
			$this->session->set_flashdata('cek_hapus', 'berhasil');
			redirect('admin/pengguna');
		}else{
			$this->session->set_flashdata('cek_hapus', 'gagal');
			redirect('admin/pengguna');
		}
	}

	public function hapus_pelanggan(){
		$data['id_pelanggan'] = $this->input->post('id_pelanggan');
		$hasil = $this->m_pelanggan->hapus($data);

		if($hasil){
			$this->session->set_flashdata('cek_hapus', 'berhasil');
			redirect('admin/pelanggan');
		}else{
			$this->session->set_flashdata('cek_hapus', 'gagal');
			redirect('admin/pelanggan');
		}
	}

	public function hapus_outlet(){
		$data['id_outlet'] = $this->input->post('id_outlet');
		$hasil = $this->m_outlet->hapus($data);

		if($hasil){
			$this->session->set_flashdata('cek_hapus', 'berhasil');
			redirect('admin/outlet');
		}else{
			$this->session->set_flashdata('cek_hapus', 'gagal');
			redirect('admin/outlet');
		}
	}

	public function hapus_paket(){
		$data['id_paket'] = $this->input->post('id_paket');
		$hasil = $this->m_paket->hapus($data);

		if($hasil){
			$this->session->set_flashdata('cek_hapus', 'berhasil');
			redirect('admin/paket');
		}else{
			$this->session->set_flashdata('cek_hapus', 'gagal');
			redirect('admin/paket');
		}
	}

	public function hapus_transaksi(){
		$id_transaksi = $this->input->post('id_transaksi');
		$hasil = $this->m_transaksi->hapus($id_transaksi);

		if($hasil){
			$this->session->set_flashdata('cek_hapus', 'berhasil');
			redirect('admin/transaksi');
		}else{
			$this->session->set_flashdata('cek_hapus', 'gagal');
			redirect('admin/transaksi');
		}
	}

	public function tes(){
		$data = array(
			"dataku" => array(
				"nama" => "Petani Kode",
				"url" => "http://petanikode.com"
			)
		);
	
		$this->load->library('pdf');
	
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-petanikode.pdf";
		$this->pdf->load_view('laporan_pdf', $data);
	
	}

	private function generateRandomString($kode_depan, $length = 4) {
		$characters = '0123456789';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $kode_depan.$randomString;
	}
}
