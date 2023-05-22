<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
		$this->load->model('Login_model');
		$this->user_id = $this->session->userdata('id');
	}

	public function message($title = NULL,$text = NULL,$type = NULL)
	{
		return $this->session->set_flashdata([
				'title' => $title,
				'text' => $text,
				'type' => $type
			]
		);
	}

	public function index()
	{
		$data['title'] = 'BPN Magang | Daftar';
		$this->load->view('front-end/content-head',$data);
		$this->load->view('front-end/content-header');
		$this->load->view('content_daftar');
	}

	public function register()
	{
		$this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required|trim',
			array(
				'required' => 'Nama Lengkap belum diisi'
			));
		$this->form_validation->set_rules('username','Username','required|trim|min_length[10]|is_unique[akun.username]',
			array(
				'is_unique' => '%s sudah dipakai.',
				'min_length' => '%s minimal 10 karakter'
			));
		$this->form_validation->set_rules('password','Password','required|trim|min_length[6]',
			array(
				'required' => 'Password belum diisi',
				'min_length' => 'Password minimal 6 karakter'
			));
		$this->form_validation->set_rules('cpassword','Password','required|trim|matches[password]',
			array(
			'matches'=> ' %s Does Not Match ',
			'required' => 'Konfirmasi Password belum diisi'
			));
		if($this->form_validation->run() == FALSE)
		{
			$data['title'] = 'BPN Magang | Daftar';
			$this->load->view('front-end/content-head',$data);
			$this->load->view('front-end/content-header');
			$this->load->view('content_daftar');
		}else{
			$nama_lengkap = $this->input->post('nama_lengkap');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$secure_password = $this->encryption->encrypt($this->input->post('password'));

			$set='1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$code = substr(str_shuffle($set), 0, 12);

			$get_result = $this->Login_model->get_user();
			if(!$get_result)
			{
				echo '<span style="color: #f00;">Email ini sudah digunakan</span>';
			}else{
				$user['nama_lengkap'] = $nama_lengkap;
				$user['username']	  = $username;
				$user['password'] 	  = $secure_password;
				$user['role'] 	  	  = 'Mahasiswa';
				$user['active']	  	  = 'aktif';
				$user['timecreated_akun'] = date('y-m-d h:i:s');
				$id = $this->Login_model->insert_user($user);
				$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Akun berhasil dibuat, silahkan login", timer: 10000, icon: "success", button: false});</script>');
	        	redirect('login');
			}
		}
	}
}


/* End of file Daftar.php */
/* Location: ./application/controllers/.php */