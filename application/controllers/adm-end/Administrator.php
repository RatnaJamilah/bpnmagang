<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {
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
		$data['title'] = 'BPN | Administrator';
		$data['operator'] = $this->Administrator_model->get_all_administrator();
		$this->load->view('adm-end/template/content_head',$data);
		$this->load->view('adm-end/template/content_header');
		$this->load->view('adm-end/template/content_nav');
		$this->load->view('adm-end/content_administrator',$data);
		$this->load->view('adm-end/template/content_footer');
		$this->load->view('adm-end/template/content_sidebar-control');
	}

	public function register()
	{
		$this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required');
		$this->form_validation->set_rules('username','Username','required|trim|min_length[10]|max_length[50]|is_unique[akun.username]',array('is_unique' => '%s sudah dipakai.'));
		$this->form_validation->set_rules('password','Password','required|trim');
		$this->form_validation->set_rules('cpassword','Password','required|trim|matches[password]',array('matches'=> ' %s Does Not Match '));

		if($this->form_validation->run() == FALSE)
		{
			$data['title'] = 'BPN | Administrator';
			$data['operator'] = $this->Administrator_model->get_all_administrator();
			$this->load->view('adm-end/template/content_head',$data);
			$this->load->view('adm-end/template/content_header');
			$this->load->view('adm-end/template/content_nav');
			$this->load->view('adm-end/content_administrator',$data);
			$this->load->view('adm-end/template/content_footer');
			$this->load->view('adm-end/template/content_sidebar-control');
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
				$user['role'] 	  	  = 'Admin';
				$user['active']	  	  = 'aktif';
				$id = $this->Login_model->insert_user($user);
				$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Akun berhasil dibuat, silahkan login", timer: 10000, icon: "success", button: false});</script>');
	        	redirect('adm-end/administrator');
			}
		}
	}

	public function aktifkan_administrator($id){
		$this->db->query("UPDATE akun set active='aktif' WHERE id=$id");
		$nama = $this->db->query("SELECT * FROM akun");
		foreach ($nama->result_array() as $row){
			$name = $row['name'];
		}
		// $this->message('BERHASIL','Pengajuan Cuti'.' '.strtoupper($nama_karyawan).' '.'Berhasil DISETUJUI !','success');
		$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Akun berhasil dinonaktifkan", timer: 10000, icon: "success", button: false});</script>');
		redirect('adm-end/administrator');
	}

	public function nonaktif_administrator($id){
		$this->db->query("UPDATE akun set active='nonaktif' WHERE id=$id");
		$nama = $this->db->query("SELECT * FROM akun");
		foreach ($nama->result_array() as $row){
			$name = $row['name'];
		}
		// $this->message('BERHASIL','Pengajuan Cuti'.' '.strtoupper($nama_karyawan).' '.'Berhasil DISETUJUI !','success');
		$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Akun berhasil dinonaktifkan", timer: 10000, icon: "success", button: false});</script>');
		redirect('adm-end/administrator');
	}

	public function hapus_administrator($id){
		$this->db->query("DELETE FROM akun WHERE id=$id AND role='Admin'");
		// $this->message('BERHASIL','Pengajuan Cuti'.' '.strtoupper($nama_karyawan).' '.'Berhasil DISETUJUI !','success');
		$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Akun OPERATOR berhasil dihapus", timer: 10000, icon: "success", button: false});</script>');
		redirect('adm-end/administrator');
	}

	public function ganti_passadmin()
	{
		$id = $this->input->post('id');

		$password = $this->input->post('password');
		$secure_password = $this->encryption->encrypt($this->input->post('password'));

		$set='1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$code = substr(str_shuffle($set), 0, 12);
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]',
			array(
				'required' => 'Password belum diisi',
				'min_length' => 'Password minimal 6 karakter'
			));
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = ' BPN | Administrator';
			$data['operator'] = $this->Administrator_model->get_all_administrator();
			$this->load->view('adm-end/template/content_head',$data);
			$this->load->view('adm-end/template/content_header');
			$this->load->view('adm-end/template/content_nav');
			$this->load->view('adm-end/content_administrator',$data);
			$this->load->view('adm-end/template/content_footer');
			$this->load->view('adm-end/template/content_sidebar-control');
		} else {
			$id = array('id' => $id );
			$data = array(
				'password' => $secure_password
			);
			$this->db->update('akun', $data,$id);
			$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Password berhasil diganti, Password baru : '.$password.'", timer: 100000, icon: "success", button: true});</script>');
			redirect('adm-end/administrator');
		}
	}
}

/* End of file Operator.php */
/* Location: ./application/controllers/adm-end/Operator.php */