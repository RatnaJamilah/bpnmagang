<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mahasiswa_model');
		$this->user_id = $this->session->userdata('id');
		if(empty($this->user_id) || $this->session->userdata('role') != 'Admin')
		{
			$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Anda tidak berhak untuk masuk, harap login terlebih dahulu", timer: 10000, icon: "error", button: false});</script>');
        	redirect(base_url());
     	}
	}

	public function index(){
		$data['title'] = 'BPN | Magang';
		$data['pengajuan'] = $this->Mahasiswa_model->get_data_pengajuan_pending();

		$this->load->view('adm-end/template/content_head',$data);
		$this->load->view('adm-end/template/content_header');
		$this->load->view('adm-end/template/content_nav');
		$this->load->view('adm-end/content_dashboard',$data);
		$this->load->view('adm-end/template/content_footer');
		$this->load->view('adm-end/template/content_sidebar-control');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/adm-end/Dashboard.php */