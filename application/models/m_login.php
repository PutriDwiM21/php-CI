<?php 
class M_login extends CI_Model{
	function ambil_dataM(){
		return $this->db->get('masyarakat');
	}
	function ambil_data(){
		return $this->db->get('petugas');
	}
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}
}