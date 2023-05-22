<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mahasiswa_model');
		$this->load->library('encryption');
		$this->user_id = $this->session->userdata('id');
		if(empty($this->user_id) || $this->session->userdata('role') != 'Admin')
		{
			$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Anda tidak berhak untuk masuk, harap login terlebih dahulu", timer: 10000, icon: "error", button: false});</script>');
        	redirect(base_url());
     	}
	}

	public function index(){
		$data['title'] = ' BPN | Mahasiswa';
		$data['mahasiswa'] = $this->Mahasiswa_model->get_all_mahasiswa();
		$this->load->view('adm-end/template/content_head',$data);
		$this->load->view('adm-end/template/content_header');
		$this->load->view('adm-end/template/content_nav');
		$this->load->view('adm-end/content_list_mahasiswa',$data);
		$this->load->view('adm-end/template/content_footer');
		$this->load->view('adm-end/template/content_sidebar-control');
	}

	public function hapus_mahasiswa($id)
	{
		$photo = $this->db->query("SELECT * FROM akun");
		foreach ($photo->result_array() as $row){
			$foto_mahasiswa = $row['photo'];
		}
		$path = 'include/foto_mahasiswa/'.$foto_mahasiswa;
		unlink($path);
		$this->db->delete('akun', array('id' => $id ));
		$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Akun Mahasiswa berhasil dihapus", timer: 10000, icon: "success", button: false});</script>');
    	redirect(base_url('adm-end/mahasiswa'));
	}

	public function nonaktif_mahasiswa($id){
		$this->db->query("UPDATE akun set active='nonaktif' WHERE id=$id");
		$nama = $this->db->query("SELECT * FROM akun");
		foreach ($nama->result_array() as $row){
			$name = $row['name'];
		}
		// $this->message('BERHASIL','Pengajuan Cuti'.' '.strtoupper($nama_karyawan).' '.'Berhasil DISETUJUI !','success');
		$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Akun berhasil dinonaktifkan", timer: 10000, icon: "success", button: false});</script>');
		redirect('adm-end/mahasiswa');
	}

	public function aktifkan_mahasiswa($id){
		$this->db->query("UPDATE akun set active='aktif' WHERE id=$id");
		$nama = $this->db->query("SELECT * FROM akun");
		foreach ($nama->result_array() as $row){
			$name = $row['name'];
		}
		// $this->message('BERHASIL','Pengajuan Cuti'.' '.strtoupper($nama_karyawan).' '.'Berhasil DISETUJUI !','success');
		$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Akun berhasil diaktifkan", timer: 10000, icon: "success", button: false});</script>');
		redirect('adm-end/mahasiswa');
	}

	public function blokir_mahasiswa($id){
		$this->db->query("UPDATE akun set active='ban' WHERE id=$id");
		$nama = $this->db->query("SELECT * FROM akun");
		foreach ($nama->result_array() as $row){
			$name = $row['name'];
		}
		// $this->message('BERHASIL','Pengajuan Cuti'.' '.strtoupper($nama_karyawan).' '.'Berhasil DISETUJUI !','success');
		$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Akun berhasil diblokir", timer: 10000, icon: "success", button: false});</script>');
		redirect('adm-end/mahasiswa');
	}

	public function ganti_passmhs()
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
			$data['title'] = 'BPN | Mahasiswa';
			$data['mahasiswa'] = $this->Mahasiswa_model->get_all_mahasiswa();
			$this->load->view('adm-end/template/content_head',$data);
			$this->load->view('adm-end/template/content_header');
			$this->load->view('adm-end/template/content_nav');
			$this->load->view('adm-end/content_list_mahasiswa',$data);
			$this->load->view('adm-end/template/content_footer');
			$this->load->view('adm-end/template/content_sidebar-control');
		} else {
			$id = array('id' => $id );
			$data = array(
				'password' => $secure_password
			);
			$this->db->update('akun', $data,$id);
			$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Password berhasil diganti, Password baru : '.$password.'", timer: 100000, icon: "success", showButtonConfirm: true});</script>');
			redirect('adm-end/mahasiswa');
		}
	}

}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/adm-end/Mahasiswa.php */