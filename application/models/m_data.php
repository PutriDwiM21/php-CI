 <?php 
class M_data extends CI_Model{
	function ambil_data_petugas(){
		return $this->db->get('petugas');
	}
	function ambil_data_masyarakat(){
		return $this->db->get('masyarakat');
	}
	function ambil_data_pengaduan(){
		$nik = $this->session->userdata('nik');
		$sql = "select * FROM `lihatpengaduan`";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function ambil_data_pengaduanAdmin(){
		$nik = $this->session->userdata('nik');
		$sql = "select * FROM `lihatpengaduan`";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function ambil_data_p(){
		$this->db->select('*');
		$this->db->from('masyarakat');
		$this->db->join('pengaduan','pengaduan.nik=masyarakat.nik');
		return $query = $this->db->get();
	}
	function ambil_data_MNik(){
		$nik = $this->session->userdata('nik');
		$sql = "select * FROM lihatpengaduan where nik = '".$nik."'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function ambil_data_tanggapan(){
		return $this->db->get('tanggapan');
	}
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	function hapus_data($where,$table) {
		$this->db->where($where);
		$this->db->delete($table);
	}
	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}
	function ubah_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function ubah_status($id_pengaduan, $data){
		$this->db->where('id_pengaduan', $id_pengaduan);
		$this->db->update('pengaduan',$data);
	}
	function detailtanggapan($id_pengaduan){
		$sql = "select * FROM `hasiltanggapan` where id_pengaduan = '".$id_pengaduan."'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function detail_pengaduan($id_pengaduan){
		$result = $this->db->where('id_pengaduan', $id_pengaduan)->get('pengaduan');
		$this->db->select('*');
		$this->db->from('masyarakat');
		$this->db->join('pengaduan','pengaduan.nik=masyarakat.nik');
		if($result->num_rows() > 0){
			return $result->result();
		}else {
			return false;
		}
	}
	function tampiladuanM(){
		$this->db->where('nik',$this->session->nik);
		$query=$this->db->get('pengaduan');
		return $query->result_array(); 
	}
	function data_pengaduanM_id($id){
		return $this->db->get_where($this->table,['id_pengaduan' => $id]);
	}
	function laporan(){
		$daritgl = $this->input->post('daritgl');
		$sampaitgl = $this->input->post('sampaitgl');
		$status = $this->input->post('status');
		$this->session->set_userdata('lap_status', $status);
		$this->session->set_userdata('tglawal', $daritgl);
		$this->session->set_userdata('tglakhir', $sampaitgl);
		$this->db->select('*');
		$this->db->from("laporan where status like '%".$status."%' and (tgl_pengaduan >= '".$daritgl."' and tgl_pengaduan <= '".$sampaitgl."')");
		return $query = $this->db->get();
	}
	function laporan_pengaduan(){
		$daritgl = $this->session->userdata('tglawal');
		$sampaitgl = $this->session->userdata('tglakhir');
		$status = $this->session->userdata('lap_status');
		if ($status == 'New') {
			$status = 'baru';
		}else if ($status == 'Process') {
			$status = 'proses';
		}else if ($status == 'Finished') {
			$status = 'selesai';
		}
		$this->db->select('*');
		$this->db->from(" `pengaduan` LEFT JOIN `masyarakat` ON `masyarakat`.`nik` = `pengaduan`.`nik` LEFT JOIN `tanggapan` ON `tanggapan`.`id_pengaduan` = `pengaduan`.`id_pengaduan` LEFT JOIN `petugas` ON `petugas`.`id_petugas` = tanggapan.id_petugas where status like '%".$status."%' and (tgl_pengaduan >= '".$daritgl."' and tgl_pengaduan <= '".$sampaitgl."')");
		return $this->db->get();
	}
	function get_keyword_P($keyword){
		$this->db->select('*');
		$this->db->from('petugas');
		$this->db->like('id_petugas', $keyword);
		$this->db->or_like('nama_petugas', $keyword);
		$this->db->or_like('username', $keyword);
		$this->db->or_like('password', $keyword);
		$this->db->or_like('telp', $keyword);
		$this->db->or_like('level', $keyword);
		return $this->db->get()->result();
	}
	function get_keyword_M($keyword){
		$this->db->select('*');
		$this->db->from('masyarakat');
		$this->db->like('nik', $keyword);
		$this->db->or_like('nama', $keyword);
		$this->db->or_like('username', $keyword);
		$this->db->or_like('password', $keyword);
		$this->db->or_like('telp', $keyword);
		return $this->db->get()->result();
	}
	function jumlah_petugas(){
		$this->db->select('*');
		$this->db->from('petugas');
		return $this->db->get()->num_rows();
	}
	function jumlah_masyarakat(){
		$this->db->select('*');
		$this->db->from('masyarakat');
		return $this->db->get()->num_rows();
	}
	function jumlah_pengaduan(){
		$this->db->select('*');
		$this->db->from('pengaduan');
		return $this->db->get()->num_rows();
	}
}