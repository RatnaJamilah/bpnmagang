<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
		$this->load->model('Login_model','login_model');
		// $this->user_id = $this->session->userdata('id');
	}

	public function index()
	{
		$data['title'] = 'BPN Magang - Mahasiswa Panel Login';
		$this->load->view('front-end/content-head',$data);
		$this->load->view('content_login');
	}

	public function process()
	{
		$this->form_validation->set_rules('username','Username','required|trim', array('required' => 'Masukan Username' ));
		$this->form_validation->set_rules('password','Password','required|trim', array('required' => 'Masukan Password'));

		if ($this->form_validation->run() == FALSE)
		{
			// redirect(base_url());
			$data['title'] = 'BPN Magang - Mahasiswa Panel Login';
			$this->load->view('front-end/content-head',$data);
			$this->load->view('content_login');
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$result = $this->login_model->userlogin($username);
			if($result['username'] === $username)
			{
				$result_check = $this->login_model->userlogin1($username);
				$res_pass = $this->encryption->decrypt($result_check['password']);

				if ($result_check['active'] == 'wait') {
					$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Akun belum terverifikasi, periksa email", timer: 10000, icon: "info", button: false});</script>');
					redirect(base_url());
				}else if($result_check['active'] == 'nonaktif'){
					$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Akun anda sudah dinonaktifkan, Hubungi administrator melalui tombol WhatsApp", timer: 10000, icon: "warning", button: false});</script>');
					redirect(base_url());
				}else if($result_check['active'] == 'ban'){
					$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Akun anda sudah diblokir, Hubungi administrator melalui tombol WhatsApp", timer: 10000, icon: "error", button: false});</script>');
					redirect(base_url());
				}else{
					if($res_pass === $password)
					{
						if($result_check['role'] === 'Mahasiswa')
						{
							$sess_user =array(
								'id' 	   => $result_check['id'],
								'nama_lengkap' => $result_check['nama_lengkap'],
								'username' => $result_check['username'],
								'role'	   => $result_check['role'],
								'photo'	   => $result_check['photo']
							);
							$this->session->set_userdata($sess_user);
							// $this->session->set_userdata('id', true);
							$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Selamat datang '.$result_check['nama_lengkap'].'", timer: 10000, icon: "success", button: false});</script>');
							redirect(base_url('dashboard'));
						}else{
							redirect(base_url());
						}
					}else{
						$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Login gagal, username atau password salah", timer: 10000, icon: "warning", button: false});</script>');
						$data['title'] = 'BPN Magang - Mahasiswa Panel Login';
						$this->load->view('front-end/content-head',$data);
						$this->load->view('content_login');
					}
				}
			}else{
				// $this->session->set_flashdata('message', 'Not a user, Please Contact Administrator');
				$this->session->set_flashdata('info', '<script>swal({title: "Peringatan", text: "Anda belum memiliki akun, silahkan daftar terlebih dahulu", timer: 10000, icon: "error", button: false});</script>');
				redirect(base_url('daftar'));
			}

		}
	}

	public function logout()
	{

		// $test = $this->session->sess_destroy();
		$this->session->unset_userdata($sess_user);
		$this->session->unset_userdata('id');
   		redirect(base_url());
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */