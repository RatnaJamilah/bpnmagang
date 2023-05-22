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
		$data['title'] = 'BPN Magang - Login Administrator';
		$this->load->view('adm-end/content_login',$data);
	}

	public function process()
	{
		$this->form_validation->set_rules('username','Username','required|trim', array('required' => 'Masukan Username' ));
		$this->form_validation->set_rules('password','Password','required|trim', array('required' => 'Masukan Password'));

		if ($this->form_validation->run() == FALSE)
		{
			// redirect(base_url());
			$data['title'] = 'BPN Magang - Login Administrator';
			// $this->load->view('adm-end/template/content_head',$data);
			$this->load->view('adm-end/content_login',$data);
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$result = $this->login_model->userlogin($username);
			if($result['username'] === $username)
			{
				$result_check =  $this->login_model->userlogin1($username);
				$res_pass = $this->encryption->decrypt($result_check['password']);

				if ($result_check['active'] == 'nonaktif') {
					$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Akun anda dinonaktifkan, hubungi Administrator", timer: 10000, icon: "info", button: false});</script>');
					redirect(base_url());
				}else{
					if($res_pass === $password)
					{
						if($result_check['role'] === 'Admin')
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
							$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Selamat datang Administrator '.$result_check['name'].'", timer: 10000, icon: "success", button: false});</script>');
							redirect(base_url('adm-end/dashboard'));
						}else{
							redirect(base_url());
						}
					}else{
						$this->session->set_flashdata('danger', '<div class="alert alert-danger">Username atau password salah</div>');
						redirect('adm-end/login','refresh');
					}
				}
			}else{
				// $this->session->set_flashdata('message', 'Not a user, Please Contact Administrator');
				$this->session->set_flashdata('info', '<script>swal({title: "Peringatan", text: "Anda belum memiliki akun, silahkan daftar terlebih dahulu", timer: 10000, icon: "error", button: false});</script>');
				redirect(base_url('home'));
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