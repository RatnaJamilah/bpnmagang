<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mahasiswa_model');
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
		$data['pengajuan'] = $this->Mahasiswa_model->get_data('mahasiswa');
		$data['profil'] = $this->Mahasiswa_model->get_profil_mhs();
		$this->load->view('mhs-end/template/content_head',$data);
		$this->load->view('mhs-end/template/content_header',$data);
		$this->load->view('mhs-end/content_dashboard',$data);
		$this->load->view('mhs-end/template/content_footer');
		$this->load->view('mhs-end/template/content_sidebar-control');
	}

	public function update_foto(){
		$id = $this->input->post('id');
		$photo = $_FILES['userfile']['name'];
		$config['upload_path'] = 'include/foto_mahasiswa';
		$config['allowed_types'] = 'jpg|png|JPG|JPEG|jpeg';
		$config['max_size']   = '320000';
		// $config['max_width']  =  472;
		// $config['max_height'] = 709;

		$this->upload->initialize($config);
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('userfile')){
			$error = array('error' =>  $this->upload->display_errors());

			$data['title'] = 'BPN Magang | Mahasiswa Panel';
			$data['pengajuan'] = $this->Mahasiswa_model->get_data('mahasiswa');
			$this->load->view('mhs-end/template/content_head',$data);
			$this->load->view('mhs-end/template/content_header',$data);
			$this->load->view('mhs-end/content_dashboard',$data);
			$this->load->view('mhs-end/template/content_footer');
			$this->load->view('mhs-end/template/content_sidebar-control');
		}else{
			$data = array('upload_data' => $this->upload->data());
			$data = array(
				'id' 		=> $id,
				'photo' 	=> $photo
			);
			$this->db->where('id', $id);
			$this->db->update('akun', $data);
			$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Berhasil menambahkan foto", timer: 10000, icon: "success", button: false});</script>');
			redirect(base_url('dashboard'));
		}
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */