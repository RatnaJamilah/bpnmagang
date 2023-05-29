<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mahasiswa_model');
		$this->load->library('encrypt');
		$this->user_id = $this->session->userdata('id');
		if(empty($this->user_id) || $this->session->userdata('role') != 'Admin')
		{
			$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Anda tidak berhak untuk masuk, harap login terlebih dahulu", timer: 10000, icon: "error", button: false});</script>');
        	redirect(base_url());
     	}
	}

	public function index(){
     	$data['title'] = 'BPN | Pengajuan';
		$data['pengajuan'] = $this->Mahasiswa_model->get_all_pengajuan_mahasiswa();

		$this->load->view('adm-end/template/content_head',$data);
		$this->load->view('adm-end/template/content_header');
		$this->load->view('adm-end/template/content_nav');
		$this->load->view('adm-end/content_pengajuan_mahasiswa',$data);
		$this->load->view('adm-end/template/content_footer');
		$this->load->view('adm-end/template/content_sidebar-control');
	}

	public function detail_pengajuan($id_pengajuan)
	{
		$id_pengajuan = decode_url($id_pengajuan);
		$data['title'] = 'BPN | Detail Pengajuan';
		$data['detail_pengajuan'] = $this->db->query("SELECT * FROM pengajuan  JOIN akun on akun.id = pengajuan.id WHERE pengajuan.id_pengajuan='$id_pengajuan' LIMIT 1")->result();

		$this->load->view('adm-end/template/content_head',$data);
		$this->load->view('adm-end/template/content_header');
		$this->load->view('adm-end/template/content_nav');
		$this->load->view('adm-end/content_detail_pengajuan',$data);
		$this->load->view('adm-end/template/content_footer');
		$this->load->view('adm-end/template/content_sidebar-control');
	}

	public function setuju_mahasiswa($id_pengajuan){
		$id_pengajuan = decode_url($id_pengajuan);
		$this->db->query("UPDATE pengajuan set status='disetujui' WHERE id_pengajuan=$id_pengajuan");
		$nama = $this->db->query("SELECT * FROM pengajuan");
		foreach ($nama->result_array() as $row){
			$name = $row['nama_lengkap'];
		}
		$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Pengajuan Mahasiswa '.$name.' Disetujui", timer: 10000, icon: "success", button: false});</script>');
		redirect('adm-end/pengajuan');
	}

	public function tolak_mahasiswa($id_pengajuan){
		$id_pengajuan = decode_url($id_pengajuan);
		$this->db->query("UPDATE pengajuan set status='ditolak' WHERE id_pengajuan=$id_pengajuan");
		$nama = $this->db->query("SELECT * FROM pengajuan");
		foreach ($nama->result_array() as $row){
			$name = $row['nama_lengkap'];
		}
		$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "Pengajuan Mahasiswa '.$name.' Ditolak", timer: 10000, icon: "success", button: false});</script>');
		redirect('adm-end/pengajuan');
	}

	public function hapus_pengajuan($id_pengajuan){
		$this->db->query("DELETE FROM pengajuan WHERE id=$id_pengajuan");
		// $this->message('BERHASIL','Pengajuan Cuti'.' '.strtoupper($nama_karyawan).' '.'Berhasil DISETUJUI !','success');
		$this->session->set_flashdata('info', '<script>swal({title: "Info", text: "data Pengajuan berhasil dihapus", timer: 10000, icon: "success", button: false});</script>');
		redirect('adm-end/pengajuan');
	}

}

/* End of file Pengajuan.php */
/* Location: ./application/controllers/adm-end/Pengajuan.php */