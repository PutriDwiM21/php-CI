 <?php 
 class Dashboard extends CI_Controller{
 	function __construct(){
 		parent::__construct();
 		$this->load->model('m_data');
 	}

 	// Controller dashboard
 	function awal(){
 		$this->load->view('awal/header.php');
 		$this->load->view('awal/dashboard.php');
 		$this->load->view('awal/footer.php');
 	}
 	function admin(){
 		$data['petugas'] = $this->m_data->jumlah_petugas();
 		$data['masyarakat'] = $this->m_data->jumlah_masyarakat();
 		$data['pengaduan'] = $this->m_data->jumlah_pengaduan();
 		$this->load->view('admin/header.php');
 		$this->load->view('admin/sidebar.php');
 		$this->load->view('admin/dashboard.php', $data);
 		$this->load->view('admin/footer.php');
 	}
 	function petugas(){
 		$this->load->view('petugas/header.php');
 		$this->load->view('petugas/sidebar.php');
 		$this->load->view('petugas/dashboard.php');
 		$this->load->view('petugas/footer.php');
 	}
 	function masyarakat(){
 		$this->load->view('masyarakat/header.php');
 		$this->load->view('masyarakat/sidebar.php');
 		$this->load->view('masyarakat/dashboard.php');
 		$this->load->view('masyarakat/footer.php');
 	}

 	// Controller petugas
 	function data_petugas(){
 		$data['petugas'] = $this->m_data->ambil_data_petugas()->result();
 		$this->load->view('admin/sidebar.php');
 		$this->load->view('admin/header.php');
 		$this->load->view('admin/petugas.php',$data);
 		$this->load->view('admin/footer.php');
 	}
 	function tambah_petugas(){
 		$id_petugas = $this->input->post('id_petugas');
 		$nama_petugas = $this->input->post('nama_petugas');
 		$username = $this->input->post('username');
 		$password = $this->input->post('password');
 		$telp = $this->input->post('telp');
 		$level = $this->input->post('level');
 		$data = array(
 			'id_petugas' => $id_petugas,
 			'nama_petugas' => $nama_petugas,
 			'username' => $username,
 			'password' => $password,
 			'telp' => $telp,
 			'level' => $level
 		);
 		if ($this->db->get_where('petugas', ['username' => $username])->num_rows() == 1) {
 			$this->session->set_flashdata('message_login_error', 'Username Already Used!');
 			redirect('dashboard/data_petugas');
 		} else{
 			$this->m_data->input_data($data, 'petugas');
 			redirect('dashboard/data_petugas');
 		}
 	}
 	function ubah_data_petugas(){ 
 		$id_petugas = $this->input->post('id_petugas');
 		$nama_petugas = $this->input->post('nama_petugas');
 		$username = $this->input->post('username');
 		$password = $this->input->post('password');
 		$telp = $this->input->post('telp');
 		$level = $this->input->post('level');
 		$data = array(
 			'id_petugas' => $id_petugas,
 			'nama_petugas' => $nama_petugas,
 			'username' => $username,
 			'password' => $password,
 			'telp' => $telp,
 			'level' => $level,
 		);
 		$where = array(
 			'id_petugas' => $id_petugas
 		);
 		$this->m_data->ubah_data($where, $data, 'petugas');
 		redirect('dashboard/data_petugas');
 	}
 	function hapus_petugas(){
 		$id_petugas = $this->input->post('id_petugas');
 		$where = array('id_petugas' => $id_petugas);
 		$this->m_data->hapus_data($where,'petugas');
 		redirect('dashboard/data_petugas');
 	}


	// Controller masyarakat
 	function data_masyarakat(){
 		$data['masyarakat'] = $this->m_data->ambil_data_masyarakat()->result();
 		$this->load->view('admin/sidebar.php');
 		$this->load->view('admin/header.php');
 		$this->load->view('admin/masyarakat.php',$data);
 		$this->load->view('admin/footer.php');
 	}
 	function tambah_masyarakat(){
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
 		$this->m_data->input_data($data, 'masyarakat');
 		redirect('dashboard/data_masyarakat');
 	}
 	function ubah_data_masyarakat(){ 
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
 		$where = array(
 			'nik' => $nik
 		);
 		$this->m_data->ubah_data($where, $data, 'masyarakat');
 		redirect('dashboard/data_masyarakat');
 	}
 	function ubah_status(){ 
 		$id_pengaduan = $this->input->post('id_pengaduan');
 		$status = $this->input->post('status');

 		$data = array(
 			'status' => $status
 		);
 		$where = array(
 			'id_pengaduan' => $id_pengaduan
 		);
 		//ini untuk update status pengaduan
 		$this->m_data->ubah_data($where, $data, 'pengaduan');
 		//selesai untuk update pengaduan
 		// ini untuk insert ke tabel tanggapan
 		$tanggapan = $this->input->post('tanggapan');
 		$id_petugas = $this->session->userdata('id_p');
 		$tgl_tanggapan = date('Y-m-d');

 		$data = array(
 			'id_pengaduan' => $id_pengaduan,
 			'tgl_tanggapan' => $tgl_tanggapan,
 			'tanggapan' => $tanggapan,
 			'id_petugas' => $id_petugas
 		);
 		$this->m_data->input_data($data,'tanggapan');
 		// selesai insert tabel tanggapan
 		redirect('dashboard/pengaduan');

 	}
 	function ubah_statusP(){ 
 		$id_pengaduan = $this->input->post('id_pengaduan');
 		$status = $this->input->post('status');

 		$data = array(
 			'status' => $status
 		);
 		$where = array(
 			'id_pengaduan' => $id_pengaduan
 		);
 		//ini untuk update status pengaduan
 		$this->m_data->ubah_data($where, $data, 'pengaduan');
 		//selesai untuk update pengaduan
 		// ini untuk insert ke tabel tanggapan
 		$tanggapan = $this->input->post('tanggapan');
 		$id_petugas = $this->session->userdata('id_p');
 		$tgl_tanggapan = date('Y-m-d');

 		$data = array(
 			'id_pengaduan' => $id_pengaduan,
 			'tgl_tanggapan' => $tgl_tanggapan,
 			'tanggapan' => $tanggapan,
 			'id_petugas' => $id_petugas
 		);
 		$this->m_data->input_data($data,'tanggapan');
 		// selesai insert tabel tanggapan
 		redirect('dashboard/pengaduanP');

 	}
 	function hapus_masyarakat($nik){
 		$where = array('nik' => $nik);
 		$this->m_data->hapus_data($where,'masyarakat');
 		redirect('dashboard/data_masyarakat');
 	}
 	function hapus_pengaduan(){
 		$id_pengaduan = $this->input->post('id_pengaduan');
 		$where = array('id_pengaduan' => $id_pengaduan);
 		$this->m_data->hapus_data($where,'pengaduan');
 		redirect('dashboard/pengaduan');
 	}

	// Controller pengaduan
 	function pengaduan(){
 		$data['pengaduan'] = $this->m_data->ambil_data_pengaduanAdmin();
 		$this->load->view('admin/header.php');
 		$this->load->view('admin/sidebar.php');
 		$this->load->view('admin/pengaduan.php',$data);
 		$this->load->view('admin/footer.php');
 	} 
 	function pengaduanM(){
 		$data['pengaduan'] = $this->m_data->ambil_data_MNik();
 		$this->load->view('masyarakat/header.php');
 		$this->load->view('masyarakat/sidebar.php');
 		$this->load->view('masyarakat/data_pengaduan.php',$data);
 		$this->load->view('masyarakat/footer.php');
 	} 
 	function pengaduanP(){
 		$data['pengaduan'] = $this->m_data->ambil_data_pengaduan();
 		$this->load->view('petugas/header.php');
 		$this->load->view('petugas/sidebar.php');
 		$this->load->view('petugas/data_pengaduan.php',$data);
 		$this->load->view('petugas/footer.php');
 	} 
 	function isi_pengaduan(){
 		$this->load->view('masyarakat/header.php');
 		$this->load->view('masyarakat/sidebar.php');
 		$this->load->view('masyarakat/pengaduan.php');
 		$this->load->view('masyarakat/footer.php');
 	}
 	function tambah_pengaduan(){
 		$nik = $this->session->userdata('nik');
 		date_default_timezone_set('Asia/Karachi'); 
 		$tgl_pengaduan = date('Y-m-d');
 		$id_pengaduan = $this->input->post('id_pengaduan');
 		$isi_laporan = $this->input->post('isi_laporan');
 		$foto = $_FILES['foto'];
 		if ($foto=''){}else {
 			$config['upload_path'] = './assets/foto';
 			$config['allowed_types'] = 'jpg|png|gif|jpeg';

 			$this->load->library('upload',$config);
 			if (!$this->upload->do_upload('foto')) {
 				echo "Upload Gagal"; die();
 			}else{
 				$foto=$this->upload->data('file_name');
 			}
 		}
 		$status = '0';
 		$data = array(
 			'nik' => $nik,
 			'id_pengaduan' => $id_pengaduan,
 			'tgl_pengaduan' => $tgl_pengaduan,
 			'isi_laporan' => $isi_laporan,
 			'foto' => $foto,
 			'status' => $status
 		);
 		$this->m_data->input_data($data, 'pengaduan');
 		redirect('dashboard/pengaduanM');
 	}
 	function tanggapan(){
 		$data['title'] = 'Complaint All';
 		$data['tanggapan'] = $this->m_data->ambil_data_tanggapan()->result_array();
 		$this->load->view('admin/header.php');
 		$this->load->view('admin/sidebar.php');
 		$this->load->view('admin/tanggapan.php',$data);
 		$this->load->view('admin/footer.php');
 	} 
 	function tanggapan_detail(){
 		$id = htmlspecialchars($this->input->post('id',true)); 
 		$cek_data = $this->db->get_where('pengaduan',['id_pengaduan' => $id])->row_array();

 		if ( ! empty($cek_data)) :
 			$data['title'] = 'Beri Tanggapan';
 			$data['data_pengaduan'] = $this->m_data->data_pengaduanM_id(htmlspecialchars($id))->row_array();

 			$this->load->view('layout/v_header', $data);
 			$this->load->view('layout/v_sidebar');
 			$this->load->view('layout/v_topbar');
 			$this->load->view('admin/tanggapan_detail');
 			$this->load->view('layout/v_footer');
 			$this->load->view('layout/v_foot');
 		else :
 			$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
 				data tidak ada
 				</div>');

 			redirect('Admin/TanggapanController');			
 		endif;
 	}
 	function detail_pengaduanA($id_pengaduan){
 		$where = array('id_pengaduan' => $id_pengaduan);
 		$data['pengaduan'] = $this->m_data->detail_pengaduan($id_pengaduan);
 		$this->load->view('admin/sidebar');	
 		$this->load->view('admin/header');
 		$this->load->view('admin/detail_pengaduan', $data);
 		$this->load->view('admin/footer');
 	}
 	function detail_aksi($id_pengaduan){
 		$where = [
 			'id_pengaduan' => $id_pengaduan];
 			$data = [
 				'status' => 'proses'];
 				$ubah = $this->m_data->ubah_data('pengaduan', $data, $where);
 				if ($ubah) {
 					echo "<script>";
 					echo "alert('Pengaduan Berhasil di Proses')";
 					echo "</script>";
 					redirect('admin/pengaduan');
 				}else{
 					echo "<script>";
 					echo "alert('Pengaduan Gagal di Proses')";
 					echo "</script>";
 					redirect('admin/pengaduan');
 				}
 			}
 			function hasiltanggapan(){
 				$id_pengaduan = $this->input->post('id_pengaduan');
 				$this->m_data->detail_pengaduan($where, $data, 'masyarakat');
 				redirect('dashboard/data_masyarakat');
 			}
 			function detailtanggapan($id_pengaduan){
 				$data['pengaduan'] = $this->m_data->detailtanggapan($id_pengaduan);	
 				$this->load->view('masyarakat/header');
 				$this->load->view('masyarakat/sidebar');
 				$this->load->view('masyarakat/detail_pengaduan', $data);
 				$this->load->view('masyarakat/footer');
 			}
 			function laporan(){
 				$data['laporan'] = $this->m_data->laporan()->result();
 				$this->load->view('admin/header');
 				$this->load->view('admin/sidebar');
 				$this->load->view('admin/laporan',$data);
 				$this->load->view('admin/footer');
 			}
 			function generate_laporan(){
 				$data['laporan'] = $this->m_data->laporan_pengaduan()->result_array();
 				$baris=$this->m_data->laporan_pengaduan()->num_rows();
 				$this->load->view('admin/cetak', $data);
 			}

 			// pencarian data
 			function pencarian_petugas(){
 				$keyword = $this->input->post('keyword');
 				$data['petugas'] = $this->m_data->get_keyword_P($keyword);
 				$this->load->view('admin/header');
 				$this->load->view('admin/sidebar');
 				$this->load->view('admin/petugas',$data);
 				$this->load->view('admin/footer');
 			}
 			function pencarian_masyarakat(){
 				$keyword = $this->input->post('keyword');
 				$data['masyarakat'] = $this->m_data->get_keyword_M($keyword);
 				$this->load->view('admin/header');
 				$this->load->view('admin/sidebar');
 				$this->load->view('admin/masyarakat',$data);
 				$this->load->view('admin/footer');
 			}
 			function pencarian_pengaduan(){
 				$keyword = $this->input->post('keyword');
 				$data['pengaduan'] = $this->m_data->get_keyword_Pengaduan($keyword);
 				$this->load->view('admin/header');
 				$this->load->view('admin/sidebar');
 				$this->load->view('admin/pengaduan',$data);
 				$this->load->view('admin/footer');
 			}
 		}
