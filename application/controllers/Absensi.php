<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Administrator_model');
		$this->user_id = $this->session->userdata('id');
		if(empty($this->user_id) || $this->session->userdata('role') != 'Administrator')
		{
			$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Anda tidak berhak untuk masuk, harap login terlebih dahulu", timer: 10000, icon: "error", button: false});</script>');
        	redirect(base_url());
     	}
	}

	public function index()
	{
		$data['title'] = 'BPN Magang | Mahasiswa Panel';
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
		$this->form_validation->set_rules('nim','Nim','required|is_unique');
		$this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required');
		$this->form_validation->set_rules('universitas','Universitas','required');
		$this->form_validation->set_rules('jurusan','Jurusan','required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['title'] = 'BPN | Absensi';
			$data['absensi'] = $this->Administrator_model->get_all_absensi();
			$this->load->view('adm-end/template/content_head',$data);
			$this->load->view('adm-end/template/content_header');
			$this->load->view('adm-end/template/content_nav');
			$this->load->view('adm-end/content_absensi',$data);
			$this->load->view('adm-end/template/content_footer');
			$this->load->view('adm-end/template/content_sidebar-control');
		}else{
			$nim = $this->input->post('nim');
			$nama_lengkap = $this->input->post('nama_lengkap');
			$universitas = $this->input->post('universitas');
			$jurusan = $this->input->post('jurusan');
			}
	}
}

/* End of file Operator.php */
/* Location: ./application/controllers/adm-end/Absensi.php */
