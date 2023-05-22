<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->user_id = $this->session->userdata('id');
		if(empty($this->user_id) || $this->session->userdata('role') != 'Mahasiswa')
		{
			$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Anda tidak berhak untuk masuk, harap login terlebih dahulu", timer: 10000, icon: "error", button: false});</script>');
        	redirect(base_url());
     	}
	}

	public function index()
	{
		$id = $this->session->userdata('id');
		$data['title'] = 'BPN | Pengajuan Magang';
		$this->load->view('mhs-end/template/content_head',$data);
		$this->load->view('mhs-end/template/content_header');
		$this->load->view('mhs-end/content_pengajuan');
		$this->load->view('mhs-end/template/content_footer');
		$this->load->view('mhs-end/template/content_sidebar-control');
	}

	public function process()
	{
		$id = $this->input->post('id');
		$nama_lengkap = $this->input->post('nama_lengkap');

		$universitas = $this->input->post('universitas');
		$nim = $this->input->post('nim');
		$jurfak = $this->input->post('jurfak');
		$semester = $this->input->post('semester');
		$mulai_periode = $this->input->post('mulai_periode');
		$akhir_periode = $this->input->post('akhir_periode');
		$alamat = $this->input->post('alamat');
		$foto_surat = $_FILES['userfile']['name'];

		$this->form_validation->set_rules('universitas', 'Universitas', 'trim|required',
			array(
				'required' => 'Universitas belum diisi'
			));
		$this->form_validation->set_rules('nim', 'NIM', 'trim|required|numeric',
			array(
				'required' => 'NIM belum diisi',
				'numeric' => 'NIM harus berupa angka'
			));
		$this->form_validation->set_rules('jurfak', 'Jurusan / Fakultas', 'trim|required',
			array(
				'required' => 'Jurusan atau Fakultas belum diisi',
			));
		$this->form_validation->set_rules('semester', 'Semester', 'trim|required',
			array(
				'required' => 'Semester belum dipilih'
			));
		$this->form_validation->set_rules('mulai_periode', 'Mulai Periode', 'trim|required',
			array(
				'required' => 'Tentukan mulai periode magang / PKL'
			));
		$this->form_validation->set_rules('akhir_periode', 'Akhir Periode', 'trim|required',
			array(
				'required' => 'Tentukan akhir periode magang / PKL'
			));
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required',
			array(
				'required' => 'Alamat belum diisi'
			));
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = ' BPN | Pengajuan Magang';
			$this->load->view('mhs-end/template/content_head',$data);
			$this->load->view('mhs-end/template/content_header',$data);
			$this->load->view('mhs-end/content_pengajuan');
			$this->load->view('mhs-end/template/content_footer');
			$this->load->view('mhs-end/template/content_sidebar-control');
		} else {
			$config['upload_path'] = 'include/surat_pengantar';
			$config['allowed_types'] = 'jpg|png|JPG|JPEG|jpeg';
			$config['max_size']   = '320000';
			// $config['max_width']  =  472;
			// $config['max_height'] = 709;

			$this->upload->initialize($config);
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload()){
				$error = array('error' =>  $this->upload->display_errors());

				$data['title'] = 'BAKTI Kominfo | Pengajuan Magang';
				$this->load->view('mhs-end/template/content_head',$data);
				$this->load->view('mhs-end/template/content_header',$data);
				$this->load->view('mhs-end/content_pengajuan',$error);
				$this->load->view('mhs-end/template/content_footer');
				$this->load->view('mhs-end/template/content_sidebar-control');
			}else{
				$data = array('upload_data' => $this->upload->data());
				$data = array(
					'id' 		    => $id,
					'nama_lengkap'  => $nama_lengkap,
					'universitas'   => $universitas,
					'nim' 		    => $nim,
					'jurfak' 	    => $jurfak,
					'semester' 	    => $semester,
					'mulai_periode' => $mulai_periode,
					'akhir_periode' => $akhir_periode,
					'alamat' 		=> $alamat,
					'status' 		=> 'pending',
					'foto_surat' 	=> $foto_surat,
					'timecreated_pengajuan' => date('y-m-d h:i:s')
				);
				$this->db->insert('pengajuan', $data);
				$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Berhasil menambahkan pengajuan", timer: 10000, icon: "success", button: false});</script>');
				redirect(base_url('dashboard'));
			}
		}
	}

}

/* End of file Pengajuan.php */
/* Location: ./application/controllers/Pengajuan.php */