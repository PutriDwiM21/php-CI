 <?php 
class Awal extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function index(){
		$this->load->view('awal/header.php');
		$this->load->view('awal/dashboard.php');
		$this->load->view('awal/footer.php');
	}
}