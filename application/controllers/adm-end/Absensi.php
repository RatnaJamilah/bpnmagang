<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Administrator_model');
		$this->load->model('Login_model');
		$this->load->library('encryption');
		$this->user_id = $this->session->userdata('id');
		if(empty($this->user_id) || $this->session->userdata('role') != 'Admin')
		{
			$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Anda tidak berhak untuk masuk, harap login terlebih dahulu", timer: 10000, icon: "error", button: false});</script>');
        	redirect(base_url());
     	}
	}

	public function index(){
		$data['title'] = 'BPN | Absensi';
		$data['absensi'] = $this->Administrator_model->get_all_absensi();
		$this->load->view('adm-end/template/content_head',$data);
		$this->load->view('adm-end/template/content_header');
		$this->load->view('adm-end/template/content_nav');
		$this->load->view('adm-end/content_absensi',$data);
		$this->load->view('adm-end/template/content_footer');
		$this->load->view('adm-end/template/content_sidebar-control');
	}

	public function tambah()
	{
		$this->load->view('adm-end/absensi');
	}

	public function simpan()
	{
		$this->administrator_model->simpandata();
		redirect('adm-end/absensi');
	}
}

/* End of file Operator.php */
/* Location: ./application/controllers/adm-end/Absensi.php */
