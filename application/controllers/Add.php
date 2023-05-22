<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Administrator_model');
		$this->user_id = $this->session->userdata('id');
		if(empty($this->user_id) || $this->session->userdata('role') != 'Mahasiswa')
		{
			$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Anda tidak berhak untuk masuk, harap login terlebih dahulu", timer: 10000, icon: "error", button: false});</script>');
        	redirect(base_url());
     	}
	}

	public function index()
	{
		$data['title'] = 'BPN Magang | Mahasiswa Panel';
        $data['absensi'] = $this->Administrator_model->get_all_absensi();
		$this->load->view('mhs-end/template/content_head',$data);
		$this->load->view('mhs-end/template/content_header',$data);
		$this->load->view('mhs-end/content_absensi',$data);
		$this->load->view('mhs-end/template/content_footer');
		$this->load->view('mhs-end/template/content_sidebar-control');
	}
public function tambah()
	{
        $this->load->view('content_absensi');
		$this->form_validation->set_rules('nim','Nim','required|trim|is_unique',
			array(
				'is_unique' => 'nim belum diisi',
			));
		$this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required|trim',
			array(
				'required' => 'Nama Lengkap belum diisi'
			));
		$this->form_validation->set_rules('universitas','Universitas','required|trim',
			array(
				'required' => 'Universitas belum diisi'
			));	
		$this->form_validation->set_rules('jurusan','Jurusan','required|trim',
			array(
				'required' => 'Jurusan belum diisi'
			));	
	
		if($this->form_validation->run() == FALSE)
		{
			$data['title'] = 'BPN Magang | Absensi';
			$this->load->view('front-end/content-head',$data);
			$this->load->view('front-end/content-header');
			$this->load->view('content_content_absensi');
		}else{
			$nim = $this->input->post('nim');
			$nama_lengkap = $this->input->post('nama_lengkap');
			$universitas = $this->input->post('universitas');
			$jurusan = $this->input->post('jurusan');
			}
		}
	}