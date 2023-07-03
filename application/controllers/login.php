<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
	}
	
	// Login & Registrasi Masyarakat
	function masyarakat(){
		$this->load->view('login/v_loginM.php');
	}
	function registrasi_masyarakat(){
		$this->load->view('login/v_registrasiM.php');
	}
	function tambah_login(){
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$telp = $this->input->post('telp');
		$data = array(
			'nik' => $nik,
			'nama' => $nama,
			'username' => $username,
			'password' => $password,
			'telp' => $telp,
		);
		if ($this->db->get_where('masyarakat', ['nik' => $nik])->num_rows() == 1) {
			$this->session->set_flashdata('message_login_error', 'NIK Already Registered!');
			redirect('login/registrasi_masyarakat');
		}else{
			$this->m_login->input_data($data,'masyarakat');
			redirect('login/masyarakat');
		}	
	}

	function aksi_login_masyarakat(){
		$nik = $this->input->post('nik');
		$password = $this->input->post('password');
		$nik = $this->db->get_where('masyarakat', ['nik' => $nik])->row_array();

		// echo "<pre>";
		// echo print_r($nik);
		// echo "</pre>";


		$this->session->set_userdata('nik', $nik['nik']);
		$this->session->set_userdata('namam',$nik['nama']);
		// echo "<pre>";
		// echo print_r($this->session->userdata('namam'));
		// echo "</pre>";

		$test = $this->session->userdata('nik');

		if ($nik) {
			if ($password == $nik['password']) {
				$data = [
					'nik'  => $nik['password'],
				];
				// $this->session->set_userdata($data);
				redirect('dashboard/masyarakat');
			}
		}else{
			$this->session->set_flashdata('message_login_error', 'NIK or Password is incorrect');
			redirect('login/masyarakat');
		}
	}

	// Login Admin & Petugas
	function petugas(){
		$this->load->view('login/v_loginP.php');
	}
	function aksi_login_petugas(){
		$id_petugas = $this->input->post('id_petugas');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password,
		);
		$cek = $this->db->get_where('petugas', $where)->row_array();
		$this->session->set_userdata('id_p',$cek['id_petugas']);
		$this->session->set_userdata('namap',$cek['nama_petugas']);
		if($cek){
			if($cek['password']==$password){
				
				$data = [
					'username' => $cek ['username'],
					'password' => $cek ['password'],
					'level' => $cek['level']];
				}
				$this->session->set_userdata($data);
				if ($cek['level'] == 'admin'){
					redirect("dashboard/admin");
				} elseif ($cek['level'] == 'petugas'){
					redirect ("dashboard/petugas");
				}
			}else{
				$this->session->set_flashdata('message_login_error', 'NIK or Password is incorrect');
				redirect('login/petugas');
			}
		}
		function logout(){
			redirect('awal');
			$this->session->sess_destroy();
		}
	}



